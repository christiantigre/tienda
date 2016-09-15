<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\intentos;
use App\isactive;

class IntentosController extends Controller
{
    public function index(){
        if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$intentos = intentos::all();
    	//dd($intentos);
    	return view('admin.seguridad.intentos.index', compact('intentos'));
    }else{
        \Auth::logout();
                return redirect('login');
        }
    }else{
        \Auth::logout();
    }
    }

    public function create(){
    	$status = isactive::orderBy('val', 'desc')->lists('name','val');
    	return view('admin.seguridad.intentos.create', compact('status'));
    }

    public function store(Request $request){
    	//return $request->all();

    	$this->validate($request, [
    		'intentos'=>'required|unique:intentos|max:255'
    		]);

    	$intentos = intentos::create([
    		'intentos'=>$request->get('intentos'),
    		'isactive_id'=>$request->get('statu_id')
    		]);

    	$message = $intentos ? 'Nuevo intento cread correctamente': 'El intento no se pudo crear';
    	return redirect()->route('admin.seguridad.intentos.index')->with('message', $message);
    }


    public function show(intento $intento){
    	return $intento;
    }

    public function edit(intentos $intentos){
    	$status = isactive::orderBy('val', 'desc')->lists('name','val');
    	//dd($intentos);
    	return view('admin.seguridad.intentos.edit', compact('status','intentos'));
    }

    public function update(Request $request, intentos $intento){
    	//dd($request->all());
    	$intento->fill($request->all());
    	//$brand->$request->get('statu_id');
    	$updated = $intento->save();

    	$message = $updated ? 'Intento actualizado correctamente': 'El intento no se pudo actualizar';
    	return redirect()->route('admin.seguridad.intentos.index')->with('message', $message);
    }

    public function destroy(intentos $intentos){
    	$deleted = $intentos->delete();

    	$message = $deleted ? 'El intento se elimino correctamente': 'El intento no se pudo eliminar';
    	return redirect()->route('admin.seguridad.intentos.index')->with('message', $message);
    }
}
