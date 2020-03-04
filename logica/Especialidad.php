<?php
require 'persistencia/EspecialidadDAO.php';
require_once 'persistencia/Conexion.php';

class Especialidad {
    private $id;
    private $nombre;
    private $conexion;
    private $EspecialidadDAO;
    
    function Especialidad($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> EspecialidadDAO = new EspecialidadDAO($id, $nombre);
        
    }
    
    function getId(){
      return $this -> id;
    }
    
    function getNombre(){
        return $this->nombre;
    }
    
    function consultar(){
        $this ->conexion ->abrir();
        $this ->conexion ->ejecutar($this->EspecialidadDAO->consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> conexion -> cerrar();
    }
}

?>