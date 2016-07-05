@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
        <div class="">  
<div class="page-title">
            <div class="title_left">
              <h3>
                    Nuevo Proveedor
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
	<div class="col-md-12 col-sm-12 col-xs-12">           
      <div class="col-md-7 col-sm-7 col-xs-7">  
      <div class="x_content">
                  {!! Form::open(['route'=>'admin.proveedor.store'])!!}
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Compa&ntilde;&iacute;a :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                      	{!! Form::text(
                      		'nom_compania',
                      		null,
                      		array(
                      			'class'=>'form-control',
                            'required'=>'required',
                      			'placeholder'=>'Ingrese nombre de la compania',
                      			'autofocus'=>'autofocus'
                      		)
                      	) 
                      	!!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruc :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'ruc',
                          null,
                          array(
                            'class'=>'form-control',
                            'required'=>'required',
                            'placeholder'=>'Ingrese ruc de la compania',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tel&eacute;fono :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'telefono',
                          null,
                          array(
                            'class'=>'form-control',
                            'required'=>'required',
                            'placeholder'=>'Telefono',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Celular :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'celular',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Celular',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'fax',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Celular',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Direcci&oacute;n :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'direccion',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'direccion',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cod. postal :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'codpostal',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Codigo postal',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Logo :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'logo',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Ruta de la imagen',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
      </div>
      </div>
      <div class="col-md-5 col-sm-5 col-xs-5">  
      <div class="x_content">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Email :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'email',
                          null,
                          array(
                            'class'=>'form-control',
                            'required'=>'required',
                            'placeholder'=>'E-mail',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Web :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'pagweb',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Pagina web',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pa&iacute;s :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::select('country_id', $countries, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Provincia :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::select('prov_id', $provinces, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::select('isactive_id', $isactives, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripci&oacute;n :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                      	{!! Form::textarea(
                      		'observacion',
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
                      	{!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
                      	<a href="{{ route('admin.proveedor.index') }}" class="btn btn-primary">Cancelar</a>
                        <!--<button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>-->
                      </div>
                    </div>
                    {{ Form::close() }}           

      </div>
      </div>
  </div>
</div>
        </div>
@stop
