<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
use Carbon\Carbon;

class UserController extends Controller
{
    use RegistersUsers;


    public function index(){

    	$queryString="	SELECT users.id as userId,
    					users.name as userName,
    					users.email as userEmail,
    					companies.id as companyId,
    					companies.name as companyName,
    					roles.role_name as roleName
    					FROM users, roles, companies 
    					WHERE companies.id = users.company_id
    					and users.role_id = roles.id
    					and users.deleted_at is null
    					";

    	$data=DB::Select($queryString);

    	return view('user.superAdmin.user_index')->with('data',$data);

    }


    public function create(){

    	return view('user.superAdmin.user_create');

    }


    public function store(Request $request){

    	//        At a later point, add options to choose new users company affiliation and permission level plus the ability to  delete individual users

    	$validatorResult=Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
 




        if ( $validatorResult -> fails() ) {

          

            return redirect()->back()->withInput()->withErrors($validatorResult);


        }

        else {

            users::create([

	            'name' => $request->name,
	            'email' => $request->email,
	            'password' => Hash::make($request->password),

        	]);  

        	return redirect()->route('superAdmin.user.index');

        }

    }


    public function edit($id){



    }


    public function update(Request $request,$id){



    }


    public function delete($id){

        //dd($id);
        $user = Users::find($id);
        $user->delete();
        return redirect()->route('superAdmin.user.index');

    }

}
