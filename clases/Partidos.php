<?php 

/**
 *
 */
class Partidos
{
  private $Idpartidos;
  private $Fecha;
  private $Horario;
  private $EquipoA;
  private $EquipoB;
  private $Jornada;
  private $Estado;

  function __construct($Idpartidos,$Fecha,$Horario,$EquipoA, $EquipoB,$Jornada,$Estado)
  {
    $this->Idpartidos=$Idpartidos;
    $this->Fecha=$Fecha;
    $this->Horario=$Horario;
    $this->EquipoA=$EquipoA;
    $this->EquipoB=$EquipoB;
    $this->Jornada=$Jornada;
    $this->Estado=$Estado;
  }

  function getIdpartidos(){
    return $this->Idpartidos;
  }

  function getFecha(){
    return $this->Fecha;
  }
  function getHorario(){
    return $this->Horario;
  }
  function getEquipoA(){
    return $this->EquipoA;
  }
  function getEquipoB(){
    return $this->EquipoB;
  }
  function getJornada(){
    return $this->Jornada;
  }
  function getEstado(){
    return $this->Estado;
  }
}
 ?>
