@if(count($products)>0)


<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Se ha encontrado productos con el valor m&iacutenimo de stock {{ $min_prod }}<small>productos</small></h2>
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
      <p class="text-muted font-13 m-b-30">
        Los productos que se muestran en esta lista se encuentran actualmente con estado cr&iacutetico de agotarse.
      </p>
      <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Cod barra</th>
            <th>Cantidad</th>
            <th>P.V.P.</th>
            <th>Nuevo</th>
            <th>Promoci&oacuten</th>
            <th>Catalogo</th>
          </tr>
        </thead>


        <tbody>
          <?Php $i=1; ?>
          @foreach($products as $product)                   
          <tr>
            <td><?Php echo  $i; ?></td>
            <td>{{ $product->nombre }}</td>
            <td>{{ $product->codbarra }}</td>
            <td>{{ $product->cant }}</td>
            <td>{{ number_format($product->pre_ven,2) }}</td>
            <td>{{ $product->nuevo ==1 ? "Si" : "No" }}</td>
            <td>{{ $product->promocion ==1 ? "Si" : "No" }}</td>
            <td>{{ $product->catalogo ==1 ? "Si" : "No" }}</td>
          </tr>
          <?Php $i++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endif