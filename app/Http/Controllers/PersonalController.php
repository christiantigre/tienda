<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Pedido;
use App\Empresaa;

class PersonalController extends Controller
{
    use AuthenticatesUsers;
    protected $loginView = 'personal.login';
    protected $guard ='personals';

    function __construct(){
    	$this->middleware('auth:personals',['only'=>['secret']]);
    }

    public function authenticated(){
    	return redirect('person/zone');
    }

    public function secret(){
        $rutas = Pedido::select()->where('id','=',1)->first();
        //dd($rutas);
        $empresa = Empresaa::select()->get();
        return view('personal.despacho.index',compact('rutas','empresa'));
        //return redirect('despacho/index',compact('rutas','empresa'));
    	//return 'Hola '. auth('personals')->user()->name;
    }
}
