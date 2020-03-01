<?php
include_once ('pdf/class.ezpdf.php');
$paciente = new Paciente($_GET["idPaciente"]);
$paciente ->consultar();
$pdf =new Cezpdf('a4');
$pdf->selectFont('pdf/fonts/courier.afm');
$informacionCreador = array (
                    'Title'=>'Paciente '.$paciente->getApellido(),
                    'Author'=>'Administrador',
                    'Subject'=>'Informacion paciente',
                    'Creator'=>'100@100.com',
                    );
$pdf->addInfo($informacionCreador);
$pdf->ezText("<b>Detalles Paciente</b>\n",30);
$ubicacionImg='/IPSUD/fotos/'.$paciente->getFoto();
$datos= array();
$datos[0] = array('<b>Nombre : </b>',$paciente->getNombre());
$datos[1] = array('<b>Apellido : </b>',$paciente->getApellido());
$datos[2] = array('<b>Cedula : </b>',(($paciente->getCedula()!="")?$paciente->getCedula():"-------"));
$datos[3] = array('<b>Correo : </b>',$paciente->getCorreo());
$datos[4] = array('<b>Foto : </b>',(($paciente->getFoto()!="")?$pdf->ezImage($ubicacionImg, 0, 50, 'none', 'center'):"Sin Imagen"));
$datos[5] = array('<b>Estado : </b>',(($paciente->getEstado()==0)?"Inactivo":"Activo"));
$datos[6] = array('<b>Direccion : </b>',(($paciente->getDireccion()!="")?$paciente->getDireccion():"-------"));
$datos[7] = array('<b>Telefono : </b>',(($paciente->getTelefono()!="")?$paciente->getTelefono():"-------"));
$pdf->ezTable($datos,'','',array('showHeadings'=>0));
$pdf->ezText("\n\n\n",10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);
$pdf->ezStream();
?>