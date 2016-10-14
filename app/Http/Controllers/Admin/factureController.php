<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresaa;
use App\sales;
use App\User;
use App\pedido;
use App\client;
use App\ItemPedido;
use Carbon\Carbon;

class factureController extends Controller
{
	public function index()
	{
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$the_sales = new sales;
				$sales = $the_sales->select()
				->where('gen_xml','!=','0')
				->where('fir_xml','!=','0')
				->where('aut_xml','!=','0')
				->where('convrt_ride','!=','0')
				->where('send_xml','!=','0')
				->where('send_pdf','!=','0')
				->orderBy('id','asc')
				->get();
				return view('admin.facturas.index',compact('sales'));
			}else{
				\Auth::logout();
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}

	public function show($claveacceso){
		$rutai = public_path();
		$ruta = str_replace("\\", "//", $rutai);
		$rutasl = str_replace("\\", "\\", $rutai);
		$dt_empress = Empresaa::select()->get();
		$claveAcceso = $claveacceso;
		$the_sales = new sales;
		$the_user = new User;
		$the_pedido = new pedido;
		$the_cliente = new client;
		$the_item = new ItemPedido;
		$date = Carbon::now();
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$date = $date->format('d/m/Y');
		$sales = $the_sales->select()->where('claveacceso', '=', $claveAcceso)->first();
		$aux_sales = \DB::table('sales')->where('claveacceso', '=', $claveAcceso)->get();
		$orders = $the_pedido->select()->where('id',$sales->pedido_id)->first();
		$pedidos = \DB::table('pedido')->where('id', '=', $sales->pedido_id)->get();
		$users = $the_user->select()->where('id', '=', $orders->users_id)->first();
		$clientes = $the_cliente->select()->where('id', '=', $users->id)->first();
		$aux_clientes = \DB::table('clients')->where('id', '=', $users->id)->get();
		$items = ItemPedido::where('pedido_id', '=', $orders->id)->orderBy('id', 'asc')->get();
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('pdf/vista',['dt_empress'=>$dt_empress,'aux_sales'=>$aux_sales,'aux_clientes'=>$aux_clientes,'date'=>$date,'items'=>$items,'pedidos'=>$pedidos]);

		return $pdf->stream();

	}

	public function search()
	{
		return view('admin.facturas.search');
	}

	public function buscar(Request $request)
	{
		$the_sales = new sales;

		$numfactura = trim($request->get('numfactura'));
		$claveacceso = trim($request->get('claveacceso'));
		$num_autoriz = trim($request->get('num_autoriz'));
		if ($numfactura=="") {
			$numfactura = "0";
		}else{
			$sales = \DB::table('sales')->where('numfactura','LIKE','%'.$numfactura.'%')
			->orderBy('id','asc')
			->get();
			return view('admin.facturas.detall',compact('sales'));
		}
		if ($claveacceso=="") {
			$claveacceso = "0";
		}else{
			$sales = \DB::table('sales')->where('claveacceso','LIKE','%'.$claveacceso.'%')
			->orderBy('id','asc')
			->get();
			return view('admin.facturas.detall',compact('sales'));
		}
		if ($num_autoriz=="") {
			$num_autoriz = "0";
		}else{
			$sales = \DB::table('sales')->where('num_autoriz','LIKE','%'.$num_autoriz.'%')
			->orderBy('id','asc')
			->get();
			return view('admin.facturas.detall',compact('sales'));
		}

	}


}
