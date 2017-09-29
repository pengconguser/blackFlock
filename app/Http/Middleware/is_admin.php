<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class is_admin
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
        $boll=Auth::check();
        if($boll){
             $some=Auth::user()->is_admin;
             if($some==0){
                    abort(403);
             }
        }else{
            abort(403);
        }
        return $next($request);
    }
}
