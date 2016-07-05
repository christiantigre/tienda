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
						<img src="{{ $product->img }}"/>
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
						<label>Quantity:</label>
						<input type="number" value="1" />
						<a href="{{ route('cart-add', $product->slug) }}" class="btn btn-fefault cart">
							<i class="fa fa-shopping-cart"></i>
							Add to cart
						</a>
					</span>
					<p><b>Disponible :</b> {{ $product->cant }}</p>
					<p><b>Condición :</b> New</p>
					<p><b>Marca :</b> {{ $product->brand->brand }}</p>
					<a href="">
						<!--<img src="images/product-details/share.png" class="share img-responsive"  alt="" />-->
					</a>
				</div><!--/product-information-->
			</div>
		</div><!--/product-details-->





</div>

</div>
    </section>
		

		<!-- footer content -->
		<footer>
			@include('store.partials.footer') 
		</footer>
		<!-- /footer content -->

	</div>
	<!-- /page content -->

</body>
</html>
