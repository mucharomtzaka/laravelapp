<?php

namespace App\Listeners;

use IlluminateAuthEventsLogout;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\Models\Activity;

class LogoutSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  IlluminateAuthEventsLogout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        //
        $event->subject="Logout";
        $event->description="Logout Successfull";
        
     activity()
    ->causedBy($event->user)
    ->performedOn('')
    ->event('logout')
    ->log($event->description);
    }
}
