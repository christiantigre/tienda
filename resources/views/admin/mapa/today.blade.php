@extends('admin.template')
@section('content')
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->

<script src="http://maps.google.com/maps/api/js?key=AIzaSyCfEnRziz09pG_OBmrz01pB0X5XXBBFOMg&signed_in=true&callback=initMap"></script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>-->
 <script src="{{ asset('libgmaps/gmaps0.4.24.js') }}"></script>

<style type="text/css">

  /*#mymap {
    border:1px solid red;
    width: 800px;
    height: 500px;
  }*/
  .google-maps {
position: relative;
padding-bottom: 75%; // This is the aspect ratio
height: 0;
overflow: hidden;
}
.google-maps iframe {
position: absolute;
top: 0;
left: 0;
width: 100% !important;
height: 100% !important;
}

</style>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>                    
          <small>
            Puntos de entrega de hoy
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
            <h2>Ruta <small></small></h2>
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card-box table-responsive">
                  <p class="text-muted font-13 m-b-30">
                    Se encontraron {!! $contadorpedidos !!} puntos de entrega.
                  </p>

                  <div id="mymap" class="google-maps"></div>


                  <script type="text/javascript">


                    var locations = <?php print_r(json_encode($locations)) ?>;


                    var mymap = new GMaps({

                      el: '#mymap',

                      lat: -2.8552448999999998,

                      lng: -78.7786246,

                      zoom:10

                    });


                    $.each( locations, function( index, value ){

                      mymap.addMarker({

                        lat: value.lng,

                        lng: value.lat,

                        title: value.entrega,

                        num: value.pedido,

                        std: value.estado,

                        click: function(e) {

                          alert('Pedido '+value.pedido+' estado('+value.estado+')'+'.');

                        }

                      });

                    });


                  </script>
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