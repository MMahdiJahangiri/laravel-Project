<?php

namespace App\Observers;

use App\Models\admin;

class adminObserver
{
    /**
     * Handle the admin "created" event.
     */
    public function created(admin $admin): void
    {
        //
    }

    /**
     * Handle the admin "updated" event.
     */
    public function updated(admin $admin): void
    {
        //
    }

    /**
     * Handle the admin "deleted" event.
     */
    public function deleted(admin $admin): void
    {
        //
    }

    /**
     * Handle the admin "restored" event.
     */
    public function restored(admin $admin): void
    {
        //
    }

    /**
     * Handle the admin "force deleted" event.
     */
    public function forceDeleted(admin $admin): void
    {
        //
    }
}
