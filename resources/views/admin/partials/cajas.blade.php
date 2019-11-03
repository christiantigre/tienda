<!-- top tiles -->
@foreach($usersmens as $mens)
@foreach($userswomans as $womans)
@foreach($ventas as $venta)
@foreach($pedidos as $pedido)

@endforeach
@endforeach
@endforeach
@endforeach

<div class="row tile_count">
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-user"></i> Total Usuarios</span>
      <div class="count">{{ $mens->usuarios+$womans->usuarios}}</div>
      <span class="count_bottom"><i class="green">{{ ($mens->usuarios+$womans->usuarios)/100}}% </i> From last Week</span>
    </div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-user"></i> Hombres</span>
      <div class="count green">{{ $mens->usuarios }}</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{  ($mens->usuarios)/100 }}% </i> From last Week</span>
    </div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-user"></i> Mujeres</span>
      <div class="count">{{ $womans->usuarios }}</div>
      <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>{{ ($womans->usuarios)/100 }}% </i> From last Week</span>
    </div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-shopping-cart"></i> Total Ventas hoy</span>
      <div class="count">{{ $venta->cantidad }}</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{ ($venta->cantidad)/100 }}% </i> From last Week</span>
    </div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-user"></i> Total Pedidos</span>
      <div class="count">{{ $pedido->cantidad }}</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{ ($pedido->cantidad)/100 }}% </i> From last Week</span>
    </div>
  </div>
  <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
    <div class="left"></div>
    <div class="right">
      <span class="count_top"><i class="fa fa-money"></i> Total Recaudado hoy</span>
      <div class="count">{{ $venta->total }}</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{ ($venta->total)/100 }}% </i> From last Week</span>
    </div>
  </div>

</div>

        <!-- /top tiles -->