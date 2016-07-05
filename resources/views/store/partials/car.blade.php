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
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($cart as $item)
						<tr>
							<td class="cart_price">
								<a href=""><img src="{{ $item->img }}" alt="" width="60"></a>
							</td>
							<td class="cart_price">
								<p>{{ $item->nombre }}</p>
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
										<td>Iva</td>
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