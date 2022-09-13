<?php

class Arbitro{
    private $Dui;
    private $Nombre;
    private $Apellido;
    private $Sexo;
    private $Direccion;
    private $Telefono;
    private $Fecha_nacimiento;
    private $Estado;

    function __construct($Dui,$Nombre,$Apellido,$Sexo,$Direccion,$Telefono,$Fecha_nacimiento,$Estado){
        $this->Dui=$Dui;
        $this->Nombre=$Nombre;
        $this->Apellido=$Apellido;
        $this->Sexo=$Sexo;
        $this->Direccion=$Direccion;
        $this->Telefono=$Telefono;
        $this->Fecha_nacimiento=$Fecha_nacimiento;
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
    function getDireccion(){
        return $this->Direccion;
    }

    function getTelefono(){
        return $this->Telefono;
    }

    function getFecha(){
        return $this->Fecha_nacimiento;
    }
    function getEstado(){
        return $this->Estado;
    }
}

?>
