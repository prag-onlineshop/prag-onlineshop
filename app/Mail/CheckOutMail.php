<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckOutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $products;
    public $total;
    public $discount;
    public $newTotal;


    public function __construct($name, $products, $total, $discount, $newTotal)
    {
        $this->name = $name;
        $this->products = $products;
        $this->total = $total;
        $this->newTotal = $newTotal;
        $this->discount = $discount;
    }

    public function build()
    {
        return $this->markdown('emails.checkout.checkoutMail');
    }
}
