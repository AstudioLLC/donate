<?php

namespace App\Observers\Admin;

use App\Models\Faq;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class FaqObserver
{
    /**
     * Handle the Faq "created" event.
     *
     * @param  \App\Models\Faq  $faq
     * @return void
     */
    public function created(Faq $faq)
    {
        $faq->ordering = $faq->sortValue();
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $faq->deleteItemImage(request()->get('old_image'));
            }
            $imageName = ImageUploader::upload(request()->file('image'), $faq::$imageSizes);
            $faq->image = $imageName;
        }
        $faq->saveQuietly();
    }

    /**
     * Handle the Faq "updated" event.
     *
     * @param  \App\Models\Faq  $faq
     * @return void
     */
    public function updated(Faq $faq)
    {
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $faq->deleteItemImage(request()->get('old_image'));
            }

            $imageName = ImageUploader::upload(request()->file('image'), $faq::$imageSizes);
            $faq->image = $imageName;
            $faq->saveQuietly();
        }
    }

    /**
     * Handle the Faq "deleted" event.
     *
     * @param  \App\Models\Faq  $faq
     * @return void
     */
    public function deleted(Faq $faq)
    {
        //
    }

    /**
     * Handle the Faq "restored" event.
     *
     * @param  \App\Models\Faq  $faq
     * @return void
     */
    public function restored(Faq $faq)
    {
        //
    }

    /**
     * Handle the Faq "force deleted" event.
     *
     * @param  \App\Models\Faq  $faq
     * @return void
     */
    public function forceDeleted(Faq $faq)
    {
        $storage = StorageDriver::instance();

        if ($faq->image) {
            foreach ($faq::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $faq->image);
                $storage->delete($path);
            }
        }
    }
}
