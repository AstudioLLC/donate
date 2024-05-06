<?php

namespace App\Observers\Admin;

use App\Models\Gift;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class GiftObserver
{
    /**
     * Handle the Gift "created" event.
     *
     * @param  \App\Models\Gift  $gift
     * @return void
     */
    public function created(Gift $gift)
    {
        $gift->ordering = $gift->sortValue();

        if (request()->file('imageBig')) {
            if (request()->get('old_imageBig')) {
                $gift->deleteItemImage(request()->get('old_imageBig'));
            }
            $imageBigName = ImageUploader::upload(request()->file('imageBig'), $gift::$imageBigSizes);
            $gift->imageBig = $imageBigName;
        }

        if (request()->file('imageSmall')) {
            if (request()->get('old_imageSmall')) {
                $gift->deleteItemImage(request()->get('old_imageSmall'));
            }
            $imageSmallName = ImageUploader::upload(request()->file('imageSmall'), $gift::$imageSmallSizes);
            $gift->imageSmall = $imageSmallName;
        }

        $gift->saveQuietly();
    }

    /**
     * Handle the Gift "updated" event.
     *
     * @param  \App\Models\Gift  $gift
     * @return void
     */
    public function updated(Gift $gift)
    {
        if (request()->file('imageBig')) {
            if (request()->get('old_imageBig')) {
                $gift->deleteItemImage(request()->get('old_imageBig'));
            }
            $imageBigName = ImageUploader::upload(request()->file('imageBig'), $gift::$imageBigSizes);
            $gift->imageBig = $imageBigName;
        }

        if (request()->file('imageSmall')) {
            if (request()->get('old_imageSmall')) {
                $gift->deleteItemImage(request()->get('old_imageSmall'));
            }
            $imageSmallName = ImageUploader::upload(request()->file('imageSmall'), $gift::$imageSmallSizes);
            $gift->imageSmall = $imageSmallName;
        }

        $gift->saveQuietly();
    }

    /**
     * Handle the Gift "deleted" event.
     *
     * @param  \App\Models\Gift  $gift
     * @return void
     */
    public function deleted(Gift $gift)
    {
        $storage = StorageDriver::instance();

        if ($gift->imageSmall) {
            foreach ($gift::$imageSmallSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $gift->imageSmall);
                $storage->delete($path);
            }
        }

        if ($gift->imageBig) {
            foreach ($gift::$imageBigSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $gift->imageBig);
                $storage->delete($path);
            }
        }
    }

    /**
     * Handle the Gift "restored" event.
     *
     * @param  \App\Models\Gift  $gift
     * @return void
     */
    public function restored(Gift $gift)
    {
        //
    }

    /**
     * Handle the Gift "force deleted" event.
     *
     * @param  \App\Models\Gift  $gift
     * @return void
     */
    public function forceDeleted(Gift $gift)
    {
        //
    }
}
