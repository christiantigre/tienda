@foreach($dt_empress as $dt_empres)
<div>Dirección Matriz :
  {{ $dt_empres->dirmatriz }}</div>
  <div>Dirección Sucursal :
    {{ $dt_empres->dir }}</div>
    <div>OBLIGADO A LLEVAR CONTABILIDAD : 
      @if ($dt_empres->obligadocontbl===0)
      NO
      @elseif($dt_empres->obligadocontbl===1)
      SI           
      @endif
    </div>
    <div>
      Teléfonos :
      {{ $dt_empres->tlfun }}/{{ $dt_empres->tlfun }}
    </div>
    <div>
      Celular
      {{ $dt_empres->cel }}
    </div>
    <div>
      Fáx
      {{ $dt_empres->fax }}
    </div>
    <div>
      R.U.C. :
      {{ $dt_empres->ruc }}
    </div>
    FACTURA
    Nro :

    Número:
    {{22232016}}

    Fecha :
    {{22/23/2016}}
    
    Ambiente :
    {{ $dt_empres->ambiente }}
    
    Emisión :
    NORMAL
  </div>
  <div>
    Página WEB :
    {{ $dt_empres->pagweb }}
  </div>
  <div>
    CLAVE DE ACCESO
  </div>
  <div id="logo">
    <img src="logo.png">
  </div>

  @endforeach