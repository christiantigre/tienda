                    <div class="brands_products"><!--brands_products-->
                        <h2>Marcas</h2>
                        <div class="brands-name">
                            @foreach ($brands as $brand)
                                    <ul class="nav nav-pills nav-stacked">                              
                                        <li><a href="{{ route('brandssearch', encrypt($brand->brand_id)) }}" title='Ver {{ $brand->brand }}'> <span class="pull-right">({{ $brand->cantidad }})</span>{{ $brand->brand }}</a></li>
                                    </ul>
                            @endforeach
                        </div>                        
                    </div><!--/brands_products-->
