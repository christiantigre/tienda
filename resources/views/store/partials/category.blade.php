<h2>Categorías</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <div class="panel panel-default">
        @foreach ($sections as $section)
            <div class="panel-heading">                                        
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#{{ $section->name }}">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        {{ $section->name }}
                    </a>
                </h4>
            </div>

            <div id="{{ $section->name }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul> 
                            @foreach($section->subsection->take(7) as $subsecciones)
                                <li><a href="{{ route('subcategorias', array(encrypt($subsecciones->category->id),encrypt($section->id))) }}">{{$subsecciones->category->name}}</a></li>
                            @endforeach
                            <li><a href="{{ route('new', encrypt($section->id)) }}" title="NUEVOS PRODUCTOS PARA {{ $section->name }}"><strong>Nuevos</strong></a></li>
                            <li><a href="{{ route('promo', encrypt($section->id)) }}" title="PROMOCIONES PARA {{ $section->name }}"><strong>Promociones</strong></a></li>
                            <li><a href="{{ route('morecategories', encrypt($section->id)) }}" title="MÁS PRODUCTOS PARA {{ $section->name }}"><strong>Ver más...</strong></a></li>
                    </ul> 
                </div>
            </div>
        @endforeach
    </div>
</div><!--/category-products-->
