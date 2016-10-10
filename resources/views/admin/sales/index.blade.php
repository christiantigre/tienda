@extends('admin.template')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>                    
          <small>
            Pedidos
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
            <h2>Pedidos <small></small></h2>
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
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <p class="text-muted font-13 m-b-30">

                  </p>

                  <table id="datatable-keytable" class="table table-striped table-bordered">
                    <thead>
                      <tr>                              
                        <th>Ver</th>
                        <th>Rutas</th>
                        <th>Gestión</a><!--</th><a href="<th></th>">-->
                        <th>Factúra</a>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Entrega</th>
                        <th>Estado</th>
                        <th>Pago</th>
                        <th>Valor</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pedido as $emp)
                      <tr>
                        <td>
                          <a href="{{ route('admin.sales.show',$emp->id) }}" class="btn btn-default"> <!--ver-->
                            <i class="fa fa-eye"></i>
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('admin.routes.show',$emp->id) }}" class="btn btn-primary"> <!--ver-->
                            <i class="fa fa-truck"></i>
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('admin.sales.edit',$emp->id) }}" class="btn btn-warning"> <!--edit-->
                            <i class="fa fa-pencil-square"></i>
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('admin.sales.factura',$emp->id) }}"  title="VER FACTURA" class="btn btn-success"> <!--ver-->
                            <i class="fa fa-calculator"></i>
                          </a>
                        </td>
                        <td class="textsmall">{{ $emp->date }}</td> 
                        <td class="textsmall">{{ $emp->users->name }} {{ $emp->users->apellidos }}</td> 
                        <td class="textsmall">{{ $emp->entrega }}</td>
                        <td class="textsmall">{{ $emp->status->statu }}</td>
                        <td class="textsmall">{{ $emp->paymethods->namemethod }}</td>
                        <td class="textsmall">{{ $emp->total }}</td>
                      </tr>
                      @endforeach
                    </tbody>

                  </table>
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