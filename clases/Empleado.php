<?php

class Empleado{
    private $Dui;
    private $nombre;
    private $apellido;
    private $sexo;
    private $correo;
    private $fecha_nac;
    private $telefono;
    private $estado;

    
    function __construct($Dui, $nombre, $apellido, $sexo, $fecha_nac, $telefono, $correo, $estado){
        $this->Dui=$Dui;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->sexo=$sexo;
        $this->fecha_nac=$fecha_nac;
        $this->telefono=$telefono;
        $this->$correo = $correo;
        $this->estado=$estado;
    }
    
    function getDui(){
        return $this->Dui;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getApellido(){
        return $this->apellido;
    }

    function getCorreo(){
        return $this->correo;
    }

    function getSexo(){
        return $this->sexo;
    }

    
    function getFecha_nac(){
        return $this->fecha_nac;
    }

    
    function getTelefono(){
        return $this->telefono;
    }

    function getEstado(){
        return $this->estado;
    }
}

?>