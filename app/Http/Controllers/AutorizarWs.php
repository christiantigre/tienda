<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//comentario de prueba

class AutorizarWs extends Controller
{

	public function autorizarWs($claveAcceso, $tipoAmbiente = 1){

		$url = "";
		switch ($tipoAmbiente) {
			case1:
			$url = CompelConfiguracion::$WsdlPruebaAutorizacionComprobante;
			break;
			
			case2:
			$url = CompelConfiguracion::$WsdlProduccionAutorizacionComprobante;
			break;
		}

		$params = array("claveAccesoComprobante"=>$claveAcceso);
		$client = new SoapClient($url);
		$result = $client->autorizacionComprobante($params);

		if($result){
			if($result->RespuestaAutorizacionComprobante){
				$result->isAutorizado = false;
				if($result->RespuestaAutorizacionComprobante->autorizaciones){
					if(isset($result->RespuestaAutorizacionComprobante->autorizaciones->autorizacion)){
						$result->RespuestaAutorizacionComprobante->autorizaciones=$autorizaciones;

					}else{
						$result->RespuestaAutorizacionComprobante->autorizaciones[0]=$autorizaciones;
					}

					$result->RespuestaAutorizacionComprobante->mensajeWs = array();
					$result->RespuestaAutorizacionComprobante->mensajeDb = array();

					$numeroComprobantes=$result->RespuestaAutorizacionComprobante->numeroComprobantes;
					array_push($result->RespuestaAutorizacionComprobante->mensajeDb, "Numero de comprobantes enviados:{$numeroComprobantes}");
					array_push($result->RespuestaAutorizacionComprobante->mensajeWs,"Numero de comprobantes enviados:{$numeroComprobantes}");

					$result->RespuestaAutorizacionComprobante->ultimoComprobanteEnviado=null;
					$result->RespuestaAutorizacionComprobante->ultimoComprobanteEnviadoFecha = null;
					for($idxAutorizacion=0;$idxAutorizacion<count($result->RespuestaAutorizacionComprobante->autorizaciones);$idxAutorizacion++){
						$autorizacion=$result->RespuestaAutorizacionComprobante->autorizaciones[$idxAutorizacion];
						$autorizacion->fechaAutorizacion =date("Y-m-d H:i:s",strtotime($autorizacion->fechaAutorizacion));
//EE: Convertir en array los mensajes
						if($autorizacion->mensajes){
							if(isset($autorizacion->mensajes->mensaje)){
								$mensajes=$autorizacion->mensajes->mensaje;
								$autorizacion->mensajes =array();
								if(is_array($mensajes)){
									$autorizacion->mensajes =$mensajes;
								}
								else
								{
									$autorizacion->mensajes[0]=$mensajes;
								}
							}

							if(!is_array($autorizacion->mensajes))$autorizacion->mensajes =(array)$autorizacion->mensajes;
							$autorizacion->mensajesDb =array();
							$autorizacion->mensajesWs =array();
							for($idxMensaje=0;$idxMensaje<count($autorizacion->mensajes);$idxMensaje++){
								$item=$autorizacion->mensajes[$idxMensaje];
								$noEnvio=$idxAutorizacion+1;
								$informacionAdicional=isset($item->informacionAicional)?"\n".$item->informacionAdicional :"";
								$mensaje=$item->mensaje;
								$identificador=$item->identificador;
								$tipo=$item->tipo;
								$mensajeDB=trim("[{$autorizacion->fechaAutorizacion}]: ({$tipo}-{$identificador}) {$mensaje}{$informacionAdicional}");
								$mensajesWs=trim("[{$autorizacion->fechaAutorizacion}]: ({$tipo}-{$identificador}) {$mensaje}{$informacionAdicional}");
								array_push($autorizacion->mensajesDb,$mensajeDB);
								array_push($autorizacion->mensajesWs,$mensajesWs);
								array_push($result->RespuestaAutorizacionComprobante->mensajesDb,trim("Envio {$noEnvio}$mensajeDB"));
								array_push($result->RespuestaAutorizacionComprobante->mensajesWs,trim("Envio {$noEnvio}$mensajesWs"));
								$autorizacion->mensajes[$idxMensaje]=(array)$autorizacion->mensajes[$idxMensaje];
							}
						}
//EE: Último envío
						if(is_null($result->RespuestaAutorizacionComprobante->ultimoComprobanteEnviado)){
							$result->RespuestaAutorizacionComprobante->ultimoComprobanteEnviado =(array)$autorizacion;
							$result->RespuestaAutorizacionComprobante->ultimoComprobanteEnviadoFecha =$autorizacion->fechaAutorizacion;
						}else{
							if($autorizacion->fechaAutorizacion >$result->RespuestaAutorizacionComprobante->ultimoComprobanteEnviadoFecha){
								$result->RespuestaAutorizacionComprobante->ultimoComprobanteEnviado =(array)$autorizacion;
								$result->RespuestaAutorizacionComprobante->ultimoComprobanteEnviadoFecha =$autorizacion->fechaAutorizacion;
							}
						}

						$isAutorizado=$autorizacion->estado =="AUTORIZADO"&&!$result->isAutorizado ?true:false;
						if($isAutorizado){$result->isAutorizado =true;
							$result->RespuestaAutorizacionComprobante->comprobanteAutorizado =$this->obtenerComprobanteAutorizado($autorizacion);
							$result->RespuestaAutorizacionComprobante->fechaAutorizacion =$autorizacion->fechaAutorizacion;
							$result->RespuestaAutorizacionComprobante->numeroAutorizacion =$autorizacion->numeroAutorizacion;
						}
						$result->RespuestaAutorizacionComprobante->autorizaciones[$idxAutorizacion]=(array)$result->
						RespuestaAutorizacionComprobante->autorizaciones[$idxAutorizacion];
					}
				}
			}
			$isAutorizado=$result->isAutorizado;
			$result=(array)$result->RespuestaAutorizacionComprobante;
			$result["isAutorizado"]=$isAutorizado;
		}
	}
	return $result;
}

}
}

}

}
