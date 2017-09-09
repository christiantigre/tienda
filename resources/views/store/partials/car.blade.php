@extends('store.template')
@section('content')

			<!--<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>-->
			<div class="table-responsive cart_info">
				@if(count($cart))
				<a class="btn btn-primary" href="{{ route('cart-trash') }}"><i class="fa fa-close"></i> VACIAR CARRITO</a>

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Precio</td>
							<td class="quantity">Cantidad</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($cart as $item)
						<tr>
							<td class="cart_price">
								<a href="{{ route('product-detail', $item->slug) }}"><img src="/upload/products/{{ $item->img }}" alt="" width="60"></a>
							</td>
							<td class="cart_price">
								<p>{{ $item->nombre }}</p><br/>
								@if(!empty($item->sizes))
								<p><h6>Talla : {{ $item->sizes }}</h6></p>
								@endif
								@if(!empty($item->preferences))
								<p><h6>Color : {{ $item->preferences }}</h6></p>
								@endif
								@if(!empty($item->numbers))
								<p><h6>Número : {{ $item->numbers }}</h6></p>
								@endif
							</td>
							<td class="cart_price">
								<p>{{ number_format($item->pre_ven,2) }}</p>
							</td>
							<td>
								<div class="cart_quantity_button">
									<input
									type="number"
									class="btn-update-item"
									min="1"
									max="{{ $item->cant }}"
									value="{{ $item->cantt }}"
									id="product_{{ $item->id }}"
									data-href="{{ route('cart-update',[ $item->slug, null] )}}"
									data-id = "{{ $item->id }}"
									required="required"
									size="2"
									>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ number_format( $item->pre_ven * $item->cantt,2 ) }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ route('cart-delete', $item->slug) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Sub Total</td>
										<td>${{ number_format($sub,2) }}</td>
									</tr>
									<tr>
										<td>Iva {{ $iv }}%</td>
										<td>${{ number_format($iva,2) }}</td>
									</tr>
									<tr>
										<td>Total</td>
										<td><span>${{ number_format($total,2) }}</span></td>
									</tr>
									<tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="4">&nbsp;</td>
								<td colspan="4">
									<table>
										<tr>
											<hr>
											<a class="btn btn-primary" href="{{ route('home') }}"><i class="fa fa-shopping-cart"></i> SEGUIR COMPRANDO</a>
											<br>
											<a class="btn btn-primary" href="{{ route('order-detail',Auth::user()->id) }}"><i class="fa fa-dollar"></i> DETALLE DE PEDIDO</a>
										</tr>
									</table>
								</td>

							<!--<td>
								<a href="http://localhost/certificado/documento.php?id_firma={{ 'NN0O-AGOF-4OTF-RYT1-4286-6927-7907' }}"><i class="fa fa-lock"></i></a>
							<!-- </td>
							<td> -->
								<!--<a href="http://services.viafirma.com/viafirma/v/{{ 'NN0O-AGOF-4OTF-RYT1-4286-6927-7907' }}?j=true"><i class="fa fa-barcode"></i></a>
							<!-- </td>
							<td> -->
								<!--<a href="http://services.viafirma.com/viafirma/v/{{ 'NN0O-AGOF-4OTF-RYT1-4286-6927-7907' }}?o=true"><i class="fa fa-cloud-download"></i></a>
							</td>-->

						</tr>
					</tbody>
				</table>
				<section id="do_action">
					<div class="container">
						<div class="heading">
							<h3></h3>
							<p>{{ $mensaje }}</p>
						</div>
					</div>
				</section>
				@else
				<h3>No hay Items en su carrito</h3>
				<a class="btn btn-primary" href="{{ route('home') }}"><i class="fa fa-shopping-cart"></i> IR DE COMPRAS</a>
				<h2></h2>
				@endif
			</div>
			<script>
				$(document).ready(function(){
					$(".btn-update-item").on('click', function(e){
						e.preventDefault();
						var id = $(this).data('id');
						var href = $(this).data('href');
						var cant = $('#product_' + id).val();
						window.location.href = href + "/" + cant;
					});
				});
			</script>


			@stop
