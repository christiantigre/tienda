<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

use App\Product;
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


	public function index(){

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
		return $pdf->download('inventario.pdf');
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
		Excel::create('Laravel Excel', function($excel) {

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



	public function genLog($mensaje)
	{
		$area = 'Administracion';
		$logs = Svlog::log($mensaje,$area);
	}
}
