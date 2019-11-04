<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

use App\Empresaa;
use Carbon\Carbon;

class developerAlertController extends Controller
{
    
    // notificacion por email errores causados el tiempo de ejecucion.
    //	'alert_developer','alert_incidencias'
    // tipo , mantenimiento y incidencia
    public function alertaDeveloperMantenimiento($sms, $tipo)
    {
        $dt_empress            = new Empresaa;
        
        $empresa               = $dt_empress->select()->first();
        
        $data['empresa']       = $emp       = $empresa->nom;
        $data['tlfun']         = $tlfun         = $empresa->tlfun;
        $data['tlfds']         = $tlfds         = $empresa->tlfds;
        $data['cel']           = $cel           = $empresa->cel;
        $data['dir']           = $dir           = $empresa->dir;
        $data['pagweb']        = $pagweb        = $empresa->pagweb;
        $data['email']         = $email         = $empresa->email;
        $data['count']         = $count         = $empresa->count;
        $data['ciu']           = $ciu           = $empresa->ciu;
        
        $data['tipo']           = $tipo;
        $data['mensaje']           = $sms;
        $data['hora']           = Carbon::now();

        if($tipo === 'mantenimiento'){
	        $data['destino']         = $empresa->alert_developer;
        }else{
	        $data['destino']         = $empresa->alert_incidencias;
        }
       
                \Mail::send("emails.mantenimientos", ['data' => $data], function ($message) use ($data) {
                    $message->to($data['destino'], "s/n")
                        ->subject("Mantemimiento sistema.");
                });
        
    }

}
