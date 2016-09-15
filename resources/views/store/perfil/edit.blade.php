@extends('store.template')
@section('content')

<div class="right_col" role="main">    
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h2 class="title text-center">Editar Perfíl</h2>
        
      </div>

      

    </div>
    <div class="clearfix">

    </div>
    <div class="row">
      @if(count($errors) > 0)
      @include('store.partials.errors')
      @endif
      <div class="col-md-10 col-sm-10 col-xs-10">           
        <div class="product-information">
         {!! Form::model($client, ['route' => ['store.perfil.update', $client->users_id],'files'=>true]) !!}
         <input type="hidden" name="_method" value="PUT">
         <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Nombre (*):</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Ingrese apellidos','autofocus'=>'autofocus','autocomplete'=>'off')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Apellido (*):</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('apellidos',null,array('class'=>'form-control','placeholder'=>'Ingrese apellidos','autofocus'=>'autofocus','autocomplete'=>'off')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Cedula (*):</label>
          <div class="col-md-9 col-sm-9 col-xs-12">

            
            {!! Form::text('cedula',null,array('class'=>'form-control','placeholder'=>'Ingrese su numero de id','id'=>'cedula','autofocus'=>'autofocus','onblur'=>'validaced()','autocomplete'=>'off')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Ruc (*):</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('ruc',null,array('class'=>'form-control','placeholder'=>'Ingrese su ruc/rise','autofocus'=>'autofocus','autocomplete'=>'off')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Fecha de nacimiento :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('fechanacimiento',null,array('class'=>'form-control','placeholder'=>'Ingrese feha de nacimiento','autofocus'=>'autofocus','id'=>'datetimepicker1','autocomplete'=>'off')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Genero :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::select('genero', ['2' => 'Masculino', '1' => 'Femenino'], 'M',['class'=>'form-control'])    !!}                 
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Telefono (*):</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('telefono',null,array('class'=>'form-control','placeholder'=>'Ingrese su numero de teléfono','autofocus'=>'autofocus','autocomplete'=>'off')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Celular (*):</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('celular',null,array('class'=>'form-control','placeholder'=>'Ingrese su numero de celular','autofocus'=>'autofocus','autocomplete'=>'off')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Email :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>'Ingrese correo electrónico','autofocus'=>'autofocus','readonly'=>'readonly')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Dirección 1 (*):</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('dir1',null,array('class'=>'form-control','placeholder'=>'Ingrese su dirección principal','autofocus'=>'autofocus','autocomplete'=>'off')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Dirección 2 (*):</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::text('dir2',null,array('class'=>'form-control','placeholder'=>'Ingrese la dirección transversal','autofocus'=>'autofocus','autocomplete'=>'off')) !!}                  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Provincia :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
           {!! Form::select('provincia_idprovincia', $provinces, null,['class'=>'form-control'])    !!}
         </div>
       </div>
       <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6">Imagen :</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            {!! Form::file('path') !!}
            <!--<input type="file" name="image" id="image" accept="image/*" class="form-control"/>     -->
            {{ csrf_field() }}                      
         </div>
       </div>
       <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-6"><i class="fa fa-map-marker"></i> Compartir mi ubicación<i><small> ayudanos a conocer tu domicilio (*) para entregar tus pedidos</small></i></label>
          <div class="col-md-9 col-sm-9 col-xs-12">
           <div class="left col-xs-7">
              <ul class="list-unstyled">
                <li></i> Compartir ahora : <input type="radio" name="rad" id="rad" value="UBICACION" onclick="cargarmap();"/></li>
                <li></i> En otro momento : <input type="radio" name="rad" ="rad" value="DOMICILIO" onclick="vaciar();" checked/></li>
              </ul>
            </div>
         </div>
       </div>
       <div class="form-group">

      <div class="col-md-9 col-sm-9 col-xs-12">      
          <div class="right col-xs-5 text-center" style='display:none;'>
             <!-- Se determina y escribe la localizacion -->
                <div id='ubicacion' style='display:none;'></div>
                <div id="demo">
                  
                </div>
                <div id="mapholder"></div>
          </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          {!! Form::submit('Guardar', array('class'=>'btn btn-success')) !!}
        </div>
      </div>

      {{ Form::close() }}  
    </div>

  </div>
</div>

@stop
<!-- datepicker -->
<script src="{{ asset('datepicker/jquery.js') }}"></script>
<script src="{{ asset('datepicker/jquery.datetimepicker.full.js') }}"></script>
<script>
jQuery.datetimepicker.setLocale('es');
jQuery('#datetimepicker1').datetimepicker({
  i18n: {
    de: {
      months: [
      'Enero', 'Febrero', 'Marzo', 'Abril',
      'Mayo', 'Junio', 'Julio', 'Agosto',
      'Septiembre', 'Octubre', 'Noviembre', 'Diciembre',
      ],
      dayOfWeek: [
      "So.", "Mo", "Di", "Mi",
      "Do", "Fr", "Sa.",
      ]
    }
  },
  timepicker: false,
  format: 'm/d/Y'
});
</script>
<!-- end datepicker Y-m-d-->


