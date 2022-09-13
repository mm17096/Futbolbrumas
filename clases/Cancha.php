<?php

class Cancha{
    private $Id;
    private $Nombre;
    private $Direccion;
    private $Longitud;
    private $Latitud;
    private $Estado;

    function __construct($Id,$Nombre,$Direccion,$Longitud,$Latitud,$Estado){
        $this->Id=$Id;
        $this->Nombre=$Nombre;
        $this->Direccion=$Direccion;
        $this->Longitud=$Longitud;
        $this->Latitud=$Latitud;
        $this->Estado=$Estado;
    }


    function getId(){
        return $this->Id;
    }
    function getNombre(){
        return $this->Nombre;
    }

    function getDireccion(){
        return $this->Direccion;
    }

    function getLongitud(){
        return $this->Longitud;
    }

    function getLatitud(){
        return $this->Latitud;
    }

    function getEstado(){
        return $this->Estado;
    }
}

?>
