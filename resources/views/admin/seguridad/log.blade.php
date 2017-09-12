@extends('admin.template')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
          <h2><i class="fa fa-gear"></i> Registros <small> </small></h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">


          <div class="" role="tabpanel" data-example-id="togglable-tabs">
          {!! Form::open(array('route'=>'admin.seguridad.logfecha','method'=>'post'))!!}
            {{ csrf_field() }}
            <div class="form-group">
              <small>Seleccione que fechas desea consultar :</small><br/>
              <label for="date">Fecha :</label>
              <div class="input-group">
                <input type="text" class="form-control datepicker" required="required" name="date">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-primary">Buscar</button>
            {{ Form::close() }}
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                 <th> # </th>
                 <th>Movimientos de hoy</th>
               </tr>
             </thead>
             <tbody>
               <?Php $i=1; ?>
               @foreach($rows as $row)
               <?php
               $fields = \explode("|", $row);
               echo "<tr>";
               echo "<td>".$i."</td>";
               echo "<td>" . $fields[0] . "</td>";
               echo "</tr>";
               ?>
               <?Php $i++; ?>
               @endforeach
             </tbody>
           </table>
         </div>

       </div>
     </div>

   </div>
 </div>
</div>
<script>
  $('.datepicker').datepicker({
    format: "mm-dd-yyyy",
    language: "es",
    autoclose: true
  });
</script> 
@stop