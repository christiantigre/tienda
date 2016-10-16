<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Position;
use App\Svlog;

class CargoController extends Controller
{
    public function index(){
        if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$positions = Position::orderBy('id','poss')->paginate(5);
               $this->genLog("Ingresó en gestión de cargos en la empresa");

    	return view('admin.position.index', compact('positions'));
    }else{
                \Auth::logout();
                return redirect('login');
        }
    }else{
        \Auth::logout();
    }
    }

    public function create(Position $position){
    	return view('admin.position.create');
    }

    public function store(Request $request){
    	//dd($request);
    	$this->validate($request, [
    		'poss'=>'required|unique:positions|max:25'
    		]);

    	$position = Position::create([
    		'poss'=>$request->get('poss')
    		]);

    	$message = $position ? 'Cargo creado correctamente': 'El cargo no se pudo crear';
    	return redirect()->route('admin.position.index')->with('message', $message);
    }

    public function show(Position $position){
    	return $position;
    }

    public function edit(Position $position){
    	return view('admin.position.edit', compact('position'));
    }

    public function update(Request $request, Position $position){
    	$position->fill($request->all());
    	$this->validate($request, [
    		'poss'=>'required|unique:positions|max:25'
    		]);
    	$updated = $position->save();

    	$message = $updated ? 'Cargo actualizado correctamente': 'El cargo no se pudo actualizar';
    	return redirect()->route('admin.position.index')->with('message', $message);
    }

    public function destroy(Position $position){
    	    	$deleted = $position->delete();

    	$message = $deleted ? 'El cargo se elimino correctamente': 'El cargo no se pudo eliminar';
    	return redirect()->route('admin.position.index')->with('message', $message);
    }

    public function genLog($mensaje)
    {
        $area = 'Administracion';
        $logs = Svlog::log($mensaje,$area);
    }

}
