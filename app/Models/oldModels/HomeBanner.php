<?php

namespace App\Models;

use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

/**
 * Class MainSlide
 * @package App\Models
 */
class HomeBannerr extends Model
{
    use HasTranslations, Sortable;

    public static $imageSizes = [
        [
            'width' => 360,
            'height' => 210,
            'entityPath' => 'home_banner',
            'size' => 'small',
        ],
    ];
    /**
     * @var string[]
     */
    public $translatable = [
        'title',
        'button_title'
    ];

    /**
     * @return mixed
     */
    public static function adminList()
    {
        return self::select('id', 'image', 'active')->sort()->get();
    }

    /**
     * @return mixed
     */
    public static function getHomeBanners()
    {
        return self::where([['active', 1]])->sort()->get();
        /*return Cache::rememberForever(self::cacheKey(), function () {
            return self::where([['active', 1]])->sort()->get();
        });*/
    }

    /**
     * @return string
     */
    private static function cacheKey()
    {
        return 'home_banner';
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
            $action = 'add';
        } else {
            $action = 'edit';
        }
        $model['active'] = !empty($inputs['active']) ? 1 : 0;

        merge_model($inputs, $model, ['title', 'button_title']);
        $model->url = $inputs['url'];

        if (request()->file('image')){
            self::deleteItemImage($action, $model->image);
            $imageName = ImageUploader::upload(request()->file('image'), static::$imageSizes);
            $model->image = $imageName;
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

        return $model->delete();
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

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return asset('storage/media/home_banner/small/' . $this->image);
    }
}
