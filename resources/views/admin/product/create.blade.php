@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
        <div class="">  
<div class="page-title">
            <div class="title_left">
              <h3>
                    Nuevo Producto
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
          <div class="clearfix">

          </div>
<div class="row">
@if(count($errors) > 0)
            	@include('admin.partials.errors');
            @endif
	<div class="col-md-10 col-sm-10 col-xs-10">
              
                <div class="x_content">
                  {!! Form::open(['route'=>'admin.product.store'])!!}

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Categor&iacute;a :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                      	{!! Form::select('category_id',	$categories, null,['class'=>'form-control'])  	!!}
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
                            'autofocus'=>'autofocus'
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
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'cant',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Stock',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pvp compra :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'pre_com',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Pvp compra',
                            'autofocus'=>'autofocus'
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


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'prgr_tittle',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'titulo del producto',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'img',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Url de imagen',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         {!! Form::select('brand_id', $brands, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         {!! Form::select('isactive_id', $isactives, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Extras :</label>
                      <p style="padding: 5px;">
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::checkbox(
                          'nuevo',
                          null,
                          array(
                            'class'=>'flat'
                          )
                        ) !!} Nuevo
                        <br />  
                        {!! Form::checkbox(
                          'promocion',
                          null,
                          array(
                            'class'=>'flat'
                          )
                        ) !!} Promoci&oacute;n
                        <br />  
                        {!! Form::checkbox(
                          'catalogo',
                          null,
                          array(
                            'class'=>'flat'
                          )
                        ) !!} Catalogo
                        <br />  
                      </div>
                      </p>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      	{!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
                      	<a href="{{ route('admin.product.index') }}" class="btn btn-primary">Cancelar</a>
                      </div>
                    </div>
                    {{ Form::close() }}
        </div>
</div>
</div>
        </div>
@stop
