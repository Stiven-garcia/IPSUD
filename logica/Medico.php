<?php
require 'persistencia/MedicoDAO.php';
require_once 'persistencia/Conexion.php';
class Medico extends Persona{
    private $tarjetaprofesional;
    private $especialidad;
    private $MedicoDAO;
    private $conexion;
    
   
    function Medico ($id="", $nombre="", $apellido="", $correo="", $clave="", $tarjetaprofesional="", $especialidad=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> tarjetaprofesional = $tarjetaprofesional;
        $this -> especialidad = $especialidad;
        $this -> conexion = new Conexion();
        $this -> MedicoDAO = new MedicoDAO($id, $nombre, $apellido, $correo, $clave, $tarjetaprofesional, $especialidad);
    }
    
    function getTarjetaprofesional(){
        return $this -> tarjetaprofesional;
    }
    
    function getEspecialidad(){
        return $this -> especialidad;
    }
    
    function consultar(){
        $this -> conexion ->abrir();
        $this -> conexion ->ejecutar($this -> MedicoDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> tarjetaprofesional = $resultado[3];
        $this -> especialidad = $resultado[4];
        $this -> conexion -> cerrar();
    }
    
}
?>