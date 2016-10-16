<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pedido;
use Carbon\Carbon;
use App\Svlog;

class MapController extends Controller
{
	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$date = Carbon::now();
				$date->timezone = new \DateTimeZone('America/Guayaquil');
				$date = $date->format('d/m/Y');
				$locations = \DB::table('pedido')
				->join('status','pedido.status_id','=','status.id')
				->select(\DB::raw('pedido.id as pedido,pedido.entrega, pedido.ubiclt as lat ,pedido.ubiclg as lng,status.statu as estado'))->where('pedido.date','=',$date)->where('pedido.ubiclg','!=','0')->where('pedido.ubiclt','!=','0')->get();
				$contadorpedidos =count($locations);
				$this->genLog("Ingresó a visualizar los puntos de entregas del dia ".$date);
				return view('admin.mapa.today',compact('locations','contadorpedidos'));
			}else{
				\Auth::logout();
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}

	public function showRoute()
	{
		$date = Carbon::now();
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$date = $date->format('d/m/Y');
		$the_pedido = new Pedido;
		$pedidos = $the_pedido->select()->where('date', '=', $date)
		->where('status_id','!=','1')
		->where('status_id','!=','3')
		->where('status_id','!=','7')
		->orderBy('id','asc')
		->get();
		$this->genLog("Ingresó a realizar entregas");
		return view('admin.despacho.index',compact('pedidos'));
	}


	public function genLog($mensaje)
	{
		$area = 'Administracion';
		$logs = Svlog::log($mensaje,$area);
	}


}
