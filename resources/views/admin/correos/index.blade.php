@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
  <div class="">  
    <div class="page-title">
      <div class="title_left">
        <h3>
          <!--Contacto-->
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
            {!! Form::open(['route'=>'admin.mails.envionotificacion'])!!}
            {{ csrf_field() }}
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Contenido<small>Mensaje</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                  <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>


                  <div class="form-group">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuarios :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select id="to" name="to" class="form-control" tabindex="">
                          <option></option>
                          <option value="3" selected="">Todos</option>
                          <option value="2">Mujeres</option>
                          <option value="1">Hombres</option>
                        </select>
                      </div>
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
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Mansaje :</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea class="ckeditor" name="editor1" id="editor1" rows="10" cols="80">
                          Visita nuestro sitio
                        </textarea>
                      </div>
                    </div>
                  </div>

                </br>
              </hr>
            </br>
            <div class="panel-body">
              <!--<form>-->
<!--<textarea class="ckeditor" name="editor1" id="editor1" rows="10" cols="80">
Visita nuestro sitio
</textarea>-->
<!--</form-->
</div>

<div class="ln_solid"></div>


</div>
</div>


<div class="form-group">
  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
    {!! Form::submit('Enviar', array('class'=>'btn btn-success')) !!}
    <a href="{{ route('admin.mails.index') }}" class="btn btn-primary">Cancelar</a>
<!--<button type="submit" class="btn btn-primary">Cancel</button>
  <button type="submit" class="btn btn-success">Submit</button>-->
</div>
</div>
{{ Form::close() }} 


{{ Form::close() }} 
</div>

<!--<div class="col-sm-4">
<div class="contact-info">
<h2 class="title text-center">INFORMACIÓN DE CONTACTO</h2>
<address>

</address>
</div>
</div> -->

</div>
</div>

@stop
