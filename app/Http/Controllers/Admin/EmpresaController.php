<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveEmpresaRequest;
use App\Http\Controllers\Controller;
use App\Empresaa;
use Validator;


class EmpresaController extends Controller
{
    public function index(){
    	$data = Empresaa::select()->first();
    	return view('admin.entiti.index', compact('data'));

    }

    public function show(){
    	$empresaa = new Empresaa;
    	$data = $empresaa->select()->first();
        return view('admin.entiti.index',compact('data'));
    }

     public function edit(Empresaa $empresaa, $id)
    {
    	$empresaa = new Empresaa;
    	$data = $empresaa->select()->Where('id','=',$id)->first();
    	//dd($data);
        return view('admin.entiti.edit', compact('data'));
    }

    public function update(SaveEmpresaRequest $request,$id){    	
    		$empresa = Empresaa::find($id);
    		
            $empresa->nom=$request->nom;
            $empresa->email=$request->email;  
            $empresa->ruc=$request->ruc;          
            $empresa->tlfun=$request->tlfun;  
            $empresa->tlfds=$request->tlfds;  
             $empresa->fax=$request->fax;  
             $empresa->cel=$request->cel;  
             $empresa->dir=$request->dir;  
             $empresa->pagweb=$request->pagweb;  
            $empresa->img=$request->img;  
            $empresa->ln=$request->ln;  
             $empresa->lg=$request->lg;  
             $empresa->prop=$request->prop;  
             $empresa->gernt=$request->gernt;  
            $empresa->observ=$request->observ;  
            $updated = $empresa->save();
            $message = $updated ? 'Información actualizada correctamente': 'La información no se pudo actualizar';
            \Session::flash('flash_message', $message);

            return redirect("admin/entiti/edit");
    }

}
