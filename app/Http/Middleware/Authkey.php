<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authkey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
         $token = $request->header("datakey");
       
        if($token!='ABCD454545545'){
        
            return response()->json(['message'=>'you not authonticated user'],401);
        }
        else{
            return $next($request);
        }

        
    }
}
