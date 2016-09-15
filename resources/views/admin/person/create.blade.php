

@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
        <div class="">  
<div class="page-title">
            <div class="title_left">
              <h3>
                    Registra Personal
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
                  {!! Form::open(['route'=>'admin.emp.store'],['class'=>'form-horizontal form-label-left'])!!}

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Departamento :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                      	{!! Form::select('department_id',	$departments, null,['class'=>'form-control','autofocus'=>'autofocus'])  	!!}
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::select('cargo_id',  $positions, null,['class'=>'form-control'])   !!}
                        </div>
                    </div>

                    


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombres :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'nombres',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'Ingrese nombres...',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off'
                          )
                        ) 
                        !!}
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::text(
                          'apellidos',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'Ingrese apellidos',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off'
                          )
                        ) 
                        !!}
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Fecha de nacimiento :</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                            
                              <!--<input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="F. nacimiento" aria-describedby="inputSuccess2Status2">
                              -->
                              {!! Form::text(
                          'fechanacimiento',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'F. nacimiento',
                            'id'=>'single_cal2',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off'
                          )
                        ) 
                        !!} 
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                            
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         {!! Form::select('genero', ['2' => 'Masculino', '1' => 'Femenino'], 'M',['class'=>'form-control'])    !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Num# cedula :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          {!! Form::text(
                          'cedula',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'Ingrese CI',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off',
                            'onblur'=>'validaced()'
                          )
                        ) 
                        !!}       
                        <span class="fa fa-cc form-control-feedback left" aria-hidden="true"></span>              
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          {!! Form::text(
                          'telefono',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'Ingrese num telefono',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off'
                          )
                        ) 
                        !!}                    
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>                  
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Celular :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          {!! Form::text(
                          'celular',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'Ingrese num celular',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off'
                          )
                        ) 
                        !!}  
                        <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>                  
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          {!! Form::text(
                          'email',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'Ingrese email del emp...',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off'
                          )
                        ) 
                        !!}    
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>                
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          {!! Form::text(
                          'img',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'Url de imagen',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off'
                          )
                        ) 
                        !!}     
                         <span class="fa fa-photo form-control-feedback left" aria-hidden="true"></span>               
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Direccion :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          {!! Form::text(
                          'dir',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'Ingrese direccion',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off'
                          )
                        ) 
                        !!}   
                        <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>                 
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Sueldo :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          {!! Form::text(
                          'sld',
                          null,
                          array(
                            'class'=>'form-control has-feedback-left',
                            'placeholder'=>'Sueldo mensual emp...',
                            'autofocus'=>'autofocus',
                            'autocomplete'=>'off'
                          )
                        ) 
                        !!}   
                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>                 
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado civil :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         {!! Form::select('estcivil', ['Soltero' => 'Soltero', 'Casado' => 'Casado','Divorciado' => 'Divorciado','Union libre' => 'Union libre'], 'Casado',['class'=>'form-control'])    !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pais :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         {!! Form::select('country_id', $countries, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Provincia :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         {!! Form::select('province_id', $provinces, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         {!! Form::select('isactive_id', $isactives, null,['class'=>'form-control'])    !!}
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      	{!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
                      	<a href="{{ route('admin.person.index') }}" class="btn btn-primary">Cancelar</a>
                      </div>
                    </div>
                    {{ Form::close() }}
        </div>
</div>
</div>
        </div>
@stop
