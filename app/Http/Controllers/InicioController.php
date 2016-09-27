<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class InicioController extends Controller
{
	public function index(){
		if(Auth::check()){
			return view('store.partials.inicio');
		}else{
			return view('store.partials.inicio');
		}
	}
}
