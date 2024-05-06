<?php

namespace App\Observers\Admin;

use App\Models\CorporateDonor;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class CorporateDonorObserver
{
    /**
     * Handle the CorporateDonor "created" event.
     *
     * @param  \App\Models\CorporateDonor  $corporateDonor
     * @return void
     */
    public function created(CorporateDonor $corporateDonor)
    {
        $corporateDonor->ordering = $corporateDonor->sortValue();
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $corporateDonor->deleteItemImage(request()->get('old_image'));
            }
            $imageName = ImageUploader::upload(request()->file('image'), $corporateDonor::$imageSizes);
            $corporateDonor->image = $imageName;
        }
        $corporateDonor->saveQuietly();
    }

    /**
     * Handle the CorporateDonor "updated" event.
     *
     * @param  \App\Models\CorporateDonor  $corporateDonor
     * @return void
     */
    public function updated(CorporateDonor $corporateDonor)
    {
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $corporateDonor->deleteItemImage(request()->get('old_image'));
            }

            $imageName = ImageUploader::upload(request()->file('image'), $corporateDonor::$imageSizes);
            $corporateDonor->image = $imageName;
            $corporateDonor->saveQuietly();
        }
    }

    /**
     * Handle the CorporateDonor "deleted" event.
     *
     * @param  \App\Models\CorporateDonor  $corporateDonor
     * @return void
     */
    public function deleted(CorporateDonor $corporateDonor)
    {
        //
    }

    /**
     * Handle the CorporateDonor "restored" event.
     *
     * @param  \App\Models\CorporateDonor  $corporateDonor
     * @return void
     */
    public function restored(CorporateDonor $corporateDonor)
    {
        //
    }

    /**
     * Handle the CorporateDonor "force deleted" event.
     *
     * @param  \App\Models\CorporateDonor  $corporateDonor
     * @return void
     */
    public function forceDeleted(CorporateDonor $corporateDonor)
    {
        $storage = StorageDriver::instance();

        if ($corporateDonor->image) {
            foreach ($corporateDonor::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $corporateDonor->image);
                $storage->delete($path);
            }
        }
    }
}
