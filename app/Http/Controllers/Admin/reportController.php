<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Svlog;
use App\Empresaa;
use Carbon\Carbon;
use App\client;

class reportController extends Controller
{
	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$this->genLog("Ingresó a reportes");
				return view('admin.reportes.ventas.index', compact('reports'));
			}else{
				\Auth::logout();
				$this->genLog("No autorizado en reportes");            
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}


	public function rango(Request $request)
	{
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$dt_empress = Empresaa::select()->get();
		$sales = \DB::select("SELECT pedido.id,sales.id,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,sales.numfactura,pedido.subtotal,pedido.iva,pedido.total,pedido.entrega,pedido.date FROM `sales` join pedido on sales.pedido_id = pedido.id join clients on pedido.users_id = clients.users_id and pedido.date BETWEEN '".$request['datesinze']."' and '".$request['dateto']."' ");
		$sumas = \DB::select("SELECT sum(pedido.subtotal) as subtotal,sum(pedido.iva) as iva,sum(pedido.total) as total FROM `sales` join pedido on sales.pedido_id = pedido.id join clients on pedido.users_id = clients.users_id and pedido.date BETWEEN ".$request['datesinze']." and ".$request['dateto']." ");

		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportventa',['sales'=>$sales,'sumas'=>$sumas,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'sinze'=>$request['datesinze'],'to'=>$request['dateto']]);
		return $pdf->stream();
		//dd($sales);
		//$fecha='07-01-2008';
//$nuevaFecha=implode('-',array_reverse(explode('-',$fecha)));
//esto devolverá 2008-01-07
	}



	public function genLog($mensaje)
	{
		$area = 'Administracion';
		$logs = Svlog::log($mensaje,$area);
	}




}
