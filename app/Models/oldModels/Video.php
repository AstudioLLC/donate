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
 * Class Video
 * @package App\Models
 */
class Videoss extends AbstractModel
{
    use HasTranslations, Sortable;

    public static $imageSizes = [
        [
            'width' => 1440,
            'height' => 500,
            'entityPath' => 'videos',
            'size' => 'thumbnail',
        ],
    ];
    /**
     * @var string[]
     */
    public $translatable = [
        'title',
        'alt'
    ];

    /**
     * @return mixed
     */
    public static function adminList()
    {
        return self::select('id', 'name')->sort()->get();
    }

    /**
     * @return mixed
     */
    public static function getVideos()
    {
        return self::sort()->get();
        /*return Cache::rememberForever(self::cacheKey(), function () {
            return self::where([['active', 1]])->sort()->get();
        });*/
    }

    /**
     * @return string
     */
    private static function cacheKey()
    {
        return 'video';
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
        //$model['active'] = !empty($inputs['active']) ? 1 : 0;

        merge_model($inputs, $model, ['title', 'alt']);
        //$model->url = $inputs['url'];
        $model->link = $inputs['link'];

        if (request()->file('video')) {
            //self::deleteItemVideo($action, $model->name);
            //$imageName = ImageUploader::upload(request()->file('video'), static::$imageSizes);
            $image = upload_file($inputs['video'], 'u/video/',  $action == 'edit' ? $model->name : false);
            $model->name = $image;
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
            $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $model->name);
            $storage->delete($path);
        }

        File::delete(public_path('u/video/') . $model->name);

        return $model->delete();
    }

    public static function deleteItemVideo($action, $image)
    {
        if ($action == 'edit' && !empty($image)){
            File::delete(public_path('u/file/') . $iamge);
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
    public function getVideoUrl()
    {
        return asset('storage/media/videos/thumbnail/' . $this->name);
    }
}
