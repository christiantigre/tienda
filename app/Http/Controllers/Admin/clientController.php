<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\client;
use App\User;
use App\Svlog;
use Carbon\Carbon;


class clientController extends Controller
{
	public function index()
	{
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$client = new client;
				$user = new User;

				$idus=\Auth::user()->id;

				$date = Carbon::now();
				$date->timezone = new \DateTimeZone('America/Guayaquil');

				$clients = \DB::table('users')
				->join('clients', 'users.id', '=', 'clients.users_id')
				->join('provinces','clients.provincia_idprovincia','=','provinces.id')
				->where('users.is_admin', '=', '0')
				->select('users.status','users.actividad','users.id', 'clients.name','clients.apellidos','clients.dir1','clients.dir2','clients.telefono','clients.path','clients.celular','clients.email','provinces.prov')
				->paginate(10);


				foreach ($clients as $cliente) {
					$user = User::find($cliente->id);
					$ultimaactiv = $user->actividad;
					$diff = $ultimaactiv->diffForHumans(Carbon::now());
				}


				$this->genLog("Ingresó a gestión de clientes");
				return view('admin.clients.index', compact('clients'));
			}else{
				\Auth::logout();
				$this->genLog("No autorizado a gestión clientes");            
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}



	public function genLog($mensaje)
	{
		$area = 'Administracion';
		$logs = Svlog::log($mensaje,$area);
	}


}
