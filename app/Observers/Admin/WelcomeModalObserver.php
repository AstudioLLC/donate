<?php

namespace App\Observers\Admin;

use App\Models\WelcomeModal;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class WelcomeModalObserver
{
    /**
     * Handle the WelcomeModal "created" event.
     *
     * @param  \App\Models\WelcomeModal  $welcome_modal
     * @return void
     */
    public function created(WelcomeModal $welcome_modal)
    {
        $welcome_modal->ordering = $welcome_modal->sortValue();
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $welcome_modal->deleteItemImage(request()->get('old_image'));
            }
            $imageName = ImageUploader::upload(request()->file('image'), $welcome_modal::$imageSizes);
            $welcome_modal->image = $imageName;
        }
        $welcome_modal->saveQuietly();
    }

    /**
     * Handle the WelcomeModal "updated" event.
     *
     * @param  \App\Models\WelcomeModal  $welcome_modal
     * @return void
     */
    public function updated(WelcomeModal $welcome_modal)
    {
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $welcome_modal->deleteItemImage(request()->get('old_image'));
            }

            $imageName = ImageUploader::upload(request()->file('image'), $welcome_modal::$imageSizes);
            $welcome_modal->image = $imageName;
            $welcome_modal->saveQuietly();
        }
    }

    /**
     * Handle the WelcomeModal "deleted" event.
     *
     * @param  \App\Models\WelcomeModal  $welcome_modal
     * @return void
     */
    public function deleted(WelcomeModal $welcome_modal)
    {
        //
    }

    /**
     * Handle the WelcomeModal "restored" event.
     *
     * @param  \App\Models\WelcomeModal  $welcome_modal
     * @return void
     */
    public function restored(WelcomeModal $welcome_modal)
    {
        //
    }

    /**
     * Handle the WelcomeModal "force deleted" event.
     *
     * @param  \App\Models\WelcomeModal  $welcome_modal
     * @return void
     */
    public function forceDeleted(WelcomeModal $welcome_modal)
    {
        $storage = StorageDriver::instance();

        if ($welcome_modal->image) {
            foreach ($welcome_modal::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $welcome_modal->image);
                $storage->delete($path);
            }
        }
    }
}
