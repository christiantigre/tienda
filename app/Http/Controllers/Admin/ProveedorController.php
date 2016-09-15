<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveProveedorRequest;
use App\Http\Controllers\Controller;
use App\Proveedor;
use App\Country;
use App\Province;
use App\Isactive;

class ProveedorController extends Controller
{
    public function index(){
        if(\Auth::check()){
        if(\Auth::user()->is_admin){
            	$proveedors = Proveedor::all();
            	return view('admin.proveedor.index', compact('proveedors'));
            }else{
                \Auth::logout();
                return redirect('login');
        }
    }else{
        \Auth::logout();
    }
    }

    public function create(){
    	$countries = Country::orderBy('id', 'asc')->lists('country','id');
    	$provinces = Province::orderBy('id', 'desc')->lists('prov','id');
    	$isactives = Isactive::orderBy('id', 'asc')->lists('name','val');
    	//dd($isactives);
    	return view('admin.proveedor.create',compact('countries','isactives','provinces'));
    }

    public function show(Proveedor $proveedor){
    	//return $proveedor;
        return view('admin.proveedor.show',compact('proveedor'));
    }

    public function edit(Proveedor $proveedor){
    	$countries = Country::orderBy('id', 'asc')->lists('country','id');
    	$provinces = Province::orderBy('id', 'desc')->lists('prov','id');
    	$isactives = Isactive::orderBy('id', 'asc')->lists('name','id');
    	return view('admin.proveedor.edit',compact('proveedor','countries','isactives','provinces'));
    }

    public function update(Request $request, Proveedor $proveedor){
    	$proveedor->fill($request->all());
    	$updated = $proveedor->save();

    	$message = $updated ? 'Proveedor actualizado correctamente': 'El proveedor no se pudo actualizar';
    	return redirect()->route('admin.proveedor.index')->with('message', $message);
    }

    public function store(SaveProveedorRequest $request){
    	//dd($request);
    	$data = [
            'nom_compania' =>$request->get('nom_compania'),
            'ruc' =>$request->get('ruc'),
            'telefono' =>$request->get('telefono'),
            'celular' =>$request->get('celular'),
            'fax' =>$request->get('fax'),
            'direccion' =>$request->get('direccion'),
            'codigopostal' =>$request->get('codpostal'),
            'email' =>$request->get('email'),
            'pagweb' =>$request->get('pagweb'), 
            'observacion' =>$request->get('observacion'),
            'logo' =>$request->get('logo'), 
            'country_id' =>$request->get('country_id'), 
            'prov_id' =>$request->get('prov_id'), 
            'isactive_id' =>$request->get('isactive_id')
        ];
        $proveedor = Proveedor::create($data);
        $message = $proveedor ? 'Proveedor creado correctamente': 'El proveedor no se pudo crear';
    	return redirect()->route('admin.proveedor.index')->with('message', $message);
    }

    public function destroy(Proveedor $proveedor){
    	$deleted = $proveedor->delete();

    	$message = $deleted ? 'El proveedor se elimino correctamente': 'El proveedor no se pudo eliminar';
    	return redirect()->route('admin.proveedor.index')->with('message', $message);
    }
}
