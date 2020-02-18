<?php
$paciente = new Paciente($_GET['idPaciente'], "", "", "", "", "", $_GET['estado']);
$paciente->actualizarEstado();
echo "<span class='fas " . ($paciente->getEstado()==0?"fa-times-circle":"fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($paciente->getEstado()==0?"Inhabilitado":"Habilitado") . "' ></span>";