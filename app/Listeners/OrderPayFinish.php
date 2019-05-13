<?php

namespace App\Listeners;

use App\Events\OrderPay;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPayFinish
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
     * @param  OrderPay  $event
     * @return void
     */
    public function handle(OrderPay $event)
    {
        //
    }
}
