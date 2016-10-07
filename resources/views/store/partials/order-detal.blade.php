@extends('store.template')
@section('content')

<!--<form method="POST" role="form">-->
<h3> DETALLE DEL PEDIDO </h3>
<div class="col-md-6 col-sm-6 col-xs-12 animated fadeInDown">
  {!! Form::open(array
    (
      'route'=>'confir_comp',
      'class'=>'form-horizontal form-label-left',
      'method'=>'POST',
      'role'=>'form',
      'id'=>'formulario'
      ))
      !!}
      <div class="web-application">
        <div class="col-sm-12">
          <h4 class="brief"><i><small>Datos del Usuario</small></i></h4>
          <div class="left col-xs-7">
            <h2><small>{{ $perfil->name }} {{ $perfil->apellidos }}</small></h2>
            <p><strong>Email : </strong>{{ $perfil->email }}. </p>
            <ul class="list-unstyled">
              <li><i class="fa fa-phone"></i> Teléfono : {{ $perfil->telefono }}</li>
              <li><i class="fa fa-mobile"></i> Celular : {{ $perfil->celular }}</li>
            </ul>
            <ul class="list-unstyled">
              <li><i class="fa fa-location-arrow"></i> Dirección 1 : {{ $perfil->dir1 }}</li>
              <li><i class="fa fa-location-arrow"></i> Dirección 2 : {{ $perfil->dir2 }}</li>
            </ul>
            <input type="hidden" name="lt" id="lt" value="{{ $perfil->lt }}"/>
            <input type="hidden" name="lg" id="lg" value="{{ $perfil->lg }}"/> 
            <input type="hidden" name="latlng" id="latlng" value="{{ $perfil->lt }}, {{ $perfil->lg }}"/> 

            <input type="hidden" name="ln" id="ln" value="{{ $dt_empress->ln }}"/>
            <input type="hidden" name="lgemp" id="lgemp" value="{{ $dt_empress->lg }}"/>

          </div>
          <div class="right col-xs-5 text-center">
          </div>
        </div>
      </div>
      <!--{!! Form::open(['class'=>'form-horizontal form-label-left'])!!}-->

      <div class="well profile_view">
        <div class="web-application">
          <h4 class="brief"><i><small>Selecione tipo de Entrega</small></i></h4>
          <div class="row fontawesome-icon-list">
            <ul class="list-unstyled">
              <li><i class="fa fa-map-marker"></i> Ubicación actual : <input type="radio" name="rad" id="rad" value="UBICACION" onclick="cargarmap()"/></li>
              <li><i class="fa fa-automobile"></i> Envío a domicilio : <input type="radio" name="rad" id="submit" value="DOMICILIO" onclick="domicilio()"/></li>
              <li><i class="fa fa-child"></i> Voy por mi pedido : <input type="radio" name="rad" id="rad" value="RETIRO" onclick="localStore()" checked="" required/></li>
              {!! Form::hidden('lat', '0', array('id' => 'lat')) !!}
              {!! Form::hidden('long', '0', array('id' => 'long')) !!}
              {!! Form::hidden('entrega', 'Retiro personal', array('id' => 'entrega')) !!}

            </ul>
          </div>
          <div class="right col-xs-5 text-center">
            <input type="hidden" id="res" size="20">

          </div>
        </div>
        <div class="web-application">
          <h4 class="brief"><i><small>Selecione forma de pago</small></i></h4>
          <div class="row fontawesome-icon-list">
            <ul class="list-unstyled">
              <li><i class="fa fa-usd"></i> Forma : 
               {!! Form::select('id', $pays, null,['class'=>'form-control'])    !!}
             </li>
           </ul>
         </div>
         <div class="right col-xs-5 text-center">
          <input type="hidden" id="res" size="20">        
        </div>
      </div>
    </div>


    <div class="well profile_view">
      <div class="web-application">
        <h4 class="brief"><i><small>Lugar de entrega</small></i></h4>
        <!-- Se determina y escribe la localizacion -->
        <div id='ubicacion' style='display:none;'></div> 
        <!---->
        <div class="col-md-3 col-sm-4 col-xs-12" id="demo"></div>
        <div class="row fontawesome-icon-list" id="mapholder"></div>
        <div class="row fontawesome-icon-list" id="floating-panel">
          <b>Mode of Travel: </b>
          <select id="mode">
            <option value="DRIVING">Driving</option>
            <option value="WALKING">Walking</option>
            <option value="BICYCLING">Bicycling</option>
            <option value="TRANSIT">Transit</option>
          </select>
        </div>
      </div>
    </div>


    <!--{{ Form::close() }}-->
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h4><small>Datos del Pedido</small></h4>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table">
          <thead>
            <tr>
              <th>ITEM</th>
              <th>EXTRAS</th>
              <th>PRECIO</th>
              <th>CANTIDAD</th>
              <th>TOTAL</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cart as $item)
            <tr>
             <td>
              <img src="/upload/products/{{ $item->img }}" alt="" width="60">
              <h6>{{ $item->nombre }}</h6><br />
            </td>
          </td>
          <td> 
          <h6>         
            @if(count($item->sizes)>0)
            Talla :
            {{ $item->sizes }}<br />
            @else
            @endif
            @if(count($item->preferences)>0)
            Color :{{ $item->preferences }}<br />
            @else
            @endif
            @if(count($item->numbers)>0)
            Número :{{ $item->numbers }}
            @else
            @endif
            </h6>
          </td>
          <td>
            <p><h6>{{ number_format($item->pre_ven,2) }}</h6></p>
          </td>
          <td>
            <p><h6>{{ $item->cantt }}</h6></p>	
          </td>
          <td>
            <p class="cart_total_price"><h6>{{ number_format( $item->pre_ven * $item->cantt,2 ) }}</h6></p>
          </td>
        </tr>

        @endforeach
      </tbody>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td colspan="2">
          <table class="table table-condensed total-result">
            <tr>
              <td><h6>Sub Total</h6></td>
              <td><h6>${{ number_format($sub,2) }}</h6></td>
            </tr>
            <tr>
              <td><h6>Iva</h6></td>
              <td><h6>${{ number_format($iva,2) }}</h6></td>
            </tr>
            <tr>
              <td>Total</td>
              <td><span><h6>${{ number_format($total,2) }}</h6></span></td>
            </tr>
            <tr>
            </table>
          </td>
        </tr>
        <tr>
         <td colspan="2">&nbsp;</td>
         <td colspan="2">
          <table>
           <tr>
             <hr>
             {{ Form::input('submit',null,'CONFIRMAR COMPRA', array('class'=>'btn btn-primary fa fa-shopping-cart','tittle'=>'CONFIRMAR COMPRA','id' => 'btn','onclick'=>'jsShowWindowLoad("Cargando")' )) }}
             <!--<input type="button" onclick="jsShowWindowLoad('Cargando')" name="">-->
             <br>
          </tr>
         </table>
       </td>
     </tr>

   </table>

 </div>
