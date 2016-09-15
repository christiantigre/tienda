<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Pedido;
use App\ItemPedido;
use App\client;
use App\Empresaa;


class MysalesController extends Controller
{
    public function index(){

        if(\Auth::check()){
            $id_us = Auth::user()->id;
            $pedidos = Pedido::where('users_id','=',$id_us)->orderBy('id', 'desc')->get();
            return view('store.mysales.index',compact('pedidos'));
        }else{
            return abort(444);
        }

    }

    public function show(Pedido $pedido, $id){
        if(\Auth::check()){
    	$pedidoshow = Pedido::select()->where('id','=',$id)->first();
    	$item = ItemPedido::where('pedido_id','=',$pedidoshow->id)->orderBy('id', 'asc')->get();
        $perfil = client::select()->where('id','=',$pedidoshow->users_id)->get();
        $dt_empress = Empresaa::select()->get();
    	/*dd($dt_empress);*/
    	 return view('store.mysales.show',compact('pedidoshow','item','perfil','dt_empress'));
        }else{
            return abort(444);
        }
    }

    public function edit(){

    }
}
