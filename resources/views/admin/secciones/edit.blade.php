@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
        <div class="">  
<div class="page-title">
            <div class="title_left">
              <h3>
                    Editar Sección
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
                  {!! Form::model($seccion, array('route' => array('admin.seccion.update', $seccion))) !!}
                  <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                      	{!! Form::text(
                      		'name',
                      		null,
                      		array(
                      			'class'=>'form-control',
                      			'placeholder'=>'Ingrese nombre de la sección',
                      			'autofocus'=>'autofocus'
                      		)
                      	) 
                      	!!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripci&oacute;n :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                      	{!! Form::textarea(
                      		'descripcion',
                      		null,
                      		array(
                      			'class'=>'form-control'
                      		)
                      	) 
                      	!!}
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      	{!! Form::submit('Actualizar', array('class'=>'btn btn-success')) !!}
                      	<a href="{{ route('admin.seccion.index') }}" class="btn btn-primary">Cancelar</a>
                      </div>
                    </div>
                    {{ Form::close() }}               
    </div>
</div>
</div>
        </div>
@stop
