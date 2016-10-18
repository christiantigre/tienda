@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h3>
          Inventario de Ventas
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
          <h2>Ventas <small>  </small></h2>
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

          <a href="{{ route('admin.inventario.imprimirvtn') }}" class="btn btn-default">
           <i class="fa fa-eye"></i> VER 
           </a>

           <a href="{{ route('admin.inventario.downloadvtn') }}" class="btn btn-danger">
           <i class="fa fa-download"></i> PDF 
           </a>

           <a href="{{ route('admin.inventario.excelvtn') }}" class="btn btn-success">
           <i class="fa fa-download"></i> EXCEL 
           </a>
           
         </h1>
         
       </div>
       <p class="text-muted font-13 m-b-30">
        <div class="x_content">
         <!---->
       </p>
       <table id="datatable" class="table table-striped table-bordered">

        <thead>
          <tr>
            <th>#</th>
            <th>Factura</th>
            <th>Venta</th>
            <th>Cliente</th>
            <th>Conacto</th>
            <th>Subtotal</th>
            <th>Iva</th>
            <th>Total</th>
            <th>Entrega</th>
          </tr>
        </thead>

        <tbody>
        <?php $i = 1;?>
         @foreach($sales as $venta)
         <tr>
         <td><?php echo $i; ?></td>
          <td>
            {{ $venta->numfactura }}
          </td>
          <td>
            {{ $venta->date }}
          </td>
          <td>{{ $venta->name }} {{ $venta->apellidos }}</td>
          <td>{{ $venta->telefono }} {{ $venta->celular }}</td>
          <td>${{ number_format($venta->subtotal,2) }}</td>
          <td>${{ number_format($venta->iva,2) }}</td>
          <td>${{ number_format($venta->total,2) }}</td>
          <td>{{ $venta->entrega    }}</td>
        </tr>
        <?php $i++;?>
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