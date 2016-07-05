<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
use App\Http\Requests;
use App\Empresaa;


class ContactController extends Controller
{
    public function index(){
    	$empress = Empresaa::select()->get();
    	return view('store.partials.contact',compact('empress'));
    }

    public function store(Request $request){
    	Mail::send('store.emails.contact',$request->all(), function($msj){
    		$asunto = "StoreLine";
    		$msj->subject($asunto);
    		$msj->to('storelinect@gmail.com');
    	});
    	$message = "Mensaje enviado correctamente";
    	\Session::flash('flash_message', $message);
    	return Redirect::to('/contact');
    }
}