</div>
</div>
<script>
function jsRemoveWindowLoad() {
  // eliminamos el div que bloquea pantalla
    $("#WindowLoad").remove();

}

function jsShowWindowLoad(mensaje) {
  //eliminamos si existe un div ya bloqueando
    jsRemoveWindowLoad();
   
    //si no enviamos mensaje se pondra este por defecto
    if (mensaje === undefined) mensaje = "Procesando la información<br>Espere por favor";
   
    //centrar imagen gif
    height = 20;//El div del titulo, para que se vea mas arriba (H)
    var ancho = 0;
    var alto = 0;
  
  //obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
    if (window.innerWidth == undefined) ancho = window.screen.width;
    else ancho = window.innerWidth;
    if (window.innerHeight == undefined) alto = window.screen.height;
    else alto = window.innerHeight;
    
  //operación necesaria para centrar el div que muestra el mensaje
    var heightdivsito = alto/2 - parseInt(height)/2;//Se utiliza en el margen superior, para centrar
  
   //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
    imgCentro = "<div class='web-application' style='text-align:center;height:" + alto + "px;'><div class='eb-application'  style='color:#F5E2E2;margin-top:" + heightdivsito + "px; font-size:20px;font-weight:bold'>" + mensaje + "</div><img  src='../img/load2.gif'></div>";

        //creamos el div que bloquea grande------------------------------------------
        div = document.createElement("div");
        div.id = "WindowLoad"
        div.style.width = ancho + "px";
        div.style.height = alto + "px";
        $("body").append(div);

        //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
        input = document.createElement("input");
        input.id = "focusInput";
        input.type = "text"

    //asignamos el div que bloquea
        $("#WindowLoad").append(input);
        
    //asignamos el foco y ocultamos el input text 
        $("#focusInput").focus();
        $("#focusInput").hide();
    
    //centramos el div del texto
        $("#WindowLoad").html(imgCentro);

}
</script>
<style>
#WindowLoad
{
    position:fixed;
    top:0px;
    left:0px;
    z-index:3200;
    filter:alpha(opacity=65);   
   -moz-opacity:65;   
    opacity:0.65;
    background:#999;
}
</style>
{{ Form::close() }}

@stop




