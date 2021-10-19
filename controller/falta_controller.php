<?php

require_once "../clases/Faltas.php";
require_once "../dao/DaoFalta.php";

require_once "../clases/Jugador.php";
require_once "../dao/DaoJugador.php";

$tipo = (isset($_REQUEST["tipo"])) ? $_REQUEST["tipo"] : "";
$jugador = (isset($_REQUEST["jugador"])) ? $_REQUEST["jugador"] : "";
$partido = (isset($_REQUEST["partido"])) ? $_REQUEST["partido"] : "";


$dao = new DaoFalta();


if($tipo=="Roja"){
  $daoJ=new DaoJugador();
  $daoJ->DesactivarJugador($jugador);
  echo $tipo;
}else{

if($tipo!="" && $jugador!="" && $partido!=""){
    if($dao->registroFaltas(new Faltas(null,$tipo,$jugador,$partido))==1){
        $messages[] = "La falta ha sido registrada con éxito.";
        ?>
            <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Bien hecho!</strong>
                    <?php
                                            foreach ($messages as $message) {
                                                    echo $message;
                                                }
                                            ?>
            </div>

        <?php

      }
    }
  }









 ?>
