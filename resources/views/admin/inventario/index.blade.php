@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h3>
          Inventario de Productos
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
          <h2>Productos <small>  </small></h2>
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

          <a href="{{ route('admin.inventario.imprimir') }}" class="btn btn-success">
           <i class="fa fa-download"></i> Producto</a>
           
         </h1>
         
       </div>
       <p class="text-muted font-13 m-b-30">
        <div class="x_content">
         <!---->
       </p>
       <table id="datatable" class="table table-striped table-bordered">

        <thead>
          <tr>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Sección</th>
            <th>Categoria</th>
            <th>Marca</th>
          </tr>
        </thead>

        <tbody>
         @foreach($products as $product)
         <tr>
          <td>
            {{ $product->slug }}
          </td>
          <td>
            {{ $product->nombre }}
          </td>
          <td>${{ number_format($product->pre_ven,2) }}</td>
          <td>{{ $product->cant }}</td>
          <td>{{ $product->name    }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->brand }}</td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  <hr>

  <?Php 
  //echo $products->render(); 
  ?>

</div>
</div>

</div>
</div>
</div>
@stop