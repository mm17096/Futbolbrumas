<?php

class Falta{

  private $idfalta;
  private $tipo;
  private $descripcion;
  private $jugador;
  private $tiempo;
  private $idpartido;

  function __construct($idfalta,$descripcion,$tipo,$tiempo,$jugador,$idpartido){
      $this->idfalta=$idfalta;
      $this->descripcion=$descripcion;
      $this->tipo=$tipo;
      $this->tiempo=$tiempo;
      $this->jugador=$jugador;
      $this->idpartido=$idpartido;

  }

  function getIdFalta(){
    return $this->idfalta;
  }
  
  function getDescripcion(){
    return $this->descripcion;
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
