<?php
include_once ('pdf/class.ezpdf.php');
$paciente = new Paciente();
$pacientes = $paciente ->consultarTodos();
$pdf =new Cezpdf('a4');
$pdf->selectFont('pdf/fonts/courier.afm');
$informacionCreador = array (
    'Title'=>'Detalles Pacientes',
    'Author'=>'Administrador',
    'Subject'=>'Informacion paciente',
    'Creator'=>'100@100.com',
);
$pdf->addInfo($informacionCreador);
$pdf->ezText("<b>Detalles Pacientes</b>\n",30);
$datos= array();
$i=0;

foreach ($pacientes as $p){
    $ubicacionImg='fotos/'.$p->getFoto();
    
    $datos[$i] = array('<b> Nombre </b>' => $p->getNombre(),
                       '<b> Apellido </b>' => $p->getApellido(),
                        '<b> Cedula </b>' => (($p->getCedula()!="")?$p->getCedula():"-------"),
                        '<b> Correo </b>' => $p->getCorreo(),
                        '<b> Foto </b>' => (($p->getFoto()!="")?//$pdf->ezImage($ubicacionImg, 0, 50, 'none', 'center')
                        "paila":"Sin Imagen"),
                        '<b> Estado </b>' => (($p->getEstado()==0)?"Inactivo":"Activo"),
                        '<b> Direccion </b>' => (($p->getDireccion()!="")?$p->getDireccion():"-------"),
                        '<b> Telefono </b>' => (($p->getTelefono()!="")?$p->getTelefono():"-------")

    );
    $i++;
}

$pdf->ezTable($datos,'','','');
$pdf->ezText("\n\n\n",10);
$pdf->ezText("<b>Fecha:</b> ".date("d-M-Y"),10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);
$pdf->ezStream();
?>