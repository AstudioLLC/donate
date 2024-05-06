<?php

namespace App\Observers\Admin;

use App\Models\OurPublication ;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class OurPublicationObserver
{
    /**
     * Handle the OurPublication "created" event.
     *
     * @param  \App\Models\OurPublication  $our_publication
     * @return void
     */
    public function created(OurPublication $our_publication)
    {
        $our_publication->ordering = $our_publication->sortValue();

        if (request()->file('imageBig')) {
            if (request()->get('old_imageBig')) {
                $our_publication->deleteItemImage(request()->get('old_imageBig'));
            }
            $imageBigName = ImageUploader::upload(request()->file('imageBig'), $our_publication::$imageBigSizes);
            $our_publication->imageBig = $imageBigName;
        }


        $our_publication->saveQuietly();
    }

    /**
     * Handle the OurPublication "updated" event.
     *
     * @param  \App\Models\OurPublication  $our_publication
     * @return void
     */
    public function updated(OurPublication $our_publication)
    {
        if (request()->file('imageBig')) {
            if (request()->get('old_imageBig')) {
                $our_publication->deleteItemImage(request()->get('old_imageBig'));
            }
            $imageBigName = ImageUploader::upload(request()->file('imageBig'), $our_publication::$imageBigSizes);
            $our_publication->imageBig = $imageBigName;
        }



        $our_publication->saveQuietly();
    }
}
