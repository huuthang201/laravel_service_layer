<?php

namespace App\Listeners;

use App\Models\ProductModel;
use Event;
use App\Events\NewProduct;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailAfterNewProduct
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
     * @param  \App\Events\NewProduct  $event
     * @return void
     */
    public function handle(NewProduct $event)
    {
        //
        echo "123";
    }
    public function failed(NewProduct $event, $exception)
    {
        //
        echo "345";
    }
}
