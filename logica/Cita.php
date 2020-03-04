<?php
require 'persistencia/CitaDAO.php';
require_once 'persistencia/Conexion.php';

class Cita{
    private $id;
    private $fecha;
    private $hora;
    private $medico;
    private $paciente;
    private $consultorio;
    private $idpaciente;
    private $conexion;
    private $CitaDAO;
    
    function Cita($id="", $fecha="", $hora="", $medico="", $paciente="", $consultorio="", $idpaciente=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
        $this -> medico = $medico;
        $this -> paciente = $paciente;
        $this -> consultorio = $consultorio;
        $this -> idpaciente = $idpaciente;
        $this -> conexion = new Conexion();
        $this -> CitaDAO = new CitaDAO($id="", $fecha="", $hora="", $medico="", $paciente="", $consultorio="");
    }
    
    function getId(){
        return $this -> id;
    }
    
    function getFecha(){
        return $this -> fecha;
    }
    
    function getHora(){
        return $this -> hora;
    }
    function getMedico(){
        return $this -> medico;
    }
    function getPaciente(){
        return $this -> paciente;
    }
    function getConsultorio(){
        return $this -> consultorio;
    }
    
    function getIdpaciente(){
        return $this ->idpaciente;
    }
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> CitaDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Cita($registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5],$registro[6]);
            
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}
?>