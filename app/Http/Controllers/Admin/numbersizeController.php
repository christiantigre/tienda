<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\numbersize;
use validate;

class numbersizeController extends Controller
{
	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$numbers = numbersize::all();
				return view('admin.numbersize.index', compact('numbers'));
			}else{
				\Auth::logout();
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}

	public function create(){
		return view('admin.numbersize.create');
	}

	public function store(Request $request){
		$this->validate($request, [
			'number'=>'required|unique:numbersizes|max:10'
			]);
		$numbers = numbersize::create([
			'number'=>$request->get('number')
			]);
		$message = $numbers ? 'Registro creado correctamente': 'El registro no se pudo crear';
		return redirect()->route('admin.numbersize.index')->with('message', $message);
	}

	public function edit(numbersize $numbersize){
		return view('admin.numbersize.edit', compact('numbersize'));
	}

	public function update(Request $request, numbersize $numbersize){
		$numbersize->fill($request->all());
		$updated = $numbersize->save();
		$message = $updated ? 'Información actualizada correctamente': 'La informaión no se pudo actualizar';
		return redirect()->route('admin.numbersize.index')->with('message', $message);
	}

	public function destroy(numbersize $numbersize){
    	$deleted = $numbersize->delete();
    	$message = $deleted ? 'El registro se elimino correctamente': 'El registro no se pudo eliminar';
    	return redirect()->route('admin.numbersize.index')->with('message', $message);
    }


}
