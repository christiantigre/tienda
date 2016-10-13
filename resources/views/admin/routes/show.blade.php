@extends('admin.template')
@section('content')
<!-- page content -->
<style type="text/css">
	.estilo{
		width: 950px; 
		height: 500px;
	}
	.google-maps {
		position: relative;
		padding-bottom: 75%; // This is the aspect ratio
		height: 0;
		overflow: hidden;
	}
	.google-maps iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 100% !important;
		height: 100% !important;
	}
</style>
<div class="right_col" role="main" >

	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3></h3>
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
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Ruta de entrega</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a href="#"><i class="fa fa-chevron-up"></i></a>
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
							<li><a href="#"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						{!! Form::model($rutas,array('route' => array('admin.routes.update', $rutas->id))) !!}
						<input type="hidden" name="_method" value="PUT">
						<section class="content invoice">
							<div class="row">
								<div class="col-xs-12 invoice-header">
									<h1>
										<i class="fa fa-truck" 
										></i> Ruta.
										<small class="pull-right">@por : {{ $rutas->entrega }}</small>
									</h1>
								</div>
								<!-- /.col -->
							</div>

							<div class="row invoice-info">
								<input type="hidden" id="ubiclg" name="ubiclg" value="{{ $rutas->ubiclg }}">                        
								<input type="hidden" id="ubiclt" name="ubiclt" value="{{ $rutas->ubiclt }}">
								<!--coordenadas de cliente-->
								{!! Form::hidden(
									'ubiclg',
									null,
									array(
										'class'=>'form-control',
										'required'=>'required',
										'placeholder'=>'Ingrese nombre de la compania',
										'autofocus'=>'autofocus'
										)
									) 
									!!}
									{!! Form::hidden(
										'ubiclt',
										null,
										array(
											'class'=>'form-control',
											'required'=>'required',
											'placeholder'=>'Ingrese nombre de la compania',
											'autofocus'=>'autofocus'
											)
										) 
										!!}
										<!--Coordenadas de empresa-->
										@foreach($empresa as $emp)
										<input type="hidden" id="nom" name="nom" value="{{ $emp->nom }}">                        
										<input type="hidden" id="ln" name="ln" value="{{ $emp->ln }}">
										<input type="hidden" id="lg" name="lg" value="{{ $emp->lg }}">
										@endforeach



										<div class="form-group">
											<div class="control-label col-md-3 col-sm-3 col-xs-12">  


												<div id='ubicacion' style='display:none;'></div>
												
												<div id="mapholder"></div>


											</div>
										</div>
									</div>


									<div class="col-md-12">
										<div class="form-group">              
											@if (Auth::user()->rol===1)
											<a href="{{ route('admin.sales.index') }}" class="btn btn-primary">REGRESAR</a>  
											@elseif (Auth::user()->rol===3)											
											<a href="{{ route('admin.despacho.index') }}" class="btn btn-primary">REGRESAR</a>  
											@endif        
										</div>
									</div>




								</section>   
								{{ Form::close() }} 
								<div id="demo" class="google-maps">

								</div>
								<!--Geolocalización-->



								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfEnRziz09pG_OBmrz01pB0X5XXBBFOMg&signed_in=true&callback=initMap"></script>
								<!--<script src="http://maps.googleapis.com/maps/api/js?v3"></script>-->
								<script>

								</script>
								<script>
						//mostrar_objeto(navigator.geolocation);
							//navigator.geolocation.getCurrentPosition();

							navigator.geolocation.getCurrentPosition(fn_ok, fn_mal);
							var divMapa = document.getElementById('demo');
							function fn_mal(){
								divMapa.innerHTML="Hubo un problema";
							}

							function fn_ok( respuesta ){
								//mostrar_objeto(respuesta.coords);
								//divMapa.innerHTML = "Tenemos autorización para ver su ubicación";
								var lat = $('#ubiclg').val();
								var lon = $('#ubiclt').val();
								//var lat = respuesta.coords.latitude;
								//var lon = respuesta.coords.longitude;
								var gLatLon = new google.maps.LatLng(lat, lon);
								var objConfig = {
									zoom: 19,
									center: gLatLon,
									title: "StoreLine"
								}
								var gMapa = new google.maps.Map(divMapa, objConfig);
								var objConfigMarker = {
									position:gLatLon,
									map: gMapa
								}
								var gMarker = new google.maps.Marker(objConfigMarker);
								//gMarker.setIcon('../../admin/us.png');
								var gCoder = new google.maps.Geocoder();
								var objInformation = {
									address: 'Jaime Roldos, Gualaceo'
								}
								//objInformation.address
								gCoder.geocode(objInformation, fn_coder);
								function fn_coder(datos){
									var coordenadas = datos[0].geometry.location;
									var config = {
										map:gMapa,
										position:coordenadas,
										title: 'Tienda'
									}
									var gMarkerDV = new google.maps.Marker(config)
									gMarkerDV.setIcon('../../admin/store.png')
									//var objHTML = {
									//	content:'<div style="height:150px; width:300px;" class="col-md-12">
									//				<div class="form-group">  
									//				StoreLine, tu tiendita en linea                    
									//				</div>
									//			</div>'
									//}
									//var gIW = new google.maps.InfoWindow( objHTML );
									//google.maps.event.addListener(gMarkerDV,'click',function(){
									//	gIW.open( gMapa, gMarkerDV);
									//});
									var objConfigDR={
										map: gMapa,
										suppressMarkers: true
									}
									var objConfigDS={
										origin: objInformation.address,
										destination:gLatLon,
										travelMode: google.maps.TravelMode.DRIVING
									}


									var ds = new google.maps.DirectionsService();
									var dr = new google.maps.DirectionsRenderer( objConfigDR );

									ds.route(objConfigDS, fnRutear);

									function fnRutear( resultados, status ){

										if(status=='OK'){
											dr.setDirections(resultados);
										}else{
											alert('Error :'+status);
										}

									}




								}
								//var coordenada = lat+','+lon
								//divMapa.innerHTML = lat+','+lon;
								//divMapa.innerHTML = '<img src="https://maps.googleapis.com/maps/api/staticmap?markers='+coordenada+'"&key=AIzaSyCfEnRziz09pG_OBmrz01pB0X5XXBBFOMg&signed_in=true&callback=initMap />';
								//divMapa.innerHTML = '<img src="https://maps.googleapis.com/maps/api/staticmap?center='+coordenada+'&markers='+coordenada+'&zoom=16&size=640x400&path=weight:3%7Ccolor:blue%7Cenc:{coaHnetiVjM??_SkM??~R&key=AIzaSyCfEnRziz09pG_OBmrz01pB0X5XXBBFOMg&signed_in=true&callback=initMap"/>';
								

							}
							function mostrar_objeto(obj){
								for (var prop in obj) {
									document.write(prop+': '+obj[prop] +'<br />');
								};
							}
						</script>

						<!-- Se escribe un mapa con la localizacion anterior-->


					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer content -->
	@include('admin.partials.footer') 
	<!-- /footer content -->
</div>
<!-- /page content -->
@stop
