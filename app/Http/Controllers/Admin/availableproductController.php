<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\availablesproducts;

class availableproductController extends Controller
{
    public function update(Request $request){
		$available = $request["available"];
		$idproducto = $request->get('idproductopfr');
		$countsiz = count($available);		
		$deletedRows = availablesproducts::where('products_id', $idproducto)->delete();
		if($countsiz>0){
		        for ($i = 0; $i < $countsiz; $i++) {// echo $numero[$i];
		            $datochecksize = $request["available"]+$available;//dd($datochecksize);
		            \DB::table('availables_products')->insert(
		            	['products_id' => $idproducto, 'availables_id' => $datochecksize[$i]] );
		        }
		        return back();
		    }else{
		    	return back();
		    }
		}
}
