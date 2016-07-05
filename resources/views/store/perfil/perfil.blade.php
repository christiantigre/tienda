@extends('store.template')
@section('content')
	
	<div class="col-sm-7">
		<h1>Información de perfíl</h1>
		 <div class="x_content">
		 		 <a href="{{ route('store.perfil.edit',$perfil->id) }}" class="btn btn-app">
                    <i class="fa fa-edit"></i>Cambiar
                 </a>        
        </div>
		<div class="product-information">
				<p><b>Nombres :</b> {{ $perfil->name }}</p>
				<p><b>Apellidos :</b> {{ $perfil->apellidos }}</p>
				<p><b>Cédula/Pasaporte :</b> {{ $perfil->cedula }}</p>
				<p><b>Ruc :</b> {{ $perfil->ruc }}</p>
				<p><b>Fecha de nacimiento :</b> {{ $perfil->fechanacimiento }}</p>
				<p><b>Genero :</b> {{ $perfil->genero }}</p>
				<p><b>Teléfono :</b> {{ $perfil->telefono }}</p>
				<p><b>celular :</b> {{ $perfil->celular }}</p>
				<p><b>Email :</b> {{ $perfil->email }}</p>
				<p><b>Provincia :</b> {{ $perfil->provincia_idprovincia }}</p>
				<p><b>Dirección 1:</b> {{ $perfil->dir1 }}</p>
				<p><b>Direccion 2 :</b> {{ $perfil->dir2 }}</p>
		</div>
	</div>


	<div class="col-sm-7">
		<h1>Configuración de cuenta</h1>
		 <div class="x_content">
		 		 <a href="{{ url('password/cambiar') }}" class="btn btn-app">
                    <i class="fa fa-edit"></i>Cambiar
                 </a>
         </div>
		<div class="product-information">
				<p><b>Usuario :</b> {{ $users->name }}</p>
				<p><b>Email :</b> {{ $users->email }}</p>
				<p><b>Clave :</b> *****</p>				
		</div>
	</div>


@stop