<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\recipes;
use PDF;

class CheckoutController extends Controller
{
    
	public function checkout(Request $request){
	
		//dd(session('cart'));
		$cart=session('cart');

		$html='';

		$newAttachment=view('emailTemplates.orderPDF')->with('cart',$cart);  
        $html .= $newAttachment->render();

        $attachments['html']=$html;

        //dd($attachments['html']);
		//dd($cart);

		//$pdf = PDF::loadView('emailTemplates.orderPDF', $cart);
		
		Mail::send('emailTemplates.orderTemplate', $cart , function($message)use($cart,$attachments) {

            $message->to("benengland09@gmail.com");
            $message->from("benengland09@live.com");
            $message->subject("Monthly Billing Report for ".date('F\,\\ Y'));

           
            //$pdf=PDF::loadHTML($attachments['html']);
            $pdf=PDF::loadHTML($attachments['html']);
            $message->attachData($pdf->output(), session('user_name')." Order.pdf");

            

        });



	}


	public function delete($id){



	}

}
