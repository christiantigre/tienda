@extends('store.template')

@section('content')
<div class="col-sm-8">
        <div class="signup-form">
                        <h2>Registro de usuario</h2>
            @if (Session::has('flash_message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }}
                </div>
            @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Fecha de nacimiento</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="datetimepicker1" name="datetimepicker1" value="" required="required" onchange="" onblur="age(this.value)"/>
                                    <input id="edad" type="hidden" class="form-control" name="edad" value="" required="required">
                                    @if ($errors->has('age'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>                       
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="" >

                                @if ($errors->has('em
                                ail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirma contraseña</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                                <p>
                                <span>
                                     <div class="col-md-1 col-md-offset-2">
                                        {{ Form::checkbox('terms_of_service', 1, null) }}                                           
                                    </div>                            
                                Acepto los términos, condiciónes y la Declaración de privacidad
                                </span>
                                </p>
                                
                                @if ($errors->has('terms_of_service'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('terms_of_service') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                    </form>
        </div>
</div>
@endsection

