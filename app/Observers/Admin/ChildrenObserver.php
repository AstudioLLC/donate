<?php

namespace App\Observers\Admin;

use App\Models\Children;
use App\Models\File;
use App\Models\Gallery;
use App\Models\Report;
use App\Models\Video;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ChildrenObserver
{
    /**
     * Handle the Children "created" event.
     *
     * @param \App\Models\Children $children
     * @return void
     */
    public function created(Children $children)
    {
        $children->ordering = $children->sortValue();
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $children->deleteItemImage(request()->get('old_image'));
            }
            $imageName = ImageUploader::upload(request()->file('image'), $children::$imageSizes);
            $children->image = $imageName;
        }
        $children->saveQuietly();
    }

    /**
     * Handle the Children "updated" event.
     *
     * @param \App\Models\Children $children
     * @return void
     */
    public function updated(Children $children)
    {
        if (request()->file('image')) {
            if (request()->get('old_image')) {
                $children->deleteItemImage(request()->get('old_image'));
            }

            $imageName = ImageUploader::upload(request()->file('image'), $children::$imageSizes);
            $children->image = $imageName;
            $children->saveQuietly();
        }
    }

    /**
     * Handle the Children "deleted" event.
     *
     * @param \App\Models\Children $children
     * @return void
     */
    public function deleted(Children $children)
    {

    }

    /**
     * Handle the Children "restored" event.
     *
     * @param \App\Models\Children $children
     * @return void
     */
    public function restored(Children $children)
    {
        //
    }

    /**
     * Handle the Children "force deleted" event.
     *
     * @param \App\Models\Children $children
     * @return void
     */
    public function forceDeleted(Children $children)
    {
        DB::table('children_needs_relations')->where('children_id', $children->id)->delete();

        $storage = StorageDriver::instance();

        if ($children->image) {
            foreach ($children::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $children->image);
                $storage->delete($path);
            }
        }

        $galleryQuery = $children->gallery();
        $gallery = $children->gallery()->get();
        if (count($gallery)) {
            foreach ($gallery as $item) {
                if ($item->image) {
                    foreach (Gallery::$imageSizes as $sizeData) {
                        $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $item->image);
                        $storage->delete($path);
                    }
                }
            }
            $galleryQuery->delete();
        }

        $fileQuery = $children->files();
        $files = $children->files()->get();
        if (count($files)) {
            foreach ($files as $item) {
                if ($item->name) {
                    foreach (File::$imageSizes as $sizeData) {
                        $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $item->name);
                        $storage->delete($path);
                    }
                }

                if ($item->imageSmall) {
                    foreach (File::$imageSmallSizes as $sizeData) {
                        $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $item->imageSmall);
                        $storage->delete($path);
                    }
                }

                if ($item->imageBig) {
                    foreach (File::$imageBigSizes as $sizeData) {
                        $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $item->imageBig);
                        $storage->delete($path);
                    }
                }
            }
            $fileQuery->delete();
        }

        $reportQuery = $children->reports();
        $reports = $children->reports()->get();
        if (count($reports)) {
            foreach ($reports as $item) {
                if ($item->name) {
                    foreach (Report::$imageSizes as $sizeData) {
                        $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $item->name);
                        $storage->delete($path);
                    }
                }

                if ($item->imageSmall) {
                    foreach (Report::$imageSmallSizes as $sizeData) {
                        $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $item->imageSmall);
                        $storage->delete($path);
                    }
                }

                if ($item->imageBig) {
                    foreach (Report::$imageBigSizes as $sizeData) {
                        $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $item->imageBig);
                        $storage->delete($path);
                    }
                }
            }
            $reportQuery->delete();
        }

        $videoQuery = $children->gallery();
        $video = $children->gallery()->get();
        if (count($video)) {
            foreach ($video as $item) {
                if ($item->image) {
                    foreach (Video::$imageSizes as $sizeData) {
                        $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $item->name);
                        $storage->delete($path);
                    }
                }
            }
            $videoQuery->delete();
        }
    }
}
