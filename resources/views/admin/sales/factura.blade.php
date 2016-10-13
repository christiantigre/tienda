@extends('admin.template')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>                    
          <small>
            Factura
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
            <h2>Factura <small></small></h2>
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
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <p class="text-muted font-13 m-b-30">

                  </p>

                  <table id="datatable-keytable" class="table table-striped table-bordered">
                    <tbody>
                      @foreach($sales as $fac)
                      <tr>
                        <td><h4># Fac</h4></td><td class="textsmall">{{ $fac->numfactura }}</td>  
                      </tr>
                      <tr>
                        <td><h4>Firmado</h4></td><td class="textsmall">
                        @if($fac->fir_xml === 1)
                        <h4>Ok</h4>
                        @else
                        <a href="{{ route('admin.sales.generaarchivos',$fac->id) }}" title="FIRMAR" class="btn btn-warning"> <!--edit-->
                          <i class="fa fa-pencil-square"></i>
                        </a>
                        @endif
                      </td>
                    </tr>
                    <tr>

                      <td><h4>Autorizado</h4></td><td class="textsmall">
                      @if($fac->aut_xml === 1)
                      <h4>Ok</h4>
                      @else
                      <a href="{{ route('admin.sales.edit',$fac->id) }}" title="AUTORIZAR" class="btn btn-warning"> <!--edit-->
                        <i class="fa fa-pencil-square"></i>
                      </a>
                      @endif
                    </td>
                  </tr>
                  <tr>

                    <td><h4>Ride</h4></td><td class="textsmall">
                    @if($fac->convrt_ride === 1)
                    <h4>Ok</h4>
                    @else
                    <a href="{{ route('admin.sales.convrtride',$fac->claveacceso) }}" title="CONVERTIR" class="btn btn-warning"> <!--edit-->
                      <i class="fa fa-pencil-square"></i>
                    </a>
                    @endif
                  </td>
                </tr>
                <tr>

                  <td><h4>Enviado xml</h4></td><td class="textsmall">
                  @if($fac->send_xml === 1)
                  <h4>Ok</h4>
                  @else
                  <a href="{{ route('admin.sales.sendxml',$fac->claveacceso) }}" title="ENVIAR"  class="btn btn-warning"> <!--edit-->
                    <i class="fa fa-pencil-square"></i>
                  </a>
                  @endif
                </td>
              </tr>
              <tr>

                <td><h4>Enviado ride</h4></td><td class="textsmall">
                @if($fac->send_pdf === 1)
                <h4>Ok</h4>
                @else
                <a href="{{ route('admin.sales.sendpdf',$fac->claveacceso) }}" title="ENVIAR" class="btn btn-warning"> <!--edit-->
                  <i class="fa fa-pencil-square"></i>
                </a>
                @endif
              </td>
            </tr>
            <tr>

              <td><h4>Clave Acceso</h4></td><td class="textsmall">{{ $fac->claveacceso }}</td>
            </tr>
            <tr>

              <td><h4># Autorización</h4></td><td class="textsmall">{{ $fac->num_autoriz }}</td>
            </tr>
            <tr>

              <td><h4>Mensajes</h4></td><td class="textsmall">{{ $fac->mensaje }}</td>

            </tr>
            @endforeach
          </tbody>

        </table>
        <div class="col-md-12">
          <div class="form-group">     
            @if (Auth::user()->rol===1)
            <a href="{{ route('admin.sales.index') }}" class="btn btn-primary">Pedidos</a>   
            @elseif (Auth::user()->rol===3)
            <a href="{{ route('admin.mapa.index') }}" class="btn btn-primary">Entrega</a>   
            @endif                 
          </div>
        </div>
        <style type="text/css">
          .textsmall{
            font-size: 14px;
          }
        </style>
      </div>
    </div>
  </div>
</div>

</div>
</div>

</div>
</div>

</div>
<!-- /page content -->
@stop