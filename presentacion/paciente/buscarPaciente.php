<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
include 'presentacion/menuAdministrador.php';
?>
<div class="container mt-4">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
			<div class="form-group">
				<input  id="filtrar" type="search"  class="form-control ds-input" placeholder="Search" >
			</div>
		</div>
		</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>
								<th scope="col">Estado</th>
								<th scope="col">Telefono</th>
								<th scope="col">Direccion</th>
								<th scope="col">Foto</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="resultadosPacientes">
						
						</tbody>
					</table>
					</div>
				
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#filtrar").keyup(function(){
		
	var filtroDato=$("#filtrar").val();
	if(filtroDato.length>0){
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/buscarPacienteAjax.php") ."&filtro=\"+filtroDato;\n"; ?>
		$("#resultadosPacientes").load(ruta);
	}else{
		$("#resultadosPacientes").empty();
		}
	
	});
});
</script>