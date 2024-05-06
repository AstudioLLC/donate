<?php

namespace App\Observers\Admin;

use App\Models\Chat;
use App\Services\ImageUploader\Drivers\StorageDriver;
use Illuminate\Support\Arr;

class ChatObserver
{
    /**
     * Handle the Chat "created" event.
     *
     * @param  \App\Models\Chat  $chat
     * @return void
     */
    public function created(Chat $chat)
    {
        if (request()->file('file')) {
            if (request()->get('old_name')) {
                $chat->deleteItemImage(request()->get('old_name'));
            }
            $fileName = upload_file(request()->file('file'), 'app/public/media/'.$chat::$imagePath.'thumbnail', request()->get('old_name') ? request()->get('old_name') : false);
            $chat->file = $fileName;
        }

        $chat->saveQuietly();
    }

    /**
     * Handle the Chat "updated" event.
     *
     * @param  \App\Models\Chat  $chat
     * @return void
     */
    public function updated(Chat $chat)
    {
        //
    }

    /**
     * Handle the Chat "deleted" event.
     *
     * @param  \App\Models\Chat  $chat
     * @return void
     */
    public function deleted(Chat $chat)
    {
        //
    }

    /**
     * Handle the Chat "restored" event.
     *
     * @param  \App\Models\Chat  $chat
     * @return void
     */
    public function restored(Chat $chat)
    {
        //
    }

    /**
     * Handle the Chat "force deleted" event.
     *
     * @param  \App\Models\Chat  $chat
     * @return void
     */
    public function forceDeleted(Chat $chat)
    {
        if ($chat->file) {
            $storage = StorageDriver::instance();
            foreach ($chat::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $chat->file);
                $storage->delete($path);
            }
        }
    }
}
