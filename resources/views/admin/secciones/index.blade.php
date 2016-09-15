@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
        <div class="">  
<div class="page-title">
            <div class="title_left">
              <h3>
                    Secciones
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
          <div class="clearfix"></div>
<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Secciones <small>de nuestra tienda</small></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                	<h1>
                		
                    <a href="{{ route('admin.seccion.create') }}" class="btn btn-success">
                    	<i class="fa fa-plus-circle"></i> Sección</a>
                  
                	</h1>
                	
                    	</div>
                  <p class="text-muted font-13 m-b-30">
                    <div class="x_content">
                    	<!---->
                </p>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      	<th>Dar de baja</th>
                      	<th>Modificar</th>
                        <th>Sección</th>
                        <th>Descripci&oacuten</th>
                      </tr>
                    </thead>


                    <tbody>
                      	@foreach($secciones as $seccion)
                      	<tr>
                      		<td>
                      			{!! Form::open(['route'=> ['admin.seccion.destroy', $seccion]]) !!}
                      			<input type="hidden" name="_method" value="DELETE">	
                      			<button onClick="return confirm('Desea eliminar este registro?')" class="btn btn-danger">
                      				<i class="fa fa-trash-o"></i>
                      			</button>
                      			{!! Form::close() !!}
                      		</td>
                      		<td>
                      			<a href="{{ route('admin.seccion.edit',$seccion) }}" class="btn btn-warning">
                      				<i class="fa fa-pencil-square"></i>
                      			</a>
                      		</td>
                      		<td><h3>{{ $seccion->name }}</h3></td>
							<td><h3>{{ $seccion->descripcion }}</h3></td>
                      </tr>
						@endforeach
			      </tbody>
                  </table>
                </div>
              </div>
    </div>

</div>

</div>
        </div>
@stop