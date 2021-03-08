<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\recipes;

class RecipeController extends Controller
{
    
	public function index(){

		//         consider creating an ingredients table to better track usage stats


		$companyId=session('company_id');
		//dd(session());

		$queryString="SELECT recipes.id, recipes.name, recipes.description, company_recipes.unit_price, company_recipes.units_per_ctn, recipes.is_special, recipes.status FROM recipes, company_recipes WHERE recipes.id = company_recipes.recipe_id and company_recipes.company_id = $companyId and company_recipes.deleted_at is NULL";

		$data=DB::Select($queryString);

		//dd($data);

		return view('recipe.user.recipe_index')->with('data',$data);

	}

	public function select(Request $request){

		//dd($request->input('recipes'));

		$cart=$request->input('recipes');

		//dd($cart);

		if(is_null($cart)){

			return redirect()->back();

		}else{

			$companyId=session('company_id');
			$checkout = array();

			//dd($checkout);

			foreach($cart as $item){

				//dd($item);
				//echo $item."\n";

				$queryString="SELECT recipes.id, recipes.name, recipes.description, company_recipes.unit_price, company_recipes.units_per_ctn, recipes.is_special, recipes.status FROM recipes, company_recipes WHERE recipes.id = $item and company_recipes.recipe_id = $item and company_recipes.company_id = $companyId and company_recipes.deleted_at is NULL";

				$data=DB::Select($queryString);

				array_push($checkout, $data[0]);

			}

			//dd($checkout);

			//dd(session());

			session()->put('cart', $checkout);

			//dd(session('cart'));

			return view('checkout.user.checkout_index')->with('data',$checkout);

		}


	}

	public function create(){



	}

	public function store(Request $request){



	}

	public function edit($id){



	}

	public function update(Request $request,$id){



	}

	public function delete($id){



	}

}
