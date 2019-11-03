<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Cache;
use App\Svlog;

class AdministratorController extends Controller
{

	use AuthenticatesUsers;
	protected $loginView = 'admin.login';

	protected $guard = 'admins';

	public function authenticated(){
		return redirect('admins/area');
	}

	public function secret(){
		$name = auth('admins')->user()->name;
		return view('admin/home');
	}

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
			return abort(404);
		}  		    	
	}

	public function genLog($mensaje)
	{
		$area = 'Administracion';
		//$mensaje = 'Instancia mensaje';
		//$logs = Svlog::log($mensaje,$area);
		//dd($logs);
	}


}
