@extends('admin.template')
@section('content')
<div class="right_col" role="main">    
        <div class="">  
<div class="page-title">
            <div class="title_left">
              <h3>
                    Departamentos
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
                  <h2>DEPARTAMENTOS <small>  </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
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
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                	<h1>
                		
                    <a href="{{ route('admin.department.create') }}" class="btn btn-success">
                    	<i class="fa fa-plus-circle"></i> Departamento </a>
                  
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
                        <th>Departamento</th>
                      </tr>
                    </thead>


                    <tbody>
                      	@foreach($departments as $department)
                      	<tr>
                      		<td>
                      			{!! Form::open(['route'=> ['admin.department.destroy', $department->id]]) !!}
                      			<input type="hidden" name="_method" value="DELETE">	
                      			<button onClick="return confirm('Desea eliminar este registro?')" class="btn btn-danger">
                      				<i class="fa fa-trash-o"></i>
                      			</button>
                      			{!! Form::close() !!}
                      		</td>
                      		<td>
                      			<a href="{{ route('admin.department.edit',$department->id) }}" class="btn btn-warning">
                      				<i class="fa fa-pencil-square"></i>
                      			</a>
                      		</td>
                          <td><h3>{{ $department->depart }}</h3></td>
                      </tr>
						@endforeach
			      </tbody>
                  </table>
                </div>
                <hr>

                <?Php echo $departments->render(); ?>

              </div>
    </div>

</div>
</div>
</div>
@stop