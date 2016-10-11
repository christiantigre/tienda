<?php

namespace App\Http\Middleware;

use Closure;

class isdespMiddleware
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
        if(\Auth::user()->cargo_id=='3')
        {
            //if(\Auth::user()->cargo_id==3)
            //{
                return $next($request);
            //}else{
            //    return view('/');
            //}
        }else{
            return redirect()->to('person');
        }
    }
}
