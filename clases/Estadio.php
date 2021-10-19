<?php

class Estadio{
    private  $Id;
    private $Nombre;
    private $Estado;
    private $Direccion;
    private $latitud;
    private $longitud;

    function __construct($Id,$Nombre,$Estado,$Direccion,$latitud,$longitud){
        $this->Id=$Id;
        $this->Nombre=$Nombre;
        $this->Estado=$Estado;
        $this->Direccion=$Direccion;
        $this->latitud=$latitud;
        $this->longitud=$longitud;
    }
   
    
    function getId(){
        return $this->Id;
    }
    function getNombre(){
        return $this->Nombre;
    }
    function getEstado(){
        return $this->Estado;
    }
    function getDireccion(){
        return $this->Direccion;
    }

    function getLatitud(){
        return $this->latitud;
    }

    function getLongitud(){
        return $this->longitud;
    }
}

?>
