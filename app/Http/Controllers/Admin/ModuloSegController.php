<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\intentos;
use App\Seguridad;
use App\isactive;

class ModuloSegController extends Controller
{
    public function index(){
    	$seguridades = Seguridad::all();
    	//dd($seguridad);
    	return view('admin.seguridad.index',compact('seguridades'));
    }

    public function create(){
    	$intentos = intentos::orderBy('id', 'desc')->lists('intentos','id');
    	return view('admin.seguridad.create', compact('intentos'));
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'seguridad'=>'required|unique:seguridad|max:255'
    		]);

    	$seguridad = seguridad::create([
    		'seguridad'=>$request->get('seguridad'),
    		'intentos_id'=>$request->get('intentos_id')
    		]);

    	$message = $seguridad ? 'Nuevo perfíl creado correctamente': 'El perfíl no se pudo crear';
    	return redirect()->route('admin.seguridad.index')->with('message', $message);
    }

    public function edit(Seguridad $seguridad){
    	//dd($seguridad);
    	$intentos = intentos::orderBy('id', 'desc')->lists('intentos','id');
    	//dd($intentos);
    	return view('admin.seguridad.edit', compact('intentos','seguridad'));
    }

    public function update(Request $request, Seguridad $seguridad){
        //dd($request->all());
        $seguridad->fill($request->all());
        //$brand->$request->get('statu_id');
        $updated = $seguridad->save();

        $message = $updated ? 'Cambios realizados correctamente': 'No se puedioeron realizar los cambios';
        return redirect()->route('admin.seguridad.index')->with('message', $message);
    }

}
