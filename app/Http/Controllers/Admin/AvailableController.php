<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\available;
use App\validate;
use App\Svlog;

class AvailableController extends Controller
{
	public function index(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				$availables = available::all();
               $this->genLog("Ingresó en gestión de disponibles de productos");

				return view('admin.available.index', compact('availables'));
			}else{
				\Auth::logout();
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}

	public function create(){
		if(\Auth::check()){
			if(\Auth::user()->is_admin){
				return view('admin.available.create');
			}else{                
				\Auth::logout();
				return redirect('login');
			}
		}else{
			\Auth::logout();
		}
	}

	public function store(Request $request){
		$this->validate($request, [
			'name'=>'required|unique:availables|max:45'
			]);

		$available = available::create([
			'name'=>$request->get('name')
			]);

		$message = $available ? 'Disponible creado correctamente': 'No se pudo guardar el registro';
		return redirect()->route('admin.available.index')->with('message', $message);
	}

	public function edit(available $available){
		return view('admin.available.edit', compact('available'));
	}

	public function update(Request $request, available $available){
		$available->fill($request->all());
		$updated = $available->save();

		$message = $updated ? 'Registro actualizado correctamente': 'El registro no se pudo actualizar';
		return redirect()->route('admin.available.index')->with('message', $message);
	}

	public function destroy(available $available){
    $deleted = $available->delete();
    $message = $deleted ? 'El disponible se elimino correctamente': 'El disponible no se pudo eliminar';
    return redirect()->route('admin.available.index')->with('message', $message);
}

public function genLog($mensaje)
    {
        $area = 'Administracion';
        $logs = Svlog::log($mensaje,$area);
    }
}
