<?php

namespace App\Observers\Admin;

use App\Models\Volunteering;
use App\Services\ImageUploader\Drivers\StorageDriver;
use Illuminate\Support\Arr;

class VolunteeringObserver
{
    /**
     * Handle the Volunteering "created" event.
     *
     * @param  \App\Models\Volunteering  $volunteering
     * @return void
     */
    public function created(Volunteering $volunteering)
    {
        if (request()->file('file')) {
            if (request()->get('old_name')) {
                $volunteering->deleteItemImage(request()->get('old_name'));
            }
            $fileName = upload_file(request()->file('file'), 'app/public/media/'.$volunteering::$imagePath.'thumbnail', request()->get('old_name') ? request()->get('old_name') : false);
            $volunteering->file = $fileName;
        }

        $volunteering->saveQuietly();
    }

    /**
     * Handle the Volunteering "updated" event.
     *
     * @param  \App\Models\Volunteering  $volunteering
     * @return void
     */
    public function updated(Volunteering $volunteering)
    {
        if (request()->file('file')) {
            if (request()->get('old_name')) {
                $volunteering->deleteItemImage(request()->get('old_name'));
            }
            $fileName = upload_file(request()->file('file'), 'app/public/media/'.$volunteering::$imagePath.'thumbnail', request()->get('old_name') ? request()->get('old_name') : false);
            $volunteering->file = $fileName;
        }

        $volunteering->saveQuietly();
    }

    /**
     * Handle the Volunteering "deleted" event.
     *
     * @param  \App\Models\Volunteering  $volunteering
     * @return void
     */
    public function deleted(Volunteering $volunteering)
    {
        if ($volunteering->file) {
            $storage = StorageDriver::instance();
            foreach ($volunteering::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $volunteering->file);
                $storage->delete($path);
            }
        }
    }

    /**
     * Handle the Volunteering "restored" event.
     *
     * @param  \App\Models\Volunteering  $volunteering
     * @return void
     */
    public function restored(Volunteering $volunteering)
    {
        //
    }

    /**
     * Handle the Volunteering "force deleted" event.
     *
     * @param  \App\Models\Volunteering  $volunteering
     * @return void
     */
    public function forceDeleted(Volunteering $volunteering)
    {
        //
    }
}
