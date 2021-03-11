<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\User\DashboardController;
use App\Mail\OrderForm;
use Carbon\Carbon;
use App\Models\recipes;
use PDF;

class CheckoutController extends Controller
{
    
	public function __construct()
    {
         //$this->middleware('auth');
         $this->dashboard = new DashboardController;  
        
    }

	public function checkout(Request $request){
	
		//dd(session('cart'));
		$cart=session('cart');

		$html='';

		$attachments['html']=null;

		$newAttachment=view('emailTemplates.orderPDF')->with('cart',$cart);  
        $html .= $newAttachment->render();

        $attachments['html']=$html;

        //dd($attachments['html']);
		//dd($cart);

		//$pdf = PDF::loadView('emailTemplates.orderPDF', $cart);
		
		Mail::send('emailTemplates.orderTemplate', $cart , function($message)use($cart,$attachments) {

            $message->to("benengland09@gmail.com");
            $message->from("benengland09@gmail.com");
            //$message->subject("Order for ".date('F\,\\ Y'));
            $message->subject(session('user_name')." Order");

           
            //$pdf=PDF::loadHTML($attachments['html']);
            $pdf=PDF::loadHTML($attachments['html']);
            $message->attachData($pdf->output(), session('company_id')." Order.pdf");

            

        });

        //Mail::send('emailTemplates.orderTemplate')->

        //return redirect()->back();
		return $this->dashboard->index();


	}


	public function delete($id){



	}

}
