<?php

class Jugador{
    private $Idjugador;
    private $Nombre;
    private $Apellido;
    private $FechaNacimiento;
    private $Numerocamisa;
    private $Posicion;
    private $Idequipo;
    private $Titular;
    private $Estado;
    private $Cancha;

    function __construct($Idjugador,$Nombre,$Apellido,$FechaNacimiento,$Numerocamisa,$Posicion,$Idequipo,$Titular,$Estado,$Cancha){
        $this->Idjugador=$Idjugador;
        $this->Nombre=$Nombre;
        $this->Apellido=$Apellido;
        $this->FechaNacimiento=$FechaNacimiento;
        $this->Numerocamisa=$Numerocamisa;
        $this->Posicion=$Posicion;
        $this->Idequipo=$Idequipo;
        $this->Titular=$Titular;
        $this->Estado=$Estado;
        $this->Cancha=$Cancha;
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
    function getTitular(){
        return $this->Titular;
    }

    function getIdequipo(){
        return $this->Idequipo;
    }

    function getEstado(){
        return $this->Estado;
    }

    function getCancha(){
        return $this->Cancha;
    }
}

?>
