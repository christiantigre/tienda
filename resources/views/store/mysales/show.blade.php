@extends('store.template')
@section('content')
<section id="cart_items">
  
  <div class="container">
    <div class="table-responsive cart_info">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12 invoice-header">
          <h1>
            <small class="pull-right">Date: {{ $pedidoshow->date }}</small>
          </h1>
        </div>
        <!-- /.col -->
      </div>

      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Tienda
          <address>
            @foreach($dt_empress as $dt_empres)
            <strong>{{ $dt_empres->nom }}</strong>
            <br>{{ $dt_empres->dir }}
            <br>{{ $dt_empres->prov }} - {{ $dt_empres->ciu }}
            <br>{{ $dt_empres->count }}
            <br>tlf: {{ $dt_empres->tlfun }}/{{ $dt_empres->tlfds }}
            <br>Email: {{ $dt_empres->email }}
            @endforeach
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Cliente
          <address>
            @foreach($perfil as $pr)
            <strong>{{ $pr->name }} {{ $pr->apellidos }}</strong>
            <br>{{ $pr->dir1 }}
            <br>{{ $pr->dir2 }}
            <br>tlf: {{ $pr->telefono }}/{{ $pr->celular }}
            <br>Email: {{ $pr->email }}
            @endforeach
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Pedido </b>
          <br>
          <br>
          <b>Estado del pedido :</b> {{ $pedidoshow->status->statu }}
          <br>
          <b>Forma de pago:</b> {{ $pedidoshow->paymethods->namemethod }}
          <br>
          <b>Entrega de pedido :</b> {{ $pedidoshow->entrega }}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      

      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="price">Producto</td>
            <td class="price">Extras</td>
            <td class="price">Precio</td>
            <td class="price">Cantidad</td>
            <td class="price">Total</td>
            <td></td>
          </tr>
        </thead>                   
        <tbody>
          @foreach($item as $it)
          <tr>
            <td class="cart_price"><p><h5>{{ $it->products->nombre }}</h5></p></td>
            <td class="cart_price"><p>
              <h5>{{ $it->size }}</h5>
              <h5>{{ $it->preference }}</h5>
              <h5>{{ $it->number }}</h5>
            </p></td>
            <td class="cart_price"><p><h5>{{ number_format($it->products->pre_ven,2) }}</h5></p></td>
            <td class="cart_price"><p><h5>{{ $it->cant }}</h5></p></td>
            <td class="cart_price"><p><h5>${{ number_format( $it->prec * $it->cant,2 ) }}</h5></p></td>
          </tr>                      
          @endforeach
          <tr>
            <td colspan="4">&nbsp;</td>
            <td colspan="2">
              <table class="table table-condensed total-result">
                <tr>
                  <td><h5>Sub Total</h5></td>
                  <td><h5>${{ $pedidoshow->subtotal }}</h5></td>
                </tr>
                <tr>
                  <td><h5>Iva (14%)</h5></td>
                  <td><h5>${{ $pedidoshow->iva }}</h5></td>
                </tr>
                <tr>
                  <td><h5>Total</h5></td>
                  <td><span><h5>${{ $pedidoshow->total }}</h5></span></td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>

      




    </div>
  </div>
  
</section> <!--/#cart_items-->
@stop
