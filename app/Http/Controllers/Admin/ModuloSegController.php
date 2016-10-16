<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\intentos;
use App\Seguridad;
use App\isactive;
use App\Svlog;

class ModuloSegController extends Controller
{
    public function index(){
    	$seguridades = Seguridad::all();
        $this->genLog("Ingresó a configuración del modulo de seguridad");
        return view('admin.seguridad.index',compact('seguridades'));
    }


    public function create(){
    	$intentos = intentos::orderBy('id', 'desc')->lists('intentos','id');
        $this->genLog("Ingresó a crear perfíl de intentos de login");
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
        $this->genLog("Creó a nuevo perfíl");
    	return redirect()->route('admin.seguridad.index')->with('message', $message);
    }


    public function edit(Seguridad $seguridad){
    	$intentos = intentos::orderBy('id', 'desc')->lists('intentos','id');
        $this->genLog("Ingresó a editar perfíl id ".$seguridad->id);
    	return view('admin.seguridad.edit', compact('intentos','seguridad'));
    }


    public function update(Request $request, Seguridad $seguridad){
        $seguridad->fill($request->all());
        $updated = $seguridad->save();

        $message = $updated ? 'Cambios realizados correctamente': 'No se puedioeron realizar los cambios';
        $this->genLog("Actualizó perfíl con id ".$seguridad->id);
        return redirect()->route('admin.seguridad.index')->with('message', $message);
    }


    public function genLog($mensaje)
    {
        $area = 'Administracion';
        $logs = Svlog::log($mensaje,$area);
    }

}
