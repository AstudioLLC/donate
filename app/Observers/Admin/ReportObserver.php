<?php

namespace App\Observers\Admin;

use App\Models\Report;
use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use Illuminate\Support\Arr;

class ReportObserver
{
    /**
     * Handle the Report "created" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function created(Report $report)
    {
        $report->ordering = $report->sortValue();
        if (request()->file('name')) {
            if (request()->get('old_name')) {
                $report->deleteItemImage(request()->get('old_name'));
            }
            $fileName = upload_file(request()->file('name'), 'app/public/media/'.$report::$imagePath.'thumbnail', request()->get('old_name') ? request()->get('old_name') : false);
            $report->name = $fileName;
        }

        if (request()->file('imageBig')) {
            if (request()->get('old_imageBig')) {
                $report->deleteItemImage(request()->get('old_imageBig'));
            }
            $imageBigName = ImageUploader::upload(request()->file('imageBig'), $report::$imageBigSizes);
            $report->imageBig = $imageBigName;
        }

        if (request()->file('imageSmall')) {
            if (request()->get('old_imageSmall')) {
                $report->deleteItemImage(request()->get('old_imageSmall'));
            }
            $imageSmallName = ImageUploader::upload(request()->file('imageSmall'), $report::$imageSmallSizes);
            $report->imageSmall = $imageSmallName;
        }

        $report->saveQuietly();
    }

    /**
     * Handle the Report "updated" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function updated(Report $report)
    {
        if (request()->file('name')) {
            /*if (request()->get('old_name')) {
                $report->deleteItemImage(request()->get('old_name'));
            }*/
            $fileName = upload_file(request()->file('name'), 'app/public/media/'.$report::$imagePath.'thumbnail', request()->get('old_name') ? request()->get('old_name') : false);
            $report->name = $fileName;
        }

        if (request()->file('imageBig')) {
            if (request()->get('old_imageBig')) {
                $report->deleteItemImage(request()->get('old_imageBig'));
            }
            $imageBigName = ImageUploader::upload(request()->file('imageBig'), $report::$imageBigSizes);
            $report->imageBig = $imageBigName;
        }

        if (request()->file('imageSmall')) {
            if (request()->get('old_imageSmall')) {
                $report->deleteItemImage(request()->get('old_imageSmall'));
            }
            $imageSmallName = ImageUploader::upload(request()->file('imageSmall'), $report::$imageSmallSizes);
            $report->imageSmall = $imageSmallName;
        }

        $report->saveQuietly();
    }

    /**
     * Handle the Report "deleted" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function deleted(Report $report)
    {
        if ($report->name) {
            $storage = StorageDriver::instance();
            foreach ($report::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $report->name);
                $storage->delete($path);
            }
        }

        if ($report->imageBig) {
            $storage = StorageDriver::instance();
            foreach ($report::$imageBigSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $report->imageBig);
                $storage->delete($path);
            }
        }

        if ($report->imageSmall) {
            $storage = StorageDriver::instance();
            foreach ($report::$imageSmallSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $report->imageSmall);
                $storage->delete($path);
            }
        }
    }

    /**
     * Handle the Report "restored" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function restored(Report $report)
    {
        //
    }

    /**
     * Handle the Report "force deleted" event.
     *
     * @param  \App\Models\Report  $report
     * @return void
     */
    public function forceDeleted(Report $report)
    {
        //
    }
}
