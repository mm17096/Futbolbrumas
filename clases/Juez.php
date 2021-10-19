<?php

class Juez
{
    private $IdJuez;
    private $Nombre;


    function __construct($IdJuez, $Nombre)
    {
        $this->IdJuez=$IdJuez;
        $this->Nombre=$Nombre;


    }

    function getIdJuez(){
        return $this->IdJuez;
    }

    function getNombre(){
        return $this->Nombre;
    }



}


?>
