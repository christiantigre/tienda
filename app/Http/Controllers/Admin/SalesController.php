<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB; 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\ItemPedido;
use App\client;
use App\Empresaa;
use App\statu;
use App\PayMethod;


class SalesController extends Controller
{
    public function index(){
        if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$pedido = Pedido::orderBy('id', 'desc')->get();
    	return view('admin.sales.index', compact('pedido'));}else{
                \Auth::logout();
                return redirect('login');
        }
    }else{
        \Auth::logout();
    }

    }

    public function edit(Pedido $pedido, $id){
        $pedido = Pedido::select()->where('id','=',$id)->first();
        $item = ItemPedido::where('pedido_id','=',$pedido->id)->orderBy('id', 'asc')->get();
        $perfil = client::select()->where('id','=',$pedido->users_id)->get();
        $dt_empress = Empresaa::select()->get();
        $status = statu::orderBy('id', 'asc')->lists('statu','id');
        return view('admin.sales.edit',compact('pedido','item','perfil','dt_empress','status'));
    }

    public function update(Request $request,$id){
        $pedido = Pedido::orderBy('id', 'desc')->get();
        $p= Pedido::find($id);
        $data = [
            'status_id' => $request->get('status_id')
        ];
         $p->fill($data);
         $updated = $p->save();
         $pedidoshow = Pedido::select()->where('id','=',$id)->first();
         $item = ItemPedido::where('pedido_id','=',$id)->orderBy('id', 'asc')->get();
         $perfil = client::select()->where('id','=',$p->users_id)->get();
         $dt_empress = Empresaa::select()->get();
        $message = $updated ? 'Pedido actualizado correctamente': 'El pedido no se pudo actualizar';
        return view('admin.sales.show',compact('pedidoshow','item','perfil','dt_empress'));
        /*return view('admin.sales.index',compact('pedido'))->with('message', $message);*/
    }



    public function show(Pedido $pedido, $id){
        $pedidoshow = Pedido::select()->where('id','=',$id)->first();
        $item = ItemPedido::where('pedido_id','=',$pedidoshow->id)->orderBy('id', 'asc')->get();
        $perfil = client::select()->where('id','=',$pedidoshow->users_id)->get();
        $dt_empress = Empresaa::select()->get();
        $status = statu::orderBy('id', 'asc')->lists('statu','id');
        return view('admin.sales.show',compact('pedidoshow','item','perfil','dt_empress','status'));
    }

    

}
