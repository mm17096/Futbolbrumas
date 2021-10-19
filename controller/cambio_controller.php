<?php


require_once "../clases/Jugador.php";
require_once "../dao/DaoJugador.php";

$cambiara = (isset($_REQUEST["cambiara"])) ? $_REQUEST["cambiara"] : "";
$cambioa = (isset($_REQUEST["cambioa"])) ? $_REQUEST["cambioa"] : "";
$cambiarb = (isset($_REQUEST["cambiarb"])) ? $_REQUEST["cambiarb"] : "";
$cambiob = (isset($_REQUEST["cambiob"])) ? $_REQUEST["cambiob"] : "";
$equipo = (isset($_REQUEST["equipo"])) ? $_REQUEST["equipo"] : "";




$daoJ=new DaoJugador();




if($cambiara!="" && $cambioa!="" && $equipo == "a" ){
    $daoJ->CambioJugador($cambiara,false);
    $daoJ->CambioJugador($cambioa,true);
        $messages[] = "La cambio realizado con éxito.";
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


    if($cambiarb!="" && $cambiob!="" && $equipo == "b" ){
        $daoJ->CambioJugador($cambiarb,false);
        $daoJ->CambioJugador($cambiob,true);
            $messages[] = "La cambio realizado con éxito.";
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
 ?>
