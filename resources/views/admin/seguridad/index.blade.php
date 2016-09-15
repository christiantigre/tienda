@extends('admin.template')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
                  <h2><i class="fa fa-gear"></i> Configuración <small> modulo de suguridad</small></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Intentos de login</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <a href="{{ route('admin.seguridad.create') }}" class="btn btn-success">
                    	<i class="fa fa-plus-circle"></i> Perfíl de configuración</a> 
                        <p>Configuración del número de intentos que puede realizar el usuario, posterior al número excedido de intentos se desactivará la cuenta que este vinculada
                        	al correo ingresado, y se enviará un enlace de recuperación al correo del propietario de la cuenta.</p>
                        	@foreach($seguridades as $seguridad)
                        		Número de intentos permitidos <h3>{{ $seguridad->intentos->intentos }}</h3>
                      			<a href="{{ route('admin.seguridad.edit', $seguridad->id) }}" class="btn btn-primary">
                      <i class="fa fa-edit m-right-xs"></i>EDITAR</a>
                    <br />
                        	@endforeach
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                          booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                          booth letterpress, commodo enim craft beer mlkshk </p>
                      </div>
                    </div>
                  </div>

                </div>
			</div>

		</div>
	</div>
</div>
@stop