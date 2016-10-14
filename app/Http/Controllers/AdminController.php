<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Cache;
use App\Svlog;

class AdminController extends Controller
{
    public function index(Request $request){
    	if(\Auth::user()->is_admin){
    		$name = \Auth::user()->name;
           $key = Cache::get('key');
           Cache::forever('key','0');
           Cache::flush(); 
           $this->genLog("Ingresó a panel principal");
           return view('admin/home',compact('name')); 
       }else{	    		
           \Auth::logout();
           $this->genLog("Error al ingresar al panel principal");
           return abort(404);
       }  		    	
   }

   public function genLog($mensaje)
   {
    $area = 'Administracion';
    $logs = Svlog::log($mensaje,$area);
}
}
