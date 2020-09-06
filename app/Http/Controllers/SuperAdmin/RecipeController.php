<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\recipes;

class RecipeController extends Controller
{
    
	public function index(){

		//         consider creating an ingredients table to better track usage stats

		$queryString="SELECT * FROM recipes WHERE deleted_at is null";

		$data=DB::Select($queryString);

		return view('recipe.superAdmin.recipe_index')->with('data',$data);

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
