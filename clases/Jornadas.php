s<?php

/**
 *
 */
class Jornadas
{
  private $Idjornada;
  private $Fechainicio;
  private $Fechafin;


  function __construct($Idjornada,$Fechainicio,$Fechafin)
  {
    $this->Idjornada=$Idjornada;
    $this->Fechainicio=$Fechainicio;
    $this->Fechafin=$Fechafin;
  }

  function getIdjornada(){
    return $this->Idjornada;
  }
  function getFechainicio(){
    return $this->Fechainicio;
  }
  function getFechafin(){
    return $this->Fechafin;
  }



}


 ?>
