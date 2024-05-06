<?php

namespace App\Observers\Frontend;

use App\Models\Volunteering;

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
            $volunteeringName = upload_file(request()->file('file'), 'app/public/media/'.$volunteering::$imagePath.'thumbnail', request()->get('old_name') ? request()->get('old_name') : false);
            $volunteering->file = $volunteeringName;
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
        //
    }

    /**
     * Handle the Volunteering "deleted" event.
     *
     * @param  \App\Models\Volunteering  $volunteering
     * @return void
     */
    public function deleted(Volunteering $volunteering)
    {
        //
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
