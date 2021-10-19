<?php

class Equipo{
    private  $Id;
    private $Nombre;
    private $Camisa;
    private $Representante;
    private $Estado;



    function __construct($Id, $Nombre, $Camisa, $Representante, $Estado){
        $this->Id=$Id;
        $this->Nombre=$Nombre;
        $this->Camisa=$Camisa;
        $this->Representante=$Representante;
        $this->Estado=$Estado;
        
    }
   
    
    function getId(){
        return $this->Id;
    }

    function getNombre(){
        return $this->Nombre;
    }

    function getCamisa(){
        return $this->Camisa;
    }

    function getRepresentante(){
        return $this->Representante;
    }

    function getEstado(){
        return $this->Estado;
    }
}

?>