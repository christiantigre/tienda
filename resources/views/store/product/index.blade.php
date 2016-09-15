@extends('store.template')
@section('content')


<div class="row">
    <div class="col-sm-3">
        <div class="left-sidebar">
            
            <!--category-productsr-->
            @include('store.partials.category')
            <!--/category-productsr-->                    
            <!--brands_products-->
            @include('store.partials.brands')
            <!--/brands_products-->                        
            <div class="price-range"><!--price-range-->
                            <!--<h2>Price Range</h2>
                            <div class="well">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b>$ 0</b> <b class="pull-right">$ 60</b>
                             </div>-->
                         </div><!--/price-range-->                        
                         <div class="shipping text-center"><!--shipping-->
                            <img src="{{ asset('images/home/shipping.jpg') }}" alt="" />
                        </div><!--/shipping-->                        
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        @if(count($products)>0)
                        
                        @foreach($products as $product )
                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/upload/products/{{$product->img }}" alt="" width="200" />
                                        <h2>{{$product->pre_ven }}</h2>
                                        <p>{{$product->nombre }}</p>
                                        <br>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <a href="{{ route('product-detail', $product->slug) }}" class="btn btn-default add-to-cart">
                                                <img src="/upload/products/{{$product->img }}" alt="" width="200"/>
                                            </a>
                                            <h2>{{$product->pre_ven }}</h2>
                                            <p>{{$product->prgr_tittle }}</p>
                                            <p>Nuestros precios ya incluyen <strong>iva</strong></p>
                                            <a href="{{ route('product-detail', $product->slug) }}" class="btn btn-default add-to-cart" onclick="new PNotify({
                                                title: 'Agregándo...',
                                                text: '',
                                                type: 'info'
                                            });"><i class="fa fa-shopping-cart"></i>Agregar</a>
                                            <a href="{{ route('product-detail', $product->slug) }}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-info-circle"></i>Detalles
                                            </a>
                                        </div>
                                    </div>
                                    @if($product->nuevo == 1)
                                    <img src="{{ asset('images/home/new.png') }}" class="new" alt="" />
                                    @else
                                    @endif
                                    @if($product->promocion == 1)
                                    <img src="{{ asset('images/home/sale.png') }}" class="new" alt="" />
                                    @else
                                    @endif
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li>
                                            <a href="{{ route('product-detail', $product->slug) }}" onclick="new PNotify({
                                                title: 'Agregándo...',
                                                text: '',
                                                type: 'info'
                                            });" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>Agregar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('product-detail', $product->slug) }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-info-circle"></i>Detalles
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach

                    @else
                    <div class="col-sm-4">
                        <h2>No se encontró ningún ítem...</h2>
                    </div>
                    @endif


                    <?Php echo $products->render(); ?>

                    @stop
                    <script type="text/javascript">
                        function back(){
                            window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
}
</script>


</div>
</div>
</div>