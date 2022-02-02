<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(Order $order)
     {
         $this->order = $order;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order_shipped', [
          'order' => $this->order,
          'url' => route('checkout_prev', $this->order->id)
        ])
        ->from('admin@zimbodelights.com', 'ZimboDelights')
        ->subject('Order from ZimboDelights');
    }
}
