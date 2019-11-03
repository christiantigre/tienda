<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

use App\Product;
use App\sales;
use App\Category;
use App\Isactive;
use App\Brand;
use App\Sections;
use App\client;
use App\Size;
use App\available;
use App\productsize;
use App\availablesproducts;
use App\productsnumbersizes;
use App\numbersize;
use Validator;
use App\Svlog;
use App\Empresaa;
use Carbon\Carbon;

class invController extends Controller
{

	/*INICIO INVENTARIO DE PRODUTOS*/


	public function index()
	{

		if(\Auth::check()){

			if(\Auth::user()->is_admin){

				$products = \DB::select('SELECT products.slug,products.nombre,products.cant,products.pre_ven,categories.name,brands.brand,sections.name FROM `products` LEFT JOIN products_numbersizes on products_numbersizes.products_id = products.id join categories on products.category_id = categories.id join brands on products.brand_id = brands.id JOIN sections on products.sections_id = sections.id GROUP BY products.slug ');

				$this->genLog("Ingresó a inventario de productos");
				return view('admin.inventario.index', compact('products'));

			}else{

				\Auth::logout();
				$this->genLog("No autorizado a gestión productos");            
				return redirect('login');

			}

		}
		else
		{

			\Auth::logout();

		}

	}



	public function imprimir()
	{
		$pdf = $this->inv();
		$this->genLog("Imprimió inventario de productos");
		return $pdf->stream();
	}



	public function download()
	{
		
		$pdf = $this->inv();
		$this->genLog("Descargó inventario de productos");
		return $pdf->download('inventarioproductos.pdf');
	}


	protected function inv()
	{
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$date->timezone = new \DateTimeZone('America/Guayaquil');

		$dt_empress = Empresaa::select()->get();
		$products = \DB::select('SELECT products.slug,products.nombre,products.cant,products.pre_ven,categories.name,brands.brand,sections.name FROM `products` LEFT JOIN products_numbersizes on products_numbersizes.products_id = products.id join categories on products.category_id = categories.id join brands on products.brand_id = brands.id JOIN sections on products.sections_id = sections.id GROUP BY products.slug');

		$sumas = \DB::select('SELECT sum(products.cant) as cantidad,sum(products.pre_ven) as precio FROM `products` LEFT JOIN products_numbersizes on products_numbersizes.products_id = products.id join categories on products.category_id = categories.id join brands on products.brand_id = brands.id JOIN sections on products.sections_id = sections.id ');

		
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.inventario.imprimir',['products'=>$products,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'sumas'=>$sumas]);
		return $pdf;
	}



	public function excel()
	{
		Excel::create('Inventario de Productos', function($excel) {

			$excel->sheet('Productos', function($sheet) {

				$products = Product::select('products.slug as Codigo','products.nombre as Producto','products.cant as Cantidad','products.pre_ven as P.V.P','categories.name as Categoria','brands.brand as Marca','sections.name as Seccion')
				->join('categories','products.category_id','=','categories.id')
				->join('brands','products.brand_id','=','brands.id')
				->join('sections','products.sections_id','=','sections.id')
				->get();

				$sheet->fromArray($products);

			});
		})->export('xls');
		$this->genLog("Descargó inventario de productos en excel");
		return redirect()->back();
	}

	/*FIN INVENTARIO DE PRODUCTOS*/



	/*INICIO INVENTARIO DE VENTAS*/

	public function invventas()
	{

		if(\Auth::check()){

			if(\Auth::user()->is_admin){

				$sales = \DB::select('SELECT pedido.id,sales.id,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,sales.numfactura,pedido.subtotal,pedido.iva,pedido.total,pedido.entrega,pedido.date FROM `sales` join pedido on sales.pedido_id = pedido.id join clients on pedido.users_id = clients.users_id');
				$this->genLog("Ingresó a inventario de ventas");
				return view('admin.inventario.invventas', compact('sales'));

			}else{

				\Auth::logout();
				$this->genLog("No autorizado a inventario de ventas");            
				return redirect('login');

			}

		}
		else
		{

			\Auth::logout();

		}
	}
	


	public function imprimirvtn()
	{
		$pdf = $this->invVtn();
		$this->genLog("Imprimió inventario de ventas");
		return $pdf->stream();
	}



	public function downloadvtn()
	{
		
		$pdf = $this->invVtn();
		$this->genLog("Descargó inventario de ventas");
		return $pdf->download('inventarioventas.pdf');
	}



