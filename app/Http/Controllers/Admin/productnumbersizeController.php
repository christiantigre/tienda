<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\productsize;
class productnumbersizeController extends Controller
{
	public function update(Request $request){
		$sizenum = $request["size"];
		$idproducto = $request->get('idproducto');
		$countsiz = count($sizenum);		
		$deletedRows = productsize::where('product_id', $idproducto)->delete();
		if($countsiz>0){
		        for ($i = 0; $i < $countsiz; $i++) {// echo $numero[$i];
		            $datochecksize = $request["size"]+$sizenum;//dd($datochecksize);
		            \DB::table('product_size')->insert(
		            	['product_id' => $idproducto, 'size_id' => $datochecksize[$i]] );
		        }
		        return back();
		    }else{
		    	return back();
		    }    
		}
	}
