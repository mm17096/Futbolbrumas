<?php

require_once "../clases/Goles.php";
require_once "../dao/DaoGoles.php";



$tipo = (isset($_REQUEST["tipo_gol"])) ? $_REQUEST["tipo_gol"] : "";
$jugador = (isset($_REQUEST["jugador_gol"])) ? $_REQUEST["jugador_gol"] : "";
$partido = (isset($_REQUEST["partido_gol"])) ? $_REQUEST["partido_gol"] : "";


$dao = new DaoGoles();



if($tipo!="" && $jugador!="" && $partido!=""){
    if($dao->registroGol(new Goles(null,$tipo,$jugador,$partido))==1){
        $messages[] = "El gol ha sido registrado con éxito.";
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










 ?>
