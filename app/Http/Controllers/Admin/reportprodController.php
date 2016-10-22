<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Svlog;
use App\ItemPedido;

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
		$items = $the_items::cont();
		dd($items);
	}




	public function genLog($mensaje)
	{
		$area = 'Administracion';
		$logs = Svlog::log($mensaje,$area);
	}
}
