<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\product;
use App\Empresaa;

class StoreController extends Controller
{
    public function index(){

    	$products = product::orderBy('id', 'desc')->where('catalogo','1')->paginate(6);
    	//$products = product::All();
    	//dd($products);
    	return view('store.product.index', compact('products'));
    }
    
    public function show($slug){
        $product = product::where('slug', $slug)->first();
        return view('store.product.show', compact('product'));
        
    }
    


    public function getHeader(){
        $empress = Empresaa::select()->first();
        return view('store.partials.getheader',compact('empress'));
    }

    public function showzomm($slug){
        $product = product::where('slug', $slug)->first();
        return view('store.product.show-zoom',compact('product'));
    }

}
