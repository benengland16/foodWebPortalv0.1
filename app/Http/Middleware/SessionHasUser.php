<?php

namespace App\Http\Middleware;

use Closure;

class SessionHasUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
      
        if(session()->get('role_name')==='User') {
            
            return $next($request);

        }
   
        else if(empty(session()->get('role_name'))){

           return redirect('http://test.ontoto.com.au/User/role-'.session()->get('role_name')."_role");

        }

        else {

            return redirect('http://127.0.0.1:8000/logout');

        }
        


        
    }




}
