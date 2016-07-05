@extends('admin.template')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Detalle :: Pedido</h3>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Descripci&oacute;n</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  {!! Form::model($pedidoshow, array('route' => array('admin.sales.edit', $pedidoshow->id))) !!}
                    <input type="hidden" name="_method" value="PUT">
                    <section class="content invoice">
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                        <h1>
                            <i class="fa fa-globe"></i> Pedido.
                              <small class="pull-right">Date: {{ $pedidoshow->date }}</small>
                            </h1>
                        </div>
                      <!-- /.col -->
                      </div>

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
                  <b>Estado del pedido :</b> {{ $pedidoshow->status->statu }}
                  <br>                   
                  <br>
                  <b>Forma de pago:</b> {{ $pedidoshow->paymethods->namemethod }}
                  <br>
                  <b>Entrega de pedido :</b> {{ $pedidoshow->entrega }}
                      </div>
                      <!-- /.col -->

                      </div>



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



                    <!-- row -->

                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-xs-6">
                        
                      </div>
                      <!-- /.col -->
                      <div class="col-xs-6">
                        <p class="lead">Date: {{ $pedidoshow->date }}</p>
                        <div class="table-responsive">
                          <table class="table">
                          <tbody>
                            <tr>
                              <th style="width:50%">Subtotal:</th>
                              <td>${{ $pedidoshow->subtotal }}</td>
                            </tr>
                            <tr>
                              <th>Iva (14%)</th>
                              <td>${{ $pedidoshow->iva }}</td>
                            </tr>
                            <tr>
                              <th>Total:</th>
                              <td>${{ $pedidoshow->total }}</td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    


                    <div class="col-md-12">
                      <div class="form-group">                      
                        <a href="{{ route('admin.sales.index') }}" class="btn btn-primary">Pedidos</a>  
                        
                      </div>
                    </div>
                     <div class="row no-print">
                      <div class="col-xs-12">
                        
                      </div>
                    </div>
                  </section>
                  {{ Form::close() }}     
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- footer content -->
        @include('admin.partials.footer') 
        <!-- /footer content -->

      </div>
      <!-- /page content -->
@stop
