<?php

class Goles{

  private $idgol;
  private $tipo;
  private $jugador;
  private $idpartido;

  function __construct($idgol,$tipo,$jugador,$idpartido){
      $this->idgol=$idgol;
      $this->tipo=$tipo;
      $this->jugador=$jugador;
      $this->idpartido=$idpartido;

  }

  function getIdGol(){
    return $this->idgol;
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
