<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/

    public function index(){

        //dd(Auth::attempt());
        //dd(session('role_name'));

        /////////remember to adjust the remember me token and to re add the checkbox in the view

        if(Auth::check() == true){

            return redirect(route(session()->get('route_name').".dashboard.index"));

        }else{

            return view('auth/login');

        }

    }

    public function authenticated(Request $request,$user){

        try{

            $userId=$user->id;
            $query1="SELECT * FROM roles WHERE id = (SELECT role_id FROM users WHERE id = $userId)";
            $role=DB::SELECT($query1);
            
            session()->put('user_id', $user->id);
            session()->put('user_name', $user->name);
            session()->put('company_id', $user->company_id);
            session()->put('role_id', $user->role_id);
            session()->put('role_name', $role[0]->role_name);
            session()->put('route_name', $role[0]->route_name);
            
            $routesFilePath=base_path()."/resources/views/routeNames/".$role[0]->route_name."/routes.blade.php";
            session()->put('routes_file_path', $routesFilePath);

            $this->redirectTo=route(session()->get('route_name').".dashboard.index"); /// user.dashboard.index

            //dd(Auth::attempt(['email' => $email, 'password' => $password], $remember));

        }catch(QueryException $ex){

            dd($ex);
            return view('auth/login');

        }

    }

    public function logout(){

        Auth::logout();
        Session::flush();
        return redirect('/');

    }

}
