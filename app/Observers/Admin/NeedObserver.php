<?php

namespace App\Observers\Admin;

use App\Models\Need;

class NeedObserver
{
    /**
     * Handle the Need "created" event.
     *
     * @param  \App\Models\Need  $need
     * @return void
     */
    public function created(Need $need)
    {
        //
    }

    /**
     * Handle the Need "updated" event.
     *
     * @param  \App\Models\Need  $need
     * @return void
     */
    public function updated(Need $need)
    {
        //
    }

    /**
     * Handle the Need "deleted" event.
     *
     * @param  \App\Models\Need  $need
     * @return void
     */
    public function deleted(Need $need)
    {
        //
    }

    /**
     * Handle the Need "restored" event.
     *
     * @param  \App\Models\Need  $need
     * @return void
     */
    public function restored(Need $need)
    {
        //
    }

    /**
     * Handle the Need "force deleted" event.
     *
     * @param  \App\Models\Need  $need
     * @return void
     */
    public function forceDeleted(Need $need)
    {
        //
    }
}
