<?php

require_once "../clases/Cambio.php";
require_once "../dao/DaoCambios.php";
require_once "../clases/Jugador.php";
require_once "../dao/DaoJugador.php";


$equipo=$_REQUEST["equipo"];

if ($equipo==="A") {
  $partido = (isset($_REQUEST["idpartidocambioa"])) ? $_REQUEST["idpartidocambioa"] : "";
  $jugadora = (isset($_REQUEST["idjugadorcambioa"])) ? $_REQUEST["idjugadorcambioa"] : "";
  $jugadorb = (isset($_REQUEST["jugadorcambioa"])) ? $_REQUEST["jugadorcambioa"] : "";
  $tiempo = (isset($_REQUEST["tiempo_cambioa"])) ? $_REQUEST["tiempo_cambioa"] : "";
}else{
  if ($equipo==="B") {
    $partido = (isset($_REQUEST["idpartidocambiob"])) ? $_REQUEST["idpartidocambiob"] : "";
    $jugadora = (isset($_REQUEST["idjugadorcambiob"])) ? $_REQUEST["idjugadorcambiob"] : "";
    $jugadorb = (isset($_REQUEST["jugadorcambiob"])) ? $_REQUEST["jugadorcambiob"] : "";
    $tiempo = (isset($_REQUEST["tiempo_cambiob"])) ? $_REQUEST["tiempo_cambiob"] : "";
  }
}

$daoJ = new DaoJugador();
$dao = new DaoCambios();

if($jugadora!="" && $jugadorb!="" && $partido!="" && $tiempo !=""){
    if($dao->registroCambio(new Cambios(null,$tiempo,$jugadora,$jugadorb,$partido))==1){
      $daoJ->EstadoTitular(new Jugador($jugadora, null, null, null, null, null,null,false,null));
      $daoJ->EstadoTitular(new Jugador($jugadorb, null, null, null, null, null,null,true,null));

      //Modificar el estado de titular en jugador
      $messages[] = "El gol ha sido registrado con éxito.";

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
