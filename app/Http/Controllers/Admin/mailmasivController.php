<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Svlog;
use App\User;

class mailmasivController extends Controller
{
	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$this->genLog("Ingresó en envio de correos masivos");
				$data = '';
				return view('admin.correos.index', compact('data'));
			}else{
				\Auth::logout();
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}

	public function envionotificacion(Request $request)
	{
		$to = $request['to'];
		$user = new User;
		if($to=='3'){
			$the_users = User::where('status','1')
			->where('is_admin','0')
			->get();
			/*$the_users =   \DB::select("select users.email,users.name  from users join clients on clients.users_id=users.id and users.status='1' and users.is_admin='0' ");	*/
			$this->genLog("Envió un mensaje masivo a todos los clientes.");
			$this->envio($the_users,$request);
		}else{
			if($to=='1'){
				$the_users = User::where('users.status','1')
				->where('users.is_admin','0')
				->where('clients.genero','1')
				->join('clients', 'users.id', '=', 'clients.users_id')
				->get();
				$this->genLog("Envió un mensaje masivo a clientes solo de genero ".$to);
				$this->envio($the_users,$request);
			}
			if($to=='2'){
				$the_users = User::where('users.status','1')
				->where('users.is_admin','0')
				->where('clients.genero','2')
				->join('clients', 'users.id', '=', 'clients.users_id')
				->get();
				$this->genLog("Envió un mensaje masivo a clientes solo de genero ".$to);
				$this->envio($the_users,$request);
			}
			
			//dd($the_users);
			/*$the_users =   \DB::select("select users.email,users.name  from users join clients on clients.users_id=users.id and users.status='1' and users.is_admin='0' and clients.genero='".$to."' ");	*/
			
		}
		if ($to=='1') {			$gen = " a todos los usuarios genero masculino.";		}
		if ($to=='2') {			$gen = " a todos los usuarios genero femenino.";		}
		if ($to=='3') {			$gen = " a todos los usuarios.";		}
		
		$message ='Mensaje enviado'.$gen;
		\Session::flash('flash_message', $message); 
		return view('admin.correos.index', compact('data'))->with('message', $message);
	}

	public function envio($the_users,$request)
	{	
		foreach ($the_users as $user) {
			$destinomail = $user['email'];
			$name = $user['name'];
			$asunto = $request['asunto'];
			$mensaje = $request['editor1'];
			$data['destinomail'] = $destinomail;
			$data['asunto'] = $asunto;
			$data['mensaje'] = $mensaje;
			$data['name'] = $name;

			\Mail::send("admin.correos.mail", ['data' => $data], function($message) use($data) {
				$message->to($data['destinomail']);
				/*->subject($data['mensaje']);*/
			});
			$this->genLog("Mensaje enviado a ".$destinomail);
		}
	}

	public function genLog($mensaje)
	{
		$area = 'Administracion';
		//$logs = Svlog::log($mensaje,$area);
	}
}
