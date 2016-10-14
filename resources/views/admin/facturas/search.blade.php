@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h3>
          Buscar facturas
          <small>

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
          <h2><small></small></h2>
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
         <h1>                		
          <a href="{{ route('admin.facturas.index') }}" class="btn btn-primary">
           <i class="fa fa-reply"></i> Regresar</a>                  
         </h1>                	
       </div>
       <p class="text-muted font-13 m-b-30">
        <div class="x_content">
        </p>

        <!--tab-->
        {!! Form::open(['route'=>'admin.facturas.buscar'],['url'=>'buscar'],['method'=>'GET'],['role'=>'search'])!!}
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de factura :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('numfactura',null,array('class'=>'form-control', 'placeholder'=>'Ingrese datos...', 'autofocus'=>'autofocus','autocomplete'=>'off'
              )
            ) 
            !!}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Clave de acceso :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('claveacceso',null,array('class'=>'form-control', 'placeholder'=>'Ingrese datos...', 'autofocus'=>'autofocus','autocomplete'=>'off'
              )
            ) 
            !!}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Autorización :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('num_autoriz',null,array('class'=>'form-control', 'placeholder'=>'Ingrese datos...', 'autofocus'=>'autofocus','autocomplete'=>'off'
              )
            ) 
            !!}
          </div>
        </div>

        <!--<div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de emisión :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
          {!! Form::text('date',null,array('class'=>'form-control datepicker', 'placeholder'=>'Seleccione la fecha...', 'autofocus'=>'autofocus','autocomplete'=>'off'
              )
            ) 
            !!}
          </div>
        </div>-->

        <div class="ln_solid"></div>
        <div class="form-group">
          <br/>
          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
            {!! Form::submit('Buscar', array('class'=>'btn btn-success')) !!}
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: "dd/mm/yyyy",
    language: "es",
    autoclose: true
  });
</script>
@stop