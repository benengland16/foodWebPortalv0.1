<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\companies;

class CompanyController extends Controller
{
    
	public function index(){

		$queryString="SELECT * FROM companies WHERE deleted_at is null";
		$data=DB::Select($queryString);

		return view('company.superAdmin.company_index')->with('data',$data);

	}


	public function create(){

		return view('company.superAdmin.company_create');

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
