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

		$queryString="SELECT recipes.id, recipes.name, recipes.description, recipes.main_ingredient, recipes.minor_ingredient, recipes.price, recipes.is_special, recipes.status FROM recipes, company_recipes WHERE recipes.id = company_recipes.recipe_id and company_recipes.company_id = $companyId and company_recipes.deleted_at is NULL";

		$data=DB::Select($queryString);

		//dd($data);

		return view('recipe.user.recipe_index')->with('data',$data);

	}

	public function select(Request $request){

		//dd($request->input('recipes'));

		$cart=$request->input('recipes');

		foreach($cart as $item){

			dd($item);
			//echo $item."\n";

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
