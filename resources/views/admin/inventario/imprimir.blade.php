<!DOCTYPE html>

<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <title>Inventario de productos</title>
  <link href="cssInventario/Inventario.css" rel="stylesheet"/>
  
</head>

<body>
  <header class="clearfix">
    <div class="left">
      @foreach($dt_empress as $entidad)
      <strong class="negrita">{{ $entidad->nom }}</strong>
      @endforeach 
    </div>
    <div class="center" id="der">
      <strong class="negrita"></strong>
    </div>
    <div class="right" id="der">
      <strong class="negrita">{{ $date }}</strong>
    </div> 
  </header>
  <center>

    <fieldset id="datafac" class="radius">
      <div class="left">       
        @foreach($clients as $cliente)
        <strong class="negrita">Emitido por : {{ $cliente->name }} {{ $cliente->apellidos }}</strong><br/>
        <strong class="negrita">C.I. : {{ $cliente->cedula }}</strong><br/>
        @endforeach 
      </div>
    </fieldset>
    <h1>INVENTARIO</h1>
    <table class="detall" width="100%" border="1" cellspacing="0">

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
      @foreach($sumas as $suma)
       <tr>
        <td></td>
        <td></td>
        <td>${{ number_format($suma->precio,2) }}</td>
        <td>{{ $suma->cantidad }}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</center>

<div class="alert">
  <strong class="inportant">
    ESTE DOCUMENTO NO TENDRÁ FUERZA O EFECTO HASTA QUE SEA REVISADO Y FIRMADO POR UN FUNCIONARIO DE LA EMPRESA 
  </strong>
</div>
<div class="alert">
  <center>
    <strong class="inportant">
      _____________________________________ <br/>
    </strong>
    Firma<br/>
    C.I.: ________________________<br/>
  </center>
</div>


<footer class="footer">
  <center>
    @foreach($dt_empress as $entidad)
    {{ $entidad->nom }} {{ $entidad->observ }} Contáctos ( {{ $entidad->tlfun }} - {{ $entidad->tlfds }} ) Celulár {{ $entidad->cel }} fáx {{ $entidad->fax }} dir {{ $entidad->dir }} nuestra página web {{ $entidad->pagweb }}.
    {{ $entidad->prop }} correo {{ $entidad->email }}.
    @endforeach
  </center>
</footer>
</body>

</html>















