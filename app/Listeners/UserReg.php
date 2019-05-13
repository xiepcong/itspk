<?php

namespace App\Listeners;

use App\Events\UserReg;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserReg
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
     * @param  UserReg  $event
     * @return void
     */
    public function handle(UserReg $event)
    {
        //
    }
}
