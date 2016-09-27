<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Random;
use App\Http\Requests;
use App\Product;
use App\client;
use App\PayMethod;
use App\Pedido;
use App\ItemPedido;
use App\Empresaa;
use App\statu;
use App\Iva;
use App\sales;
use App\Moneda;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class CarritoController extends Controller
{
    public function __construct(){
      if(!\Session::has('cart')) \Session::put('cart', array());
  }

  public function show(){
    if(\Auth::check()){
        $empresa = new Empresaa;
        $cliva = new Iva;
        $reliva = $empresa->select()->where('id', '=', 1)->first();  
        $valiva = $cliva->select()->where('id', '=', $reliva->iva_id)->first();
        $iv = $valiva->iva;
        $valor = $iv+100;
        $obtnvl = $valor/100;

        $cart = \Session::get('cart');
        $subtot=0;
        $total = $this->total();

        $sub=$total/($obtnvl);

        $iva=$sub-$total;
        $iva = str_replace('-', '', $iva);
        $mensaje = "Recuerde que por sus compras mayores a $70.00 dólares, no te cobraremos el precio de envío...";
        return view('store.partials.car', compact('cart', 'sub', 'total','iva','mensaje','iv'));
    }else{
        return abort(444);
    }
}

public function add(Product $product,Request $request){
    if(Auth::check()){
        $id_us = Auth::user()->id;
        $client = new client;    
        $perfil = $client->select()->where('users_id', '=', $id_us)->first();    
        $ced = $perfil->cedula;
        if(!empty ( $ced )){
            $tamano = $request->get("tamano");
            $color = $request->get("color");
            $numero = $request->get("numero");
            $cantidadprod = $request->get("cantidadprod");            
            $cart = \Session::get('cart');  
            $product->cantt = $cantidadprod;    
            $product->sizes = $tamano;    
            $product->preferences = $color;    
            $product->numbers = $numero;    
            $cart[$product->slug] = $product;
            \Session::put('cart', $cart);
            \Session::flash('success','Se agregó '.$cantidadprod.' producto(s) a su canasto');
            //$cont = count($cart);
            $cont = $this->contItem();
            
            \Session::put('items',$cont);
                return redirect()->route('home','cant');//cart-show
            }else{            
                $message = 'Su información aún no ha sido completada, por favor completa la información de tu perfíl para que puedas realizar tus compras.';
                \Session::flash('flash_message', $message);
                return  redirect()->route('store.perfil.edit',$id_us);
            }
        }else{
            $message = 'Porfavor iniciar sessión.';
            //\Session::flash('flash_message', $message);
            \Session::flash('warning',$message);            

            return redirect()->guest('login');
            //return redirect()->route('home','cant');//cart-show
        }
    }

    public function delete(Product $product){
        $cart = \Session::get('cart');
        unset($cart[$product->slug]);
        \Session::put('cart', $cart);
        $cont = $this->contItem();
        \Session::put('items',$cont);
        \Session::flash('info','Se eliminó un producto');            
        return redirect()->route('cart-show');
    }
    
    public function update(Product $product, $cantt)
    {
        $cart = \Session::get('cart');
        $cart[$product->slug]->cantt = $cantt;
        \Session::put('cart', $cart);
        return redirect()->route('cart-show');
    }

    public function trash(){
        \Session::forget('cart');
        \Session::put('items', 0);
        \Session::flash('warning','Su canasto esta vacío');            
        return redirect()->route('cart-show');
    }

    private function total(){
    	$cart = \Session::get('cart');
    	$total = 0;
    	foreach($cart as $item){
    		$total += $item->pre_ven * $item->cantt;
    	}

      return $total;
  }

  public function contItem(){
    $cont = 0;
    $cart = \Session::get('cart');
    //$cont = 0;
    //foreach($cart as $item){
    //    $cont += $item;
    //}
    $cont = count($cart);
    if($cont>0){
        return $cont;
    }else{
        return $cont=0;
    }
    
}

public function orderDetail(Request $request, $idus){
    if(Auth::check()){

        $client = new client;
        $empresaa = new Empresaa;
        if (count(\Session::get('cart')) <= 0 ) return redirect()->route('home');
        $pays = PayMethod::orderBy('id', 'desc')->lists('namemethod','id');
        $cart = \Session::get('cart');
        $total = $this->total();
        $sub=$total/1.14;
        $iva=$sub*(14/100);
        $perfil = $client->select()->where('users_id', '=', $idus)->first();
        $dt_empress = $empresaa->select()->first();
        //dd($dt_empress);
        return view('store.partials.order-detal', compact('cart','total','sub','iva','perfil','pays','dt_empress'));

        \Session::forget('cart');
        /*return "Detalle del pedido";*/
    }else{
        return abort(444);
    }
}

public function saveOrder(Request $request){
    $id_us = Auth::user()->id;
    $total=0;
    $cart = \Session::get('cart');

    foreach($cart as $item){
        $total += $item->pre_ven * $item->cantt;
    }

    $sub=$total/1.14;
    $iva=$sub*(14/100);

    if ($total>70) {
        $var='8';
        $message = 'Su pedido fue realizado con éxito, su factura será enviada a su correo electrónico';
        //guardar en ventas
    }else{
        $var='1';
        $message = 'Su pedido fue realizado con éxito, porfavor espere su aprovación';
    }

    $date = Carbon::now();
    $date->timezone = new \DateTimeZone('America/Guayaquil');
    $date = $date->format('d/m/Y');
//  date('d/m/Y')
    $order = Pedido::create([
        'subtotal' => $sub,
        'total' => $total,
        'iva' => $iva,
        'entrega' => $request->get('entrega'),
        'ubiclg' => $request->get('lat'),
        'ubiclt' => $request->get('long'),
        'date' => $date,
        'users_id' => $id_us,
        'status_id' => $var,
        'paymethods_id' => $request->get('id')
        ]);

    foreach ($cart as $product) {
        $this->saveOrderItem($product,$order->id);
    }

    if($var==8){
     $factura = $this->generanumerofactura();
     $claveacceso = $this->generaclaveacceso($factura);
     $verificador = $this->generaDigitoModulo11($claveacceso);
     $codigogenerado = $claveacceso.''.$verificador.'';
     $sale = sales::create(
        [
        'pedido_id'=>$order->id,
        'numfactura'=>$factura,
        'claveacceso'=>$codigogenerado
        ]);
    //Genera XML
     $this->generaXml($order->id);
     //firma xml
     $this->firmarXml($codigogenerado);
    //dd($codigogenerado);
 }


 \Session::flash('flash_message', $message);        
 $empresaa = new Empresaa;
 $dt_empress = $empresaa->select()->first();
 $client = new client;
 $perfil = $client->select()->where('users_id', '=', $id_us)->first();
 $itemCar = new ItemPedido;
 $cartord = $itemCar->select()->where('pedido_id', '=', $order->id)->first();
 $cartord = \Session::get('cart');
 $cartordaux = $order->select()->where('id', '=', $order->id)->first();
 /*dd($cartordaux);*/
 return view('store.partials.detallsale',compact('order','dt_empress','perfil','cartord','cartordaux'));
}

public function generaXml($idpedido){
    $pedidoshow = Pedido::select()->where('id', '=', $idpedido)->first();
    $items = ItemPedido::where('pedido_id', '=', $pedidoshow->id)->orderBy('id', 'asc')->get();
    $perfils = client::select()->where('id', '=', $pedidoshow->users_id)->get();
    $sale = sales::select('claveacceso','numfactura')->where('pedido_id', '=', $idpedido)->first();

    $dt_empress = Empresaa::select()->get();

    $xml = new \DomDocument('1.0', 'UTF-8');
    $factura = $xml->createElement('factura');  
    $factura->setAttribute('id','comprobante');
    $factura->setAttribute('version','1.0.0');
    $factura = $xml->appendChild($factura);

    $infoTributaria = $xml->createElement('infoTributaria');
    $infoTributaria = $factura->appendChild($infoTributaria);

    foreach ($dt_empress as $dt_empres) {
        $ambiente = $xml->createElement('ambiente',$dt_empres->ambiente);
        $ambiente = $infoTributaria->appendChild($ambiente);

        $tipoEmision = $xml->createElement('tipoEmision','1');
        $tipoEmision = $infoTributaria->appendChild($tipoEmision);

        $razonSocial = $xml->createElement('razonSocial',$dt_empres->prop);
        $razonSocial = $infoTributaria->appendChild($razonSocial);

        $nombreComercial = $xml->createElement('nombreComercial',$dt_empres->nom);
        $nombreComercial = $infoTributaria->appendChild($nombreComercial);

        $ruc = $xml->createElement('ruc',$dt_empres->ruc);
        $ruc = $infoTributaria->appendChild($ruc);

        $claveAcceso = $xml->createElement('claveAcceso',$sale->claveacceso);
        $claveAcceso = $infoTributaria->appendChild($claveAcceso);

        $codDoc = $xml->createElement('codDoc','01');
        $codDoc = $infoTributaria->appendChild($codDoc);

        $estab = $xml->createElement('estab',$dt_empres->codestablecimiento);
        $estab = $infoTributaria->appendChild($estab);

        $ptoEmi = $xml->createElement('ptoEmi',$dt_empres->codpntemision);
        $ptoEmi = $infoTributaria->appendChild($ptoEmi);

        $secuencial = $xml->createElement('secuencial',$sale->numfactura);
        $secuencial = $infoTributaria->appendChild($secuencial);
        
        $dirMatriz = $xml->createElement('dirMatriz',$dt_empres->dirmatriz);
        $dirMatriz = $infoTributaria->appendChild($dirMatriz);
    }

    foreach ($perfils as $perfil) {

        $cedula = $dt_empres->cedula;
        $ruc = $dt_empres->ruc;
        if(!empty($ruc)){
           $identificacion = '04'; //ruc
           $id = $ruc;
       }elseif(!empty($cedula)){
           $identificacion = '05'; //cedula
           $id = $cedula;
       }

       $tabiva = Iva::select()->where('id',$dt_empres->iva_id)->first();
       $monedas = Moneda::select()->where('id',$dt_empres->moneda_id)->first();
       $iva = $tabiva->iva;
       $codporcentaje = $tabiva->codporcentaje;
       $tarifa = $iva*1;
       $valor = $iva+100;
       $obtnvl = $valor/100;
       $totalfactura = $pedidoshow->total;
       $valsinimpuestos = $totalfactura/$obtnvl;

       $valor = $totalfactura-$valsinimpuestos;

       $infoFactura = $xml->createElement('infoFactura');
       $infoFactura = $factura->appendChild($infoFactura);

       $fechaEmision = $xml->createElement('fechaEmision',$pedidoshow->date);
       $fechaEmision = $infoFactura->appendChild($fechaEmision);

       $dirEstablecimiento = $xml->createElement('dirEstablecimiento',$dt_empres->dir);
       $dirEstablecimiento = $infoFactura->appendChild($dirEstablecimiento);
       if ($dt_empres->obligadocontbl==0) {
           $obligado = "NO";
       } else {
           $obligado = "SI";           
       }


       $obligadoContabilidad = $xml->createElement('obligadoContabilidad',$obligado);
       $obligadoContabilidad = $infoFactura->appendChild($obligadoContabilidad);

       $tipoIdentificacionComprador = $xml->createElement('tipoIdentificacionComprador',$identificacion);
       $tipoIdentificacionComprador = $infoFactura->appendChild($tipoIdentificacionComprador);

       $razonSocialComprador = $xml->createElement('razonSocialComprador',$perfil->name.' '.$perfil->apellidos);
       $razonSocialComprador = $infoFactura->appendChild($razonSocialComprador);

       $identificacionComprador = $xml->createElement('identificacionComprador',$id);
       $identificacionComprador = $infoFactura->appendChild($identificacionComprador);

       $totalSinImpuestos = $xml->createElement('totalSinImpuestos',number_format($valsinimpuestos, 2, '.', ','));
       $totalSinImpuestos = $infoFactura->appendChild($totalSinImpuestos);

       $totalDescuento = $xml->createElement('totalDescuento',$pedidoshow->descuento);
       $totalDescuento = $infoFactura->appendChild($totalDescuento);

       $totalConImpuestos = $xml->createElement('totalConImpuestos');
       $totalConImpuestos = $infoFactura->appendChild($totalConImpuestos);

       $totalImpuesto = $xml->createElement('totalImpuesto');
       $totalImpuesto = $totalConImpuestos->appendChild($totalImpuesto);

       $codigo = $xml->createElement('codigo','2');
       $codigo = $totalImpuesto->appendChild($codigo);

       $codigoPorcentaje = $xml->createElement('codigoPorcentaje',$codporcentaje);
       $codigoPorcentaje = $totalImpuesto->appendChild($codigoPorcentaje);

       $baseImponible = $xml->createElement('baseImponible',number_format($valsinimpuestos, 2, '.', ','));
       $baseImponible = $totalImpuesto->appendChild($baseImponible);

       $tarifa = $xml->createElement('tarifa',$tarifa);
       $tarifa = $totalImpuesto->appendChild($tarifa);

       $valor = $xml->createElement('valor',number_format($valor, 2, '.', ','));
       $valor = $totalImpuesto->appendChild($valor);

       $propina = $xml->createElement('propina',number_format($pedidoshow->propina, 2, '.', ','));
       $propina = $infoFactura->appendChild($propina);

       $importeTotal = $xml->createElement('importeTotal',$totalfactura);
       $importeTotal = $infoFactura->appendChild($importeTotal);

       $moneda = $xml->createElement('moneda',$monedas->moneda);
       $moneda = $infoFactura->appendChild($moneda);

       $pagos = $xml->createElement('pagos');
       $pagos = $infoFactura->appendChild($pagos);

       $pago = $xml->createElement('pago');
       $pago = $pagos->appendChild($pago);

       $formaPago = $xml->createElement('formaPago','01');
       $formaPago = $pago->appendChild($formaPago);                

       $total = $xml->createElement('total',number_format($totalfactura, 2, '.', ','));
       $total = $pago->appendChild($total);           
   }

   $detalles = $xml->createElement('detalles');
   $detalles = $factura->appendChild($detalles);
   foreach ($items as $item) {
    $product = product::select()->where('id', '=', $item->products_id)->first();
    $detalle = $xml->createElement('detalle');
    $detalle = $detalles->appendChild($detalle);

    $codigoPrincipal = $xml->createElement('codigoPrincipal',$product->slug);
    $codigoPrincipal = $detalle->appendChild($codigoPrincipal); 

    $codigoAuxiliar = $xml->createElement('codigoAuxiliar',$product->id);
    $codigoAuxiliar = $detalle->appendChild($codigoAuxiliar);

    $descripcion = $xml->createElement('descripcion',$product->prgr_tittle);
    $descripcion = $detalle->appendChild($descripcion);  

    $cantidadproducto = $item->cant;
    $precioventa = ($product->pre_ven * $cantidadproducto);

    $cantidad = $xml->createElement('cantidad',$cantidadproducto);
    $cantidad = $detalle->appendChild($cantidad); 
    $productoprecio = $product->pre_ven;
    $valsiniv = $productoprecio / $obtnvl;
    $ivcero = $iva / 100; 
    $valiv = $valsiniv * $ivcero;

    $precioUnitario = $xml->createElement('precioUnitario',$valsiniv);
    $precioUnitario = $detalle->appendChild($precioUnitario); 

    $descuento = $xml->createElement('descuento',$item->descuento);
    $descuento = $detalle->appendChild($descuento); 

    $totsininpuesto = $precioventa*$cantidadproducto;

    $precioTotalSinImpuesto = $xml->createElement('precioTotalSinImpuesto',number_format($valsinimpuestos, 2, '.', ','));
    $precioTotalSinImpuesto = $detalle->appendChild($precioTotalSinImpuesto);

    $impuestos = $xml->createElement('impuestos');
    $impuestos = $detalle->appendChild($impuestos); 

    $impuesto = $xml->createElement('impuesto');
    $impuesto = $impuestos->appendChild($impuesto); 

    $codigo = $xml->createElement('codigo','2');
    $codigo = $impuesto->appendChild($codigo);

    $codigoPorcentaje = $xml->createElement('codigoPorcentaje',$codporcentaje);
    $codigoPorcentaje = $impuesto->appendChild($codigoPorcentaje);

    $tarifa = $xml->createElement('tarifa',$iva);
    $tarifa = $impuesto->appendChild($tarifa);

    $baseImponible = $xml->createElement('baseImponible',number_format($valsinimpuestos, 2, '.', ','));
    $baseImponible = $impuesto->appendChild($baseImponible);

    $totivaval = $valiv*$cantidadproducto;

    $valor= $xml->createElement('valor',number_format($totivaval, 2, '.', ','));
    $valor= $impuesto->appendChild($valor);   
}

$infoAdicional = $xml->createElement('infoAdicional');
$infoAdicional = $factura->appendChild($infoAdicional);
foreach ($perfils as $adicionalperson) {
    $campoAdicional = $xml->createElement('campoAdicional',$adicionalperson->dir1.' y '.$adicionalperson->dir2);
    $campoAdicional->setAttribute('nombre','Dirección');
    $campoAdicional = $infoAdicional->appendChild($campoAdicional);

    $campoAdicional = $xml->createElement('campoAdicional',$adicionalperson->telefono);
    $campoAdicional->setAttribute('nombre','Teléfono');        
    $campoAdicional = $infoAdicional->appendChild($campoAdicional);

    $campoAdicional = $xml->createElement('campoAdicional',$adicionalperson->email);
    $campoAdicional->setAttribute('nombre','Email');
    $campoAdicional = $infoAdicional->appendChild($campoAdicional);
}

$xml->formatOutput = true;
$el_xml = $xml->saveXML();
$xml->save('archivos/generados/'.$sale->claveacceso.'.xml');

htmlentities($el_xml);
return response($el_xml)->header('Content-Type', 'text/xml');   
}

public function firmarXml($nombrexml){
    $dt_empress = Empresaa::select()->get();
    $rutai = public_path();
    $ruta = str_replace("\\", "//", $rutai);
    $autorizados = $ruta.'/'.'autorizados'.'/';
    $enviados = $ruta.'/'.'enviados'.'/';
    $firmados = $ruta.'//archivos//firmados//';
    $generados = $ruta.'/archivos//generados'.'/';
    $noautorizados = $ruta.'/'.'noautorizados'.'/';
    $certificado = $ruta.'//archivos//certificado//';
    $WshShell = new \COM("WScript.Shell");
    foreach ($dt_empress as $dt_empres) {
        $rutafirma = $dt_empres->pathcertificate;
        $passcertificate = $dt_empres->passcertificate;
        $pass = '"'.$passcertificate.'"';
        $pathfirma = '"'.$certificado.$rutafirma.'"';
        $xml = $nombrexml.'.xml';
        $pathsalida = $firmados;
        $pathgenerado = $generados.$nombrexml.'.xml';
        $jar = $ruta.'//DevelopedSignature/dist/firmaJava.jar';
        //$cmd = 'cmd /C java -jar C:/DevelopedSignature/dist/firmaJava.jar '.$pathfirma.' '.$pass.' '.$pathgenerado.' '.$pathsalida.' '.$xml.' ';
        $cmd = 'cmd /C java -jar '.$jar.' '.$pathfirma.' '.$pass.' '.$pathgenerado.' '.$pathsalida.' '.$xml.' ';
        $oExec = $WshShell->Run($cmd, 0, false);    
    }
}

public function enviarautorizar(){
  
}

protected function saveOrderItem($product, $order_id){
    ItemPedido::create([
        'products_id' => $product->id,
        'cant' => $product->cantt,
        'prec' => $product->pre_ven,
        'pedido_id' => $order_id,
        'size'=>$product->sizes,
        'preference'=>$product->preferences,
        'number'=>$product->numbers
        ]);
}

public function firmar(){
    return "Firmar";
}

public function generanumerofactura(){
    $contsales = \DB::table('sales')->count();
    $sales = $contsales+1;
    $longitud = strlen($sales);
    if($longitud==1)
        $factura = "00000000".$sales;
    elseif ($longitud==2)
        $factura = "0000000".$sales;
    elseif ($longitud == 3)
        $factura = "000000".$sales;
    elseif ($longitud == 4)
        $factura = "00000".$sales;
    elseif ($longitud == 5)
        $factura = "0000".$sales;
    elseif ($longitud == 6)
        $factura = "000".$sales;
    elseif ($longitud == 7)
        $factura = "00".$sales;
    elseif ($longitud == 8)
        $factura = "0".$sales;
    elseif ($longitud == 9)
        $factura = "".$sales; 
    return $factura;
}

public function randomlongitud($longitud){
    $generado = '';
    $collection = '123456789';
    $max = strlen($collection) - 1;
    for ($i = 0; $i < $longitud; $i++)
        $generado .= $collection{mt_rand(0, $max)};
    return $generado;
}

public function generaclaveacceso($factura){
    //fecha
    $date = Carbon::now();
    $date->timezone = new \DateTimeZone('America/Guayaquil');
    //$date = $date->format('d/m/Y');
    $d = $date->format('d');
    $m = $date->format('m');
    $y = $date->format('Y');
    $fecha = $d.''.$m.''.$y;
    //tipo comprobante
    $tipocmprobante = '01';
    //ruc
    $dt_empress = Empresaa::select()->first();
    $ruc = $dt_empress->ruc;
    //ambiente
    $ambiente = $dt_empress->ambiente;
    //serie de factura = odigo establecimiento concatenado codigogo punto de emision
    $codestab = $dt_empress->codestablecimiento;
    $codpntemision = $dt_empress->codpntemision;
    $cod = $codestab.''.$codpntemision;
    //serie factura
    $seriefac = $cod;
    //Numero factura
    $numerofactura = $factura;
    //numero cualquiera 8
    $random = $this->randomlongitud(8);
    $numerocualquiera = $random;
    //tipo emision
    $tipoemision = '1';
    $clavedeacceso = $fecha.''.$tipocmprobante.''.$ruc.''.$ambiente.''.$seriefac.''.$numerofactura.''.$numerocualquiera.''.$tipoemision;
    //$verificador = $this->generaDigitoModulo11($clavedeacceso);
    //dd($clavedeacceso);
    $clavedeacceso = $clavedeacceso;//.''.$verificador;
    return $clavedeacceso;
    //dd($clavedeacceso);
}

public function generaDigitoModulo11($cadena){
    $cadena = trim($cadena);
    $baseMultiplicador =7;
    $aux=new \SplFixedArray(strlen($cadena));
    $aux=$aux->toArray();
    $multiplicador=2;
    $total=0;
    $verificador=0;
    for($i=count($aux)-1;$i>=0;--$i){
        $aux[$i]=substr($cadena,$i,1);
        $aux[$i]*=$multiplicador;
        ++$multiplicador;
        if($multiplicador>$baseMultiplicador){
            $multiplicador=2;
        }
        $total+=$aux[$i];
    }

    if(($total==0)||($total==1))$verificador=0;else{
        $verificador=(11-($total%11)==11)?0:11-($total%11);
    }

    if($verificador==10){
        $verificador=1;
    }
    return $verificador;
}

public function recibirWs(){

}


}
