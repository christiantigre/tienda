<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\Empresaa;
use App\Svlog;

class RutasController extends Controller
{
	public function show($id){
		$rutas = Pedido::select()->where('id','=',$id)->first();
		$empresa = Empresaa::select()->get();
				$this->genLog("Ingresó a gestión de rutas");
				return view('admin.routes.show',compact('rutas','empresa'));
	}

	public function update(){

	}


	public function genLog($mensaje)
	{
		$area = 'Administracion';
		//$logs = Svlog::log($mensaje,$area);
	}

	
}
