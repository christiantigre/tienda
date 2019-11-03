<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PayMethod;
use App\Svlog;

class PayController extends Controller
{
    public function index(){
    	if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$pays = PayMethod::all();
               $this->genLog("Ingresó en gestión de pagos");

    	return view('admin.pay.index', compact('pays'));}else{
                \Auth::logout();
                return redirect('login');
        }
    }else{
        \Auth::logout();
    }

    }

    public function genLog($mensaje)
    {
        $area = 'Administracion';
        //$logs = Svlog::log($mensaje,$area);
    }
}
