<?php

namespace App\Http\Controllers\Admin;

use App\client;
use App\Empresaa;
use App\Http\Controllers\Controller;
use App\ItemPedido;
use App\Iva;
use App\Moneda;
use App\Pedido;
use App\product;
use App\sales;
use App\statu;
use App\Svlog;
use App\user;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            if (\Auth::user()->is_admin) {
                $pedido = Pedido::orderBy('id', 'desc')->get();

                $this->genLog("Ingresó a gestión de ventas");
                return view('admin.sales.index', compact('pedido'));
            } else {
                \Auth::logout();
                return redirect('login');
            }
        } else {
            \Auth::logout();
        }
    }

    public function edit(Pedido $pedido, $id)
    {
        $empresa    = new Empresaa;
        $cliva      = new Iva;
        $reliva     = $empresa->select()->where('id', '=', 1)->first();
        $valiva     = $cliva->select()->where('id', '=', $reliva->iva_id)->first();
        $iv         = $valiva->iva;
        $valor      = $iv + 100;
        $obtnvl     = $valor / 100;
        $pedido     = Pedido::select()->where('id', '=', $id)->first();
        $item       = ItemPedido::where('pedido_id', '=', $pedido->id)->orderBy('id', 'asc')->get();
        $perfil     = client::select()->where('id', '=', $pedido->users_id)->get();
        $dt_empress = Empresaa::select()->get();
        $status     = statu::orderBy('id', 'asc')->lists('statu', 'id');
        $this->genLog("Ingresó a editar venta #" . $pedido->id);

        return view('admin.sales.edit', compact('pedido', 'item', 'perfil', 'dt_empress', 'status', 'iv'));
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::orderBy('id', 'desc')->get();
        $p      = Pedido::find($id);
        $data   = ['status_id' => $request->get('status_id')];
        if ($data['status_id'] === '8') {
            $this->generaArchivos($id);
        }
        $cliva    = new Iva;
        $empresa  = new Empresaa;
        $e_reliva = $empresa->select()->where('id', '=', 1)->first();
        $e_valiva = $cliva->select()->where('id', '=', $e_reliva->iva_id)->first();
        $iv       = $e_valiva->iva;
        $p->fill($data);
        $updated    = $p->save();
        $pedidoshow = Pedido::select()->where('id', '=', $id)->first();
        $item       = ItemPedido::where('pedido_id', '=', $id)->orderBy('id', 'asc')->get();
        $perfil     = client::select()->where('id', '=', $p->users_id)->get();
        $dt_empress = Empresaa::select()->get();
        $message    = $updated ? 'Pedido actualizado correctamente' : 'El pedido no se pudo actualizar';
        $this->genLog("Actualizó a venta #" . $id);
        return view('admin.sales.show', compact('pedidoshow', 'item', 'perfil', 'dt_empress', 'iv'));
    }

    public function generaArchivos($id)
    {
        $sales          = \DB::table('sales')->where('pedido_id', '=', $id)->get();
        $factura        = $this->generanumerofactura();
        $claveacceso    = $this->generaclaveacceso($factura);
        $verificador    = $this->generaDigitoModulo11($claveacceso);
        $codigogenerado = $claveacceso . '' . $verificador . '';
        $sale           = sales::create(
            ['pedido_id'  => $id,
                'numfactura'  => $factura,
                'claveacceso' => $codigogenerado,
                'gen_xml'     => '0',
                'fir_xml'     => '0',
                'aut_xml'     => '0',
                'convrt_ride' => '0',
                'send_xml'    => '0',
                'send_pdf'    => '0']);
        $this->generaXml($id);
        $this->firmarXml($codigogenerado);
        $this->genLog("Se generó archivo xml " . $id);
        return view('admin.sales.factura', compact('sales'));
    }

    public function show(Pedido $pedido, $id)
    {
        $pedidoshow = Pedido::select()->where('id', '=', $id)->first();
        $item       = ItemPedido::where('pedido_id', '=', $pedidoshow->id)->orderBy('id', 'asc')->get();
        $perfil     = client::select()->where('id', '=', $pedidoshow->users_id)->get();
        $dt_empress = Empresaa::select()->get();
        $status     = statu::orderBy('id', 'asc')->lists('statu', 'id');
        $empresa    = new Empresaa;
        $cliva      = new Iva;
        $reliva     = $empresa->select()->where('id', '=', 1)->first();
        $valiva     = $cliva->select()->where('id', '=', $reliva->iva_id)->first();
        $iv         = $valiva->iva;
        $valor      = $iv + 100;
        $obtnvl     = $valor / 100;
        $this->genLog("Visualizó venta #" . $pedido->id);
        return view('admin.sales.show', compact('pedidoshow', 'item', 'perfil', 'dt_empress', 'status', 'iv'));
    }

    public function sendxml($claveacceso)
    {
        $sales = \DB::table('sales')->where('claveacceso', '=', $claveacceso)->get();
        $this->sendEmail($claveacceso);
        $this->genLog("Envió archivo xml" . $claveacceso);
        return view('admin.sales.factura', compact('sales'));
    }

    public function sendpdf($claveacceso)
    {
        $sales = \DB::table('sales')->where('claveacceso', '=', $claveacceso)->get();
        $this->sendEmail($claveacceso);
        $this->genLog("Envió archivo pdf" . $claveacceso);
        return view('admin.sales.factura', compact('sales'));
    }

    public function factura($idpedido)
    {

        $sales = \DB::table('sales')->where('pedido_id', '=', $idpedido)->get();
        $this->genLog("Visualizó factura de venta #" . $idpedido);
        return view('admin.sales.factura', compact('sales'));
    }

    public function sendEmail($clavedeacceso)
    {
        $dt_empress  = new Empresaa;
        $the_sales   = new sales;
        $the_user    = new User;
        $the_pedido  = new pedido;
        $the_cliente = new client;
        $empresa     = $dt_empress->select()->first();
        $sales       = $the_sales->select()->where('claveacceso', '=', $clavedeacceso)->first();

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

                $message = 'Enviado correctamente';
            } else {
                \DB::table('sales')
                    ->where('claveacceso', $clavedeacceso)
                    ->update(['send_pdf' => '0']);
                $message = 'No se pudo enviar correctamente';
            }
        } else {
            \DB::table('sales')
                ->where('claveacceso', $clavedeacceso)
                ->update(['send_xml' => '0']);
            $message = 'No se pudo enviar correctamente';
        }
        return view('admin.sales.factura', compact('sales'));
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
 
    public function firmarXml($nombrexml)
    {
        $dt_empress    = Empresaa::select()->first();
        dd($dt_empress);
        $rutai         = public_path();
        $ruta          = str_replace("\\", "//", $rutai);
        $rout          = $this->makeDir('firmados');
        $rout          = $this->makeDir('noautorizados');
        $rout          = $this->makeDir('autorizados');
        $rout          = $this->makeDir('temp');
        $rout          = $this->makeDir('pdf');
        $autorizados   = $ruta . '//archivos//' . 'autorizados' . '//';
        $enviados      = $ruta . '//' . 'enviados' . '//';
        $firmados      = $ruta . '//archivos//firmados//';
        $generados     = $ruta . '/archivos//generados' . '/';
        $noautorizados = $ruta . '//archivos//' . 'noautorizados' . '//';
        $certificado   = $ruta . '//archivos//certificado//';
        $WshShell      = new \COM("WScript.Shell");
        foreach ($dt_empress as $dt_empres) {
            $rutafirma        = $dt_empres->pathcertificate;
            $passcertificate  = $dt_empres->passcertificate;
            $pass             = '"' . $passcertificate . '"';
            $pathfirma        = '"' . $certificado . $rutafirma . '"';
            $xml              = $nombrexml . '.xml';
            $pathsalida       = $firmados;
            $pathgenerado     = $generados . $nombrexml . '.xml';
            $jar              = $ruta . '//DevelopedSignature/dist/firmaJava.jar';
            $cmd              = 'cmd /C java -jar ' . $jar . ' ' . $pathfirma . ' ' . $pass . ' ' . $pathgenerado . ' ' . $pathsalida . ' ' . $xml . ' ';
            
            $oExec            = $WshShell->Run($cmd, 0, false);
            $pathxmlfirmado   = $pathsalida . '' . $xml;
            $xmlautorizados   = $autorizados . $nombrexml . '.xml';
            $xmlNoautorizados = $noautorizados . $nombrexml . '.xml';
            \DB::table('sales')->where('claveacceso', $nombrexml)->update(['fir_xml' => '1']);
            $this->enviarautorizar($pathxmlfirmado, $nombrexml, $xmlautorizados, $xmlNoautorizados);
        }
    }

    public function enviarautorizar($pathXmlFirmado, $claveAcceso, $autorizados, $rechazados)
    {
        $start_time       = microtime(true);
        $rutai            = public_path();
        $ruta             = str_replace("\\", "//", $rutai);
        $WshShell         = new \COM("WScript.Shell");
        $linkRecepcion    = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl";
        $linkAutorizacion = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl";
        $jar              = $ruta . '//SRI//dist//SRI.jar';
        $cmd              = 'cmd /C java -jar ' . $jar . ' ' . $pathXmlFirmado . ' ' . $claveAcceso . ' ' . $autorizados . ' ' . $rechazados . ' ' . $linkRecepcion . ' ' . $linkAutorizacion . ' ';
        $oExec            = $WshShell->Run($cmd, 0, false);
        if ($oExec == '0') {
            \DB::table('sales')
                ->where('claveacceso', $claveAcceso)
                ->update(['aut_xml' => '1']);
            sleep(30);
            $this->revisarXml($claveAcceso);
        } else {
            \DB::table('sales')
                ->where('claveacceso', $claveAcceso)
                ->update(['aut_xml' => '0']);
        }

    }

    public function revisarXml($claveacceso)
    {
        $claveAcceso = $claveacceso;
        $rutai       = public_path();
        $ruta        = str_replace("\\", "\\", $rutai);
        //$xmlPath = "C:\\xampp\\htdocs\\repositoriotesis\\tesis\\tienla\\public\\archivos\\autorizados\\".$claveAcceso.".xml";
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
                \DB::table('sales')
                    ->where('claveacceso', $claveAcceso)
                    ->update(['num_autoriz' => $numAut, 'fech_autoriz' => $fechAut, 'estado_aprob' => $estado]);
                $this->generaPdf($claveAcceso);
            } else {
                $fechAut = $doc->getElementsByTagName("fechaAutorizacion")->item(0)->nodeValue;
                $mensaje = $doc->getElementsByTagName("mensajes")->item(0)->nodeValue;
                $estado  = "NO AUTORIZADO";
                \DB::table('sales')
                    ->where('claveacceso', $claveAcceso)
                    ->update(['mensaje' => $mensaje, 'fech_autoriz' => $fechAut, 'estado_aprob' => $estado]);
            }
        } else {
            $this->firmarXml($claveacceso);
            $message = 'Se ha generado correctamente el comprobante electrónico.';

            \Session::flash('flash_message', $message);
        }

    }

    public function generaPdf($claveacceso)
    {
        $rutai          = public_path();
        $ruta           = str_replace("\\", "//", $rutai);
        $rutasl         = str_replace("\\", "\\", $rutai);
        $dt_empress     = Empresaa::select()->get();
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
        //$pdf->save("C:\\xampp\\htdocs\\repositoriotesis\\tesis\\tienla\\public\\archivos\\pdf\\".$claveAcceso.".pdf");
        $pdf->save($rutasl . "\\archivos\\pdf\\" . $claveAcceso . ".pdf");

        $rutaPdf = $ruta . "//archivos//pdf//" . $claveAcceso . ".pdf";
        $pdf->save($rutaPdf);
        if (file_exists($rutaPdf)) {
            \DB::table('sales')
                ->where('claveacceso', $claveAcceso)
                ->update(['convrt_ride' => '1']);
            $this->sendEmail($claveAcceso);
        } else {
            $this->firmarXml($claveAcceso);
        }
    }

    private function generaXml($idpedido)
    {
        //$this->deleteDir("autorizados");
        $pedidoshow = Pedido::select()->where('id', '=', $idpedido)->first();
        $items      = ItemPedido::where('pedido_id', '=', $pedidoshow->id)->orderBy('id', 'asc')->get();
        $perfils    = client::select()->where('id', '=', $pedidoshow->users_id)->get();
        $sale       = sales::select('claveacceso', 'numfactura')->where('pedido_id', '=', $idpedido)->first();

        $dt_empress = Empresaa::select()->get();

        $xml     = new \DomDocument('1.0', 'UTF-8');
        $factura = $xml->createElement('factura');
        $factura->setAttribute('id', 'comprobante');
        $factura->setAttribute('version', '1.0.0');
        $factura = $xml->appendChild($factura);

        $infoTributaria = $xml->createElement('infoTributaria');
        $infoTributaria = $factura->appendChild($infoTributaria);

        foreach ($dt_empress as $dt_empres) {
            $ambiente = $xml->createElement('ambiente', $dt_empres->ambiente);
            $ambiente = $infoTributaria->appendChild($ambiente);

            $tipoEmision = $xml->createElement('tipoEmision', '1');
            $tipoEmision = $infoTributaria->appendChild($tipoEmision);

            $razonSocial = $xml->createElement('razonSocial', $dt_empres->prop);
            $razonSocial = $infoTributaria->appendChild($razonSocial);

            $nombreComercial = $xml->createElement('nombreComercial', $dt_empres->nom);
            $nombreComercial = $infoTributaria->appendChild($nombreComercial);

            $ruc = $xml->createElement('ruc', $dt_empres->ruc);
            $ruc = $infoTributaria->appendChild($ruc);

            $claveAcceso = $xml->createElement('claveAcceso', $sale->claveacceso);
            $claveAcceso = $infoTributaria->appendChild($claveAcceso);

            $codDoc = $xml->createElement('codDoc', '01');
            $codDoc = $infoTributaria->appendChild($codDoc);

            $estab = $xml->createElement('estab', $dt_empres->codestablecimiento);
            $estab = $infoTributaria->appendChild($estab);

            $ptoEmi = $xml->createElement('ptoEmi', $dt_empres->codpntemision);
            $ptoEmi = $infoTributaria->appendChild($ptoEmi);

            $secuencial = $xml->createElement('secuencial', $sale->numfactura);
            $secuencial = $infoTributaria->appendChild($secuencial);

            $dirMatriz = $xml->createElement('dirMatriz', $dt_empres->dirmatriz);
            $dirMatriz = $infoTributaria->appendChild($dirMatriz);
        }

        foreach ($perfils as $perfil) {

            $cedula = $dt_empres->cedula;
            $ruc    = $dt_empres->ruc;
            if (!empty($ruc)) {
                $identificacion = '04'; //ruc
                $id             = $ruc;
            } elseif (!empty($cedula)) {
                $identificacion = '05'; //cedula
                $id             = $cedula;
            }

            $tabiva          = Iva::select()->where('id', $dt_empres->iva_id)->first();
            $monedas         = Moneda::select()->where('id', $dt_empres->moneda_id)->first();
            $iva             = $tabiva->iva;
            $codporcentaje   = $tabiva->codporcentaje;
            $tarifa          = $iva * 1;
            $valor           = $iva + 100;
            $obtnvl          = $valor / 100;
            $totalfactura    = $pedidoshow->total;
            $valsinimpuestos = $totalfactura / $obtnvl;

            $valor = $totalfactura - $valsinimpuestos;

            $infoFactura = $xml->createElement('infoFactura');
            $infoFactura = $factura->appendChild($infoFactura);

            $fechaEmision = $xml->createElement('fechaEmision', $pedidoshow->date);
            $fechaEmision = $infoFactura->appendChild($fechaEmision);

            $dirEstablecimiento = $xml->createElement('dirEstablecimiento', $dt_empres->dir);
            $dirEstablecimiento = $infoFactura->appendChild($dirEstablecimiento);
            if ($dt_empres->obligadocontbl == 0) {
                $obligado = "NO";
            } else {
                $obligado = "SI";
            }

            $obligadoContabilidad = $xml->createElement('obligadoContabilidad', $obligado);
            $obligadoContabilidad = $infoFactura->appendChild($obligadoContabilidad);

            $tipoIdentificacionComprador = $xml->createElement('tipoIdentificacionComprador', $identificacion);
            $tipoIdentificacionComprador = $infoFactura->appendChild($tipoIdentificacionComprador);

            $razonSocialComprador = $xml->createElement('razonSocialComprador', $perfil->name . ' ' . $perfil->apellidos);
            $razonSocialComprador = $infoFactura->appendChild($razonSocialComprador);

            $identificacionComprador = $xml->createElement('identificacionComprador', $id);
            $identificacionComprador = $infoFactura->appendChild($identificacionComprador);

            $totalSinImpuestos = $xml->createElement('totalSinImpuestos', number_format($valsinimpuestos, 2, '.', ','));
            $totalSinImpuestos = $infoFactura->appendChild($totalSinImpuestos);

            $totalDescuento = $xml->createElement('totalDescuento', $pedidoshow->descuento);
            $totalDescuento = $infoFactura->appendChild($totalDescuento);

            $totalConImpuestos = $xml->createElement('totalConImpuestos');
            $totalConImpuestos = $infoFactura->appendChild($totalConImpuestos);

            $totalImpuesto = $xml->createElement('totalImpuesto');
            $totalImpuesto = $totalConImpuestos->appendChild($totalImpuesto);

            $codigo = $xml->createElement('codigo', '2');
            $codigo = $totalImpuesto->appendChild($codigo);

            $codigoPorcentaje = $xml->createElement('codigoPorcentaje', $codporcentaje);
            $codigoPorcentaje = $totalImpuesto->appendChild($codigoPorcentaje);

            $baseImponible = $xml->createElement('baseImponible', number_format($valsinimpuestos, 2, '.', ','));
            $baseImponible = $totalImpuesto->appendChild($baseImponible);

            $tarifa = $xml->createElement('tarifa', $tarifa);
            $tarifa = $totalImpuesto->appendChild($tarifa);

            $valor = $xml->createElement('valor', number_format($valor, 2, '.', ','));
            $valor = $totalImpuesto->appendChild($valor);

            $propina = $xml->createElement('propina', number_format($pedidoshow->propina, 2, '.', ','));
            $propina = $infoFactura->appendChild($propina);

            $importeTotal = $xml->createElement('importeTotal', $totalfactura);
            $importeTotal = $infoFactura->appendChild($importeTotal);

            $moneda = $xml->createElement('moneda', $monedas->moneda);
            $moneda = $infoFactura->appendChild($moneda);

            $pagos = $xml->createElement('pagos');
            $pagos = $infoFactura->appendChild($pagos);

            $pago = $xml->createElement('pago');
            $pago = $pagos->appendChild($pago);

            $formaPago = $xml->createElement('formaPago', '01');
            $formaPago = $pago->appendChild($formaPago);

            $total = $xml->createElement('total', number_format($totalfactura, 2, '.', ','));
            $total = $pago->appendChild($total);
        }

        $detalles = $xml->createElement('detalles');
        $detalles = $factura->appendChild($detalles);
        foreach ($items as $item) {
            $product = product::select()->where('id', '=', $item->products_id)->first();
            $detalle = $xml->createElement('detalle');
            $detalle = $detalles->appendChild($detalle);

            $codigoPrincipal = $xml->createElement('codigoPrincipal', $product->slug);
            $codigoPrincipal = $detalle->appendChild($codigoPrincipal);

            $codigoAuxiliar = $xml->createElement('codigoAuxiliar', $product->id);
            $codigoAuxiliar = $detalle->appendChild($codigoAuxiliar);

            $descripcion = $xml->createElement('descripcion', $product->prgr_tittle);
            $descripcion = $detalle->appendChild($descripcion);

            $cantidadproducto = $item->cant;
            $precioventa      = ($product->pre_ven * $cantidadproducto);

            $cantidad       = $xml->createElement('cantidad', $cantidadproducto);
            $cantidad       = $detalle->appendChild($cantidad);
            $productoprecio = $product->pre_ven;
            $valsiniv       = $productoprecio / $obtnvl;
            $ivcero         = $iva / 100;
            $valiv          = $valsiniv * $ivcero;

            $precioUnitario = $xml->createElement('precioUnitario', number_format($valsiniv, 2, '.', ','));
            $precioUnitario = $detalle->appendChild($precioUnitario);

            $descuento = $xml->createElement('descuento', $item->descuento);
            $descuento = $detalle->appendChild($descuento);

            $totsininpuesto = $precioventa * $cantidadproducto;
            $sinInp         = ($valsiniv * $cantidadproducto);

            //$precioTotalSinImpuesto = $xml->createElement('precioTotalSinImpuesto',number_format($valsinimpuestos, 2, '.', ','));
            $precioTotalSinImpuesto = $xml->createElement('precioTotalSinImpuesto', number_format($sinInp, 2, '.', ','));
            $precioTotalSinImpuesto = $detalle->appendChild($precioTotalSinImpuesto);

            $impuestos = $xml->createElement('impuestos');
            $impuestos = $detalle->appendChild($impuestos);

            $impuesto = $xml->createElement('impuesto');
            $impuesto = $impuestos->appendChild($impuesto);

            $codigo = $xml->createElement('codigo', '2');
            $codigo = $impuesto->appendChild($codigo);

            $codigoPorcentaje = $xml->createElement('codigoPorcentaje', $codporcentaje);
            $codigoPorcentaje = $impuesto->appendChild($codigoPorcentaje);

            $tarifa = $xml->createElement('tarifa', $iva);
            $tarifa = $impuesto->appendChild($tarifa);

            //$baseImponible = $xml->createElement('baseImponible',number_format($valsinimpuestos, 2, '.', ','));
            $baseImponible = $xml->createElement('baseImponible', number_format($sinInp, 2, '.', ','));
            $baseImponible = $impuesto->appendChild($baseImponible);

            $totivaval = $valiv * $cantidadproducto;

            $valor = $xml->createElement('valor', number_format($totivaval, 2, '.', ','));
            $valor = $impuesto->appendChild($valor);
        }

        $infoAdicional = $xml->createElement('infoAdicional');
        $infoAdicional = $factura->appendChild($infoAdicional);
        foreach ($perfils as $adicionalperson) {
            $campoAdicional = $xml->createElement('campoAdicional', $adicionalperson->dir1 . ' y ' . $adicionalperson->dir2);
            $campoAdicional->setAttribute('nombre', 'Direccion');
            $campoAdicional = $infoAdicional->appendChild($campoAdicional);

            $campoAdicional = $xml->createElement('campoAdicional', $adicionalperson->telefono);
            $campoAdicional->setAttribute('nombre', 'Telefono');
            $campoAdicional = $infoAdicional->appendChild($campoAdicional);

            $campoAdicional = $xml->createElement('campoAdicional', $adicionalperson->email);
            $campoAdicional->setAttribute('nombre', 'Email');
            $campoAdicional = $infoAdicional->appendChild($campoAdicional);
        }

        $xml->formatOutput = true;
        $el_xml            = $xml->saveXML();
        \DB::table('sales')
            ->where('pedido_id', $idpedido)
            ->update(['gen_xml' => '1']);

        $rout = $this->makeDir('generados');
        $xml->save('archivos/generados/' . $sale->claveacceso . '.xml');

        htmlentities($el_xml);
        return response($el_xml)->header('Content-Type', 'text/xml');
    }

    public function generaclaveacceso($factura)
    {
        //fecha
        $date           = Carbon::now();
        $date->timezone = new \DateTimeZone('America/Guayaquil');
        //$date = $date->format('d/m/Y');
        $d     = $date->format('d');
        $m     = $date->format('m');
        $y     = $date->format('Y');
        $fecha = $d . '' . $m . '' . $y;
        //tipo comprobante
        $tipocmprobante = '01';
        //ruc
        $dt_empress = Empresaa::select()->first();
        $ruc        = $dt_empress->ruc;
        //ambiente
        $ambiente = $dt_empress->ambiente;
        //serie de factura = odigo establecimiento concatenado codigogo punto de emision
        $codestab      = $dt_empress->codestablecimiento;
        $codpntemision = $dt_empress->codpntemision;
        $cod           = $codestab . '' . $codpntemision;
        //serie factura
        $seriefac = $cod;
        //Numero factura
        $numerofactura = $factura;
        //numero cualquiera 8
        $random           = $this->randomlongitud(8);
        $numerocualquiera = $random;
        //tipo emision
        $tipoemision   = '1';
        $clavedeacceso = $fecha . '' . $tipocmprobante . '' . $ruc . '' . $ambiente . '' . $seriefac . '' . $numerofactura . '' . $numerocualquiera . '' . $tipoemision;
        //$verificador = $this->generaDigitoModulo11($clavedeacceso);
        //dd($clavedeacceso);
        $clavedeacceso = $clavedeacceso; //.''.$verificador;
        return $clavedeacceso;
        //dd($clavedeacceso);
    }
    public function generanumerofactura()
    {
        $contsales = \DB::table('sales')->count();
        $sales     = $contsales + 1;
        $longitud  = strlen($sales);
        if ($longitud == 1) {
            $factura = "00000000" . $sales;
        } elseif ($longitud == 2) {
            $factura = "0000000" . $sales;
        } elseif ($longitud == 3) {
            $factura = "000000" . $sales;
        } elseif ($longitud == 4) {
            $factura = "00000" . $sales;
        } elseif ($longitud == 5) {
            $factura = "0000" . $sales;
        } elseif ($longitud == 6) {
            $factura = "000" . $sales;
        } elseif ($longitud == 7) {
            $factura = "00" . $sales;
        } elseif ($longitud == 8) {
            $factura = "0" . $sales;
        } elseif ($longitud == 9) {
            $factura = "" . $sales;
        }

        return $factura;
    }

    public function randomlongitud($longitud)
    {
        $generado   = '';
        $collection = '123456789';
        $max        = strlen($collection) - 1;
        for ($i = 0; $i < $longitud; $i++) {
            $generado .= $collection{mt_rand(0, $max)};
        }

        return $generado;
    }

    public function generaDigitoModulo11($cadena)
    {
        $cadena            = trim($cadena);
        $baseMultiplicador = 7;
        $aux               = new \SplFixedArray(strlen($cadena));
        $aux               = $aux->toArray();
        $multiplicador     = 2;
        $total             = 0;
        $verificador       = 0;
        for ($i = count($aux) - 1; $i >= 0; --$i) {
            $aux[$i] = substr($cadena, $i, 1);
            $aux[$i] *= $multiplicador;
            ++$multiplicador;
            if ($multiplicador > $baseMultiplicador) {
                $multiplicador = 2;
            }
            $total += $aux[$i];
        }

        if (($total == 0) || ($total == 1)) {
            $verificador = 0;
        } else {
            $verificador = (11 - ($total % 11) == 11) ? 0 : 11 - ($total % 11);
        }

        if ($verificador == 10) {
            $verificador = 1;
        }
        return $verificador;
    }

    public function makeDir($nameDir)
    {
        $rutai = public_path();
        $ruta  = str_replace("\\", "\\", $rutai);
        $dir   = $ruta . '\\archivos\\' . $nameDir . '';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return $dir;
    }

    public function genLog($mensaje)
    {
        $area = 'Administracion';
        //$logs = Svlog::log($mensaje, $area);
    }

}
