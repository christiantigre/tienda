<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Moneda;
use App\isactive;

class MonedaController extends Controller
{
    public function index(){
        if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$monedas = Moneda::all();
    	return view('admin.moneda.index', compact('monedas'));}else{
                \Auth::logout();
                return redirect('login');
        }
    }else{
        \Auth::logout();
    }
    }

    public function create(){    	
    	$status = isactive::orderBy('val', 'desc')->lists('name','val');
    	return view('admin.moneda.create', compact('status'));
    }

    public function edit(Moneda $moneda){
    	$status = isactive::orderBy('val', 'desc')->lists('name','val');
    	return view('admin.moneda.edit', compact('moneda','status'));
    }

    public function destroy(Moneda $mod){
    	$deleted = $mod->delete();
        $message = $deleted ? 'El registro se elimino correctamente': 'No se pudo eliminar el registro';
        return redirect()->route('admin.moneda.index')->with('message', $message);    
    }

    public function update(Request $request, Moneda $moneda){
    	$moneda->fill($request->all());
    	$updated = $moneda->save();
    	$message = $updated ? 'Moneda actualizada correctamente': 'La moneda no se pudo actualizar';
    	return redirect()->route('admin.moneda.index')->with('message', $message);
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'moneda'=>'required|unique:moneda|max:45'
    		]);

    	$moneda = Moneda::create([
    		'moneda'=>$request->get('moneda'),
    		'isactive_id'=>$request->get('statu_id')
    		]);
    	$message = $moneda ? 'Moneda creada correctamente': 'La moneda no se pudo crear';
    	return redirect()->route('admin.moneda.index')->with('message', $message);
    }

}
