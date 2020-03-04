<?php
require 'persistencia/ConsultorioDAO.php';
require_once 'persistencia/Conexion.php';

class Consultorio{
    private $id;
    private $nombre;
    private $conexion;
    private $ConsultorioDAO;
    
    function Consultorio($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> ConsultorioDAO = new ConsultorioDAO($id, $nombre);
    }
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function consultar(){
        $this ->conexion ->abrir();
        $this ->conexion ->ejecutar($this->ConsultorioDAO->consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> conexion -> cerrar();
    }
}
?>