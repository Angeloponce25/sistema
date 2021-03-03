<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComprobanteMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Comprobante de Pago";

    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        //
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        $msg = $this->msg;
        return $this->view('emails.comprobante')
                    ->attach('recibo'.$msg['id_pago'].'.pdf');
    }
}
