<?php

namespace App\Jobs;

use App\Models\Order;
use App\Notifications\OrderConfirmation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendOrderConfirmation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function handle()
    {
        $this->order->user->notify(new OrderConfirmation($this->order));
    }

    public function failed(\Throwable $exception)
    {
        // Log the failure or notify admin
        \Log::error('Failed to send order confirmation for order #' . $this->order->id, [
            'error' => $exception->getMessage(),
        ]);
    }
}