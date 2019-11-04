<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\sales;
use App\Empresaa;
use Carbon\Carbon;
        use App\User;
        use App\pedido;
        use App\client;
        use App\ItemPedido;
use Mail;

class SriController extends Controller
{
    
    public function enviarAutorizar( $claveAcceso)
    {
        $dt_empres = Empresaa::select()->first();
        
        $start_time       = microtime(true);
        $rutai            = public_path();
        $ruta             = str_replace("\\", "//", $rutai);
        
        $pathXmlFirmado      = $ruta . '//archivos//firmados//'.$claveAcceso.'.xml';
        $autorizados   = $ruta . '//archivos//' . 'autorizados' . '//'.$claveAcceso.'.xml';
        $rechazados = $ruta . '//archivos//' . 'noautorizados' . '//'.$claveAcceso.'.xml';
        // ambiente 1=pruebas 2=produccion
        if($dt_empres['ambiente']===1){
            $linkRecepcion    =$dt_empres['enlace_recepcion'];
            $linkAutorizacion = $dt_empres['enlace_autorizacion'];
        }else{
            $linkRecepcion    =$dt_empres['enlace_recepcion'];
            $linkAutorizacion = $dt_empres['enlace_autorizacion'];
        }
        
        try {
            
            $jar              = $ruta . '//SRI//dist//SRI.jar';
            $cmd_exec              = 'cmd /C java -jar ' . $jar . ' ' . $pathXmlFirmado . ' ' . $claveAcceso . ' ' . $autorizados . ' ' . $rechazados . ' ' . $linkRecepcion . ' ' . $linkAutorizacion . ' ';
            
            exec($cmd_exec, $output);
            $res['estado'] = $output[0];            
        } catch (\Exception $e) {
            $res['estado'] = 'No se pudo enviar a autorizar.';
            \Log::info('log res autorizacion sri');
            \Log::info($e);
        }

        return $res;
        
    }

    public function archivoAutorizado($claveAcceso){
        \DB::table('sales')
            ->where('claveacceso', $claveAcceso)
            ->update(['aut_xml' => '1']);  
    }
    
    public function archivoNoAutorizado($claveAcceso){
        \DB::table('sales')
            ->where('claveacceso', $claveAcceso)
            ->update(['aut_xml' => '0']);  
    }


    public function revisarXml($claveacceso)
    {
        $claveAcceso = $claveacceso;
        $rutai       = public_path();
        $ruta        = str_replace("\\", "\\", $rutai);

        $xmlPath = $ruta . "\\archivos\\autorizados\\" . $claveAcceso . ".xml";
        if (file_exists($xmlPath)) {

            //lee el xml y decodifica
            $content        = utf8_encode(file_get_contents($xmlPath));
            $xml            = \simplexml_load_string($content);
            $cont           = (integer) $xml['counter'];
            $xml['counter'] = $cont + 1;
            //guarda temporalmente el xml decodificado
            $xml->asXML($ruta . "\\archivos\\temp\\" . $claveAcceso . ".xml");
            //obtiene los valores de los campos del archivo temporal decodificado
            $doc = new \DOMDocument();
            $doc->load($ruta . "\\archivos\\temp\\" . $claveAcceso . ".xml");
            // Reading tag's value.
            $estado = $doc->getElementsByTagName("estado")->item(0)->nodeValue;
            if ($estado == "AUTORIZADO") {
                $numAut  = $doc->getElementsByTagName("numeroAutorizacion")->item(0)->nodeValue;
                $fechAut = $doc->getElementsByTagName("fechaAutorizacion")->item(0)->nodeValue;
                $this->archivoAutorizado($claveAcceso);
                \DB::table('sales')
                    ->where('claveacceso', $claveAcceso)
                    ->update(['num_autoriz' => $numAut, 'fech_autoriz' => $fechAut, 'estado_aprob' => $estado]);
                $this->generaPdf($claveAcceso);
                $res['estado'] = $estado;
            } else {
                $fechAut = $doc->getElementsByTagName("fechaAutorizacion")->item(0)->nodeValue;
                $mensaje = $doc->getElementsByTagName("mensajes")->item(0)->nodeValue;
                $estado  = "NO AUTORIZADO";
                $this->archivoNoAutorizado($claveAcceso);
                \DB::table('sales')
                    ->where('claveacceso', $claveAcceso)
                    ->update(['mensaje' => $mensaje, 'fech_autoriz' => $fechAut, 'estado_aprob' => $estado]);
            }
            $res['estado'] = $estado;
        } else {
            $res['estado'] = 'NO ENCONTRADO';
        }
        return $res;

    }

