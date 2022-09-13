<?php

require_once "../clases/Falta.php";
require_once "../dao/DaoFalta.php";


$accion = (isset($_REQUEST["accion"])) ? $_REQUEST["accion"] : "";
$idfalta= (isset($_REQUEST["idfalta"])) ? $_REQUEST["idfalta"] : "";

$partido = (isset($_REQUEST["idpartidofalta"])) ? $_REQUEST["idpartidofalta"] : "";
$jugador = (isset($_REQUEST["idjugadorfalta"])) ? $_REQUEST["idjugadorfalta"] : "";
$tipo = (isset($_REQUEST["tipo_falta"])) ? $_REQUEST["tipo_falta"] : "";
$tiempo = (isset($_REQUEST["tiempo_falta"])) ? $_REQUEST["tiempo_falta"] : "";
$descripcion = (isset($_REQUEST["descripcion"])) ? $_REQUEST["descripcion"] : "";


$dao = new DaoFalta();

switch ($accion) {
  case 'guardar':
    // code...
    if($tipo!="" && $jugador!="" && $partido!="" && $tiempo !=""){
        if($dao->registroFaltas(new Falta(null,$descripcion,$tipo,$tiempo,$jugador,$partido))==1){

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
      if ($idfalta != null) {
        if ($dao->eliminarFalta($idfalta)) {
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
