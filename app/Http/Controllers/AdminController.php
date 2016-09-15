<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Cache;

class AdminController extends Controller
{
    public function index(Request $request){
    	if(\Auth::user()->is_admin){
    		$name = \Auth::user()->name;
    			$key = Cache::get('key');
    			Cache::forever('key','0');
	    		Cache::flush(); 
	    		return view('admin/home',compact('name')); 
	    	}else{	    		
	    		\Auth::logout();
	    		return abort(404);
	    	}  		
    	
    }
}
