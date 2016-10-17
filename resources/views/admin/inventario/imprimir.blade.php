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