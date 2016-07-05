@extends('admin.template')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Detalle :: Proveedor</h3>
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
                  {!! Form::model($proveedor, array('route' => array('admin.proveedor.update', $proveedor->id))) !!}
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div class="product-image">
                        <img src="{{ $proveedor->logo }}" alt="..." />
                      </div>
                      <div class="product_gallery">
                      </div>
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                    <h3 class="prod_title">{{ $proveedor->nom_compania }}</h3>

<div class="col-md-12 col-sm-12 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>{{ $proveedor->nom_compania }}</i></h4>
                          <div class="left col-xs-7">
                            <p><i class="fa fa-chain"></i><strong>Web : </strong><a href="{{ $proveedor->pagweb }}"> {{ $proveedor->pagweb }} <a></p>
                            <p><i class="fa fa-at"></i><strong>Email : </strong> {{ $proveedor->email }} </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Tlfn : {{ $proveedor->telefono }} </li>
                              <li><i class="fa fa-phone"></i> Cell : {{ $proveedor->celular }} </li>
                              <li><i class="fa fa-fax"></i> Fax : {{ $proveedor->fax }} </li>
                              <li><i class="fa fa-edit"></i> Ruc : {{ $proveedor->ruc }} </li>
                              <li><i class="fa fa-automobile"></i> Direccion : {{ $proveedor->direccion }} </li>
                              <li><i class="fa fa-map-marker"></i> Ubicacion :  {{ $proveedor->country->country }}-/-{{ $proveedor->prov->prov }} </li>
                              <li><i class="fa fa-toggle-on"></i> Cuenta activa :  {{ $proveedor->isactive_id ==1 ? "Si" : "No" }}</li>
                             

                            </ul>
                          </div>

                          <div class="right col-xs-5 text-center">
                            <img src="{{ $proveedor->logo }}" alt="" class="img-circle img-responsive">
                          </div>


                        </div>
                       
                         
                      </div>
                    </div>

 <div class="col-xs-12 bottom text-center">
                            {{ $proveedor->observacion }}
                            </div>

                    </div>


                    <div class="col-md-12">

                      <div class="form-group">
                      
                        <a href="{{ route('admin.proveedor.index') }}" class="btn btn-primary">Regresar</a>
                      
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
