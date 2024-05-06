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
class MainSlidee extends Model
{
    use HasTranslations, Sortable;

    public static $imageSizes = [
        [
            'width' => 1920,
            'height' => 500,
            'entityPath' => 'main_slider',
            'size' => 'thumbnail',
        ],
    ];
    /**
     * @var string[]
     */
    public $translatable = [
        'top_text',
        'bottom_text',
        'url_text'
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
    public static function getHeaderSlides()
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
        return 'main_slide';
    }

    /**
     * @return mixed
     */
    public static function getSecondSlides()
    {
        return Cache::rememberForever(self::cacheKey_second(), function () {
            self::clearCaches();
            return self::where('active', 1)->where('slider_type', 0)->sort()->get();
        });
    }

    /**
     * @return string
     */
    private static function cacheKey_second()
    {
        return 'main_slide_second';
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

        merge_model($inputs, $model, ['bottom_text', 'top_text', 'url_text']);
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
        Cache::forget(self::cacheKey_second());
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

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return asset('storage/media/main_slider/thumbnail/' . $this->image);
    }
}
