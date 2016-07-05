@extends('store.template')

@section('content')
<div class="col-sm-8">
                <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Esta cuenta se encuentra temporalmente inactiva, ingresa tu mail y te enviaremos un enlace de activación.
                </div>
        <div class="signup-form">
                        <h2>Activación de cuenta</h2>
                       
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/inactive') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Enviar
                                </button>
                                
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

