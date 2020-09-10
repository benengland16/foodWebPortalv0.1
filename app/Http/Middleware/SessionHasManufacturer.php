<?php

namespace App\Http\Middleware;

use Closure;

class SessionHasManufacturer
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
        
      
        if(session()->get('role_name')==='Manufacturer') {
            
            return $next($request);

        }
   
        else if(empty(session()->get('role_name'))){

          return redirect('http://127.0.0.1/logout');

        }else {

          return redirect('http://127.0.0.1/logout');

        }
        


        
    }




}
