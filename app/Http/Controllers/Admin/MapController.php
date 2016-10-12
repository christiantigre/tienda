<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pedido;
use Carbon\Carbon;

class MapController extends Controller
{
	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$date = Carbon::now();
				$date->timezone = new \DateTimeZone('America/Guayaquil');
				$date = $date->format('d/m/Y');
				$locations = \DB::table('pedido')->select(\DB::raw('entrega,ubiclt as lat ,ubiclg as lng'))->where('date','=',$date)->where('ubiclg','!=','0')->where('ubiclt','!=','0')->get();

				return view('admin.mapa.index',compact('locations'));
			}else{
				\Auth::logout();
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}




}
