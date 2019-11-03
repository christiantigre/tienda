<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Svlog;
use App\Empresaa;
use Carbon\Carbon;
use App\client;
use App\Pedido;

class reportController extends Controller
{
	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$this->genLog("Ingresó a reportes de ventas");
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
		$filtro = "desde";
		$sinze = $request['datesinze'];
		$to = $request['dateto'];
		$dt_empress = Empresaa::select()->get();
		$sales = \DB::select("SELECT pedido.id,sales.id,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,sales.numfactura,pedido.subtotal,pedido.iva,pedido.total,pedido.entrega,pedido.date FROM `sales` join pedido on sales.pedido_id = pedido.id join clients on pedido.users_id = clients.users_id and pedido.created_at BETWEEN '".$sinze."' and '".$to."' ");
		$sumas = \DB::select("SELECT sum(pedido.subtotal) as subtotal,sum(pedido.iva) as iva,sum(pedido.total) as total FROM `sales` join pedido on sales.pedido_id = pedido.id join clients on pedido.users_id = clients.users_id and pedido.created_at BETWEEN '".$sinze."' and '".$to."' ");

		$this->genLog("Generó reporte de ventas ".$filtro." ".$sinze." hasta ".$to);
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportventa',['sales'=>$sales,'sumas'=>$sumas,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'sinze'=>$request['datesinze'],'to'=>$request['dateto']]);
		return $pdf->stream();
		//dd($sales);
		//$fecha='07-01-2008';
//$nuevaFecha=implode('-',array_reverse(explode('-',$fecha)));
//esto devolverá 2008-01-07
	}



	public function before(Request $request)
	{
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$sinze = $request['datesinze'];
		$to = $request['dateto'];
		$dt_empress = Empresaa::select()->get();
		$mesbefore = $request['beforeselect'];
		$filtro = 'Antes ';
		$mes = $this->mes($mesbefore);
		//$mesbefore = $mesbefore->format('m');
		//dd($mesbefore);
		//date('n') mes sin cero
		$the_pedido = new pedido;
		$sales = $the_pedido->select('pedido.id','sales.id','clients.name','clients.apellidos','clients.telefono','clients.celular','clients.email','sales.numfactura','pedido.subtotal','pedido.iva','pedido.total','pedido.entrega','pedido.date')
		->whereMonth('pedido.created_at', '<', $mesbefore)
		->join('sales','pedido.id','=','sales.pedido_id')
		->join('clients','pedido.users_id','=','clients.users_id')
		->get();
		$this->genLog("Generó reporte de ventas ".$filtro." / ".$mes);
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportFiltr',['sales'=>$sales,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro,'month'=>$mes]);
		return $pdf->stream();
	}


	public function during(Request $request)
	{
		$duringselect = $request['duringselect'];
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$sinze = $request['datesinze'];
		$to = $request['dateto'];
		$dt_empress = Empresaa::select()->get();
		$mesbefore = $request['beforeselect'];
		$filtro = "Durante";
		$mes = $this->mes($duringselect);
		//$mesbefore = $mesbefore->format('m');
		//dd($mesbefore);
		//date('n') mes sin cero
		$the_pedido = new pedido;
		$sales = $the_pedido->select('pedido.id','sales.id','clients.name','clients.apellidos','clients.telefono','clients.celular','clients.email','sales.numfactura','pedido.subtotal','pedido.iva','pedido.total','pedido.entrega','pedido.date')
		->whereMonth('pedido.created_at', '=', $duringselect)
		->join('sales','pedido.id','=','sales.pedido_id')
		->join('clients','pedido.users_id','=','clients.users_id')
		->get();
		$this->genLog("Generó reporte de ventas ".$filtro." / ".$mes);
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportFiltr',['sales'=>$sales,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro,'month'=>$mes]);
		return $pdf->stream();
		dd($sales);
		dd($request['duringselect']);
	}


	public function after(Request $request)
	{
		$afterselect = $request['afterselect'];
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$sinze = $request['datesinze'];
		$to = $request['dateto'];
		$dt_empress = Empresaa::select()->get();
		$mesbefore = $request['beforeselect'];
		$filtro = "Despues";
		$mes = $this->mes($afterselect);
		//$mesbefore = $mesbefore->format('m');
		//dd($mesbefore);
		//date('n') mes sin cero
		$the_pedido = new pedido;
		$sales = $the_pedido->select('pedido.id','sales.id','clients.name','clients.apellidos','clients.telefono','clients.celular','clients.email','sales.numfactura','pedido.subtotal','pedido.iva','pedido.total','pedido.entrega','pedido.date')
		->whereMonth('pedido.created_at', '>', $afterselect)
		->join('sales','pedido.id','=','sales.pedido_id')
		->join('clients','pedido.users_id','=','clients.users_id')
		->get();
		$this->genLog("Generó reporte de ventas ".$filtro." / ".$mes);
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportFiltr',['sales'=>$sales,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro,'month'=>$mes]);
		return $pdf->stream();
		dd($sales);
		dd($request['afterselect']);
	}

	protected function mes($mes)
	{
		if ($mes == "01")
			$mes = "Enero";
		if ($mes == "02")
			$mes = "Febrero";
		if ($mes == "03")
			$mes = "Marzo";
		if ($mes == "04")
			$mes = "Abril";
		if ($mes == "05")
			$mes = "Mayo";
		if ($mes == "06")
			$mes = "Junio";
		if ($mes == "07")
			$mes = "Julio";
		if ($mes == "08")
			$mes = "Agosto";
		if ($mes == "09")
			$mes = "Septiembre";
		if ($mes == "10")
			$mes = "Octubre";
		if ($mes == "11")
			$mes = "Noviembre";
		if ($mes == "12")
			$mes = "Diciembre";
		return $mes;
	}

	public function ventasporclientes()
	{
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$year = Carbon::now()->format('Y');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$dt_empress = Empresaa::select()->get();
		$filtro = "Cantidad de ventas a los clientes hasta la fecha actual";
		$the_pedido = new pedido;
		$sales = pedido::groupBy('clients.id')->select('clients.id',\DB::raw('COUNT(pedido.users_id) as cantidad,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,SUM(pedido.subtotal)as subtotal,SUM(pedido.iva) as iva,sum(pedido.total) as total'))
		->whereYear('pedido.created_at','=',$year)
		->join('sales','pedido.id','=','sales.pedido_id')
		->join('clients','pedido.users_id','=','clients.users_id')
		->get();
		/*
		$salesclients = \DB::select("SELECT COUNT(pedido.users_id) as cantidad,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,SUM(pedido.subtotal)as subtotal,SUM(pedido.iva) as iva,sum(pedido.total) as total FROM `sales` join pedido on sales.pedido_id = pedido.id join clients on pedido.users_id = clients.users_id and pedido.created_at GROUP by clients.id");
		*/
		$this->genLog("Generó reporte cantidad de ventas a clientes ");
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportsalescli',['sales'=>$sales,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($salesclients);
		return "ventas por clientes";
	}

	public function contvmes()
	{
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$mes = Carbon::now()->format('m');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$dt_empress = Empresaa::select()->get();
		$mesletras = $this->mes($mes);
		$filtro = "Cantidad de ventas por el mes de ".$mesletras;
		$the_pedido = new pedido;
		$sales = pedido::groupBy('clients.id')->select('clients.id',\DB::raw('COUNT(pedido.users_id) as cantidad,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,SUM(pedido.subtotal)as subtotal,SUM(pedido.iva) as iva,sum(pedido.total) as total'))
		->whereMonth('pedido.created_at','=',$mes)
		->join('sales','pedido.id','=','sales.pedido_id')
		->join('clients','pedido.users_id','=','clients.users_id')
		->get();
		$this->genLog("Generó reporte cantidad de ventas del mes actual ".$mes);
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportsalescli',['sales'=>$sales,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($sales);
	}

	
	public function contvvalsuprr(Request $request)
	{
		$valor = $request['number'];
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$mes = Carbon::now()->format('m');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$dt_empress = Empresaa::select()->get();
		$mesletras = $this->mes($mes);
		$filtro = "Cantidad de ventas por el mes de ".$mesletras." superiores a $".$valor;
		$the_pedido = new pedido;
		$sales = pedido::select('clients.id',\DB::raw('pedido.id as cantidad,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,sales.numfactura as factura,pedido.subtotal as subtotal,pedido.iva as iva,pedido.total as total'))
		->whereMonth('pedido.created_at','=',$mes)
		->where('pedido.total','>',$valor)
		->join('sales','pedido.id','=','sales.pedido_id')
		->join('clients','pedido.users_id','=','clients.users_id')
		->get();

		$this->genLog("Generó reporte cantidad de ventas del mes actual ".$mesletras." superiores a ".$valor);
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportventsup',['sales'=>$sales,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($sales);
	}

	
	public function contvvalinf(Request $request)
	{
		$valor = $request['number'];
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$mes = Carbon::now()->format('m');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$dt_empress = Empresaa::select()->get();
		$mesletras = $this->mes($mes);
		$filtro = "Cantidad de ventas por el mes de ".$mesletras." inferiores a $".$valor;
		$the_pedido = new pedido;
		$sales = pedido::select('clients.id',\DB::raw('pedido.id as cantidad,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,sales.numfactura as factura,pedido.subtotal as subtotal,pedido.iva as iva,pedido.total as total'))
		->whereMonth('pedido.created_at','=',$mes)
		->where('pedido.total','<',$valor)
		->join('sales','pedido.id','=','sales.pedido_id')
		->join('clients','pedido.users_id','=','clients.users_id')
		->get();
		$this->genLog("Generó reporte cantidad de ventas del mes actual ".$mesletras." inferiores a ".$valor);
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportventsup',['sales'=>$sales,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($sales);
	}


	public function contvvalrangos(Request $request)
	{
		$sinze = $request['datesinze'];
		$to = $request['dateto'];
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$mes = Carbon::now()->format('m');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$dt_empress = Empresaa::select()->get();
		$mesletras = $this->mes($mes);
		$filtro = "Cantidad de ventas entre las fechas ".$sinze."/".$to;
		$the_pedido = new pedido;
		$sales = pedido::groupBy('clients.id')->select('clients.id',\DB::raw('COUNT(pedido.users_id) as cantidad,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,SUM(pedido.subtotal)as subtotal,SUM(pedido.iva) as iva,sum(pedido.total) as total'))
		->whereBetween('pedido.created_at',[$sinze,$to])
		->join('sales','pedido.id','=','sales.pedido_id')
		->join('clients','pedido.users_id','=','clients.users_id')
		->get();
		/*dd($sales);

		$sales = pedido::select('clients.id',\DB::raw('pedido.id as cantidad,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,sales.numfactura as factura,pedido.subtotal as subtotal,pedido.iva as iva,pedido.total as total'))
		->whereMonth('pedido.created_at','=',$mes)
		->where('pedido.total','<',$valor)
		->join('sales','pedido.id','=','sales.pedido_id')
		->join('clients','pedido.users_id','=','clients.users_id')
		->get();*/
		$this->genLog("Generó reporte entre rangos de fechas ".$sinze." / ".$to);
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.ventas.reportsalescli',['sales'=>$sales,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
	}

	public function repproductos()
	{
		return "datos";
	}



	public function genLog($mensaje)
	{
		$area = 'Administracion';
		//$logs = Svlog::log($mensaje,$area);
	}




}
