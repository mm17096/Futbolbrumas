<?php

class Jugador
{
    private $Idjugador;
    private $Nombre;
    private $Apellido;
    private $Fecha_nacimiento;
    private $Numero_camisa;
    private $Posicion;
    private $Nacionalidad;
    private $Estado;
    private $Equipo;
    private $Cancha;

    function __construct($Idjugador, $Nombre,$Apellido,$Fecha_nacimiento,$Numero_camisa,$Posicion,$Nacionalidad,$Estado, $Equipo,$Cancha)
    {
        $this->Idjugador=$Idjugador;
        $this->Nombre=$Nombre;
        $this->Apellido=$Apellido;
        $this->Fecha_nacimiento=$Fecha_nacimiento;
        $this->Numero_camisa=$Numero_camisa;
        $this->Posicion=$Posicion;
        $this->Nacionalidad=$Nacionalidad;
        $this->Estado=$Estado;
        $this->Equipo=$Equipo;
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
    function getFechanacimiento(){
        return $this->Fecha_nacimiento;
    }
    function getNumerocamisa(){
        return $this->Numero_camisa;
    }
    function getPosicion(){
    return $this->Posicion;
    }
    function getNacionalidad(){
        return $this->Nacionalidad;
    }
    function getEstado(){
        return $this->Estado;
    }
    function getEquipo(){
        return $this->Equipo;
    }

    function getCancha(){
        return $this->Cancha;
    }



}


?>
