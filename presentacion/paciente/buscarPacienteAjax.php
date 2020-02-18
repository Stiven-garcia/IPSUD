<?php 
$paciente = new Paciente();
$pacientes = $paciente->filtrar($_GET["filtro"]);
?>

	<?php
    foreach ($pacientes as $p) {
        echo "<tr>";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNombre() . "</td>";
        echo "<td>" . $p->getApellido() . "</td>";
        echo "<td>" . $p->getCorreo() . "</td>";
        echo "<td><div id=estado" . $p->getId() . "><span class='fas " . ($p->getEstado() == 0 ? "fa-times-circle" : "fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($p->getEstado() == 0 ? "Inhabilitado" : "Habilitado") . "' ></span>" . "</div></td>";
        echo "<td>" . $p->getTelefono() . "</td>";
        echo "<td>" . $p->getDireccion() . "</td>";
        echo "<td>" . (($p->getFoto() != "") ? "<img src='/IPSUD/fotos/" . $p->getFoto() . "' height='50px'>" : "") . "</td>";
        echo "<td>" . "<a href='modalPaciente.php?idPaciente=" . $p->getId() . "' data-toggle='modal' data-target='#modalPaciente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                                   <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                                   <a class='fas fa-camera' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar Foto'> </a>
                                   <a id='cambiarEstado" . $p->getId() . "' class='fas fa-power-off' href='#' data-toggle='tooltip' data-placement='left' title='" . ($p->getEstado() == 0 ? "Habilitar" : "Inhabilitar") . "'> </a>
                          </td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($pacientes) . " registros encontrados</td></tr>"?>
<script type="text/javascript">
$(document).ready(function(){
	<?php foreach ($pacientes as $p) { ?>
	$("#cambiarEstado<?php echo $p -> getId(); ?>").click(function(e){
		e.preventDefault();
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") . "&idPaciente=" . $p -> getId() . "&estado=" . (($p -> getEstado() == 0)?"1":"0") . "\";\n"; ?>
		$("#estado<?php echo $p -> getId(); ?>").load(ruta);
	});
	<?php } ?>
});
</script>
    