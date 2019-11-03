


<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
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
        Pedidos 
      </p>
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Acciones</th>
            <th>Num Pedido</th>
            <th>Estado</th>
            <th>Lugar de entresa</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Total</th>
          </tr>
        </thead>


        <tbody>
          <?Php $i=1; ?>
          @foreach($pedidos as $sale)                   
          <tr>
            <td><?Php echo  $i; ?></td>
            <td>
              <a href="{{ route('admin.sales.show',$sale->id) }}" class="btn btn-default"> <!--ver-->
                <i class="fa fa-eye"></i>
              </a>
              <a href="{{ route('admin.sales.edit',$sale->id) }}" class="btn btn-warning"> <!--edit-->
                <i class="fa fa-pencil-square"></i>
              </a>
            </td>
            <td>{{ $sale->id }}</td>
            <td> {{ $sale->status->statu }} </td>
            <td>{{ $sale->entrega }}</td>
            <td>{{ $sale->users->email }}</td>
            <td>{{ $sale->date }}</td>
            <td>{{ number_format($sale->total,2) }}</td>
          </tr>
          <?Php $i++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
