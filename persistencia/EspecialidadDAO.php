<?php

class EspecialidadDAO{
    
    private $id;
    private $nombre;
    
    function EspecialidadDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }
    
    function consultar(){
        return "select nombre
                from especialidad
                where idespecialidad =" . $this -> id;
    }
}

?>