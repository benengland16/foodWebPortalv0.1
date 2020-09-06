<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\recipes;
use App\Models\company_recipes;
use App\Models\companies;

class CompanyRecipeController extends Controller
{
    
	public function index($id){

		$queryString="SELECT company_recipes.id as companyRecipeId, companies.name as companyName, company_recipes.created_at, company_recipes.updated_at, company_recipes.status FROM company_recipes, companies WHERE $id = company_recipes.recipe_id and companies.id = company_recipes.company_id and company_recipes.deleted_at is null";
		$data=DB::Select($queryString);
		//dd($data);

		return view('company_recipe.superAdmin.companyRecipe_index')->with('data',$data);

	}

	public function create(){



	}

	public function store(Request $request){



	}

	public function edit($id){



	}

	public function update(Request $request,$id){



	}

	public function destroy($id){

		dd($id);
		$companyRecipe = Company_Recipe::find($id);
        $companyRecipe->delete();
        return redirect()->route('superAdmin.companyRecipe.index');

	}

}
