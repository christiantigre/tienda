<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PayMethod;

class PayController extends Controller
{
    public function index(){
    	if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$pays = PayMethod::all();
    	return view('admin.pay.index', compact('pays'));}else{
                \Auth::logout();
                return redirect('login');
        }
    }else{
        \Auth::logout();
    }

    }
}
