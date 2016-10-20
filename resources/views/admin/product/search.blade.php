@extends('admin.template')
@section('content')
<div class="right_col" role="main">
  <div class="">

    <div class="page-title">
      <div class="title_left">
        <h3>Buscar producto</h3>

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
            <h2>No son obligatorios todos los campo<small></small></h2>
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

            <!--<form >-->
            {!! Form::open(array('route'=>'admin.product.searchadvance','files' => true,'enctype'=>'multipart/form-data'))!!}
            {{ csrf_field() }} 
            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock :</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                {!! Form::number(
                  'cant',
                  null,
                  array(
                    'class'=>'form-control',
                    'placeholder'=>'Stock',
                    'autofocus'=>'autofocus',
                    'min'=>'0'
                    )
                  ) 
                  !!}
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  {!! Form::text(
                    'nombre',
                    null,
                    array(
                      'class'=>'form-control',
                      'placeholder'=>'Ingrese nombre del producto',
                      'autofocus'=>'autofocus',
                      'autocomplete'=>'off'
                      )
                    ) 
                    !!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Cod. barra :</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    {!! Form::text(
                      'codbarra',
                      null,
                      array(
                        'class'=>'form-control',
                        'placeholder'=>'Ingrese codigo de barra',
                        'autofocus'=>'autofocus',
                        'autocomplete'=>'off'
                        )
                      ) 
                      !!}
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Pvp venta :</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      {!! Form::text(
                        'pre_ven',
                        null,
                        array(
                          'class'=>'form-control',
                          'placeholder'=>'Pvp venta',
                          'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>


                    <div class="row">
                      <br />
                      <div class="clearfix"></div>
                      <br />
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                       {!! Form::submit('Buscar', array('class'=>'btn btn-success')) !!}
                       <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Regresar</a>
                     </div>
                   </div>
                   {{ Form::close() }}
                   <!--</form>-->
                   <!-- end form  -->

                 </div>
               </div>


             </div>
             <!--fin formulario rangos-->



           </div>

         </div>   
         <!-- /page content -->
         @stop