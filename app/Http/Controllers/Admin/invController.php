<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Isactive;
use App\Brand;
use App\Sections;
use App\Size;
use App\available;
use App\productsize;
use App\availablesproducts;
use App\productsnumbersizes;
use App\numbersize;
use Validator;
use App\Svlog;

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
		$products = \DB::select('SELECT products.slug,products.nombre,products.cant,products.pre_ven,categories.name,brands.brand,sections.name FROM `products` LEFT JOIN products_numbersizes on products_numbersizes.products_id = products.id join categories on products.category_id = categories.id join brands on products.brand_id = brands.id JOIN sections on products.sections_id = sections.id GROUP BY products.slug ');

		$this->genLog("Imprimió a inventario de productos");
		$pdf = \App::make('dompdf.wrapper');
		$pdf = \PDF::loadView('admin.inventario.imprimir',['products'=>$products]);

		return $pdf->stream();

		//return view('admin.inventario.index', compact('products'));
	}



	public function genLog($mensaje)
	{
		$area = 'Administracion';
		$logs = Svlog::log($mensaje,$area);
	}
}
