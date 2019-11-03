<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Cache;
use App\Svlog;
use Carbon\Carbon;
use App\pedido;
use App\notify;
use App\product;

class AdminController extends Controller
{
  public function index(Request $request){

   if(\Auth::user()->is_admin)
   {
    if(\Auth::user()->status="0")
    {
      \Auth::logout();
      $this->genLog("Error al ingresar al panel principal cuenta inactiva");
    }else{
      $name = \Auth::user()->name;
      $key = Cache::get('key');
      //Cache::forever('key','0');
      //Cache::flush(); 
      $date = Carbon::now()->format('d/m/Y');
      $mes = Carbon::now()->format('m');


      $this->genLog("Ingresó a panel principal");


      $usersmens = \DB::select("SELECT COUNT(*) as usuarios FROM clients JOIN users ON clients.users_id = users.id where users.is_admin = '0' and users.status='1' and clients.genero = '2' or clients.genero='Masculino'");

      $userswomans = \DB::select("SELECT COUNT(*) as usuarios FROM clients JOIN users ON clients.users_id = users.id where users.is_admin = '0' and users.status='1' and clients.genero = '1' or clients.genero='Femenino'");

      $ventas = pedido::select(\DB::raw('COUNT(*) as cantidad,sum(pedido.total) as total'))
      ->where('pedido.date','=',$date)
      ->join('sales','pedido.id','=','sales.pedido_id')
      ->join('clients','pedido.users_id','=','clients.users_id')
      ->get();

      /*$pedidos = pedido::select(\DB::raw('COUNT(*) as cantidad'))
      ->where('pedido.date','=',$date)
      ->get();*/

      $notify = new notify;
      $the_notify = $notify->select()->where('idnotify', '=' , '1')->get();
      $products = [];
      $sales = [];
      $min_prod = 0;
      $val_sale = 0;
      if(count($the_notify) > 0)
      {
        $min_prod = $the_notify[0]['min_prod'];
        $product = new product;
        $products = $product->select()->where('cant','<=',$min_prod)->get();
      //dd($the_product);
        $val_sale = $the_notify[0]['val_sale'];
        $sales = pedido::select('clients.id',\DB::raw('pedido.id as numpedido,clients.name,clients.apellidos,clients.telefono,clients.celular,clients.email,sales.numfactura as factura,pedido.date as fecha,pedido.total as total'))
        ->where('pedido.date','=',$date)
        ->where('pedido.total','<',$val_sale)
        ->join('sales','pedido.id','=','sales.pedido_id')
        ->join('clients','pedido.users_id','=','clients.users_id')
        ->get();
      }
    //$mens = $usersmens->usuarios;
    //$womans = $userswomans->usuarios;
    //$total = $mens+$womans;
    //dd($total);
      $pedidos = Pedido::where('date',$date)->orderBy('id','DESC')->get();

      return view('admin/home',compact('name','usersmens','userswomans','ventas','pedidos','products','sales','min_prod','val_sale'));
    } 
  }else{	    		
   \Auth::logout();
   $this->genLog("Error al ingresar al panel principal");
   return abort(404);
 }  		   

}

public function genLog($mensaje)
{
  $area = 'Administracion';
  //$logs = Svlog::log($mensaje,$area);
}

}
