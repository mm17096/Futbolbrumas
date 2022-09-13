<?php

class Goles{

  private $idgol;
  private $tipo;
  private $tiempo;
  private $jugador;
  private $idpartido;

  function __construct($idgol,$tipo,$tiempo,$jugador,$idpartido){
      $this->idgol=$idgol;
      $this->tipo=$tipo;
      $this->tiempo=$tiempo;
      $this->jugador=$jugador;
      $this->idpartido=$idpartido;

  }

  function getIdGol(){
    return $this->idgol;
  }

  function getTipo(){
    return $this->tipo;
  }

  function getTiempo(){
    return $this->tiempo;
  }


  function getJugador(){
    return $this->jugador;
  }


  function getIdPartido(){
    return $this->idpartido;
  }

}



 ?>
