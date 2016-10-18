@extends('admin.template')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Detalle :: Cliente</h3>
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
            {!! Form::model($clientes, array('route' => array('admin.clients.update', $clientes->id))) !!}
            <div class="col-md-7 col-sm-7 col-xs-12">
              <div class="product-image">
                @if($clientes->path=="")
                <img src="/upload/user.png" alt="img" />
                @elseif($clientes->path!="")
                <img src="/upload/{{ $clientes->path }}" alt="img" />
                @endif
              </div>
              <div class="product_gallery">
              </div>
            </div>

            <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

              <h3 class="prod_title">{{ $clientes->name }} {{ $clientes->apellidos }}</h3>

              <div class="col-md-12 col-sm-12 col-xs-12 animated fadeInDown">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i>{{ $clientes->nom_compania }}</i></h4>
                    <div class="left col-xs-7">
                      <p><i class="fa fa-at"></i><strong>Email : </strong> {{ $clientes->email }} </p>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-phone"></i> Tlfn : {{ $clientes->telefono }} </li>
                        <li><i class="fa fa-phone"></i> Cell : {{ $clientes->celular }} </li>
                        <li><i class="fa fa-fax"></i> C.I. : {{ $clientes->cecula }} </li>
                        <li><i class="fa fa-edit"></i> Ruc : {{ $clientes->ruc }} </li>
                        <li><i class="fa fa-automobile"></i> Direccion : {{ $clientes->dir1 }} {{ $clientes->dir2 }}</li>


                      </ul>
                    </div>

                    <div class="right col-xs-5 text-center">
                      @if($clientes->path=="")
                      <img src="/upload/user.png" alt="img" class="img-circle img-responsive" />
                      @elseif($clientes->path!="")
                      <img src="/upload/{{ $clientes->path }}" alt="img" class="img-circle img-responsive" />
                      @endif
                    </div>


                  </div>


                </div>
              </div>

              <div class="col-xs-12 bottom text-center">
                {{ $clientes->observacion }}
              </div>

            </div>


            <div class="col-md-12">

              <div class="form-group">

                <a href="{{ route('admin.clients.index') }}" class="btn btn-primary">Regresar</a>

              </div>


            </div>
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
