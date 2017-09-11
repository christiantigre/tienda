@extends('admin.template')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Detalle :: Producto</h3>
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
            <h2>Descripci&oacute;n</h2>
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
            {!! Form::model($product, array('route' => array('admin.product.update', $product->slug))) !!}
            <div class="col-md-7 col-sm-7 col-xs-12">
              <div class="product-image">
                <img src="/upload/products/{{ $product->img }}" alt="..." />
              </div>
              <div class="product_gallery">
                <a>
                  <img src="/upload/products/{{ $product->img }}" alt="..." />
                </a>
                <a>
                  <img src="/upload/products/{{ $product->img }}" alt="..." />
                </a>
                <a>
                  <img src="/upload/products/{{ $product->img }}" alt="..." />
                </a>
                <a>
                  <img src="/upload/products/{{ $product->img }}" alt="..." />
                </a>
              </div>
            </div>

            <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

              <h3 class="prod_title">{{ $product->nombre }}</h3>

              <p>{{ $product->prgr_tittle }}</p>

              <br />

              <div class="">
                <h2>Cod. barra <small>{{ $product->codbarra }}</small></h2>
                {!! DNS1D::getBarcodeHTML($product->codbarra, "C128") !!}
              </div>
              <br />

              <div class="">
                <div class="product_price">
                  <h1 class="price">Pvp venta: ${{ number_format($product->pre_ven,2) }}</h1>
                  <span class="price-tax">Pvp compra: ${{ number_format($product->pre_com,2) }}</span>
                  <br>
                </div>
              </div>
              <div class="">
                <div class="product_price">
                  <h3 class="prod_title">Sección : {{ $product->sections->name }}</h3>
                  <h3 class="prod_title">Categor&iacute;a : {{ $product->category->name }}</h3>
                  <h3 class="prod_title">Marca : {{ $product->brand->brand }}</h3>
                  <h3 class="prod_title">Activo : {{ $product->isactive_id ==1 ? "Si" : "No" }}</h3>
                  <h3 class="prod_title">Nuevo : {{ $product->nuevo ==1 ? "Si" : "No" }}</h3>
                  <h3 class="prod_title">Promoci&oacute;n : {{ $product->promocion ==1 ? "Si" : "No" }}</h3>
                  <h3 class="prod_title">Catalogo : {{ $product->catalogo ==1 ? "Si" : "No" }}</h3>
                  <h3 class="prod_title">Stock : {{ $product->cant }}</h3>
                  <h3 class="prod_title">Tamaños :
                    @if(count($sizes)>0)
                    @foreach($sizes as $size)
                    <h4>({{$size->size->abreviatura}}) - {{$size->size->name}}</h4>
                    @endforeach
                    @else
                    <h4>0 resultados</h4>
                    @endif
                  </h3>
                  <h3 class="prod_title">Números :
                    @if(count($numbers)>0)
                    @foreach($numbers as $number)
                    <h4>{{$number->numbersizes->number}}</h4>
                    @endforeach
                    @else
                    <h4>0 resultados</h4>
                    @endif
                  </h3>
                  <h3 class="prod_title">Preferencias :
                    @if(count($availables)>0)
                    @foreach($availables as $available)
                    <h4>{{$available->availables->name}}</h4>
                    @endforeach
                    @else
                    0 resultados
                    @endif
                  </h3>
                  <br>
                </div>
              </div>


            </div>


            <div class="col-md-12">

              <div class="form-group">

                <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Regresar</a>

              </div>


            </div>
            {{ Form::close() }}
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
