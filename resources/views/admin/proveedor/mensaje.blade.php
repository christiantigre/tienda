@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h3>
          Contacto
          <small>

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
    <div class="clearfix">

    </div>
    <div class="row">
      @if(count($errors) > 0)
      @include('admin.partials.errors');
      @endif
      <div class="col-md-12 col-sm-12 col-xs-12">           
        <div class="col-md-7 col-sm-7 col-xs-7">  
          <div class="x_content">
            {!! Form::open(['route'=>'admin.proveedor.contactenviar',$proveedor->email])!!}
            @foreach($pro as $empres)
            <div class="col-sm-8">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="email" id="email" value="{{ $empres->email }}" class="form-control" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Asunto :</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" name="asunto" id="asunto" value="" class="form-control" required="required"
                    autofocus="autofocus">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mensaje :</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                   {!! Form::textarea(
                    'mensaje',
                    null,
                    array(
                     'class'=>'form-control'
                     )
                    ) 
                    !!}
                  </div>
                </div>   
              </div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  {!! Form::submit('Enviar', array('class'=>'btn btn-success')) !!}
                  <a href="{{ route('admin.proveedor.index') }}" class="btn btn-primary">Cancelar</a>
                        <!--<button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>-->
                      </div>
                    </div>
                    {{ Form::close() }}  
                    @endforeach
                  </div>



                </div>

                <div class="col-sm-4">
                  <div class="contact-info">
                    <h2 class="title text-center">INFORMACIÓN DE CONTACTO</h2>
                    <address>
                      @foreach($pro as $empres)
                      <p>{{ $empres->nom_compania }}.</p>
                      <p>{{ $empres->direccion }}.</p>
                      <p>Telefono: +{{ $empres->telefono }}</p>
                      <p>Celular: +{{ $empres->celular }}</p>
                      <p>Fax: {{ $empres->fax }}</p>
                      <p>Email: {{ $empres->email }}</p>
                      <p>Web: {{ $empres->pagweb }}</p>
                      @endforeach
                    </address>
                  </div>
                </div> 

              </div>
            </div>
            @stop
