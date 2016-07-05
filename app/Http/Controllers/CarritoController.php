<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Product;
use App\client;
use App\PayMethod;
use App\Pedido;
use App\ItemPedido;
use App\Empresaa;
use App\statu;

class CarritoController extends Controller
{
    public function __construct(){
		if(!\Session::has('cart')) \Session::put('cart', array());
	}

	public function show(){
        $cart = \Session::get('cart');
        $subtot=0;
        $total = $this->total();
        $sub=$total/1.14;
        $iva=$sub*(14/100);
        $mensaje = "Recuerde que por sus compras mayores a $70.00 dólares, no te cobraremos el precio de envío...";
		return view('store.partials.car', compact('cart', 'sub', 'total','iva','mensaje'));
	}

	public function add(Product $product,Request $request){
        if(Auth::check()){
            $id_us = Auth::user()->id;
            $client = new client;    
            $perfil = $client->select()->where('users_id', '=', $id_us)->first();    
            $ced = $perfil->cedula;
            if(!empty ( $ced )){
                $cart = \Session::get('cart');  
                $product->cantt = 1;    
                $cart[$product->slug] = $product;
                \Session::put('cart', $cart);
                return redirect()->route('home','cant');//cart-show
            }else{            
                $message = 'Su información aún no ha sido completada, por favor completa la información de tu perfíl para que puedas realizar tus compras.';
                \Session::flash('flash_message', $message);
                return redirect()->route('store.perfil.edit',$id_us);
            }
        }else{
            $message = 'Porfavor iniciar sessión.';
            \Session::flash('flash_message', $message);
            return redirect()->guest('login');
            //return redirect()->route('home','cant');//cart-show
        }
    }

    public function delete(Product $product){
        $cart = \Session::get('cart');
        unset($cart[$product->slug]);
        \Session::put('cart', $cart);
        return redirect()->route('cart-show');
    }
    
    public function update(Product $product, $cantt)
    {
        $cart = \Session::get('cart');
        $cart[$product->slug]->cantt = $cantt;
        \Session::put('cart', $cart);
        return redirect()->route('cart-show');
    }

    public function trash(){
        \Session::forget('cart');
        return redirect()->route('cart-show');
    }

    private function total(){
    	$cart = \Session::get('cart');
    	$total = 0;
    	foreach($cart as $item){
    		$total += $item->pre_ven * $item->cantt;
    	}

    		return $total;
    }

    public function contItem(){
        $cart = \Session::get('cart');
        $cont = 0;
        foreach($cart as $item){
            $cont += $item;
        }

            return $cont;
    }


    public function orderDetail(Request $request, $idus){
        $client = new client;
        $empresaa = new Empresaa;
        if (count(\Session::get('cart')) <= 0 ) return redirect()->route('home');
        $pays = PayMethod::orderBy('id', 'desc')->lists('namemethod','id');
        $cart = \Session::get('cart');
        $total = $this->total();
        $sub=$total/1.14;
        $iva=$sub*(14/100);
        $perfil = $client->select()->where('users_id', '=', $idus)->first();
        $dt_empress = $empresaa->select()->first();
        //dd($dt_empress);
        return view('store.partials.order-detal', compact('cart','total','sub','iva','perfil','pays','dt_empress'));
        
        \Session::forget('cart');
        /*return "Detalle del pedido";*/
    }

    public function saveOrder(Request $request){ 
        $id_us = Auth::user()->id;
        $total=0;
        $cart = \Session::get('cart');

        foreach($cart as $item){
            $total += $item->pre_ven * $item->cantt;
        }
        $sub=$total/1.14;
        $iva=$sub*(14/100);
        /*dd($iva);*/
        if ($total>70) {
            $var='8';
            $message = 'Su pedido fue realizado con éxito, su factura será enviada a su correo electrónico';
        }else{
            $var='1';
            $message = 'Su pedido fue realizado con éxito, porfavor espere su aprovación';
        }
        $order = Pedido::create([
            'subtotal' => $sub,
            'total' => $total,
            'iva' => $iva,
            'entrega' => $request->get('entrega'),
            'ubiclg' => $request->get('lat'),
            'ubiclt' => $request->get('long'),
            'date' => date('d/m/Y'),
            'users_id' => $id_us,
            'status_id' => $var,
            'paymethods_id' => $request->get('id')
            ]);

        foreach ($cart as $product) {
            $this->saveOrderItem($product,$order->id);
        }

        
        \Session::flash('flash_message', $message);        
        $empresaa = new Empresaa;
        $dt_empress = $empresaa->select()->first();
        $client = new client;
        $perfil = $client->select()->where('users_id', '=', $id_us)->first();
        $itemCar = new ItemPedido;
        $cartord = $itemCar->select()->where('pedido_id', '=', $order->id)->first();
        $cartord = \Session::get('cart');
        $cartordaux = $order->select()->where('id', '=', $order->id)->first();
        /*dd($cartordaux);*/
        return view('store.partials.detallsale',compact('order','dt_empress','perfil','cartord','cartordaux'));
    }

    protected function saveOrderItem($product, $order_id){
        ItemPedido::create([
                'products_id' => $product->id,
                'cant' => $product->cantt,
                'prec' => $product->pre_ven,
                'pedido_id' => $order_id
            ]);
    }

}
