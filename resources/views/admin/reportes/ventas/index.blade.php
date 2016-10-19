@extends('admin.template')
@section('content')
<div class="right_col" role="main">
  <div class="">

    <div class="page-title">
      <div class="title_left">
        <h3>Reporte de Ventas</h3>

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
      <div class="col-md-6 col-xs-12">

        <div class="x_panel">
          <div class="x_title">
            <h2>Entre Fechas<small></small></h2>
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
            {!! Form::open(array('route'=>'admin.reports.rango','method'=>'post'))!!}
            {{ csrf_field() }} 
            <div class="form-group">
              <label for="date">Desde * :</label>
              <div class="input-group">
                <input type="text" class="form-control datepicker" name="datesinze">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="date">Hasta * :</label>
              <div class="input-group">
                <input type="text" class="form-control datepicker" name="dateto">
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

      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Opciones <small></small></h2>
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
            <br />
            <form class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mes :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <select class="form-control" tabindex="-1">
                      <option></option>
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                    </select>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-primary">Antes!</button>
                    </span>
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mes :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <select class="form-control" tabindex="-1">
                      <option></option>
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                    </select>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-primary">Durante!</button>
                    </span>
                  </div>
                </div>
              </div>  

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mes :</label>
                <div class="col-sm-9">
                  <div class="input-group">
                    <select class="form-control" tabindex="-1">
                      <option></option>
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                    </select>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-primary">Despues!</button>
                    </span>
                  </div>
                </div>
              </div>                                         


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Cancel</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>



    </div>

  </div>
  <script>
    $('.datepicker').datepicker({
      format: "dd/mm/yyyy",
      language: "es",
      autoclose: true
    });

    $('.datepickermonth').datepicker({
      format: "mm",
      language: "es",
      autoclose: true
    });
  </script>    
  <!-- /page content -->
  @stop