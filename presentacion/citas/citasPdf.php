<?php
include_once ('pdf/class.ezpdf.php');
$cita = new Cita();
$c= array ();
$c= $cita ->consultarTodos();
$pdf =new Cezpdf('a4');
$pdf->selectFont('pdf/fonts/courier.afm');
$informacionCreador = array (
    'Title'=>'Citas Pacientes',
    'Author'=>'Administrador',
    'Subject'=>'Citas paciente',
    'Creator'=>'100@100.com',
);

// i 0
// n 4
// j 1
// n 4

$pdf->addInfo($informacionCreador);
$pdf->ezText("<b>Cita Paciente </b>\n\n",30);
$cont=0;
for($i=0; $i<sizeof($c);$i++){
    $pdf->ezText("\n\n<b>Nombre Paciente: </b>".$c[$i]->getPaciente()."\n",15);
    $pdf->ezText("<b>Fecha: </b>".$c[$i]->getFecha()."\n",15);
    $pdf->ezText("<b>Hora: </b>".$c[$i]->getHora()."\n",15);
    $pdf->ezText("<b>Nombre Medico: </b>".$c[$i]->getMedico()."\n",15);
    $pdf->ezText("<b>Consultorio: </b>".$c[$i]->getConsultorio()."\n",15);
    for($j=$i+1;$j<sizeof($c);$j++){
        if($c[$i]->getIdpaciente()==$c[$j]->getIdpaciente()){
            $pdf->ezText("\n\n<b>Nombre Paciente: </b>".$c[$j]->getPaciente()."\n",15);
            $pdf->ezText("<b>Fecha: </b>".$c[$j]->getFecha()."\n",15);
            $pdf->ezText("<b>Hora: </b>".$c[$j]->getHora()."\n",15);
            $pdf->ezText("<b>Nombre Medico: </b>".$c[$j]->getMedico()."\n",15);
            $pdf->ezText("<b>Consultorio: </b>".$c[$j]->getConsultorio()."\n",15);
            $cont++;
        }
    }
      $i=$i+$cont;
   $pdf -> eznewPage();
   
}

// $pdf->ezTable($datos,'','','');
$pdf->ezText("\n\n\n",10);
$pdf->ezText("<b>Fecha:</b> ".date("d-M-Y"),10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);
$pdf->ezStream();
?>

?>