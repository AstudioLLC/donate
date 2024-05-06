<?php

namespace App\Observers\Admin;

use App\Models\Country;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class CountryObserver
{
    /**
     * Handle the Country "created" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function created(Country $country)
    {
        $country->ordering = $country->sortValue();
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $country->deleteItemImage(request()->get('old_image'));
            }
            $imageName = ImageUploader::upload(request()->file('image'), $country::$imageSizes);
            $country->image = $imageName;
        }
        $country->saveQuietly();
    }

    /**
     * Handle the Country "updated" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function updated(Country $country)
    {
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $country->deleteItemImage(request()->get('old_image'));
            }

            $imageName = ImageUploader::upload(request()->file('image'), $country::$imageSizes);
            $country->image = $imageName;
            $country->saveQuietly();
        }
    }

    /**
     * Handle the Country "deleted" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function deleted(Country $country)
    {
        $storage = StorageDriver::instance();

        if ($country->image) {
            foreach ($country::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $country->image);
                $storage->delete($path);
            }
        }
    }

    /**
     * Handle the Country "restored" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function restored(Country $country)
    {
        //
    }

    /**
     * Handle the Country "force deleted" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function forceDeleted(Country $country)
    {
        //
    }
}
