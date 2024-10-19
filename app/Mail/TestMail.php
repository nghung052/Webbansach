<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $image_products;
    public $name_products;
    public $quantity_products;
    public $price;
    public $id_account;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($image_products, $name_products, $quantity_products, $price, $id_account)
    {
        $this->image_products = $image_products;
        $this->name_products = $name_products;
        $this->quantity_products = $quantity_products;
        $this->price = $price;
        $this->id_account = $id_account;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('bookstore.com')->view('emails.TestMail');
    }
}
