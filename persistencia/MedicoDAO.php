<?php

class MedicoDAO {
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $tarjetaprofesional;
    private $especialidad;
    
    function MedicoDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $tarjetaprofesional="", $especialidad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> tarjetaprofesional = $tarjetaprofesional;
        $this -> especialidad = $especialidad;
    }
    function consultar(){
        return "select m.nombre, m.apellido, m.correo, m.tarjetaprofesional, e.nombre
                from medico as m, especialidad as e
                where m.idmedico =".$this ->id." AND e.idespecialidad=". $this->especialidad;
    }
}
?>