<!DOCTYPE html>

<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <title>Factura Electr&oacute;nica</title>
  <link href="cssFactura/factura.css" rel="stylesheet"/>
  

</head>

<body>
  <header class="clearfix">
    <h1>FACTURA</h1>    
  </header>
  <table class="factura" width="450" border="0" cellspacing="0">

    <tr>

      <td>

       <table width="100%" border="0">

        <tr>
          @foreach($dt_empress as $dt_empres)
          <td width="49%" rowspan="2"  align="center" valign= "bottom">
            <div class="logo">
              <img src="logo.png" height="100" alt="logo"/>
            </div>
            <br/>

            <span style="font-size:18px;"><strong>{{ $dt_empres->nom }}</strong></span><br/>

            <span style="font-size:12px;"><strong>Dir. MATRIZ: </strong>{{ $dt_empres->dirmatriz }}<br/>

              <strong>Dir. SUCURSAL: </strong>{{ $dt_empres->dir }}<br/>

              <strong class="inportant">OBLIGADO A LLEVAR CONTABILIDAD: @if ($dt_empres->obligadocontbl===0)
                NO
                @elseif($dt_empres->obligadocontbl===1)
                SI           
                @endif</strong><br/>
                <strong>Teléfonos : </strong>{{ $dt_empres->tlfun }}/{{ $dt_empres->tlfds }}<br/>
                <strong>Móvil : </strong>{{ $dt_empres->cel }}<br/>
                <strong>Fax : </strong>{{ $dt_empres->fax }}<br/>
                
              </span></td>
              @endforeach
            </tr>

            <tr>

              <td align="left" >
                @foreach($aux_sales as $autoriz)
                <fieldset id="datafac" class="radius">
                  @foreach($dt_empress as $dt_emp)                  
                  <span style="font-size:12px;"><strong class="negrita">R.U.C. {{ $dt_emp->ruc }}</strong></span><br/><br/>
                  <span style="font-size:22px;"><center>FACTURA</center></span><br/><br/>
                  <span style="font-size:12px;">No. {{ $dt_emp->codestablecimiento }}-{{ $dt_emp->codpntemision }}-{{ $autoriz->numfactura }}<br/><br/>
                    <strong class="negrita">N&Uacute;MERO DE AUTORIZACI&Oacute;N:</strong><br/>
                    {{ $autoriz->num_autoriz }}
                    <br/><br/>
                    <strong class="negrita">FECHA Y HORA DE AUTORIZACI&Oacute;N:</strong><br/>
                    {{ $autoriz->fech_autoriz }}
                    <br/><br/>
                    <strong class="negrita">AMBIENTE: </strong>@if($dt_emp->ambiente==1)
                    PRUEBAS
                    @elseif($dt_emp->ambiente==2)
                    PRODUCCIÓN
                    @endif
                    <br/><br/>
                    <strong class="negrita">EMISI&Oacute;N:  </strong>{{$dt_emp->tip_emision}}<br/><br/>
                    CLAVE DE ACCESO:<br/>
                    <br/>                    
                    <div class="container text-center" style="border: 0px solid #a1a1a1;padding: 15px;width: 5px;">
                      <img width="300" height="75" src="data:image/png;base64,{{DNS1D::getBarcodePNG($autoriz->claveacceso, 'C39+',1,44) }}" alt="barcode"   />
                      <span style="font-size:11px;">{{ $autoriz->claveacceso }}</span>
                    </div>
                  </span>
                  @endforeach
                </fieldset>
                @endforeach
              </td>

            </tr>

          </table>

        </td>
      </tr>
      <tr>

        <td>

          <fieldset class="radius">
            @foreach($aux_clientes as $cliente)                  

            <table width="100%" border="0">
              <tr>
                <td class="negrita">Raz&oacute;n Social / Nombres y Apellidos:</td>
                <td>{{ $cliente->name }} {{ $cliente->apellidos }}</td>   
                <td class="negrita">RUC / CI: </td>
                <td>{{ $cliente->ruc }}</td>    
              </tr>
              <tr>
                <td class="negrita">Fecha Emisi&oacute;n:</td>
                <td>{{ $date }}</td>
                <td class="negrita">Gu&iacute;a Remisi&oacute;n:</td>
                <td></td>   
              </tr>
            </table>
            @endforeach

          </fieldset>

        </td>
      </tr>
      <tr>

        <td>
          <table class="detall" width="100%" border="1" cellspacing="0">
            <tr>
              <td><div align="center" class="inportant">Cod. Principal</div></td>
              <td><div align="center" class="inportant">Cod. Aux</div></td>
              <td><div align="center" class="inportant">Descripci&oacute;n</div></td>
              <td><div align="center" class="inportant">Cant</div></td>
              <td><div align="center" class="inportant">Precio Unitario</div></td>
              <td><div align="center" class="inportant">Descuento</div></td>
              <td><div align="center" class="inportant">Precio Total</div></td>
            </tr>
            @foreach($items as $item)                  

            <tr bgcolor=#FFFFFF>
              <td align="center">{{ $item->products->slug }}</td>
              <td align="center">{{ $item->products->id }}</td>
              <td align="center">{{ $item->products->nombre }}</td>
              <td align="center">{{ $item->cant }}</td>
              <td align="center">{{ number_format($item->prec,2) }}</td>
              <td align="center">{{ number_format($item->descuento,2) }}</td>
              <td align="center">{{ number_format((($item->cant)*($item->prec)),2) }}</td>
            </tr> 

            @endforeach
          </table>
        </td>
      </tr>
      <tr>
        <td align="right">

         <table width="100%" border="0" cellspacing="0">
           <tr>
             <td width="67%">
              <fieldset class="radius">
                @foreach($aux_clientes as $cli)                  
                <strong>INFORMACI&Oacute;N ADICIONAL</strong>
                <table>
                  <tr>
                    <td class="negrita">E-MAIL:</td><td>{{ $cli->email }}</td>
                  </tr>
                  <tr>
                    <td class="negrita">Dirección :</td> <td>{{ $cli->dir1 }} y {{ $cli->dir2 }}</td>
                  </tr>
                  <tr>
                    <td class="negrita">Teléfono :</td> <td>{{ $cli->telefono }}</td>
                  </tr>
                  <tr>
                    <td class="negrita">Móvil :</td> <td>{{ $cli->celular }}</td>
                  </tr>
                </table>
                <strong>INFORMACI&Oacute;N ENTREGA</strong>
                <table>
                  @foreach($pedidos as $entrega)
                  <tr>
                    <td class="negrita">ENTREGA :</td><td>{{ $entrega->entrega }}</td>
                  </tr>
                  @endforeach
                </table>
                @endforeach
              </fieldset>
            </td>
            <td width="33%">
              @foreach($pedidos as $tot)
              <table border="0" cellspacing="0" align="right" width="160">
               <tr>  
                <td>SUBTOTAL {{ number_format($tot->porc,2) }} %</td>
                <td align="right" width="40">{{ number_format($tot->subtotal,2) }}</td>
              </tr>
              <tr>
                <td>SUBTOTAL 0.00 %</td>
                <td align="right">0</td>
              </tr>
              <tr>
                <td>SUBTOTAL No sujeto de IVA</td>
                <td align="right">0</td>
              </tr>
              <tr>
                <td>SUBTOTAL SIN IMPUESTOS</td>
                <td align="right">{{ number_format($tot->subtotal,2) }}</td>
              </tr>
              <tr>
                <td>DESCUENTO</td>
                <td align="right">{{ number_format($tot->descuento,2) }}</td>
              </tr>
              <tr>
                <td>ICE</td>
                <td align="right">0</td>
              </tr>
              <tr>
                <td>IVA  {{ number_format($tot->porc,2) }}%:</td>
                <td align="right">{{ number_format($tot->iva,2) }}</td>
              </tr>
              <tr>
                <td>PROPINA</td>
                <td align="right">{{ number_format($tot->propina,2) }}</td>
              </tr>
              <tr class="negrita">
                <td >VALOR TOTAL</td>
                <td align="right">{{ number_format($tot->total,2) }}</td>
              </tr>
            </table> 

            @endforeach

          </td>
        </tr>
      </table> 
    </td>

  </tr>



</table>
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
