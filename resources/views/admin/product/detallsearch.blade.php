@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h3>
          Productos
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
          <a href="{{ route('admin.product.searchproduct') }}" class="btn btn-primary">
          <i class="fa fa-reply"></i> Regresar</a>           

         </h1>
         
       </div>
       <p class="text-muted font-13 m-b-30">
        <div class="x_content">
         <!---->
       </p>
       <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Producto</th>
            <th>Nombre</th>
            <th>Cod barra</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Activo</th>
            <th>Catálogo</th>
          </tr>
        </thead>


        <tbody>
         @foreach($products as $product)
         <tr>
          <td>
            <a href="{{ route('admin.product.show',$product->slug) }}" title="DETALLES" class="btn btn-default">
              <i class="fa fa-eye"></i>
            </a>
          </td>
          <td>
           {!! Form::open(['route'=> ['admin.product.destroy', $product->slug]]) !!}
           <input type="hidden" name="_method" value="DELETE">	
           <button onClick="return confirm('Desea eliminar este registro?')" title="ELIMINAR" class="btn btn-danger">
            <i class="fa fa-trash-o"></i>
          </button>
          {!! Form::close() !!}
        </td>
        <td>
         <a href="{{ route('admin.product.edit',$product->slug) }}" title="MODIFICAR" class="btn btn-warning">
          <i class="fa fa-pencil-square"></i>
        </a>
      </td>
      <td>
        <img width="75" height="75" src="/upload/products/{{ $product->img }}" alt="img" />
      </td>
      <td>{{ $product->nombre }}</td>
      <td>{{ $product->codbarra }}</td>
      <td>{{ $product->cant }}</td>
      <td>${{ number_format($product->pre_ven,2) }}</td>
      <td>{{ $product->category->name }}</td>
      <td>{{ $product->isactive_id ==1 ? "Si" : "No" }}</td>
      <td>{{ $product->catalogo ==1 ? "Si" : "No" }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<hr>



</div>
</div>

</div>
</div>
</div>
@stop