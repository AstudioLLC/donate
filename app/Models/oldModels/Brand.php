<?php

namespace App\Models;

use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use App\Traits\UrlUnique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

/**
 * Class Brand
 * @package App\Brand
 */
class Brandd extends Model
{
    use HasTranslations, Sortable, UrlUnique;

    public static $logoSizes = [
        [
            'width' => 252,
            'height' => 112,
            'entityPath' => 'brands',
            'size' => 'thumbnail',
        ],
    ];

    public static $imageSizes = [
        [
            'width' => 1440,
            'height' => 370,
            'entityPath' => 'brands',
            'size' => 'thumbnail',
        ],
    ];

    /**
     * @var string[]
     */
    public $translatable = [
        'title',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    /**
     * @return mixed
     */
    public static function adminList()
    {
        return self::select('id', 'title', 'active')->sort()->get();
    }

    /**
     * @return mixed
     */
    public static function getHeaderBrands()
    {
        return Cache::rememberForever(self::cacheKey(), function () {
            self::clearCaches();
            return self::where([['active', 1]])->sort()->get();
        });
    }

    /**
     * @return string
     */
    private static function cacheKey()
    {
        return 'brands';
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getItem($id)
    {
        $result = self::where('id', $id)->first();
        if (!$result) abort(404);

        return $result;
    }

    /**
     * @param $model
     * @param $inputs
     * @return bool
     */
    public static function action($model, $inputs)
    {
        self::clearCaches();
        if (empty($model)) {
            $model = new self;
            $ignore = false;
            $action = 'add';
        } else {
            $ignore = $model->id;
            $action = 'edit';
        }
        $model['active'] = !empty($inputs['active']) ? 1 : 0;

        if (!empty($inputs['generate_url'])) {
            $url = self::url_unique($inputs['generated_url'], $ignore);
            $length = mb_strlen($url, 'UTF-8');
            if ($length == 1) $url = '-' . $url . '-';
            else if ($length == 2) $url = $url . '-';
        } else {
            $url = $inputs['url'];
        }
        $model->url = $url;

        merge_model($inputs,
            $model, [
                'title',
                'description',
                'seo_title',
                'seo_description',
                'seo_keywords'
            ]
        );

        if (request()->file('image')){
            self::deleteItemImage($action, $model->image);
            $imageName = ImageUploader::upload(request()->file('image'), static::$imageSizes);
            $model->image = $imageName;
        }

        if (request()->file('logo')){
            self::deleteItemImage($action, $model->logo);
            $logoName = ImageUploader::upload(request()->file('logo'), static::$logoSizes);
            $model->logo = $logoName;
        }

        return $model->save();
    }

    /**
     * @return void
     */
    private static function clearCaches()
    {
        Cache::forget(self::cacheKey());
    }

    /**
     * @param $model
     * @return mixed
     */
    public static function deleteItem($model)
    {
        $storage = StorageDriver::instance();

        foreach (static::$imageSizes as $sizeData) {
            $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $model->image);
            $storage->delete($path);
        }

        foreach (static::$logoSizes as $sizeData) {
            $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $model->logo);
            $storage->delete($path);
        }

        return $model->delete();
    }

    /**
     * @param $model
     * @return mixed
     */
    public static function deleteImage($model)
    {
        self::clearCaches();
        $storage = StorageDriver::instance();

        if ($model->image) {
            foreach (static::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $model->image);
                $storage->delete($path);
            }
            $model->image = '';
        }

        return $model->save();
    }

    public static function deleteItemImage($action, $image)
    {
        if ($action == 'edit' && !empty($image)){
            $storage = StorageDriver::instance();

            foreach (static::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $image);
                $storage->delete($path);
            }
        }
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_brands_relations', 'brand_id', 'item_id');
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return asset('storage/media/brands/thumbnail/' . $this->image);
    }

    /**
     * @return string
     */
    public function getLogoUrl()
    {
        return asset('storage/media/brands/thumbnail/' . $this->logo);
    }
}
