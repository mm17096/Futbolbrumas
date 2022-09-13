<?php

require_once "../clases/Goles.php";
require_once "../dao/DaoGol.php";

$accion = (isset($_REQUEST["accion"])) ? $_REQUEST["accion"] : "";
$idgol = (isset($_REQUEST["idgol"])) ? $_REQUEST["idgol"] : "";

$partido = (isset($_REQUEST["idpartidogol"])) ? $_REQUEST["idpartidogol"] : "";
$jugador = (isset($_REQUEST["idjugadorgol"])) ? $_REQUEST["idjugadorgol"] : "";
$tipo = (isset($_REQUEST["tipo_gol"])) ? $_REQUEST["tipo_gol"] : "";
$tiempo = (isset($_REQUEST["tiempo"])) ? $_REQUEST["tiempo"] : "";

$dao = new DaoGoles();




switch ($accion) {
  case 'guardar':
    // Guardar Gol
    if($tipo!="" && $jugador!="" && $partido!="" && $tiempo !=""){
        if($dao->registroGol(new Goles(null,$tipo,$tiempo,$jugador,$partido))==1){
          //alerta
          $messages[] = "El registro se ha almacenado con éxito.";
          ?>
              <div id="msjerror" class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <i class="fa fa-check"></i>
                      <strong>Registro Almacenado</strong>
                      <?php
                                              foreach ($messages as $message) {
                                                      echo $message;
                                                  }
                                              ?>
              </div>

          <?php


    }else{
    $errors[] = "Ocurrió un error al almacenar el registro.";
     ?>

            <div id="msjerror" class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error de Registro</strong>

                    <?php
                        foreach ($errors as $error) {
                                echo $error;
                            }
                        ?>
            </div>

            <?php
          }
      }else{
      $errors[] = "Ocurrió un error datos vacios.";
       ?>

              <div id="msjerror" class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Error de Registro</strong>

                      <?php
                          foreach ($errors as $error) {
                                  echo $error;
                              }
                          ?>
              </div>

              <?php
            }
    break;

    case 'eliminar':
      //
        if ($idgol != null) {
          if ($dao->eliminarGol($idgol)) {

        //alerta
        $messages[] = "El registro se ha eliminado con éxito.";
        ?>
            <div id="msjerror" class="alert alert-ba" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-trash"></i>
                    <strong>Registro Eliminado</strong>
                    <?php
                                            foreach ($messages as $message) {
                                                    echo $message;
                                                }
                                            ?>
            </div>

        <?php
        }
      }
      break;
}



 ?>

 <script type="text/javascript">
    msj();

    function msj() {

        setTimeout(function() {
            document.getElementById("msjsuccess").style.display = 'none';
        }, 3500);

        setTimeout(function() {
            document.getElementById("msjerror").style.display = 'none';
        }, 3500);

    };
</script>
