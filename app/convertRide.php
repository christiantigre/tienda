<?php

namespace App;
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
use App\User;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Queue;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

class convertRide extends Model
{
    public function revisarXml($claveacceso){
      //$claveAcceso = "0210201601010511850900110010010000000799134976711";
    $claveAcceso = $claveacceso;
    $xmlPath = "C:\\xampp\\htdocs\\repositoriotesis\\tesis\\tienla\\public\\archivos\\autorizados\\".$claveAcceso.".xml";
       //lee el xml y decodifica
    $content = utf8_encode(file_get_contents($xmlPath));
    $xml = \simplexml_load_string($content);
    $cont = (integer) $xml['counter'];
    $xml['counter'] = $cont + 1;
        //guarda temporalmente el xml decodificado
    $xml->asXML("C:\\xampp\\htdocs\\repositoriotesis\\tesis\\tienla\\public\\archivos\\temp\\".$claveAcceso.".xml");
        //obtiene los valores de los campos del archivo temporal decodificado
    $doc = new \DOMDocument();
    $doc->load("C:\\xampp\\htdocs\\repositoriotesis\\tesis\\tienla\\public\\archivos\\temp\\".$claveAcceso.".xml");

            // Reading tag's value.
    $estado = $doc->getElementsByTagName("estado")->item(0)->nodeValue;
    if ($estado == "AUTORIZADO") {
      $numAut = $doc->getElementsByTagName("numeroAutorizacion")->item(0)->nodeValue;
      $fechAut = $doc->getElementsByTagName("fechaAutorizacion")->item(0)->nodeValue;  
      \DB::table('sales')
      ->where('claveacceso', $claveAcceso)
      ->update(['num_autoriz' => $numAut,'fech_autoriz'=>$fechAut,'estado_aprob'=>$estado]);
      $this->generaPdf($claveAcceso); 

        //$this->deleteDir("generados");
        //$this->deleteDir("firmados");
    } else {
      $fechAut = $doc->getElementsByTagName("fechaAutorizacion")->item(0)->nodeValue;
      $mensaje = $doc->getElementsByTagName("mensajes")->item(0)->nodeValue; 
      $estado="NO AUTORIZADO";
      \DB::table('sales')
      ->where('claveacceso', $claveAcceso)
      ->update(['mensaje' => $mensaje,'fech_autoriz'=>$fechAut,'estado_aprob'=>$estado]);

        //$this->deleteDir("generados");
        //$this->deleteDir("firmados");
    } 

  }

  public function generaPdf($claveacceso){
    $dt_empress = Empresaa::select()->get();
      //$claveAcceso = "2909201601010511850900110010010000000777687155819";
    $claveAcceso = $claveacceso;
    $the_sales = new sales;
    $the_user = new User;
    $the_pedido = new pedido;
    $the_cliente = new client;
    $the_item = new ItemPedido;
    $date = Carbon::now();
    $date->timezone = new \DateTimeZone('America/Guayaquil');
    $date = $date->format('d/m/Y');
    $sales = $the_sales->select()->where('claveacceso', '=', $claveAcceso)->first();
    $aux_sales = \DB::table('sales')->where('claveacceso', '=', $claveAcceso)->get();
    $orders = $the_pedido->select()->where('id',$sales->pedido_id)->first();
    $pedidos = \DB::table('pedido')->where('id', '=', $sales->pedido_id)->get();
    $users = $the_user->select()->where('id', '=', $orders->users_id)->first();
    $clientes = $the_cliente->select()->where('id', '=', $users->id)->first();
    $aux_clientes = \DB::table('clients')->where('id', '=', $users->id)->get();
    $items = ItemPedido::where('pedido_id', '=', $orders->id)->orderBy('id', 'asc')->get();
    $pdf = \PDF::loadView('pdf/vista',['dt_empress'=>$dt_empress,'aux_sales'=>$aux_sales,'aux_clientes'=>$aux_clientes,'date'=>$date,'items'=>$items,'pedidos'=>$pedidos]);
    $pdf->save("C:\\xampp\\htdocs\\repositoriotesis\\tesis\\tienla\\public\\archivos\\pdf\\".$claveAcceso.".pdf");
      //return $pdf->download('prueba.pdf');
  }

  public function handle(){
  	\Log::info('Registrado');
  }
}
