<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RecibirWs extends Controller
{
	



	public function recibirWs($comprobante,$tipoAmbiente=1){
		$url="";
		switch($tipoAmbiente){
			case1:
			$url=CompelConfiguracion::$WsdlPruebaRecepcionComprobante;
			break;
			case2:$url=CompelConfiguracion::$WsdlProduccionRecepcionComprobante;
			break;
		}

		$params=array("xml"=>$comprobante);
		$client=new SoapClient($url);
		$result=$client->validarComprobante($params);

		if($result){
			if($result->RespuestaRecepcionComprobante){
				$result->isRecibida =$result->RespuestaRecepcionComprobante->estado ==="RECIBIDA"?true:false;
				if($result->RespuestaRecepcionComprobante->comprobantes){
					if(isset($result->RespuestaRecepcionComprobante->comprobantes->comprobante)){
						$comprobantes=$result->RespuestaRecepcionComprobante->comprobantes->comprobante;
						$result->RespuestaRecepcionComprobante->comprobantes =array();
						if(is_array($comprobantes)){
							$result->RespuestaRecepcionComprobante->comprobantes =$comprobantes;
						}else{
							$result->RespuestaRecepcionComprobante->comprobantes[0]=$comprobantes;
						}

						$result->RespuestaRecepcionComprobante->mensajesWs =array();
						$result->RespuestaRecepcionComprobante->mensajesDb =array();

						for($idxComprobante=0;$idxComprobante<count($result->RespuestaRecepcionComprobante->comprobantes);$idxComprobante++){
							$comprobante=$result->RespuestaRecepcionComprobante->comprobantes[$idxComprobante];
							if($comprobante->mensajes){
								if(isset($comprobante->mensajes->mensaje)){
									$mensajes=$comprobante->mensajes->mensaje;
									$comprobante->mensajes =array();
									if(is_array($mensajes)){
										$comprobante->mensajes =$mensajes;
									}else{
										$comprobante->mensajes[0]=$mensajes;
									}
								}

								for($idxMensaje=0;$idxMensaje<count($comprobante->mensajes);$idxMensaje++){
									$item=$comprobante->mensajes[$idxMensaje];
									$informacionAdicional=isset($item->informacionAdicional)?"\n".$item->informacionAdicional :"";
									$mensaje=$item->mensaje;
									$identificador=$item->identificador;
									$tipo=$item->tipo;
									$mensajeDB=trim("({$tipo}-{$identificador}) 
										{$mensaje}{$informacionAdicional}");
									$mensajesWs=trim("({$tipo}-{$identificador}) 
										{$mensaje}{$informacionAdicional}");
									array_push($result->RespuestaRecepcionComprobante->mensajesDb,$mensajeDB);
									array_push($result->RespuestaRecepcionComprobante->mensajesWs,$mensajesWs);
									$comprobante->mensajes[$idxMensaje]=(array)$comprobante->mensajes[$idxMensaje];
								}
							}
							$result->RespuestaRecepcionComprobante->comprobantes[$idxComprobante]=(array)$result->RespuestaRecepcionComprobante->comprobantes[$idxComprobante];
						}
					}

					$isRecibida=$result->isRecibida;
					$result=(array)$result->RespuestaRecepcionComprobante;
					$result["isRecibida"]=$isRecibida;
				}
			}
		}
		return $result;
	}



}
