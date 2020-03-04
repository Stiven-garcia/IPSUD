<?php

class ConsultorioDAO{
    private $id;
    private $nombre;
    
    function ConsultorioDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }
    
    function consultar(){
        return "select nombre
                from consultorio
                where idconsultorio =" . $this -> id;
    }
}


?>