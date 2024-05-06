<?php

namespace App\Observers\Admin;

use App\Models\CoreValue;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class CoreValueObserver
{
    /**
     * Handle the CoreValue "created" event.
     *
     * @param  \App\Models\CoreValue  $coreValue
     * @return void
     */
    public function created(CoreValue $coreValue)
    {
        $coreValue->ordering = $coreValue->sortValue();
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $coreValue->deleteItemImage(request()->get('old_image'));
            }
            $imageName = ImageUploader::upload(request()->file('image'), $coreValue::$imageSizes);
            $coreValue->image = $imageName;
        }
        $coreValue->saveQuietly();
    }

    /**
     * Handle the CoreValue "updated" event.
     *
     * @param  \App\Models\CoreValue  $coreValue
     * @return void
     */
    public function updated(CoreValue $coreValue)
    {
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $coreValue->deleteItemImage(request()->get('old_image'));
            }

            $imageName = ImageUploader::upload(request()->file('image'), $coreValue::$imageSizes);
            $coreValue->image = $imageName;
            $coreValue->saveQuietly();
        }
    }

    /**
     * Handle the CoreValue "deleted" event.
     *
     * @param  \App\Models\CoreValue  $coreValue
     * @return void
     */
    public function deleted(CoreValue $coreValue)
    {
        //
    }

    /**
     * Handle the CoreValue "restored" event.
     *
     * @param  \App\Models\CoreValue  $coreValue
     * @return void
     */
    public function restored(CoreValue $coreValue)
    {
        //
    }

    /**
     * Handle the CoreValue "force deleted" event.
     *
     * @param  \App\Models\CoreValue  $coreValue
     * @return void
     */
    public function forceDeleted(CoreValue $coreValue)
    {
        $storage = StorageDriver::instance();

        if ($coreValue->image) {
            foreach ($coreValue::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $coreValue->image);
                $storage->delete($path);
            }
        }
    }
}
