<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\RecipeController;
use App\Mail\OrderForm;
use Carbon\Carbon;
use App\Models\recipes;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use PDF;

class CheckoutController extends Controller
{
    
	public function __construct()
    {
         //$this->middleware('auth');
         $this->dashboard = new DashboardController;  

        
    }

	public function checkout(Request $request){
	
        $quant=$request->quantity;

        $q1=array_reverse($quant);

        foreach($q1 as $check){

            if(is_null($check) or $check < 0){

                return redirect()->route('user.recipe.get');

            }

        }

		$cart=session('cart');

        foreach($cart as $item){

            $newQuant=array_pop($q1);

            $item->quantity=$newQuant;

            //dd($item);

            //dd($item->units_per_ctn * $item->unit_price);

        }

        //dd($cart);

		$html='';

		//$attachments['html']=null;

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
		//return $this->dashboard->index();

        return redirect()->route('user.dashboard.index');


	}


	public function delete($id){



	}

}
