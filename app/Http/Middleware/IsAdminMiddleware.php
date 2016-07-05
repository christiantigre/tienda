<?php

namespace App\Http\Middleware;

use Closure;
use App\product;

class IsAdminMiddleware
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

        if(\Auth::user()->is_admin){
           /* return $next($request); */
            if(\Auth::user()->status){
                return $next($request);
            }else{
                \Auth::logout();
               return abort(404);
                /*return "admin in-activo";*/
            }
        }else{
            if(\Auth::user()->status){
            $products = product::orderBy('id', 'desc')->where('catalogo','1')->paginate(6);
            return view('store.product.index', compact('products'));
            /*return view('home');abort(404);*/
            }else{
                \Auth::logout();
                return view('store.partials.inactive');
                /*return "user in-activo";*/
        
            }

        }

        
    }
}




