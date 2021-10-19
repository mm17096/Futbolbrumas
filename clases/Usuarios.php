<?php

class Usuario{
    private $idusuario;
    private $idempleado;
    private $idrepresentante;
    private $tipo;
    private $correo;
    private $nombre;
    private $clave;

    function __construct($idusuario, $idempleado, $idrepresentante, $tipo, $correo, $nombre, $clave){
        $this->idusuario=$idusuario;
        $this->idempleado=$idempleado;
        $this->idrepresentante=$idrepresentante;
        $this->tipo=$tipo;
        $this->correo=$correo;
        $this->nombre=$nombre;
        $this->clave=$clave;
    }
    
    function getIdusuario(){
        return $this->idusuario;
    }

    function getIdempleado(){
        return $this->idempleado;
    }

    function getIdrepresentante(){
        return $this->idrepresentante;
    }

    function getTipo(){
        return $this->tipo;
    }

    function getCorreo(){
        return $this->correo;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getClave(){
        return $this->clave;
    }
}

?>