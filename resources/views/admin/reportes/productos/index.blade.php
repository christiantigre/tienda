@extends('admin.template')
@section('content')
<div class="right_col" role="main">
  <div class="">

    <div class="page-title">
      <div class="title_left">
        <h3>Reporte de Productos</h3>

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

      <!--formulario ventas por clientes-->
      <div class="col-md-6 col-xs-12">

        <div class="x_panel">
          <div class="x_title">
            <h2>Opciones<small></small></h2>
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

            <!-- start form  -->

            <!--<form action="/reports/rango" method="post">-->
            
            <div class="row">
              {!! Form::open(array('route'=>'admin.reports.conctprod','method'=>'post'))!!}
              {{ csrf_field() }} 
              <div class="btn-group">
                <small>Muestra los productos mas vendidos hasta la fecha actual</small><br/>
                <button class="btn btn-default" type="submit">MOSTRAR</button>
                <!--<button class="btn btn-default" type="button">Middle</button>
                <button class="btn btn-default" type="button">Right</button>-->
              </div>
              {{ Form::close() }}
            </div>
            <div class="row">
              {!! Form::open(array('route'=>'admin.reports.conctprodmes','method'=>'post'))!!}
              {{ csrf_field() }} 
              <div class="btn-group">
                <small>Muestra la cantidad de productos vendidos en el presente mes :</small><br/>
                <button class="btn btn-default" type="submit">MOSTRAR</button>
              </div>
              {{ Form::close() }}
            </div>
            <div class="row">
              {!! Form::open(array('route'=>'admin.reports.conctproddia','method'=>'post'))!!}
              {{ csrf_field() }} 
              <div class="btn-group">
                <small>Muestra la cantidad de productos vendidos en el presente dia :</small><br/>
                <button class="btn btn-default" type="submit">MOSTRAR</button>
              </div>
              {{ Form::close() }}
            </div>
            <div class="row">

              <div class="btn-group">
                <small>Muestra la cantidad de productos vendidos :</small><br/>
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Superiores a :</label>
                <div class="col-sm-9">
                  {!! Form::open(array('route'=>'admin.reports.superior','method'=>'post'))!!}
                  {{ csrf_field() }}
                  <div class="input-group">
                    <input type="number" id="numbers" name="numbers" required="required" min="0" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary">VER</button>
                    </span>
                  </div>
                  {{  Form::close() }} 
                </div>
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Inferiores a :</label>
                <div class="col-sm-9">
                  {!! Form::open(array('route'=>'admin.reports.inferior','method'=>'post'))!!}
                  {{ csrf_field() }}
                  <div class="input-group">
                    <input type="number" id="numberi" name="numberi" required="required" min="0" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary">VER</button>
                    </span>
                  </div>
                  {{  Form::close()  }}
                </div>
              </div>
              
            </div>
            {!! Form::open(array('route'=>'admin.reports.contprodcantrangos','method'=>'post'))!!}
            {{ csrf_field() }}
            <div class="form-group">
              <small>Muestra la cantidad productos vendidos por rangos de fechas :</small><br/>
              <label for="date">Desde * :</label>
              <div class="input-group">
                <input type="text" class="form-control datepicker" required="required" name="datesinze">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="date">Hasta * :</label>
              <div class="input-group">
                <input type="text" class="form-control datepicker" required="required" name="dateto">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-primary">Enviar</button>
            {{ Form::close() }}
            <!--</form>-->
            <!-- end form  -->

          </div>
        </div>
      </div>
      <script>
    $('.datepicker').datepicker({
      format: "yyyy-mm-dd",
      language: "es",
      autoclose: true
    });
  </script> 
      <!--fin formulario ventas por clientes-->

    </div>

  </div>   
  <!-- /page content -->
  @stop