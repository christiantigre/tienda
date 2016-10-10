<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB; 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\ItemPedido;
use App\client;
use App\Empresaa;
use App\statu;
use App\PayMethod;
use App\sales;
use App\user;


class SalesController extends Controller
{
    public function index()
    {
        if(\Auth::check()){
            if(\Auth::user()->is_admin){
             $pedido = Pedido::orderBy('id', 'desc')->get();
             return view('admin.sales.index', compact('pedido'));}else{
                \Auth::logout();
                return redirect('login');
            }
        }else{
            \Auth::logout();
        }
    }

    public function edit(Pedido $pedido, $id)
    {
        $pedido = Pedido::select()->where('id','=',$id)->first();
        $item = ItemPedido::where('pedido_id','=',$pedido->id)->orderBy('id', 'asc')->get();
        $perfil = client::select()->where('id','=',$pedido->users_id)->get();
        $dt_empress = Empresaa::select()->get();
        $status = statu::orderBy('id', 'asc')->lists('statu','id');
        return view('admin.sales.edit',compact('pedido','item','perfil','dt_empress','status'));
    }

    public function update(Request $request,$id)
    {
        $pedido = Pedido::orderBy('id', 'desc')->get();
        $p= Pedido::find($id);
        $data = [
        'status_id' => $request->get('status_id')
        ];
        $p->fill($data);
        $updated = $p->save();
        $pedidoshow = Pedido::select()->where('id','=',$id)->first();
        $item = ItemPedido::where('pedido_id','=',$id)->orderBy('id', 'asc')->get();
        $perfil = client::select()->where('id','=',$p->users_id)->get();
        $dt_empress = Empresaa::select()->get();
        $message = $updated ? 'Pedido actualizado correctamente': 'El pedido no se pudo actualizar';
        return view('admin.sales.show',compact('pedidoshow','item','perfil','dt_empress'));
        /*return view('admin.sales.index',compact('pedido'))->with('message', $message);*/
    }

    public function show(Pedido $pedido, $id)
    {
        $pedidoshow = Pedido::select()->where('id','=',$id)->first();
        $item = ItemPedido::where('pedido_id','=',$pedidoshow->id)->orderBy('id', 'asc')->get();
        $perfil = client::select()->where('id','=',$pedidoshow->users_id)->get();
        $dt_empress = Empresaa::select()->get();
        $status = statu::orderBy('id', 'asc')->lists('statu','id');
        return view('admin.sales.show',compact('pedidoshow','item','perfil','dt_empress','status'));
    }

    public function firmar()
    {
        return "firmar";        
    }

    public function autorizar()
    {
        return "autorizar";
    }

    public function conv_ride()
    {
        return "convertir ride";
    }

    public function sendxml($claveacceso)
    {
        $this->sendEmail($claveacceso);
    }

    public function sendpdf($claveacceso)
    {
        return "enviar ride";
    }

    public function factura($idpedido)
    {

      $sales = \DB::table('sales')->where('pedido_id', '=', $idpedido)->get();

        //$sales = sales::select()->where('pedido_id','=',$idpedido)->first();

        //$the_sale = new sales;
        //$sales = $the_sale->select()->where('pedido_id','=',$idpedido)->first();
      return view('admin.sales.factura',compact('sales'));
  }

  public function sendEmail($clavedeacceso)
  {
      $dt_empress = new Empresaa;
      $the_sales = new sales;
      $the_user = new User;
      $the_pedido = new pedido;
      $the_cliente = new client;
      $empresa = $dt_empress->select()->first();
      $sales = $the_sales->select()->where('claveacceso', '=', $clavedeacceso)->first();

      $pedidos = \DB::table('pedido')->where('id', '=', $sales->pedido_id)->get();
      $orders = $the_pedido->select()->where('id',$sales->pedido_id)->first();
      $users = $the_user->select()->where('id', '=', $orders->users_id)->first();
      $clientes = $the_cliente->select()->where('id', '=', $users->id)->first();
      $data['empresa'] = $emp = $empresa->nom;
      $data['tlfun'] = $tlfun = $empresa->tlfun;
      $data['tlfds'] = $tlfds = $empresa->tlfds;
      $data['cel'] = $cel = $empresa->cel;
      $data['dir'] = $dir = $empresa->dir;
      $data['pagweb'] = $pagweb = $empresa->pagweb;
      $data['email'] = $email = $empresa->email;
      $data['count'] = $count = $empresa->count;
      $data['ciu'] = $ciu = $empresa->ciu;
      $data['email_cliente'] = $emailcliente = $clientes->email;
      $data['name'] = $nombrecliente = $clientes->name;
      $rutai = public_path();
      $ruta = str_replace("\\", "//", $rutai);
      $data['xml'] = $autorizados = $ruta.'//archivos//'.'autorizados'.'//'.$clavedeacceso.'.xml';
      $data['pdf'] =         $convertidos = $ruta.'//archivos//'.'pdf'.'//'.$clavedeacceso.'.pdf';
      $data['clave'] = $clavedeacceso;
      if (file_exists($autorizados)){ 
        if (file_exists($convertidos)){ 
          \Mail::send("emails.comprobantesMail", ['data'=>$data], function($message) use($data){
            $message->to($data['email_cliente'], "christian ")
            ->subject("Comprobante Electrónico");
            $rutaPdf=$data['xml'];
            $rutaXml=$data['pdf'];
            $message->attach($rutaXml);
            $message->attach($rutaPdf);
        });
          \DB::table('sales')
          ->where('claveacceso', $clavedeacceso)
          ->update(['send_xml' => '1','send_pdf'=>'1']);
          $pdfdelete = $clavedeacceso.".pdf"; 
          $xmldelete = $clavedeacceso.".xml"; 
          $this->deleteFile("generados",$xmldelete);
          $this->deleteFile("firmados",$xmldelete);
          $this->deleteFile("autorizados",$xmldelete);
          $this->deleteFile("noautorizados",$xmldelete);
          $this->deleteFile("temp",$xmldelete);
          $this->deleteFile("pdf",$pdfdelete);
      }else{
          \DB::table('sales')
          ->where('claveacceso', $clavedeacceso)
          ->update(['send_pdf' => '0']);
      }
  }else{
    \DB::table('sales')
    ->where('claveacceso', $clavedeacceso)
    ->update(['send_xml' => '0']);
}
return view('admin.sales.factura',compact('sales'));
}

protected function deleteFile($directorio,$archivo){
    $rutai = public_path();
    $ruta = str_replace("\\", "\\", $rutai);
    $archivo = $ruta."\\archivos\\".$directorio."\\".$archivo;
    if (file_exists($archivo)) {
      unlink($archivo);
  }
}

}