	public function excelvtn()
	{
		Excel::create('Inventario de ventas', function($excel) {

			$excel->sheet('sales', function($sheet) {

				$sales = sales::select('clients.name','clients.apellidos','clients.telefono','clients.celular','clients.email','sales.numfactura','pedido.subtotal','pedido.iva','pedido.total','pedido.date')
				->join('pedido','sales.pedido_id','=','pedido.id')
				->join('clients','pedido.users_id','=','clients.users_id')
				->get();

				$sheet->fromArray($sales);

			});
		})->export('xls');
		$this->genLog("Descargó inventario de ventas en excel");
		return redirect()->back();
	}



	protected function invVtn()
	{
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$date->timezone = new \DateTimeZone('America/Guayaquil');

		$dt_empress = Empresaa::select()->get();
		$sales = \DB::select('SELECT pedido.id,sales.id,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,sales.numfactura,pedido.subtotal,pedido.iva,pedido.total,pedido.entrega,pedido.date FROM `sales` join pedido on sales.pedido_id = pedido.id join clients on pedido.users_id = clients.users_id');

		$sumas = \DB::select('SELECT sum(pedido.subtotal) as subtotal,sum(pedido.iva) as iva,sum(pedido.total) as total FROM `sales` join pedido on sales.pedido_id = pedido.id');

		
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.inventario.imprimirvtn',['sales'=>$sales,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients,'sumas'=>$sumas]);
		return $pdf;
	}

	/*FIN INVENTARIO DE VENTAS*/

	/*INICIO DE ENTREGAS*/ 
	public function inentrega()
	{

		if(\Auth::check()){

			if(\Auth::user()->is_admin){

				$entregas = \DB::select('SELECT pedido.id,pedido.entrega,pedido.date,clients.name,clients.apellidos,provinces.prov,status.statu,clients.telefono,clients.celular FROM `pedido` join clients on pedido.users_id=clients.users_id join provinces on clients.provincia_idprovincia=provinces.id join status on pedido.status_id=status.id and `status_id`="6" and entrega != "Retiro personal"');
				$this->genLog("Ingresó a inventario de entregas");
				return view('admin.inventario.inentrega', compact('entregas'));

			}else{

				\Auth::logout();
				$this->genLog("No autorizado a inventario de ventas");            
				return redirect('login');

			}

		}
		else
		{

			\Auth::logout();

		}
	}

	public function imprimirent()
	{
		$pdf = $this->invEnt();
		$this->genLog("Imprimió inventario de entregas");
		return $pdf->stream();
	}

	public function downloadent()
	{
		
		$pdf = $this->invEnt();
		$this->genLog("Descargó inventario de entregas");
		return $pdf->download('inventarioentregas.pdf');
	}

	public function excelent()
	{
		Excel::create('Inventario de entregas', function($excel) {

			$excel->sheet('entregas', function($sheet) {

				$entregas = client::select('pedido.id','pedido.entrega','pedido.date','clients.name','clients.apellidos','provinces.prov','status.statu','clients.telefono','clients.celular')
				->join('pedido','clients.users_id','=','pedido.users_id')
				->join('provinces','clients.provincia_idprovincia','=','provinces.id')
				->join('status','pedido.status_id','=','status.id')
				->where('status.id','=','6')
				->where('entrega','!=','Retiro Personal')
				->get();

				$sheet->fromArray($entregas);

			});
		})->export('xls');
		$this->genLog("Descargó inventario de entregas en excel");
		return redirect()->back();
	}

	protected function invEnt()
	{
		$usuario = \Auth::user()->id;
		$clients = client::where('users_id',$usuario)->get();
		$date = Carbon::now();
		$dia = Carbon::now()->format('l jS \\de F Y h:i:s A');
		$date->timezone = new \DateTimeZone('America/Guayaquil');

		$dt_empress = Empresaa::select()->get();
		$entregas = \DB::select('SELECT pedido.id,pedido.entrega,pedido.date,clients.name,clients.apellidos,provinces.prov,status.statu,clients.telefono,clients.celular FROM `pedido` join clients on pedido.users_id=clients.users_id join provinces on clients.provincia_idprovincia=provinces.id join status on pedido.status_id=status.id and `status_id`="6" and entrega != "Retiro personal"');

		
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.inventario.imprimirent',['entregas'=>$entregas,'dt_empress'=>$dt_empress,'date'=>$date,'dia'=>$dia,'clients'=>$clients]);
		return $pdf;
	}

	
	/*INICIO ENTREGAS*/


	public function genLog($mensaje)
	{
		$area = 'Administracion';
		//$logs = Svlog::log($mensaje,$area);
	}
}
