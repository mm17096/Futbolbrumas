<?php

class Jugador{
    private $Idjugador;
    private $Nombre;
    private $Apellido;
    private $FechaNacimiento;
    private $Numerocamisa;
    private $Posicion;
    private $Idequipo;
    private $Estado;

    function __construct($Idjugador,$Nombre,$Apellido,$FechaNacimiento,$Numerocamisa,$Posicion,$Idequipo,$Estado){
        $this->Idjugador=$Idjugador;
        $this->Nombre=$Nombre;
        $this->Apellido=$Apellido;
        $this->FechaNacimiento=$FechaNacimiento;
        $this->Numerocamisa=$Numerocamisa;
        $this->Posicion=$Posicion;
        $this->Idequipo=$Idequipo;
        $this->Estado=$Estado;

    }

    function getIdjugador(){
        return $this->Idjugador;
    }

    function getNombre(){
        return $this->Nombre;
    }

    function getApellido(){
        return $this->Apellido;
    }

    function getFechaNacimiento(){
    return $this->FechaNacimiento;
    }

    function getNumerocamisa(){
        return $this->Numerocamisa;
    }

    function getPosicion(){
        return $this->Posicion;
    }

    function getIdequipo(){
        return $this->Idequipo;
    }

    function getEstado(){
        return $this->Estado;
    }
}

?>