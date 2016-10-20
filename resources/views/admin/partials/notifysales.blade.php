@if(count($products)>0)


<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Ventas inferiores a {{ $val_sale }}<small>ventas</small></h2>
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
        Se han encontrado ventas inferiores al valor preestablecido en la configuraci&oacuten de notificaciones.
      </p>
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Num Pedido</th>
            <th>Cliente</th>
            <th>Contacto</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Total</th>
          </tr>
        </thead>


        <tbody>
          <?Php $i=1; ?>
          @foreach($sales as $sale)                   
          <tr>
            <td><?Php echo  $i; ?></td>
            <td>{{ $sale->numpedido }}</td>
            <td>{{ $sale->name }} {{ $sale->apellidos }}</td>
            <td>{{ $sale->telefono }} {{ $sale->celular }}</td>
            <td>{{ $sale->email }}</td>
            <td>{{ $sale->fecha }}</td>
            <td>{{ number_format($sale->total,2) }}</td>
          </tr>
          <?Php $i++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endif