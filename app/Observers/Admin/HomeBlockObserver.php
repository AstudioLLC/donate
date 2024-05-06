<?php

namespace App\Observers\Admin;

use App\Models\HomeBlock;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class HomeBlockObserver
{
    /**
     * Handle the HomeBlock "created" event.
     *
     * @param  \App\Models\HomeBlock  $homeBlock
     * @return void
     */
    public function created(HomeBlock $homeBlock)
    {
        $homeBlock->ordering = $homeBlock->sortValue();
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $homeBlock->deleteItemImage(request()->get('old_image'));
            }
            $imageName = ImageUploader::upload(request()->file('image'), $homeBlock::$imageSizes);
            $homeBlock->image = $imageName;
        }
        $homeBlock->saveQuietly();
    }

    /**
     * Handle the HomeBlock "updated" event.
     *
     * @param  \App\Models\HomeBlock  $homeBlock
     * @return void
     */
    public function updated(HomeBlock $homeBlock)
    {
        if ($homeBlock->id == 1) {
            $imageBigSizes = $homeBlock::$imageFirstBigSizes;
            $imageSmallSizes = $homeBlock::$imageFirstSmallSizes;
        } else {
            $imageBigSizes = $homeBlock::$imageSecondBigSizes;
            $imageSmallSizes = $homeBlock::$imageSecondSmallSizes;
        }

        if (request()->file('imageBig')) {
            if (request()->get('old_imageBig')) {
                $homeBlock->deleteItemImage(request()->get('old_imageBig'));
            }
            $imageBigName = ImageUploader::upload(request()->file('imageBig'), $imageBigSizes);
            $homeBlock->imageBig = $imageBigName;
        }

        if (request()->file('imageSmall')) {
            if (request()->get('old_imageSmall')) {
                $homeBlock->deleteItemImage(request()->get('old_imageSmall'));
            }
            $imageSmallName = ImageUploader::upload(request()->file('imageSmall'), $imageSmallSizes);
            $homeBlock->imageSmall = $imageSmallName;
        }
        $homeBlock->saveQuietly();
    }

    /**
     * Handle the HomeBlock "deleted" event.
     *
     * @param  \App\Models\HomeBlock  $homeBlock
     * @return void
     */
    public function deleted(HomeBlock $homeBlock)
    {
        //
    }

    /**
     * Handle the HomeBlock "restored" event.
     *
     * @param  \App\Models\HomeBlock  $homeBlock
     * @return void
     */
    public function restored(HomeBlock $homeBlock)
    {
        //
    }

    /**
     * Handle the HomeBlock "force deleted" event.
     *
     * @param  \App\Models\HomeBlock  $homeBlock
     * @return void
     */
    public function forceDeleted(HomeBlock $homeBlock)
    {
        $storage = StorageDriver::instance();

        if ($homeBlock->id == 1) {
            $imageBigSizes = $homeBlock::$imageFirstBigSizes;
            $imageSmallSizes = $homeBlock::$imageFirstSmallSizes;
        } else {
            $imageBigSizes = $homeBlock::$imageSecondBigSizes;
            $imageSmallSizes = $homeBlock::$imageSecondSmallSizes;
        }

        if ($homeBlock->imageSmall) {
            foreach ($imageSmallSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $homeBlock->imageSmall);
                $storage->delete($path);
            }
        }

        if ($homeBlock->imageBig) {
            foreach ($imageBigSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $homeBlock->imageBig);
                $storage->delete($path);
            }
        }
    }
}
