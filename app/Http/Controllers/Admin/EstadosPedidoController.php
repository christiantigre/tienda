<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Statu;

class EstadosPedidoController extends Controller
{
    public function index(){
        if(\Auth::check()){
        if(\Auth::user()->is_admin){
    	$status = Statu::all();
        $status = Statu::orderBy('id','statu')->paginate(10);
    	return view('admin.status.index', compact('status'));
    }else{
                \Auth::logout();
                return redirect('login');
        }
    }else{
        \Auth::logout();
    }
    }

    public function store(Request $request){
    	//dd($request); 
        	$this->validate($request, [
    		'statu'=>'required|unique:status|max:25'
    		]);

    		$statu = Statu::create([
    		'statu'=>$request->get('statu')
    		]);

    	$message = $statu ? 'Estado creado correctamente': 'El estado no se pudo crear';
    	return redirect()->route('admin.status.index')->with('message', $message);
    }

    public function create(){
    	return view('admin.status.create');
    }

    public function update(Request $request, Statu $statu){
    	$statu->fill($request->all());
        $statu->statu=$request->get('statu');
        $updated = $statu->save();

        $message = $updated ? 'Estado actualizado correctamente': 'El estado no se pudo actualizar';
        return redirect()->route('admin.status.index')->with('message', $message);
    }

    public function show(Statu $statu){
    	return $statu;
    }

    public function edit(Statu $statu){
       return view('admin.status.edit', compact('statu'));
    }

    public function destroy(Statu $statu){
        $deleted = $statu->delete();

        $message = $deleted ? 'El estado se elimino correctamente': 'El estado no se pudo eliminar';
        return redirect()->route('admin.status.index')->with('message', $message);
    }

}
