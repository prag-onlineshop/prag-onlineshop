<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\User;

class CheckOutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $products;

    public function __construct($name, Collection $products)
    {
        // $this->data = $data;
        $this->name = $name;
        $this->products = $products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.checkout.checkoutMail');
    }
}
