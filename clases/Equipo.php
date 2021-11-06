<?php

class Equipo{
    private $Idequipo;
    private $Nombre;
    private $Camisa;
    private $Idrepresentante;
    private $Estado;

    function __construct($Idequipo,$Nombre,$Camisa, $Idrepresentante,$Estado){
        $this->Idequipo=$Idequipo;
        $this->Nombre=$Nombre;
        $this->Camisa=$Camisa;
        $this->Idrepresentante=$Idrepresentante;
        $this->Estado=$Estado;

    }
    //funciones getter
    function getIdequipo(){
        return $this->Idequipo;
    }

    function getNombre(){
        return $this->Nombre;
    }

    function getCamisa(){
        return $this->Camisa;
    }

    function getIdrepresentante(){
        return $this->Idrepresentante;
    }

    function getEstado(){
        return $this->Estado;
    }
        //funciones setter
    function setIdequipo($idequipo){
        $this->Idequipo = $idequipo;
    }
    function setNombre($nombre){
        $this->Nombre = $nombre;
    }
    function setCamisa($camisa){
        $this->Camisa = $camisa;
    }
    function setIdrepresentante($idrepresentante){
        $this->Idrepresentante = $idrepresentante;
    }
    function setEstado($estado){
        $this->Estado = $estado;
    }
}

?>

