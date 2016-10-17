<style type="text/css">
	p{
		text-align : justify;
		margin: 1px 0;
	}
</style>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">T&eacuterminos y Condiciones</h4>
			</div>
			<div class="modal-body">

				<?php
				$termCondts = public_path();
				$termCondts = str_replace("\\", "//", $termCondts);
				$archivo = $termCondts."/terminosCondiciones/terminosycondiciones.txt";
				if (file_exists($archivo)) {
					$rows = file($archivo);
					$test = array_shift($rows);
					foreach ($rows as $row) {
						$fields = explode("/", $row);
						echo "<br/>";
						echo "<p>".$fields[0]."</p>" ;
					}
				}else{
					echo "<p>Disculpe, existió un problema</p>";
				}
				?>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
          <!-- /.modal -->