<?php

class Cambios{

  private $idcambio;
  private $tiempo;
  private $jugadora;
  private $jugadorb;
  private $idpartido;

  function __construct($idcambio,$tiempo,$jugadora,$jugadorb,$idpartido){
      $this->idcambio=$idcambio;
      $this->tiempo=$tiempo;
      $this->jugadora=$jugadora;
      $this->jugadorb=$jugadorb;
      $this->idpartido=$idpartido;

  }

  function getIdCambio(){
    return $this->idcambio;
  }

  function getTiempo(){
    return $this->tiempo;
  }

  function getJugadorA(){
    return $this->jugadora;
  }

  function getJugadorB(){
    return $this->jugadorb;
  }

  function getIdPartido(){
    return $this->idpartido;
  }

}



 ?>
