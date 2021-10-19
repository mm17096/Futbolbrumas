<?php


require_once "../dao/DaoJugador.php";




$jugador = (isset($_REQUEST["jugador"])) ? $_REQUEST["jugador"] : "";

$dao = new DaoJugador();



if($jugador!=""){
    $estado=true;
    $dao->CanchaJugador($jugador,$estado);

  }










 ?>
