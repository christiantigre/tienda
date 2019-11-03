<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Iva;
use App\isactive;
use App\Svlog;

class IvaController extends Controller
{
    public function index(){
        if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$ivas = Iva::all();

               $this->genLog("Ingresó en gestión de iva que maneja la empresa");

    	return view('admin.iva.index', compact('ivas'));}else{
                \Auth::logout();
                return redirect('login');
        }
    }else{
        \Auth::logout();
    }
    }

    public function create(){    	
    	$status = isactive::orderBy('val', 'desc')->lists('name','val');
    	return view('admin.iva.create', compact('status'));
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'iva'=>'required|unique:iva|max:4255'
    		]);

    	$iva = Iva::create([
            'iva'=>$request->get('iva'),
    		'codporcentaje'=>$request->get('codporcentaje'),
    		'isactive_id'=>$request->get('statu_id')
    		]);
    	$message = $iva ? 'Iva creado correctamente': 'El valor no se pudo crear';
    	return redirect()->route('admin.iva.index')->with('message', $message);
    }


    public function destroy(Iva $iva){
    	$deleted = $iva->delete();
        $message = $deleted ? 'El registro se elimino correctamente': 'No se pudo eliminar el registro';
        return redirect()->route('admin.iva.index')->with('message', $message);    
    }

    public function edit(Iva $iva){
    	$status = isactive::orderBy('val', 'desc')->lists('name','val');
    	return view('admin.iva.edit', compact('iva','status'));
    }


    public function update(Request $request, Iva $iva){
    	$iva->fill($request->all());
    	$updated = $iva->save();
    	$message = $updated ? 'Iva actualizado correctamente': 'El valor no se pudo actualizar';
    	return redirect()->route('admin.iva.index')->with('message', $message);
    }

    public function genLog($mensaje)
    {
        $area = 'Administracion';
        //$logs = Svlog::log($mensaje,$area);
    }

    
}
