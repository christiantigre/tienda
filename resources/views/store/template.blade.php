<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>.: @yield('tittle','TiendaLine') :.</title>

  <!--estilos-->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
  <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
  <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

  <!--datepicker-->
  <link rel="stylesheet" type="text/css" href="{{ asset('datepicker/jquery.datetimepicker.css') }}"/>
  <!--end datepicker-->

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/price-range.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/funcion.js') }}"></script>
        <!--validacion de la cedula-->
        <script src="{{ asset('admin/js/validate/validateid.js') }}"></script>
        
        <script src="{{ asset('admin/js/query-2.1.4.min.js') }}"></script>
        {{--Pnotify--}}
        <link rel="stylesheet" href="{{ asset('pnotify/pnotify.core.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('pnotify/pnotify.buttons.min.css') }}"/>
        <script type="text/javascript" src="{{ asset('pnotify/pnotify.core.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pnotify/pnotify.buttons.min.js') }}"></script>

      </head>


      <body  onload="back()" oncontextmenu="return false" >

        <script type="text/javascript" src="{{ asset('pnotify/pnotify.core.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pnotify/pnotify.buttons.min.js') }}"></script>

        @include('store.partials.notify')
        <!--Uso de zoom-->
        <header id="header"><!--header-->
          @include('store.partials.header')

        </header>

        <section id="advertisement">
          <div class="container">
            <!--<img src="{{ asset('images/shop/advertisement.jpg') }}" alt="" />-->
          </div>
        </section>

        <section>
          <div class="container">
            @yield('content')
          </div>
        </section>

        <footer id="footer"><!--Footer-->
         @include('store.partials.footer')        
       </footer><!--/Footer-->



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
        });</script>

        <!-- end datepicker Y-m-d-->

        <!--Geolocalización-->




        <script type="text/javascript">
          function vaciar(){
            document.getElementById("lt").value = "";
            document.getElementById("lg").value = ""; 
          }

          function check(rad) {
            document.getElementById("res").value=rad;
          }
          function enviar(){

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
            document.getElementById("lat").value = ""+latitud;
            document.getElementById("long").value = ""+longitud;

            div.innerHTML = "<input type='text' name='lt' id='lt' value='"+latitud+"'><input type='text' name='lg' id='lg' value='"+longitud+"'><br>Timestamp: " + times + "<br>Latitud: " + latitud + "<br>Longitud: " + longitud + "<br>Altura en metros: " + altitud + "<br>Exactitud: " + exactitud;

          }  
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
                document.getElementById("entrega").value = "Ubicacion actual";
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


            <!--Geocoder inverso-->


            <script>


              function domicilio(){
                $('demo').empty();
                var lt = document.getElementById('lt').value;
                var lg = document.getElementById('lg').value;
                document.getElementById("lat").value = ""+lt;
                document.getElementById("long").value = ""+lg;
                /*var map = new google.maps.Map(document.getElementById('demo'), {
                  zoom: 8,
                  center: {lat: lt, lng: lg}
                });
                var geocoder = new google.maps.Geocoder;
                var infowindow = new google.maps.InfoWindow;
                geocodeLatLng(geocoder, map, infowindow);*/
                document.getElementById("entrega").value = "Domicilio";
              }

              function geocodeLatLng(geocoder, map, infowindow) {
                var input = document.getElementById('latlng').value;
                var latlngStr = input.split(',', 2);
                var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
                geocoder.geocode({'location': latlng}, function(results, status) {
                  if (status === google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                      map.setZoom(14);
                      var marker = new google.maps.Marker({
                        position: latlng,
                        map: map
                      });
                      infowindow.setContent(results[1].formatted_address);
                      infowindow.open(map, marker);
                    } else {
                      window.alert('No results found');
                    }
                  } else {
                    window.alert('Geocoder failed due to: ' + status);
                  }
                });
              }

            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfEnRziz09pG_OBmrz01pB0X5XXBBFOMg&signed_in=true&callback=initMap" async defer></script>



            <!--Geocoder inverso-->



            <!--road-->
            <script>
              function initMap() {



                document.getElementById('mode').addEventListener('change', function() {

                });
              }

              function localStore(){

                document.getElementById("entrega").value = "Retiro personal";
        /*var deslat = document.getElementById("ln").value;
        var deslg = document.getElementById("lgemp").value;*/
        var orlat = -2.886385;
        var orlg = -78.77595589999999;
        var deslat = -2.8902746199915677;
        var deslg = -78.77836988811339;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('demo'), {
          zoom: 14,
          center: {lat: orlat, lng: orlg}
        });
        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay, orlat, orlg, deslat, deslg);
        calculateAndDisplayRoute(directionsService, directionsDisplay, orlat, orlg, deslat, deslg);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay, orlat, orlg, deslat, deslg) {
        var selectedMode = document.getElementById('mode').value;
        directionsService.route({
    origin: {lat: orlat, lng: orlg},  // Haight.
    destination: {lat: deslat, lng: deslg},  // Ocean Beach.
    // Note that Javascript allows us to access the constant
    // using square brackets and a string value as its
    // "property."
    travelMode: google.maps.TravelMode[selectedMode]
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
      }



    </script>
    <!--road-->



  </body>


  </html>