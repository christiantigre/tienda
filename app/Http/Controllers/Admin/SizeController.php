<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Size;

class SizeController extends Controller
{
	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$sizes = Size::all();
				return view('admin.size.index', compact('sizes'));
			}else{
				\Auth::logout();
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}
	public function create(){
		return view('admin.size.create');
	}
	public function store(Request $request){
		$this->validate($request, [
			'name'=>'required|unique:sizes|max:45',
			'abreviatura'=>'required|unique:sizes|max:7'
			]);

		$size = Size::create([
			'name'=>$request->get('name'),
			'abreviatura'=>$request->get('abreviatura')
			]);

		$message = $size ? 'Tamaño creado correctamente': 'El tamaño no se pudo crear';
		return redirect()->route('admin.size.index')->with('message', $message);
	}
	public function edit(Size $size){
		return view('admin.size.edit', compact('size'));
	}

	public function update(Request $request, Size $size){
		$size->fill($request->all());
		$updated = $size->save();

		$message = $updated ? 'Tamaño actualizado correctamente': 'El tamaño se pudo actualizar';
		return redirect()->route('admin.size.index')->with('message', $message);
	}
	public function destroy(Size $size){
		$deleted = $size->delete();

		$message = $deleted ? 'El Tamaño se elimino correctamente': 'El tamaño no se pudo eliminar';
		return redirect()->route('admin.size.index')->with('message', $message);
	}
}
