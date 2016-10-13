@extends('admin.template')
@section('content')



<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>                    
          <small>
            Realizar entregas
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


      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Entregas <small></small></h2>
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
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card-box table-responsive">
                  <p class="text-muted font-13 m-b-30">
                    Se encontraron  puntos de entrega.
                  </p>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Ruta</th>
                        <th>Gestión</th>
                        <th>Estado</th>
                        <th>Entrega</th>
                        <th>Pago</th>
                        <th>Valor</th>
                      </tr>
                    </thead>


                    <tbody>
                      @foreach($pedidos as $pedido)
                      <tr>
                        <td>
                          <a href="{{ route('admin.routes.show',$pedido->id) }}" class="btn btn-primary">
                            <i class="fa fa-truck"></i>
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('admin.sales.edit',$pedido->id) }}" class="btn btn-warning"> <!--edit-->
                            <i class="fa fa-pencil-square"></i>
                          </a>
                        </td>
                        <td><h3>{{ $pedido->status->statu }}</h3></td>
                        <td><h3>{{ $pedido->entrega }}</h3></td>
                        <td><h3>{{ $pedido->paymethods->namemethod }}</h3></td>
                        <td><h3>${{ number_format($pedido->total,2) }}</h3></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <!--<div id="mymap" class="google-maps"></div>-->


                  <style type="text/css">
                    .textsmall{
                      font-size: 14px;
                    }
                  </style>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

</div>
<!-- /page content -->
@stop