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

class FirmaController extends Controller {

    public function firma($id) {

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
            $xml->writeElement('razonSocialComprador', $perfil->name.' '.$perfil->apellidos);
            $xml->writeElement('identificacionComprador', $perfil->cedula);
            $xml->writeElement('dirEstablecimiento', $perfil->dir1 . ' - ' . $perfil->dir2);
            $xml->writeElement('totalSinImpoestos', 0);
            $xml->writeElement('totalDescuento', 0);
            $xml->startElement('totalConImpuestos');
            $xml->startElement('totalImpuesto');
            $xml->writeElement('codigo', 0);
            $xml->writeElement('codigoPorcentaje', 0);
            $xml->writeElement('baseImponible', 0);
            $xml->writeElement('tarifa', 0)
            ;
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

}
