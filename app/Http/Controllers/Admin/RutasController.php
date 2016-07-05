<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\Empresaa;


class RutasController extends Controller
{
    public function show($id){
    	$rutas = Pedido::select()->where('id','=',$id)->first();
    	$empresa = Empresaa::select()->get();
    	return view('admin.routes.show',compact('rutas','empresa'));
    }

    public function update(){

    }
}
