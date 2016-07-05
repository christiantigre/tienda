@extends('admin.template')
@section('content')
<div class="right_col" role="main">  

@if(count($errors) > 0)
              @include('admin.partials.errors');
            @endif  
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h3>
          
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

    <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Configuración<small> </small></h2>
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
                <div class="form-horizontal form-label-left" >
                {!! Form::model($data, array('route' => array('admin.entiti.update', $data->id))) !!}
                  <input type="hidden" name="_method" value="PUT">


                    <p><code></code> <a href=""></a>
                    </p>
                    <span class="section">Info...</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'nom',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese nombre...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                        </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ruc <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'ruc',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese ruc...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                        </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      {!! Form::text(
                          'email',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese email...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}  
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Contacto 1 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'tlfun',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese numero de contacto...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Contacto 2 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'tlfds',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese numero de contacto...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Fax <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'fax',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese numero de fax...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Celular <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'cel',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese numero de celular...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Dirección <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'dir',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Calle 1 y 2 ...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Pagina web <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'pagweb',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese link de pagina web...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Propietario <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'prop',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese nombre...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Gerente <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'gernt',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese nombre...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Observaciónes <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::textarea(
                          'observ',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese nombre...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen :</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text(
                          'img',
                          null,
                          array(
                            'class'=>'form-control',
                            'placeholder'=>'Url de la imagen',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                      </div>                     
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><i class="fa fa-map-marker"></i> Compartir mi ubicación<i><small> ayudanos a conocer tu domicilio (*) para entregar tus pedidos</small></i></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <ul class="list-unstyled">
                              <li></i> Compartir ahora : <input type="radio" name="rad" id="rad" value="UBICACION" onclick="cargarmap();"/></li>
                              <li></i> En otro momento : <input type="radio" name="rad" ="rad" value="DOMICILIO" onclick="vaciar();" checked/></li>
                            </ul>
                       </div>
                     </div>
                     <div class="form-group">
                     <div class="control-label col-md-3 col-sm-3 col-xs-12">      
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><i class="fa fa-map-marker"></i> Ubicación<i><small></small></i></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <!-- Se determina y escribe la localizacion -->
                             {!! Form::hidden(
                          'ln',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese nombre...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                        {!! Form::hidden(
                          'lg',
                          null,
                          array(
                            'class'=>'form-control col-md-7 col-xs-12',
                            'placeholder'=>'Ingrese nombre...',
                            'autofocus'=>'autofocus'
                          )
                        ) 
                        !!}
                                <div id='ubicacion' style='display:none;'></div>
                                <div id="demo">
                                  
                                </div>
                                <div id="mapholder"></div>
                          </div>
                      </div>


                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="{{ route('admin.entiti.index') }}" class="btn btn-primary">Cancelar</a>
                        <button id="send" type="submit" class="btn btn-success">Guardar</button>
                      </div>
                    </div>
                {{ Form::close() }}  
                </div>
              </div>
            </div>

    </div>
  </div>
</div>



<!--Geolocalización-->




<script type="text/javascript">
function vaciar(){
    document.getElementById("ln").value = "";
    document.getElementById("lg").value = ""; 
}

function check(rad) {
  document.getElementById("res").value=rad;
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(mostrarUbicacion);
} else {alert("¡Error! Este navegador no soporta la Geolocalización.");}
function mostrarUbicacion(position) {
  var times = position.timestamp;
  var latitud = position.coords.latitude;
  var longitud = position.coords.longitude;
  var altitud = position.coords.altitude; 
  var exactitud = position.coords.accuracy; 
  var div = document.getElementById("ubicacion");

  div.innerHTML = "<input type='text' name='ln' id='ln' value='"+latitud+"'><input type='text' name='lg' id='lg' value='"+longitud+"'><br>Timestamp: " + times + "<br>Latitud: " + latitud + "<br>Longitud: " + longitud + "<br>Altura en metros: " + altitud + "<br>Exactitud: " + exactitud;}  
  function refrescarUbicacion() { 
    navigator.geolocation.watchPosition(mostrarUbicacion);} 
    </script>

    <!-- Se escribe un mapa con la localizacion anterior-->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfEnRziz09pG_OBmrz01pB0X5XXBBFOMg&signed_in=true&callback=initMap"></script>
    <script type="text/javascript">
    var x=document.getElementById("demo");
    function cargarmap(){
      navigator.geolocation.getCurrentPosition(showPosition,showError);
      function showPosition(position)
      {
        lat=position.coords.latitude;
        lon=position.coords.longitude;
        latlon=new google.maps.LatLng(lat, lon)
        mapholder=document.getElementById('demo')
        mapholder.style.height='250px';
        mapholder.style.width='500px';
        var myOptions={
          center:latlon,zoom:10,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          mapTypeControl:false,
          navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
        };
        var map=new google.maps.Map(document.getElementById("demo"),myOptions);
        var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
      }
      function showError(error)
      {
        switch(error.code) 
        {
          case error.PERMISSION_DENIED:
          x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
          break;
          case error.POSITION_UNAVAILABLE:
          x.innerHTML="La información de la localización no esta disponible."
          break;
          case error.TIMEOUT:
          x.innerHTML="El tiempo de petición ha expirado."
          break;
          case error.UNKNOWN_ERROR:
          x.innerHTML="Ha ocurrido un error desconocido."
          break;
        }
      }}
      </script>


<!--Geolocalización-->



@stop
