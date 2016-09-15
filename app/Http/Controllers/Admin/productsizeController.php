<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\productsnumbersizes;

class productsizeController extends Controller
{
	public function update(Request $request){
		$number = $request["number"];
		$idproducto = $request->get('idproductops');
		$countsiz = count($number);		
		$deletedRows = productsnumbersizes::where('products_id', $idproducto)->delete();
		if($countsiz>0){
		        for ($i = 0; $i < $countsiz; $i++) {// echo $numero[$i];
		            $datochecksize = $request["number"]+$number;//dd($datochecksize);
		            \DB::table('products_numbersizes')->insert(
		            	['products_id' => $idproducto, 'numbersizes_id' => $datochecksize[$i]] );
		        }
		        return back();
		    }else{
		    	return back();
		    }    
		}
	}
