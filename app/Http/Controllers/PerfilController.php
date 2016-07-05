<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Requests;
use App\client;
use App\User;
use App\Province;

class PerfilController extends Controller
{
	public function index()
    {
        $client = new client;
        return view('store.perfil.perfil', compact('client'));
    }

    public function show(Request $request, $idus){    	
    	$client = new client;
    	$user = new User;
		$perfil = $client->select()->where('users_id', '=', $idus)->first();
		$users = $user->select()->where('id', '=', $idus)->first();
    	return view('store.perfil.perfil',compact('perfil','users'));
    }

    public function edit(client $client){    	
        $provinces = Province::orderBy('id', 'desc')->lists('prov','id');
    	return view('store.perfil.edit', compact('client','provinces'));
    }

    public function update(Request $request, client $client){
    	$the_users = new User;
    	$client->fill($request->all());
    	$updated = $client->save();
    	$perfil = $client->select()->where('users_id', '=', $client)->first();
    	$users = $the_users->select()->where('id','=', $client->users_id)->first();
    	$provinces = Province::orderBy('id', 'desc')->lists('prov','id');
    	\Session::flash('flash_message', 'Información de perfil actualizada correctamente');
    	return view('store.perfil.edit',compact('client','provinces'));
    }

    public function changepass(){
        $token = new User;
        $token->comfirm_token=str_random(255);
        $email = \Auth::user()->email;
        return view('store.perfil.chanpass',compact('token','email'));
    }

    public function updatepass(Request $request,User $user){        
        $id_us = Auth::user()->id;
            $p= User::find($id_us);
            $p->fill($request->all());
            $p->password=bcrypt($request->password);
            $p->comfirm_token=str_random(255);
            $p->save();

        
        
        //\Session::flash('flash_message', 'Su clave a sido actualizada correctamente, porfavor inicio sessión');
        //\Session::flush();

        $message = $p ? 'Su clave a sido actualizada correctamente, porfavor iniciar sessión con su nueva clave': 'No se pudo realizar los cambios';        
        \Session::flush();
        \Auth::logout();
        \Session::flash('flash_message', $message);        
        return redirect()->route('home');
        //return redirect()->route('store.perfil.perfil',compact('client'))
        //return view('store.perfil.perfil',compact('client'));
        //dd($request);
    }

}
