<?php

namespace App\Http\Controllers;

use App\client;
use App\Empresaa;
use App\ItemPedido;
use App\Iva;
use App\Pedido;
use Illuminate\Support\Facades\Auth;

class MysalesController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            $id_us   = Auth::user()->id;
            $pedidos = Pedido::where('users_id', '=', $id_us)->orderBy('id', 'desc')->get();
            return view('store.mysales.index', compact('pedidos'));
        } else {
            return abort(444);
        }
    }

    public function show(Pedido $pedido, $id)
    {
        if (\Auth::check()) {
            $pedidoshow = Pedido::select()->where('id', '=', $id)->first();
            $item       = ItemPedido::where('pedido_id', '=', $pedidoshow->id)->orderBy('id', 'asc')->get();
            $perfil     = client::select()->where('id', '=', $pedidoshow->users_id)->get();
            $cliva      = new Iva;
            $empresa    = new Empresaa;
            $e_reliva   = $empresa->select()->where('id', '=', 1)->first();
            $e_valiva   = $cliva->select()->where('id', '=', $e_reliva->iva_id)->first();
            $e_iv       = $e_valiva->iva;
            $e_valor    = $e_iv + 100;
            $e_obtnvl   = $e_valor / 100;
            $dt_empress = Empresaa::select()->get();
            /*dd($dt_empress);*/
            return view('store.mysales.show', compact('pedidoshow', 'item', 'perfil', 'dt_empress', 'e_iv'));
        } else {
            return abort(444);
        }
    }

    public function edit()
    {

    }
}
