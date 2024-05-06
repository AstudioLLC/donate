<?php

namespace App\Models;

use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Illuminate\Support\Arr;

class CountryFilterr extends AbstractModel
{
    use HasTranslations, Sortable;

    public $translatable = ['name'];

    public static $imageSizes = [
        [
            'width' => 21,
            'height' => 16,
            'entityPath' => 'country_filters',
            'size' => 'small',
        ]
    ];

    public function addFilter(array $data)
    {
        $model = new static();

        $model->setTranslations('name', $data['name'] ?? '');

        if (request()->file('image')){
            //self::deleteItemImage($action, $model->image);
            $imageName = ImageUploader::upload(request()->file('image'), static::$imageSizes);
            $model->image = $imageName;
        }

        return $model->save();
    }

    public static function editFilter($id, array $data)
    {
        $model = self::query()->where('id', $id)->first();

        $model->setTranslations('name', $data['name'] ?? []);

        if (request()->file('image')){
            self::deleteItemImage($action = 'edit', $model->image);
            $imageName = ImageUploader::upload(request()->file('image'), static::$imageSizes);
            $model->image = $imageName;
        }
        return $model->save();
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'country_filters_relations', 'filter_id', 'item_id');
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

    /**
     * @param $model
     * @return mixed
     */
    public static function deleteImage($model)
    {
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
     * @param string $size
     * @return string
     */
    public function getImageUrl($size = ''): string
    {
        if (!$this->image) {
            return '';
        }

        $size = '/country_filters/' . $size;

        return asset(sprintf('storage/media%s/%s', $size, $this->image));
    }
}
