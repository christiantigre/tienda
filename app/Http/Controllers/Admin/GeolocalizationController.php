<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Cache;
use App\Svlog;
use App\Empresaa;

class GeolocalizationController extends Controller
{

	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$this->genLog("Ingresó en gestión de geolocalization.");
				$empresa = Empresaa::first(); 
				return view("admin/entiti/edit_geo", compact('empresa') );    	
			}else{
				\Auth::logout();
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}


	public function update(Request $request, $id){
		
		$empresa = Empresaa::findOrFail($id);    
		$empresa['key_google']=$request->key_google;
    	$updated = $empresa->save();

		$message = $updated ? 'Geolocalización actualizada correctamente': 'La geolocalización no se pudo actualizar';
		\Session::flash('flash_message', $message);
		return redirect()->route('admin.geo.index')->with('message', $message);
	}

	public function genLog($mensaje)
	{
		$area = 'Administracion';
    //$logs = Svlog::log($mensaje,$area);
	}
}