    public function generaPdf($claveacceso)
    {
        $rutai      = public_path();
        $ruta       = str_replace("\\", "//", $rutai);
        $rutasl     = str_replace("\\", "\\", $rutai);
        $dt_empress = Empresaa::select()->get();
        //$claveAcceso = "2909201601010511850900110010010000000777687155819";
        $claveAcceso    = $claveacceso;
        $the_sales      = new sales;
        $the_user       = new User;
        $the_pedido     = new pedido;
        $the_cliente    = new client;
        $the_item       = new ItemPedido;
        $date           = Carbon::now();
        $date->timezone = new \DateTimeZone('America/Guayaquil');
        $date           = $date->format('d/m/Y');
        $sales          = $the_sales->select()->where('claveacceso', '=', $claveAcceso)->first();
        $aux_sales      = \DB::table('sales')->where('claveacceso', '=', $claveAcceso)->get();
        $orders         = $the_pedido->select()->where('id', $sales->pedido_id)->first();
        $pedidos        = \DB::table('pedido')->where('id', '=', $sales->pedido_id)->get();
        $users          = $the_user->select()->where('id', '=', $orders->users_id)->first();
        $clientes       = $the_cliente->select()->where('id', '=', $users->id)->first();
        $aux_clientes   = \DB::table('clients')->where('id', '=', $users->id)->get();
        $items          = ItemPedido::where('pedido_id', '=', $orders->id)->orderBy('id', 'asc')->get();
        $pdf            = \PDF::loadView('pdf/vista', ['dt_empress' => $dt_empress, 'aux_sales' => $aux_sales, 'aux_clientes' => $aux_clientes, 'date' => $date, 'items' => $items, 'pedidos' => $pedidos]);
        \DB::table('sales')
            ->where('claveacceso', $claveAcceso)
            ->update(['convrt_ride' => '1']);
        $pdf->save($rutasl . "\\archivos\\pdf\\" . $claveAcceso . ".pdf");
        //return $pdf->download('prueba.pdf');
        //$this->deleteDir("generados");
        //$this->deleteDir("firmados");
        //$this->deleteDir("temp");

        $rutaPdf = $ruta . "//archivos//pdf//" . $claveAcceso . ".pdf";
        //$pdf->save("C:\\xampp\\htdocs\\repositoriotesis\\tesis\\tienla\\public\\archivos\\pdf\\".$claveAcceso.".pdf");
        $pdf->save($rutaPdf);
        if (file_exists($rutaPdf)) {
            \DB::table('sales')
                ->where('claveacceso', $claveAcceso)
                ->update(['convrt_ride' => '1']);
            $this->sendEmail($claveAcceso);
        }else{
            \DB::table('sales')
                ->where('claveacceso', $claveAcceso)
                ->update(['convrt_ride' => '0']);
        }
    }


    public function sendEmail($clavedeacceso)
    {
        $dt_empress            = new Empresaa;
        $the_sales             = new sales;
        $the_user              = new User;
        $the_pedido            = new pedido;
        $the_cliente           = new client;
        $empresa               = $dt_empress->select()->first();
        $sales                 = $the_sales->select()->where('claveacceso', '=', $clavedeacceso)->first();
        $pedidos               = \DB::table('pedido')->where('id', '=', $sales->pedido_id)->get();
        $orders                = $the_pedido->select()->where('id', $sales->pedido_id)->first();
        $users                 = $the_user->select()->where('id', '=', $orders->users_id)->first();
        $clientes              = $the_cliente->select()->where('id', '=', $users->id)->first();
        $data['empresa']       = $emp       = $empresa->nom;
        $data['tlfun']         = $tlfun         = $empresa->tlfun;
        $data['tlfds']         = $tlfds         = $empresa->tlfds;
        $data['cel']           = $cel           = $empresa->cel;
        $data['dir']           = $dir           = $empresa->dir;
        $data['pagweb']        = $pagweb        = $empresa->pagweb;
        $data['email']         = $email         = $empresa->email;
        $data['count']         = $count         = $empresa->count;
        $data['ciu']           = $ciu           = $empresa->ciu;
        $data['email_cliente'] = $emailcliente = $clientes->email;
        $data['name']          = $nombrecliente          = $clientes->name;
        $rutai                 = public_path();
        $ruta                  = str_replace("\\", "//", $rutai);
        $data['xml']           = $autorizados           = $ruta . '//archivos//' . 'autorizados' . '//' . $clavedeacceso . '.xml';
        $data['pdf']           = $convertidos           = $ruta . '//archivos//' . 'pdf' . '//' . $clavedeacceso . '.pdf';
        $data['clave']         = $clavedeacceso;
        if (file_exists($autorizados)) {
            if (file_exists($convertidos)) {
                \Mail::send("emails.comprobantesMail", ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email_cliente'], "christian ")
                        ->subject("Comprobante Electrónico");
                    $rutaPdf = $data['xml'];
                    $rutaXml = $data['pdf'];
                    $message->attach($rutaXml);
                    $message->attach($rutaPdf);
                });
                \DB::table('sales')
                    ->where('claveacceso', $clavedeacceso)
                    ->update(['send_xml' => '1', 'send_pdf' => '1']);
                $pdfdelete = $clavedeacceso . ".pdf";
                $xmldelete = $clavedeacceso . ".xml";
                $this->moveFile($clavedeacceso);
                $this->deleteFile("generados", $xmldelete);
                $this->deleteFile("firmados", $xmldelete);
                $this->deleteFile("autorizados", $xmldelete);
                $this->deleteFile("noautorizados", $xmldelete);
                $this->deleteFile("temp", $xmldelete);
                $this->deleteFile("pdf", $pdfdelete);
            } else {
                \DB::table('sales')
                    ->where('claveacceso', $clavedeacceso)
                    ->update(['send_pdf' => '0']);
            }
        } else {
            \DB::table('sales')
                ->where('claveacceso', $clavedeacceso)
                ->update(['send_xml' => '0']);
        }
    }


    private function moveFile($clavedeacceso)
    {
        $rutai   = public_path();
        $ruta    = str_replace("\\", "//", $rutai);
        $origen  = $ruta . '//archivos//' . 'pdf' . '//' . $clavedeacceso . '.pdf';
        $destino = $ruta . '//archivos//' . 'enviados' . '//' . $clavedeacceso . '.pdf';
        copy($origen, $destino);
    }

    protected function deleteFile($directorio, $archivo)
    {
        $rutai   = public_path();
        $ruta    = str_replace("\\", "\\", $rutai);
        $archivo = $ruta . "\\archivos\\" . $directorio . "\\" . $archivo;
        if (file_exists($archivo)) {
            unlink($archivo);
        }
    }


}
