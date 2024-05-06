<?php

namespace App\Models;

use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

/**
 * Class Address
 * @package App\Models
 */
class Addresss extends AbstractModel
{
    use HasTranslations, Sortable;

    /**
     * @var bool
     */
    //protected $sortableDesc = false;

    /**
     * @var string[]
     */
    public $translatable = [
        'title'
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 178,
            'height' => 135,
            'entityPath' => 'addresses',
            'size' => 'thumbnail',
        ]/*,
        [
            'width' => 712,
            'height' => 540,
            'entityPath' => 'addresses',
            'size' => 'small',
        ]*/
    ];

    /**
     * @return string
     */
    private static function cacheKey()
    {
        return 'addresses';
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
        return self::sort()->select('id', 'title', 'active')->sort()->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getItemAdmin($id)
    {
        $result = self::where(['id' => $id])->first();
        if (!$result) abort(404);

        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getItem($id)
    {
        $result = self::where(['id' => $id, 'active' => 1])->first();
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
        $model->phone = $inputs['phone'];
        $model->fax = $inputs['fax'];
        $model->email = $inputs['email'];
        $model->coords = $inputs['coords'];

        $model['active'] = !empty($inputs['active']) ? 1 : 0;
        merge_model($inputs,
            $model,
            [
                'title'
            ]
        );

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
        return $q->orderBy('id', 'desc');
    }*/

    /**
     * @return mixed
     */
    public static function siteList(){
        self::clearCaches();
        return Cache::rememberForever(self::cacheKey(), function(){
            return self::where('active', 1)->sort()->get();
        });
    }

    /**
     * @return mixed
     */
    public static function homeList(){
        self::clearCaches();
        return Cache::rememberForever(self::cacheKeyHome(), function(){
            self::clearCaches();
            return self::where('active', 1)->sort()->limit(3)->get();
        });
    }

    /**
     * @param $url
     * @return mixed
     */
    public static function getItemSite($url) {
        return self::where(['url' => $url, 'active' => 1])->firstOrFail();
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

        $size = '/addresses/' . $size;

        return asset(sprintf('storage/media%s/%s', $size, $this->image));
    }
}
