@extends('store.template')

@section('content')
<div class="col-sm-8">
    <div class="login-form"><!--login form-->

        <h2>Solo personal Autorizado</h2>
        @if(count($errors) > 0)
        @include('store.partials.errors')
        @endif
        <form action="{{ url('/despachos/login') }}" role="form" method="POST"  >
            {{ csrf_field() }}


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-8">
                    <input id="email" type="email" autocomplete="off" placeholder="Correo electrónico" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Contraseña</label>

                <div class="col-md-8">
                    <input id="password" autocomplete="off" placeholder="********" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <span>
                        <input type="checkbox" class="checkbox"> 
                        Recordar
                    </span>
                </div>

            </div>


            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i> Inicio
                    </button>

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">No recuerdo mi clave</a>
                </div>
            </div>
        </form>
    </div><!--/login form-->
</div>

<script type="text/javascript">
    function back() {
        window.location.hash = "no-back-button";
        window.location.hash = "Again-No-back-button" //chrome
        window.onhashchange = function () {
            window.location.hash = "no-back-button";
        }
    }
</script>

@endsection


















