@extends('store.template')
@section('content')
<script type="text/javascript">

</script>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><small>Detalle de compra </small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <section class="content invoice">
              <!-- title row -->
              <div class="row">
                <div class="col-xs-12 invoice-header">
                  <h1>
                    <small class="pull-right">Date: {{ $order->date }}</small>
                    <input type="hidden" name="claveacceso" id="claveacceso" value="{{ $codigogenerado }}"/>
                    <input type="hidden" name="rutaPdf" id="rutaPdf" value="{{ $rutaPdf }}"/>
                  </h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Tienda
                  <address>
                    <strong>{{ $dt_empress->nom }}</strong>
                    <br>{{ $dt_empress->dir }}
                    <br>{{ $dt_empress->prov }} - {{ $dt_empress->ciu }}
                    <br>{{ $dt_empress->count }}
                    <br>tlf: {{ $dt_empress->tlfun }}/{{ $dt_empress->tlfds }}
                    <br>Email: {{ $dt_empress->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Cliente
                  <address>
                    <strong>{{ $perfil->name }} {{ $perfil->apellidos }}</strong>
                    <br>{{ $perfil->dir1 }}
                    <br>{{ $perfil->dir2 }}
                    <br>tlf: {{ $perfil->telefono }}/{{ $perfil->celular }}
                    <br>Email: {{ $perfil->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Pedido </b>
                  <br>
                  <br>
                  <b>Estado del pedido :</b> {{ $order->status->statu }}
                  <br>
                  <b>Forma de pago:</b> {{ $order->paymethods->namemethod }}
                  <br>
                  <b>Entrega de pedido :</b> {{ $order->entrega }}
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-xs-12 table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Producto</th>
                        <th>Extras</th>
                        <th>Precio</th>
                        <th style="width: 59%">Cantidad</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    @foreach($cartord as $item)
                    <tbody>
                      <tr>
                        <td>
                        {{ $item->nombre }}
                        </td>
                        <td>
                        {{ $item->sizes }}<br/>
                        {{ $item->preferences }}<br/>
                        {{ $item->numbers }}<br/>
                        </td>
                        <td>{{ number_format($item->pre_ven,2) }}</td>
                        <td>{{ $item->cantt }}</td>
                        <td>${{ number_format( $item->pre_ven * $item->cantt,2 ) }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead"></p>
                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                  <p class="lead"></p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th style="width:50%">Subtotal:</th>
                          <td>${{ $cartordaux->subtotal }}</td>
                        </tr>
                        <tr>
                          <th>Iva ({{ $e_iv }}%)</th>
                          <td>${{ $cartordaux->iva }}</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td>${{ $cartordaux->total }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-xs-12">
                  <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                 </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /page content -->

@stop
