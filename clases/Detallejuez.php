<?php
/**
 *
 */
class Detallejuez
{
  private $Iddetallejuez;
  private $Idpartido;
  private $Idjuez;

  function __construct($Iddetallejuez,$Idpartido,$Idjuez)
  {
    $this->Iddetallejuez=$Iddetallejuez;
    $this->Idpartido=$Idpartido;
    $this->Idjuez=$Idjuez;
    // code...
  }

  function getIddetallejuez(){
    return $this->Iddetallejuez;
  }
  function getIdpartido(){
    return $this->Idpartido;
  }
  function getIdjuez(){
    return $this->Idjuez;
  }
}

 ?>
