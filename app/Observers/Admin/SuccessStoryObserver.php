<?php

namespace App\Observers\Admin;

use App\Models\SuccessStory;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class SuccessStoryObserver
{
    /**
     * Handle the SuccessStory "created" event.
     *
     * @param  \App\Models\SuccessStory  $successStory
     * @return void
     */
    public function created(SuccessStory $successStory)
    {
        $successStory->ordering = $successStory->sortValue();

        if (request()->file('imageBig')) {
            if (request()->get('old_imageBig')) {
                $successStory->deleteItemImage(request()->get('old_imageBig'));
            }
            $imageBigName = ImageUploader::upload(request()->file('imageBig'), $successStory::$imageBigSizes);
            $successStory->imageBig = $imageBigName;
        }

        if (request()->file('imageSmall')) {
            if (request()->get('old_imageSmall')) {
                $successStory->deleteItemImage(request()->get('old_imageSmall'));
            }
            $imageSmallName = ImageUploader::upload(request()->file('imageSmall'), $successStory::$imageSmallSizes);
            $successStory->imageSmall = $imageSmallName;
        }

        $successStory->saveQuietly();
    }

    /**
     * Handle the SuccessStory "updated" event.
     *
     * @param  \App\Models\SuccessStory  $successStory
     * @return void
     */
    public function updated(SuccessStory $successStory)
    {
        if (request()->file('imageBig')) {
            if (request()->get('old_imageBig')) {
                $successStory->deleteItemImage(request()->get('old_imageBig'));
            }
            $imageBigName = ImageUploader::upload(request()->file('imageBig'), $successStory::$imageBigSizes);
            $successStory->imageBig = $imageBigName;
        }

        if (request()->file('imageSmall')) {
            if (request()->get('old_imageSmall')) {
                $successStory->deleteItemImage(request()->get('old_imageSmall'));
            }
            $imageSmallName = ImageUploader::upload(request()->file('imageSmall'), $successStory::$imageSmallSizes);
            $successStory->imageSmall = $imageSmallName;
        }

        $successStory->saveQuietly();
    }

    /**
     * Handle the SuccessStory "deleted" event.
     *
     * @param  \App\Models\SuccessStory  $successStory
     * @return void
     */
    public function deleted(SuccessStory $successStory)
    {
        //
    }

    /**
     * Handle the SuccessStory "restored" event.
     *
     * @param  \App\Models\SuccessStory  $successStory
     * @return void
     */
    public function restored(SuccessStory $successStory)
    {
        //
    }

    /**
     * Handle the SuccessStory "force deleted" event.
     *
     * @param  \App\Models\SuccessStory  $successStory
     * @return void
     */
    public function forceDeleted(SuccessStory $successStory)
    {
        $storage = StorageDriver::instance();

        if ($successStory->imageSmall) {
            foreach ($successStory::$imageSmallSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $successStory->imageSmall);
                $storage->delete($path);
            }
        }

        if ($successStory->imageBig) {
            foreach ($successStory::$imageBigSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $successStory->imageBig);
                $storage->delete($path);
            }
        }
    }
}
