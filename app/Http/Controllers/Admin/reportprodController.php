<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Svlog;
use App\ItemPedido;
use App\Empresaa;
use Carbon\Carbon;
use App\client;

class reportprodController extends Controller
{
	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$this->genLog("Ingresó a reportes de productos");
				return view('admin.reportes.productos.index', compact('reports'));
			}else{
				\Auth::logout();
				$this->genLog("No autorizado en reportes de productos");            
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}


	public function conctprod()
	{
		$the_items = new ItemPedido;
		$dt_empress = Empresaa::select()->get();
		$items = $the_items->groupBy('products_id')->select('itempedido.products_id','itempedido.size','itempedido.preference','itempedido.number',\DB::raw('sum(cant) as cantidad'))->get();
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$year = Carbon::now()->format('Y');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$filtro = 'Contador de productos que se han vendido hasta la fecha '.$date;
		$this->genLog("Generó reporte cantidad de productos vendidos ");
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.productos.reportprodsales',['items'=>$items,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($items);
		//todo SELECT itempedido.products_id , sum(itempedido.cant) as cantidad, itempedido.size,itempedido.preference,itempedido.number FROM `itempedido` GROUP BY products_id
		// por fecha SELECT itempedido.products_id , sum(itempedido.cant) as cantidad, itempedido.size,itempedido.preference,itempedido.number,pedido.rango as fecha FROM `itempedido` join pedido on pedido.id=itempedido.pedido_id GROUP BY products_id
	}

	
	public function conctprodmes()
	{
		$the_items = new ItemPedido;
		$dt_empress = Empresaa::select()->get();

		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$year = Carbon::now()->format('Y');
		$month = Carbon::now()->format('m');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$mes = $this->mes($month);
		$filtro = 'Contador de productos que se han vendido durante el mes de '.$mes;
		$this->genLog("Generó reporte cantidad de productos vendidos durante el mes actual ".$mes);
		$items = $the_items->groupBy('products_id')->select('itempedido.products_id','itempedido.size','itempedido.preference','itempedido.number',\DB::raw('sum(cant) as cantidad'))
		->whereMonth('pedido.rango', '=', $month)
		->join('pedido','pedido.id','=','itempedido.pedido_id')
		->get();
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.productos.reportprodsales',['items'=>$items,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($items);
	}
	
	public function conctproddia()
	{
		$the_items = new ItemPedido;
		$dt_empress = Empresaa::select()->get();

		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$year = Carbon::now()->format('Y');
		$month = Carbon::now()->format('m');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$mes = $this->mes($month);
		$filtro = 'Contador de productos que se han vendido hoy '.$date;
		$this->genLog("Generó reporte cantidad de productos vendidos durante el dia ".$date);
		$items = $the_items->groupBy('products_id')->select('itempedido.products_id','itempedido.size','itempedido.preference','itempedido.number',\DB::raw('sum(cant) as cantidad'))
		->where('pedido.rango', '=', $date)
		->join('pedido','pedido.id','=','itempedido.pedido_id')
		->get();
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.productos.reportprodsales',['items'=>$items,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($items);
	}

//SELECT itempedido.products_id , sum(itempedido.cant) as cantidad, itempedido.size,itempedido.preference,itempedido.number,pedido.rango as fecha FROM `itempedido` join pedido on pedido.id=itempedido.pedido_id GROUP BY products_id HAVING cantidad > 100

	public function superiores(Request $request)
	{
		$cantidad = $request['numbers'];
		$the_items = new ItemPedido;
		$dt_empress = Empresaa::select()->get();

		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$year = Carbon::now()->format('Y');
		$month = Carbon::now()->format('m');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$mes = $this->mes($month);
		$filtro = 'Productos con cantidad de ventas superiores a '.$cantidad;
		$this->genLog("Generó reporte cantidad de productos superiores a ".$cantidad);
		$items = $the_items->groupBy('products_id')->select('itempedido.products_id','itempedido.size','itempedido.preference','itempedido.number',\DB::raw('sum(cant) as cantidad'))		
		->havingRaw('cantidad > '.$cantidad)
		->get();
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.productos.reportprodsales',['items'=>$items,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($items);
	}

	public function inferiores(Request $request)
	{
		$cantidad = $request['numberi'];
		$the_items = new ItemPedido;
		$dt_empress = Empresaa::select()->get();

		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$year = Carbon::now()->format('Y');
		$month = Carbon::now()->format('m');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$mes = $this->mes($month);
		$filtro = 'Productos con cantidad de ventas inferiores a '.$cantidad;
		$this->genLog("Generó reporte cantidad de productos inferiores a ".$cantidad);
		$items = $the_items->groupBy('products_id')->select('itempedido.products_id','itempedido.size','itempedido.preference','itempedido.number',\DB::raw('sum(cant) as cantidad'))
		->havingRaw('cantidad < '.$cantidad)
		->get();
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.productos.reportprodsales',['items'=>$items,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($items);
	}
	
	public function contprodcantrangos(Request $request)
	{
		$dateto = $request['dateto'];
		$datesinze = $request['datesinze'];

		$the_items = new ItemPedido;
		$dt_empress = Empresaa::select()->get();

		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$year = Carbon::now()->format('Y');
		$month = Carbon::now()->format('m');
		$date->timezone = new \DateTimeZone('America/Guayaquil');
		$mes = $this->mes($month);
		$filtro = 'Productos con cantidad de ventas entre '.$datesinze.' / '.$dateto;
		$this->genLog("Generó reporte cantidad de productos entre '".$datesinze."' / '".$dateto."' ");
		$items = $the_items->groupBy('products_id')->select('itempedido.products_id','itempedido.size','itempedido.preference','itempedido.number',\DB::raw('sum(cant) as cantidad'))
		->whereRaw('pedido.rango between  "'.$datesinze.'" and "'.$dateto.'" ')
		->join('pedido','pedido.id','=','itempedido.pedido_id')
		->get();
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.reportes.productos.reportprodsales',['items'=>$items,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'filtro'=>$filtro]);
		return $pdf->stream();
		dd($items);
		//->whereRaw('pedido.rango between  2016-08-01 '.$datesinze .' and '.$dateto.' ')
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


	public function genLog($mensaje)
	{
		$area = 'Administracion';
		//$logs = Svlog::log($mensaje,$area);
	}
}
