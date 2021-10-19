<?php

require_once "../clases/DetPartido.php";
require_once "../dao/DaoDetPartido.php";



$detalle = (isset($_REQUEST["detpartido"])) ? $_REQUEST["detpartido"] : "";
$partido = (isset($_REQUEST["partido_det"])) ? $_REQUEST["partido_det"] : "";


$dao = new DaoDetPartido();



if($detalle!="" && $partido!=""){
    if($dao->registroDetalle(new DetPartido(null,$detalle,$partido))==1){
        $messages[] = "El detalle de partido ha sido registrado con éxito.";
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
