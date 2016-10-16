<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveEmpresaRequest;
use App\Http\Controllers\Controller;
use App\Empresaa;
use App\Moneda;
use App\Iva;
use Validator;
use App\Svlog;

class EmpresaController extends Controller
{
    public function index(){
        if(\Auth::check()){
            if(\Auth::user()->is_admin){
               $data = Empresaa::select()->first();
                $this->genLog("Ingresó en panel Tienda, inf de empresa");
               return view('admin.entiti.index', compact('data'));
           }else{
            \Auth::logout();
            return redirect('login');
        }
    }else{
        \Auth::logout();
    }

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
   $moneda = Moneda::orderBy('id', 'asc')->lists('moneda','id');
   $iva = Iva::orderBy('id', 'asc')->lists('iva','id');
    	//dd($moneda);
   return view('admin.entiti.edit', compact('data','moneda','iva'));
}

public function update(SaveEmpresaRequest $request,$id){    
    $empresa = Empresaa::find($id);
    $certificate = $request->file('pathcertificate');
    if (!empty($certificate)) {
        $filename = $certificate->getClientOriginalExtension();
        $name = $certificate->getClientOriginalName();
        $certificate
        ->move('../certificado/',$name);
    }else{        
        //$filename = $request->get('pathcertificate');
        $name = $request->get('pathcertificate');
    }
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
    $empresa->razonsoc=$request->razonsoc; 
    $empresa->moneda_id=$request->moneda_id;
    $empresa->iva_id=$request->iva_id;
    $empresa->codestablecimiento=$request->codestablecimiento;
    $empresa->codpntemision=$request->codpntemision;
    $empresa->dirmatriz=$request->dirmatriz;
    $empresa->ambiente=$request->ambiente;
    $empresa->pathcertificate=$name;
    $updated = $empresa->save();
    $message = $updated ? 'Información actualizada correctamente': 'La información no se pudo actualizar';
    \Session::flash('flash_message', $message);

    return redirect("admin/entiti/edit");
}

public function updated(Request $request,$id){
    dd($request);
}

public function genLog($mensaje)
    {
        $area = 'Administracion';
        $logs = Svlog::log($mensaje,$area);
    }


}
