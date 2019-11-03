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
use Illuminate\Support\Facades\Input;

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
   return view('admin.entiti.edit', compact('data','moneda','iva'));
}


public function update(SaveEmpresaRequest $request,$id){    
    $empresa = Empresaa::findOrFail($id);    

    if ($request->hasFile('pathcertificate')) {
            $file = $request->file('pathcertificate');
            $filename = $file->getClientOriginalName();
            $fileextencion = $file->getClientOriginalExtension();
            try {             
                if($file->move(public_path().'/archivos/certificado/',$filename) ){
                    $empresa['pathcertificate'] = $filename;
                    \Log::info("Certificado subida.");
                }else{
                    \Log::info("No se pudo subir este certificado.");
                }
            } catch (\Exception $e) {
                \Log::info("Certificado no subido: ".$e);
            }
        }

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $fileextencion = $file->getClientOriginalExtension();
            try {             
                if($file->move(public_path().'/upload/',$filename) ){
                    $empresa['img'] = $filename;
                    \Log::info("Imagen subida.");
                }else{
                    \Log::info("No se pudo subir este archivo.");
                }
            } catch (\Exception $e) {
                \Log::info("Imagen no subida : ".$e);
            }
        }

    $empresa['nom']=$request->nom;
    $empresa['email']=$request->email;  
    $empresa['ruc']=$request->ruc;          
    $empresa['tlfun']=$request->tlfun;  
    $empresa['tlfds']=$request->tlfds;  
    $empresa['fax']=$request->fax;  
    $empresa['cel']=$request->cel;  
    $empresa['dir']=$request->dir;  
    $empresa['pagweb']=$request->pagweb;  
    $empresa['ln']=$request->ln;  
    $empresa['lg']=$request->lg;  
    $empresa['prop']=$request->prop;  
    $empresa['gernt']=$request->gernt;  
    $empresa['observ']=$request->observ;  
    $empresa['razonsoc']=$request->razonsoc; 
    $empresa['moneda_id']=$request->moneda_id;
    $empresa['iva_id']=$request->iva_id;
    $empresa['codestablecimiento']=$request->codestablecimiento;
    $empresa['codpntemision']=$request->codpntemision;
    $empresa['dirmatriz']=$request->dirmatriz;
    $empresa['ambiente']=$request->ambiente;
    $empresa['fecha_caduca']=$request->fecha_caduca;
    $empresa['passcertificate']=$request->passcertificate;
    $empresa['enlace_recepcion']=$request->enlace_recepcion;
    $empresa['enlace_autorizacion']=$request->enlace_autorizacion;
    $updated = $empresa->save();
    $message = $updated ? 'Información actualizada correctamente': 'La información no se pudo actualizar';
    \Session::flash('flash_message', $message);

    return redirect("admin/entiti/edit");
}

public function geolocalizacion(Request $request){
    $empresa = Empresaa::first(); 
    return view("admin/entiti/edit_geo", compact('empresa') );
}

public function geolocalizacion_update(Request $request,$id){   
    return "datos";
}

public function updated(Request $request,$id){
    dd($request);
}

public function genLog($mensaje)
    {
        $area = 'Administracion';
        //$logs = Svlog::log($mensaje,$area);
    }


}
