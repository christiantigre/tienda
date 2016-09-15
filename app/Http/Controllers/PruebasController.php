<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class PruebasController extends Controller
{
    public function index(){
    	$categories = Category::all();
		return view('pruebasLista', compact('categories'));
    	//return view('pruebasLista');
    	//return "datos";
    }
}
