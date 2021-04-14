<?php

namespace App\Mail;

use PDF;
use Dompdf\Dompdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPDF extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;

    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //dd('here');
        //return $this->view('emailTemplates.orderPDF')->subject("Order")->with(['viewDataArray' => $this->data]);
        
        return $this->view('emailTemplates.orderPDF')->attachData($pdf->output(), session('user_name')." Order.pdf");

    }
}
