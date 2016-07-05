@extends('store.template')

@section('content')

@if(Session::has('flash_message.message'))
<div class="alert alert-{{ Session::get('flash_message.level') }}">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{ Session::get('flash_message.message') }}
</div>
@endif


<div class="row">
	<div class="col-sm-3">
		<div class="left-sidebar">
			<h2>Category</h2>
			<!--category-productsr-->
			@include('store.partials.category')
			<!--/category-productsr-->

			<!--brands_products-->
			@include('store.partials.brands')
			<!--/brands_products-->

			<div class="price-range"><!--price-range-->
				<h2>Price Range</h2>
				<div class="well">
					<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
					<b>$ 0</b> <b class="pull-right">$ 600</b>
				</div>
			</div><!--/price-range-->

			<div class="shipping text-center"><!--shipping-->
				<img src="{{ asset('images/home/shipping.jpg') }}" alt="" />
			</div><!--/shipping-->

		</div>
	</div>
	<div class="col-sm-9 padding-right">
		<div class="product-details"><!--product-details-->
			<div id="window" class="magnify">
				<div class="magnify_glass"> </div>
				<div class = "element_to_magnify">
					<img src="{{ $product->img }}" draggable="false"/>
				</div>
			</div>
			<div class="col-sm-5">
						<div class="view-product">
							<img src="{{ $product->img }}" alt="" />
	    				</div>
						<h3>ZOOM</h3>
			</div>
			<div class="col-sm-7">
				<div class="product-information"><!--/product-information-->

					<img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt="" />
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
@stop