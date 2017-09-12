@extends('store.template')
@section('content')

<div class="col-sm-7">
    <h2 class="title text-center">Información de perfíl</h2>
    <div class="x_content">


        <a href="{{ route('store.perfil.edit',$perfil->id) }}" class="btn btn-app">
            <i class="fa fa-edit"></i>Cambiar
        </a>        
    </div>

    <div class="col-sm-12">
        <div class="product-information">
            <h4 class="brief"><i>{{ $users->name }}</i></h4>
            <div class="left col-xs-7">
                <h2>{{ $perfil->name }} {{ $perfil->apellidos }}</h2>
                <p><strong>Dir: </strong> {{ $perfil->dir1 }} / {{ $perfil->dir2 }}. </p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-phone"></i> : {{ $perfil->telefono }}</li>
                    <li><i class="fa fa-mobile"></i> : {{ $perfil->celular }}</li>
                    <li><i class="fa fa-envelope-o"></i> : {{ $perfil->email }}</li>
                    <li><i class="fa fa-cc"></i> : {{ $perfil->cedula }}</li>
                    <li><i class="fa fa-cc"></i> : {{ $perfil->ruc }}</li>
                    <li><i class="fa fa-birthday-cake"></i> : {{ $perfil->fechanacimiento }}</li>
                    <li><i class="fa fa-child"></i> : {{ ($perfil->genero == 1) ? 'Masculino' : 'Femenino' }}</li>
                    @if($perfil->provincia_idprovincia==null)
                    <li><i class="fa fa-bus"></i> : n/n</li>
                    @elseif($perfil->provincia_idprovincia!=null)
                    <li><i class="fa fa-bus"></i> : {{ $provincia->prov }}</li>
                    @endif
                </ul>
            </div>
            <div class="right col-xs-5 text-center">
                @if($perfil->path==null)
                <img src="{{ asset('../../upload/user.png') }}" alt="" class="img-circle img-responsive">
                @elseif($perfil->path!=null)
                <img src="{{ asset('../../upload/ $perfil->path') }}" alt="" class="img-circle img-responsive">
                @endif
            </div>
        </div>
    </div>
</div>


<div class="col-sm-7">
    <h2 class="title text-center">Configuración de cuenta</h2>
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