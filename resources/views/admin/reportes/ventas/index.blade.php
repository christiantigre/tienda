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
      <!--formulario de rangos-->
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
            <small>Muestra todas las ventas por rangos de fechas :</small><br/>

            <div class="form-group">
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
      <!--fin formulario rangos-->

      <!--formulario ventas por clientes-->
      <div class="col-md-6 col-xs-12">

        <div class="x_panel">
          <div class="x_title">
            <h2>Ventas a clientes<small></small></h2>
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
              {!! Form::open(array('route'=>'admin.reports.contvcli','method'=>'post'))!!}
              {{ csrf_field() }} 
              <div class="btn-group">
                <small>Muestra la cantidad de ventas realizadas a los clientes :</small><br/>
                <button class="btn btn-default" type="submit">MOSTRAR</button>
                <!--<button class="btn btn-default" type="button">Middle</button>
                <button class="btn btn-default" type="button">Right</button>-->
              </div>
              {{ Form::close() }}
            </div>
            <div class="row">
              {!! Form::open(array('route'=>'admin.reports.contvmes','method'=>'post'))!!}
              {{ csrf_field() }} 
              <div class="btn-group">
                <small>Muestra la cantidad de ventas del presente mes :</small><br/>
                <button class="btn btn-default" type="submit">MOSTRAR</button>
              </div>
              {{ Form::close() }}
            </div>
            <div class="row">

              <div class="btn-group">
                <small>Muestra las ventas del presente mes :</small><br/>
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Superiores a :</label>
                <div class="col-sm-9">
                  {!! Form::open(array('route'=>'admin.reports.contvvalsuprr','method'=>'post'))!!}
                  {{ csrf_field() }}
                  <div class="input-group">
                    <input type="number" id="number" name="number" required="required" min="0" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary">VER</button>
                    </span>
                  </div>
                  {{  Form::close() }} 
                </div>
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Inferiores a :</label>
                <div class="col-sm-9">
                  {!! Form::open(array('route'=>'admin.reports.contvvalinf','method'=>'post'))!!}
                  {{ csrf_field() }}
                  <div class="input-group">
                    <input type="number" id="number" name="number" required="required" min="0" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary">VER</button>
                    </span>
                  </div>
                  {{  Form::close()  }}
                </div>
              </div>
              
            </div>
            {!! Form::open(array('route'=>'admin.reports.contvvalrangos','method'=>'post'))!!}
            {{ csrf_field() }}
            <div class="form-group">
              <small>Muestra la cantidad ventas por rangos de fechas :</small><br/>
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
      <!--fin formulario ventas por clientes-->


      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Opciones <small>aplica solo presente año</small></h2>
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
          <small>Muestra todas las ventas</small>
          <small>Aplica solo presente año</small>
          <div class="x_content">
            <br />
            <!--<form class="form-horizontal form-label-left">-->

            <div class="form-group">
              {!! Form::open(array('route'=>'admin.reports.before','method'=>'post'))!!}
              {{ csrf_field() }}
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Mes :</label>
              <div class="col-sm-9">
                <div class="input-group">
                  <select id="beforeselect" name="beforeselect" class="form-control" tabindex="-1">
                    <option></option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Antes!</button>
                  </span>
                </div>
              </div>
              {{ Form::close() }}
            </div>  

            <div class="form-group">
              {!! Form::open(array('route'=>'admin.reports.during','method'=>'post'))!!}
              {{ csrf_field() }}

              <label class="control-label col-md-3 col-sm-3 col-xs-12">Mes :</label>
              <div class="col-sm-9">
                <div class="input-group">
                  <select id="duringselect" name="duringselect" class="form-control" tabindex="-1">
                    <option></option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Durante!</button>
                  </span>
                </div>
              </div>
              {{ Form::close() }}
            </div>  

            <div class="form-group">
              {!! Form::open(array('route'=>'admin.reports.after','method'=>'post'))!!}
              {{ csrf_field() }}

              <label class="control-label col-md-3 col-sm-3 col-xs-12">Mes :</label>
              <div class="col-sm-9">
                <div class="input-group">
                  <select id="afterselect" name="afterselect" class="form-control" tabindex="-1">
                    <option></option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Despues!</button>
                  </span>
                </div>
              </div>
              {{ Form::close() }}
            </div>                                         


            <div class="ln_solid"></div>

            <!--</form>-->
          </div>
        </div>
      </div>



    </div>

  </div>
  <script>
    $('.datepicker').datepicker({
      format: "yyyy-mm-dd",
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