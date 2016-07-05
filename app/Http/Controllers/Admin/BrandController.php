<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Brand;
use App\isactive;

class BrandController extends Controller
{
    public function index(){
    	$brands = Brand::all();
    	//dd($brands);
    	return view('admin.brand.index', compact('brands'));
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
    	//dd($request->all());
    	$brand->fill($request->all());
    	//$brand->$request->get('statu_id');
    	$updated = $brand->save();

    	$message = $updated ? 'Marca actualizada correctamente': 'La marca no se pudo actualizar';
    	return redirect()->route('admin.brand.index')->with('message', $message);
    }
}
