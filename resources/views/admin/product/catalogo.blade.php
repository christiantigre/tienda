@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h3>
          Catalogo de Productos
          <small>

          </small>
        </h3>
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
          <h2>Catálogo <small>  </small></h2>
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
         <h1>

          <a href="{{ route('admin.product.create') }}" class="btn btn-success">
           <i class="fa fa-plus-circle"></i> Producto</a>
           
         </h1>
         
       </div>
       <p class="text-muted font-13 m-b-30">
        <div class="x_content">
         <!---->
       </p>
       

       <div class="col-sm-9 padding-right">
         <center>
          <div class="features_items"><!--features_items-->
            @if(count($products)>0)
            @foreach($products as $product )
            <div class="col-sm-4">
             <div class="product-image-wrapper">
               <div class="single-products">                     
                <div class="product-overlay">
                  <div class="overlay-content">
                    <img src="/upload/products/{{$product->img }}" alt="" width="200"/>
                    <h2>{{$product->pre_ven }}</h2>
                    <p>{{$product->prgr_tittle }}</p>
                    <p>Nuestros precios ya incluyen <strong>iva</strong></p>

                  </div>
                </div>
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
        </div>
      </center>
    </div>


  </div>
  <hr>

</div>
</div>

</div>
</div>
</div>
@stop