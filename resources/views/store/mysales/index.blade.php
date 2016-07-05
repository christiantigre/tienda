@extends('store.template')
@section('content')

<section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="price">Fecha</td>
                            <td class="price">Estado</td>
                            <td class="price">Total</td>
                            <td class="price">Forma de pago</td>
                            <td class="price">Lugar de entrega</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr>
                            <td class="cart_price">
                                <p>{{$pedido->date }}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{$pedido->status->statu }}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{ number_format($pedido->total,2) }}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{$pedido->paymethods->namemethod }}</p>
                            </td>
                            <td class="cart_price">
                                <p class="cart_total_price">{{$pedido->entrega }}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ route('mysalesshow',$pedido->id) }}" tittle="MOSTRAR"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
@stop
