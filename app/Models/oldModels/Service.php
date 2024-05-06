<?php

namespace App\Models;

use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use App\Traits\UrlUnique;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

/**
 * Class Service
 * @package App\Models
 */
class Servicee extends AbstractModel
{
    use HasTranslations, Sortable, UrlUnique;

    /**
     * @var string[]
     */
    public $translatable = [
        'title',
        'icon_alt',
        'icon_title',
        'image_alt',
        'image_title',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    /**
     * @var array[]
     */
    public static $iconSizes = [
        [
            'width' => 22,
            'height' => 25,
            'entityPath' => 'services',
            'size' => 'thumbnail',
        ],
        [
            'width' => 22,
            'height' => 25,
            'entityPath' => 'services',
            'size' => 'small',
        ]
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1440,
            'height' => 727,
            'entityPath' => 'services',
            'size' => 'thumbnail',
        ],
        [
            'width' => 470,
            'height' => 238,
            'entityPath' => 'services',
            'size' => 'small',
        ]
    ];

    /**
     * @return string
     */
    private static function cacheKey()
    {
        return 'services';
    }

    /**
     * @return string
     */
    private static function cacheKeyHome()
    {
        return 'services_home';
    }

    /**
     * @return void
     */
    private static function clearCaches()
    {
        Cache::forget(self::cacheKey());
    }

    /**
     * @return mixed
     */
    public static function adminList()
    {
        return self::sort()->select('id', 'title', 'active')->get();
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
            $model['ordering'] = $model->sortValue();
        } else {
            $ignore = $model->id;
            $action = 'edit';
        }
        /*if (!empty($inputs['generate_url'])) {
            $url = self::url_unique($inputs['generated_url'], $ignore);
            $length = mb_strlen($url, 'UTF-8');
            if ($length == 1) $url = '-' . $url . '-';
            else if ($length == 2) $url = $url . '-';
        } else {
            $url = $inputs['url'];
        }*/
        $url = $inputs['url'];
        $model->url = $url;

        $model['active'] = !empty($inputs['active']) ? 1 : 0;
        merge_model($inputs,
            $model,
            [
                'title',
                'icon_alt',
                'icon_title',
                'image_alt',
                'image_title',
                'description',
                'seo_title',
                'seo_description',
                'seo_keywords'
            ]
        );

        if (request()->file('icon')){
            self::deleteItemImage($action, $model->icon);
            $imageName = ImageUploader::upload(request()->file('icon'), static::$iconSizes);
            $model->icon = $imageName;
        }

        if (request()->file('image')){
            self::deleteItemImage($action, $model->image);
            $imageName = ImageUploader::upload(request()->file('image'), static::$imageSizes);
            $model->image = $imageName;
        }
        return $model->save();
    }

    /**
     * @param $model
     * @return mixed
     */
    public static function deleteItem($model)
    {
        self::clearCaches();
        $storage = StorageDriver::instance();

        foreach (static::$iconSizes as $sizeData) {
            $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $model->icon);
            $storage->delete($path);
        }
        foreach (static::$imageSizes as $sizeData) {
            $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $model->image);
            $storage->delete($path);
        }
        Gallery::clear('services_item', $model->id);

        return $model->delete();
    }

    public static function deleteImage($model)
    {
        self::clearCaches();
        $storage = StorageDriver::instance();

        if ($model->icon) {
            foreach (static::$iconSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $model->icon);
                $storage->delete($path);
            }
            $model->image = '';
        }

        return $model->save();
    }

    /**
     * @param $action
     * @param $image
     */
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

    /*public function scopeSort($q){
        return $q->orderBy('ordering', 'asc');
    }*/

    /**
     * @return mixed
     */
    public static function siteList(){
        return Cache::rememberForever(self::cacheKey(), function(){
            return self::where('active', 1)->sort()->get();
        });
    }

    /**
     * @return mixed
     */
    public static function homeList(){
        return Cache::rememberForever(self::cacheKeyHome(), function(){
            return self::where('active', 1)->sort()->limit(3)->get();
        });
    }

    /**
     * @param $url
     * @return mixed
     */
    public static function getItemSite($url) {
        return self::where(['url'=>$url, 'active'=>1])->firstOrFail();
    }

    /**
     * @param string $size
     * @return string
     */
    public function getImageUrl($size = ''): string
    {
        if (!$this->image) {
            return '';
        }

        $size = '/services/' . $size;

        return asset(sprintf('storage/media%s/%s', $size, $this->image));
    }

    /**
     * @param string $size
     * @return string
     */
    public function getIconUrl($size = ''): string
    {
        if (!$this->icon) {
            return '';
        }

        $size = '/services/' . $size;

        return asset(sprintf('storage/media%s/%s', $size, $this->icon));
    }
}
