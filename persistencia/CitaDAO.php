<?php


class CitaDAO{
    private $id;
    private $fecha;
    private $hora;
    private $medico;
    private $paciente;
    private $consultorio;
    
    function CitaDAO($id="", $fecha="", $hora="", $medico="", $paciente="", $consultorio=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
        $this -> medico = $medico;
        $this -> paciente = $paciente;
        $this -> consultorio = $consultorio;
    }
    
    function consultarTodos(){
        return "select c.idcita, c.fecha, c.hora, m.nombre, p.nombre, v.nombre, p.idpaciente
                from cita as c, paciente as p, medico as m, consultorio as v
                 where c.medico_idmedico=m.idmedico and c.paciente_idpaciente=p.idpaciente and c.consultorio_idconsultorio=v.idconsultorio
                order by p.idpaciente";
    }
}

?>