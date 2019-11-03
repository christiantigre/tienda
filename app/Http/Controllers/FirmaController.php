<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecurityKey;
use Orchestra\Parser\Xml\Facade as XmlParser;
//use sasco\LibreDTE\FirmaElectronica;
use App\Http\Requests;
use App\User;
use App\Pedido;
use App\ItemPedido;
use App\client;
use App\Empresaa;
use App\product;

//use sasco\LibreDTE\FirmaElectronica;

class FirmaController extends Controller
{

    public function firma($id)
    {

        $pedidoshow = Pedido::select()->where('id', '=', $id)->first();
        $items = ItemPedido::where('pedido_id', '=', $pedidoshow->id)->orderBy('id', 'asc')->get();
        $perfils = client::select()->where('id', '=', $pedidoshow->users_id)->get();
        $dt_empress = Empresaa::select()->get();
        //                ::load('./path/to/file/factura.xml');
        //        dd($item);dd($id); 
        //        $users = User::all();
        $xml = new \XMLWriter('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        $xml->openMemory('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        $xml->writeAttribute('version', '1.0');
        $xml->writeAttribute('encoding', 'utf-8');
        $xml->writeAttribute('standalone', 'yes');
        $xml->startDocument("1.1");
        $xml->setIndent(true);
        //        $xml->writeRaw('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">');
        $xml->startElement('factura');
        $xml->writeAttribute('id', 'comprobante');
        $xml->writeAttribute('version', '1.0.0');
        foreach ($dt_empress as $dt_empres) {
            $xml->startElement('infoTributaria');
            $xml->writeElement('ambiente', $dt_empres->ambiente);
            $xml->writeElement('tipoEmision', 1);
            $xml->writeElement('razonSocial', $dt_empres->prop);
            $xml->writeElement('nombreComercial', $dt_empres->nom);
            $xml->writeElement('ruc', $dt_empres->ruc);
            $xml->writeElement('claveAcceso', 1);
            $xml->writeElement('codDoc', 01);
            $xml->writeElement('estab', $dt_empres->codestablecimiento);
            $xml->writeElement('ptoEmi', $dt_empres->codpntemision);
            $xml->writeElement('secuencial', 1);
            $xml->writeElement('dirMatriz', $dt_empres->dirmatriz);
            $xml->endElement();
        }
        foreach ($perfils as $perfil) {
            $xml->startElement('infoFactura');
            $xml->writeElement('fechaEmision', $pedidoshow->date);
            $xml->writeElement('dirEstablecimiento', $dt_empres->dir);
            $xml->writeElement('contribuyenteEspecial', 0);
            $xml->writeElement('obligadoContabilidad', 0);
            $xml->writeElement('tipoIdentificacionComprador', 0);
            $xml->writeElement('razonSocialComprador', $perfil->name . ' ' . $perfil->apellidos);
            $xml->writeElement('identificacionComprador', $perfil->cedula);
            $xml->writeElement('dirEstablecimiento', $perfil->dir1 . ' - ' . $perfil->dir2);
            $xml->writeElement('totalSinImpoestos', 0);
            $xml->writeElement('totalDescuento', 0);
            $xml->startElement('totalConImpuestos');
            $xml->startElement('totalImpuesto');
            $xml->writeElement('codigo', 0);
            $xml->writeElement('codigoPorcentaje', 0);
            $xml->writeElement('baseImponible', 0);
            $xml->writeElement('tarifa', 0);
            $xml->writeElement('valor', 0);
            $xml->endElement();
            $xml->endElement();
            $xml->writeElement('propina', 0);
            $xml->writeElement('importeTotal', 0);
            $xml->writeElement('moneda', 0);
            $xml->startElement('pagos');
            $xml->startElement('pago');
            $xml->writeElement('formaPago', 0);
            $xml->writeElement('total', 0);
            $xml->writeElement('plazo', 0);
            $xml->writeElement('unidadTiempo', 0);
            $xml->endElement();
            $xml->endElement();
            $xml->endElement();
        }
        $xml->startElement('detalles');
        foreach ($items as $item) {
            $product = product::select()->where('id', '=', $item->products_id)->first();
            $xml->startElement('detalle');
            $xml->writeElement('codigoPrincipal', $product->id);
            $xml->writeElement('codigoAuxiliar', $product->id);
            $xml->writeElement('descripcion', $product->prgr_tittle);
            $xml->writeElement('unidadMedida', 0);
            $xml->writeElement('cantidad', $item->cant);
            $xml->writeElement('precioUnitario', $product->pre_ven);
            $xml->writeElement('descuento', '0');
            $xml->writeElement('precioTotalSinImpuestos', $product->pre_ven);
            $xml->writeElement('impuesto', '0');
            //            $xml->writeElement('precioTotalSinImpuestos', number_format( $item->prec * $item->cant,2 ) );
            //            $xml->writeElement('')
            //            $xml->writeDtdElement('codigoAuxiliar', $item->id);
            $xml->endDtdElement();
            //            $xml->writeAttribute('codigoPrincipal', $item->id);
            //            $xml->writeAttribute('products_id', $item->products_id);
            //            $xml->writeAttribute('prec', $item->prec);
            //            $xml->writeAttribute('cant', $item->cant);
            $xml->endElement();
        }
        $xml->endElement();
        $xml->endDocument();
        $content = $xml->outputMemory();
        $content->save('ruta/archivo.xml');
        $xml = null;
        return response($content)->header('Content-Type', 'text/xml');
    }

    public function realizarFirmaXml($nombrexml)
    {
        set_time_limit(0);
        $dt_empres    = Empresaa::select()->first();

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

        $rutafirma        = $dt_empres->pathcertificate;
        $passcertificate  = $dt_empres->passcertificate;
        $pass             = '"' . $passcertificate . '"';
        $pathfirma        = '"' . $certificado . $rutafirma . '"';
        $xml              = $nombrexml . '.xml';
        $pathsalida       = $firmados;
        $pathgenerado     = $generados . $nombrexml . '.xml';
        $jar              = $ruta . '//DevelopedSignature/dist/firmaJava.jar';
        $output = '';
        try {
            $cmd_exec              = 'java -jar ' . $jar . ' ' . $pathfirma . ' ' . $pass . ' ' . $pathgenerado . ' ' . $pathsalida . ' ' . $xml . ' ';
            exec($cmd_exec, $output);
            \Log::info('output');
            \Log::info($output);
        } catch (\Exception $e) {
            $output = 'error';
        }
        $pathxmlfirmado   = $pathsalida . '' . $xml;
        $xmlautorizados   = $autorizados . $nombrexml . '.xml';
        $xmlNoautorizados = $noautorizados . $nombrexml . '.xml';
        if (count($output) > 0) {
            if (is_file($pathxmlfirmado)) {
                \DB::table('sales')->where('claveacceso', $nombrexml)->update(['fir_xml' => '1']);
                return [
                    'firmado' => true,
                    'message' => 'Archivo generado.',
                    'pathxmlfirmado' => $pathxmlfirmado,
                    'nombrexml' => $nombrexml,
                    'xmlautorizados' => $xmlautorizados,
                    'xmlNoautorizados' => $xmlNoautorizados,
                ];
            }
            return ['firmado' => false, 'message' => 'Archivo no generado.'];
        } else {
            return ['firmado' => false, 'message' => 'Error al generar el archivo.'];
        }
    }

    public function autorizarXml($pathXmlFirmado, $claveAcceso, $autorizados, $rechazados)
    {

        set_time_limit(0);

        $rutai         = public_path();
        $ruta          = str_replace("\\", "//", $rutai);

        $jar              = $ruta . '//DevelopedSignature/dist/firmaJava.jar';
        $output = '';
        try {
            $linkRecepcion    = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl";
            $linkAutorizacion = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl";
            $jar              = $ruta . '//SRI//dist//SRI.jar';
            $cmd_exec              = 'java -jar ' . $jar . ' ' . $pathXmlFirmado . ' ' . $claveAcceso . ' ' . $autorizados . ' ' . $rechazados . ' ' . $linkRecepcion . ' ' . $linkAutorizacion . ' ';

            exec($cmd_exec, $output);
            $oExec = 1;
            \Log::info('output');
            \Log::info($output);
        } catch (\Exception $e) {
            $output = 'error';
            $oExec = 0;
        }
        if ($oExec == '0') {
            \DB::table('sales')
                ->where('claveacceso', $claveAcceso)
                ->update(['aut_xml' => '1']);
            //  sleep(30);
            //  $this->revisarXml($claveAcceso);
            return ['autorizado' => true, 'message' => 'Combrobante autorizado'];
        } else {
            \DB::table('sales')
                ->where('claveacceso', $claveAcceso)
                ->update(['aut_xml' => '0']);
            return ['autorizado' => false, 'message' => 'Combrobante no autorizado'];
        }
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

    public function archivoFirmado($claveAcceso){
        \DB::table('sales')
            ->where('claveacceso', $claveAcceso)
            ->update(['fir_xml' => '1']);  
    }
    
    public function archivoNoFirmado($claveAcceso){
        \DB::table('sales')
            ->where('claveacceso', $claveAcceso)
            ->update(['fir_xml' => '0']);  
    }
}
