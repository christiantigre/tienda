@extends('admin.template')
@section('content')
  <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Detalle
                    <small>
                        de pedido
                    </small>
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            {!! Form::model($pedido, array('route' => array('admin.sales.update', $pedido->id))) !!}
            <input type="hidden" name="_method" value="PUT">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> <small>Gestión</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                        <h1>
                                        <i class="fa fa-globe"></i> Pedido.
                                        <small class="pull-right">Date: {{ $pedido->date }}</small>
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
                  @foreach($perfil as $perfils)
                  <strong>{{ $perfils->name }} {{ $perfils->apellidos }}</strong>
                  <br>{{ $perfils->dir1 }}
                  <br>{{ $perfils->dir2 }}
                  <br>tlf: {{ $perfils->telefono }}/{{ $perfils->celular }}
                  <br>Email: {{ $perfils->email }}
                  @endforeach
                </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Pedido </b>
                  <br>
                  <br>
                  <b>Estado del pedido :</b>{!! Form::select('status_id', $status, null,['class'=>'form-control'])    !!}
<br>
                   {{ $pedido->status->statu }}
                  <br>
                  <b>Forma de pago:</b> {{ $pedido->paymethods->namemethod }}
                  <br>
                  <b>Entrega de pedido :</b> {{ $pedido->entrega }}
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
                            <th>Precio</th>
                            <th style="width: 59%">Cantidad</th>
                            <th>Subtotal</th>
                          </tr>
                        </thead>
                        @foreach($item as $itemp)
                        <tbody>
                          <tr>
                            <td>{{ $itemp->products->nombre }}</td>
                            <td>{{ number_format($itemp->products->pre_ven,2) }}</td>
                            <td>{{ $itemp->cant }}</td>
                            <td>${{ number_format( $itemp->prec * $itemp->cant,2 ) }}</td>
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

                      </div>
                      <!-- /.col -->
                      <div class="col-xs-6">
                        <p class="lead">Date: {{ $pedido->date }}</p>
                        <div class="table-responsive">
                          <table class="table">
                          <tbody>
                            <tr>
                              <th style="width:50%">Subtotal:</th>
                              <td>${{ $pedido->subtotal }}</td>
                            </tr>
                            <tr>
                              <th>Iva ({{ $e_iv }}%)</th>
                              <td>${{ $pedido->iva }}</td>
                            </tr>
                            <tr>
                              <th>Total:</th>
                              <td>${{ $pedido->total }}</td>
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

                        {!! Form::submit('Actualizar', array('class'=>'btn btn-success')) !!}
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
          {{ Form::close() }}
        </div>



      </div>
      <!-- /page content -->
@stop
