<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InicioController extends Controller
{
    public function index(){
    	return view('store.partials.inicio');
    }
}
