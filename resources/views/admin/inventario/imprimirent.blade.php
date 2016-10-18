<!DOCTYPE html>

<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <title>Inventario de entregas</title>
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
    <h1>INVENTARIO DE ENTREGAS</h1>
    <table class="detall" width="100%" border="1" cellspacing="0">

      <thead>
        <tr>
          <th>#</th>
          <th>Entrega</th>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>Contacto</th>
          <th>Provincia</th>
          <th>Estado</th>
        </tr>
      </thead>

      <tbody>
        <?Php $i=1;?>
        @foreach($entregas as $entrega)
        <tr>
         <td><?php echo $i; ?></td>
         <td>
          {{ $entrega->entrega }}
        </td>
        <td>
          {{ $entrega->date }}
        </td>
        <td>{{ $entrega->name }} {{ $entrega->apellidos }}</td>
        <td>{{ $entrega->telefono }} {{ $entrega->celular }}</td>
        <td>{{ $entrega->prov    }}</td>
        <td>{{ $entrega->statu    }}</td>
      </tr>
      <?php $i++;?>
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















