<?php


require_once "../dao/DaoPartido.php";
require_once "../dao/DaoJugador.php";
require_once "../dao/DaoGoles.php";
require_once "../dao/DaoEquipo.php";

$id = (isset($_REQUEST["partido_fin"])) ? $_REQUEST["partido_fin"] : "";
$equipoA= (isset($_REQUEST["equipoA"])) ? $_REQUEST["equipoA"] : "";
$equipoB= (isset($_REQUEST["equipoB"])) ? $_REQUEST["equipoB"] : "";
$partido= (isset($_REQUEST["partido"])) ? $_REQUEST["partido"] : "";

$dao = new DaoPartido();

if($id!="" ){
    $dao->FinalizarPartido($id);
        $messages[] = "El partido ha finalizado";
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

      if($equipoA !=""){
        $daoj=new DaoJugador();
        $fila=$daoj->listaJugadorEquipo($equipoA);
        foreach($fila as $key=>$value){
            $estado=false;
            $daoj->CanchaJugador($value->getIdjugador(),$estado);
        }
      }

      if($equipoB !=""){
        $daoj=new DaoJugador();
        $fila=$daoj->listaJugadorEquipo($equipoB);
        foreach($fila as $key=>$value){
            $estado=false;
            $daoj->CanchaJugador($value->getIdjugador(),$estado);
        }
      }

      if ($partido!="" && $equipoA!="" && $equipoB !="") {
        // code...
        $daog=new DaoGoles();
        $golesA=$daog->listaGoles($partido,$equipoA);
        $golesB=$daog->listaGoles($partido,$equipoB);

        if ($golesA > $golesB) {
          //Equipo A gano
          $daoE=new DaoEquipo();
          $puntos=$daoE->ObtenerPuntosEquipo($equipoA);
          $puntos=$puntos+3;
          $daoE->actualizarPuntosEquipo($equipoA,$puntos);

        }else {
          if($golesA < $golesB){
            //Equipo B gano
            $daoE=new DaoEquipo();
            $puntos=$daoE->ObtenerPuntosEquipo($equipoB);
            $puntos=$puntos+3;
            $daoE->actualizarPuntosEquipo($equipoB,$puntos);

          }else{
            //empate
            $daoE=new DaoEquipo();
            $puntosA=$daoE->ObtenerPuntosEquipo($equipoA);
            $puntosA=$puntosA+1;
            $daoE->actualizarPuntosEquipo($equipoA,$puntosA);
            $puntosB=$daoE->ObtenerPuntosEquipo($equipoB);
            $puntosB=$puntosB+1;
            $daoE->actualizarPuntosEquipo($equipoB,$puntosB);
            
          }
        }

      }



 ?>
