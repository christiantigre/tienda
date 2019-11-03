<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Brand;
use App\isactive;
use App\Svlog;

class BrandController extends Controller
{
    public function index(){
        if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$brands = Brand::all();
               $this->genLog("Ingresó en gestión de marcas");
    	return view('admin.brand.index', compact('brands'));
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
    	return view('admin.brand.create', compact('status'));
    }

    public function store(Request $request){
    	//return $request->all();

    	$this->validate($request, [
    		'brand'=>'required|unique:brands|max:255'
    		]);

    	$brand = Brand::create([
    		'brand'=>$request->get('brand'),
    		'isactive_id'=>$request->get('statu_id')
    		]);

    	$message = $brand ? 'Marca creada correctamente': 'La marca no se pudo crear';
    	return redirect()->route('admin.brand.index')->with('message', $message);
    }


    public function show(Brand $brand){
    	return $brand;
    }

    public function edit(Brand $brand){
    	$status = isactive::orderBy('val', 'desc')->lists('name','val');
    	return view('admin.brand.edit', compact('status','brand'));
    }

    public function update(Request $request, Brand $brand){
    	$brand->fill($request->all());
    	$updated = $brand->save();

    	$message = $updated ? 'Marca actualizada correctamente': 'La marca no se pudo actualizar';
    	return redirect()->route('admin.brand.index')->with('message', $message);
    }

    public function genLog($mensaje)
{
    $area = 'Administracion';
    //$logs = Svlog::log($mensaje,$area);
}
}
