<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sections;

class SeccionesController extends Controller
{
    public function index(){
    	if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$secciones = Sections::all();
    	return view('admin.secciones.index', compact('secciones'));
	    }else{
	                \Auth::logout();
	                return redirect('login');
	        }
	    }else{
	        \Auth::logout();
	    }
	    }

	    public function create(){
    	return view('admin.secciones.create');

	    }

	    public function store(Request $request){
	    	$this->validate($request, [
    		'name'=>'required|unique:sections|max:255'
    		]);

    	$secciones = Sections::create([
    		'name'=>$request->get('name'),
    		'descripcion'=>$request->get('descripcion')
    		]);

    	$message = $secciones ? 'Sección creada correctamente': 'La sección no se pudo crear';
    	return redirect()->route('admin.seccion.index')->with('message', $message);
	    }

	    public function edit(Sections $seccion){
    	return view('admin.secciones.edit', compact('seccion'));
    	}

    	public function update(Request $request, Sections $seccion){
    	$seccion->fill($request->all());
    	$updated = $seccion->save();

    	$message = $updated ? 'Sección actualizada correctamente': 'La sección no se pudo actualizar';
    	return redirect()->route('admin.seccion.index')->with('message', $message);
    	}

    	public function destroy(Sections $seccion){
    	$deleted = $seccion->delete();

    	$message = $deleted ? 'La sección se elimino correctamente': 'La sección no se pudo eliminar';
    	return redirect()->route('admin.seccion.index')->with('message', $message);
    	}
}
