<?php

class Faltas{

  private $idfalta;
  private $tipo;
  private $jugador;
  private $idpartido;

  function __construct($idfalta,$tipo,$jugador,$idpartido){
      $this->idfalta=$idfalta;
      $this->tipo=$tipo;
      $this->jugador=$jugador;
      $this->idpartido=$idpartido;

  }

  function getIdFalta(){
    return $this->idfalta;
  }

  function getTipo(){
    return $this->tipo;
  }

  function getJugador(){
    return $this->jugador;
  }


  function getIdPartido(){
    return $this->idpartido;
  }

}



 ?>
