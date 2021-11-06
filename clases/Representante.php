<?php

class Representante{

    private $Dui;
    private $Nombre;
    private $Apellido;
    private $Sexo;
    private $FechaNacimiento;
    private $Telefono;
    private $Estado;

    function __construct($Dui,$Nombre,$Apellido,$Sexo,$FechaNacimiento,$Telefono,$Estado){
        $this->Dui=$Dui;
        $this->Nombre=$Nombre;
        $this->Apellido=$Apellido;
        $this->Sexo=$Sexo;
        $this->FechaNacimiento=$FechaNacimiento;
        $this->Telefono=$Telefono;
        $this->Estado=$Estado;
    }

    function getDui(){
        return $this->Dui;
    }

    function getNombre(){
        return $this->Nombre;
    }
    function getApellido(){
        return $this->Apellido;
    }

    function getSexo(){
        return $this->Sexo;
    }

    function getFechaNacimiento(){
        return $this->FechaNacimiento;
    }

    function getTelefono(){
        return $this->Telefono;
    }

    function getEstado(){
        return $this->Estado;
    }
}
?>