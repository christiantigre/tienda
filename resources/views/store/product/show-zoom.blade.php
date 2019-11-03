<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http=//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<link href="{{ asset('zoomy/css/jfMagnify.css') }}" rel="stylesheet" type="text/css" />
	<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="{{ asset('zoomy/js/jquery.jfMagnify.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var scaleNum = 2;
			$(".magnify").jfMagnify();
			$('.plus').click(function(){
				scaleNum += .5;
				if (scaleNum >=3) {
					scaleNum = 3;
				};
				$(".magnify").data("jfMagnify").scaleMe(scaleNum);
			});
			$('.minus').click(function(){
				scaleNum -= .5;
				if (scaleNum <=1) {
					scaleNum = 1;
				};
				$(".magnify").data("jfMagnify").scaleMe(scaleNum);
			});
			$('.magnify_glass').animate({
				'top':'60%',
				'left':'60%'
			},{
				duration: 3000, 
				progress: function(){
					$(".magnify").data("jfMagnify").update();
				}, 
				easing: "easeOutElastic"
			});
		});
	</script>
</head>

<body>
	<div class="right_col" role="main">
		<header id="header"><!--header-->
			@include('store.partials.header')

		</header>


		<section id="advertisement">
			{!! Form::model($product, ['route' => ['cart-add', $product->slug]]) !!}
			<div class="container">
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">

							<div id="window" class="magnify" data-magnified-zone=".mg_zone">
								<div class="magnify_glass">
									<div class="mg_ring"></div>
									<div class="pm_btn plus"><h2 class="ext">+</h2></div>
									<div class="pm_btn minus"><h2 class="ext">-</h2></div>
									<div class="mg_zone"></div>
								</div>
								<div class = "element_to_magnify">
									<img src="{{ asset('upload/products') }}/{{$product->img }}"/>
								</div>
							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->

								<img src="{{ asset('images/product-details/new.jpg') }}" style="width:50px;" class="newarrival" alt="" />
								<h2>{{ $product->prgr_tittle }}</h2>
								<p>{{ $product->nombre }}</p>
								<p>{{ $product->category->name }}</p>
								<!--<img src="images/product-details/rating.png" alt="" />-->
								<span>
									<span>US ${{ number_format($product->pre_ven,2) }}</span>
									<label>Cantidad:</label>
									<input type="number" id="cantidadprod" name="cantidadprod" min="1" max="{{ $product->cant }}" value="1" />
<!--<a href="{{ route('cart-add', $product->slug) }}" onclick="new PNotify({
title: 'Agregándo...',
text: '',
type: 'success'
});" class="btn btn-default add-to-cart" class="btn btn-fefault cart">
<i class="fa fa-shopping-cart"></i>
Agregar
</a>-->
@if($product->cant>0)
<button type="submit" name="agregar" onclick="new PNotify({
	title: 'Agregándo...',
	text: '',
	type: 'success'
});" value="Agregar" class="btn btn-success add-to-cart" class="btn btn-success cart"><i class="fa fa-shopping-cart"></i>Agregar</button>
@elseif($product->cant<=0)
<button type="button" name="agotado" onclick="new PNotify({
	title: 'Agotado...',
	text: '',
	type: 'success'
});" value="Agotado" class="btn btn-warning add-to-cart" class="btn btn-warning cart"><i class="fa fa-shopping-cart"></i>Producto Agotado</button>
@endif
</span>

<p><b>Sección :</b> {{ $product->sections->name }}</p>
<p><b>Disponible :</b> {{ $product->cant }}</p>
<p><b>Marca :</b> {{ $product->brand->brand }}</p>
<p><b>Condición :</b> 
	<div class="bs-example-popovers">
		<form id="condiciones" name="condiciones" method="GET">
			<p>
				@if(count($nuevos)>0)
				@foreach($nuevos as $nuevo)
				@if($nuevo->nuevo == '1')
				Nuevo
				@else
				@endif											                
				@endforeach
				@else       
				@endif
				<br/>
				@if(count($promociones)>0)
				@foreach($promociones as $promocion)
				@if($promocion->promocion == '1')
				Promoción
				@else
				@endif 
				@endforeach
				@else       
				@endif
			</p>
		</form>
	</div>
</p>
<p><b>Tamaño :</b> 
	<label id="ltamano" name="ltamano" value="" />
	<div class="bs-example-popovers">
		<input type="hidden" id="tamano" name="tamano" value="" required="required" />
		<form id="sizes" name="sizes" method="GET">									
			@if(count($sizes)>0)
			@foreach($sizes as $size)
			<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" value="{{$size->size->name}}" id="{{$size->size->id}}" title="" onclick="tamano(this.id,this.value)">
				<b>({{$size->size->abreviatura}}) </b>                      
			</button>
			@endforeach
			@else       
			<p>0 resultados</p>
			@endif
		</form>
	</div>									
</p>
<p><b>Color :</b>
	<label id="lcolor" name="lcolor" value=""/> 
	<div class="bs-example-popovers">
		<input type="hidden" id="color" name="color" value="" required="required"/>
		<form id="availables" name="availables" method="GET">
			@if(count($availables)>0)
			@foreach($availables as $available)
			<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." id="{{$available->availables->id}}" value="{{$available->availables->name}}" data-original-title="" title="" onclick="color(this.id,this.value)">
				{{$available->availables->name}}
			</button>
			@endforeach
			@else     
			<p>0 resultados</p>
			@endif	
		</form>		
	</div>									
</p>
<p><b>Número :</b>
	<label id="lnumero" name="lnumero" value="" />
	<div class="bs-example-popovers">
		<input type="hidden" id="numero" name="numero" value="" required="required"/>
		<form id="numbers" name="numbers" method="GET">							
			@if(count($numbers)>0)
			@foreach($numbers as $number)
			<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." id="{{$number->numbersizes->id}}" value="{{$number->numbersizes->number}}" data-original-title="" title="" onclick="numero(this.id,this.value)">
				{{$number->numbersizes->number}}
			</button>
			@endforeach
			@else   
			<p>0 resultados</p>
			@endif
		</form>
	</div>								

</p>
<p><b>Cod barra :</b></p>

{!! DNS1D::getBarcodeHTML($product->codbarra, "C128") !!}
<a href="">
	<!--<img src="images/product-details/share.png" class="share img-responsive"  alt="" />-->
</a>
<!--OMPARTIR REDES SOCIALES-->
<script type="text/javascript">
	var URLactual = window.location;
	document.getElementById("fb").value=URLactual;								
	elemento.setAttribute("data-href", URLactual);
</script>
<div id="fb" class="fb-like" data-href="http://facebook/storeli.nect" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!--FIN COMPARTIR REDES SOCIALES-->
</div><!--/product-information-->
</div>
</div><!--/product-details-->





</div>

</div>
{{ Form::close() }}

</section>


<!-- footer content -->
<footer>
	@include('store.partials.footer') 
</footer>
<!-- /footer content -->

</div>
<!-- /page content -->
<script type="text/javascript">
	function tamano($tamano,$val){
		$('#ltamano').text($val);
		$('#tamano').val($val);
	}
	function color($color,$val){
		$('#lcolor').text($val);
		$('#color').val($val);
	}
	function numero($numero,$val){
		$('#lnumero').text($val);
		$('#numero').val($val);
	}
</script>
</body>
</html>
