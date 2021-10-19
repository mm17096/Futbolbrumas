<?php

class DetPartido{

  private $iddet;
  private $detalle;
  private $idpartido;

  function __construct($iddet,$detalle,$idpartido){
      $this->iddet=$iddet;
      $this->detalle=$detalle;
      $this->idpartido=$idpartido;

  }

  function getIdDetPartido(){
    return $this->iddet;
  }

  function getDetalle(){
    return $this->detalle;
  }

  function getIdPartido(){
    return $this->idpartido;
  }

}



 ?>
