<?php


namespace App\Domains\Orders\Listeners;


use App\Domains\Orders\Events\FinishedOrder;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailWhenOrderFinished implements ShouldQueue
{


    public function handle(FinishedOrder $event)
    {
        $updated_order = $event->order->fresh(['items', 'user']);
    }

}
