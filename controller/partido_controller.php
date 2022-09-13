<?php
require_once "../clases/Partido.php";
require_once "../dao/DaoPartido.php";
require_once "../clases/Jugador.php";
require_once "../dao/DaoJugador.php";
require_once "../clases/Equipo.php";
require_once "../dao/DaoEquipo.php";





$accion = (isset($_REQUEST["accion"])) ? $_REQUEST["accion"] : "";


$idpartido = (isset($_REQUEST["idpartidofin"])) ? $_REQUEST["idpartidofin"] : "";

$conta = (isset($_REQUEST["conta"])) ? $_REQUEST["conta"] : "";
$contb = (isset($_REQUEST["contb"])) ? $_REQUEST["contb"] : "";
$jugadora = array();
$jugadorb = array();
$j = 0;
$l = 0;
for ($i = 1; $i <= $conta; $i++) {
  $jugadora[$i] = (isset($_REQUEST["idjugadora" . $i])) ? $_REQUEST["idjugadora" . $i] : "";
}

for ($i = 1; $i <= $conta; $i++) {
  if ($jugadora[$i] != "") {
    $j = $j + 1;
  }
}

// Contador de Array Equipo B
for ($i = 1; $i <= $contb; $i++) {
  $jugadorb[$i] = (isset($_REQUEST["idjugadorb" . $i])) ? $_REQUEST["idjugadorb" . $i] : "";
}

for ($i = 1; $i <= $contb; $i++) {
  if ($jugadorb[$i] != "") {
    $l = $l + 1;
  }
}


$daoJ = new DaoJugador();
$daoP = new DaoPartido();
$daoE = new DaoEquipo();



switch ($accion) {
  case 'titular':
    // Case TITULAR
    if ($conta != "" && $contb != "") {
      if (($j >= 3 && $j <= 5) && ($l >= 3 && $l <= 5)) {

        for ($i = 1; $i <= $conta; $i++) {

          if ($jugadora[$i] !== null) {
            $daoJ->EstadoTitular(new Jugador($jugadora[$i], null, null, null, null, null, null, true, null, null));
          }
        }

        for ($i = 1; $i <= $contb; $i++) {

          if ($jugadorb[$i] !== null) {
            $daoJ->EstadoTitular(new Jugador($jugadorb[$i], null, null, null, null, null, null, true, null, null));
          }
        }



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





      } else {
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
    } else {
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

  case 'finalizar':


    //hay partidos faltantes!=0
    //si realizar si no , mandar a jornada


    if ($idpartido != "") {


      if ($daoP->FinalizarPartido($idpartido)) {

        $cantidadPartido = count($daoP->listaPartidosInactivos());

        if ($cantidadPartido == 0) { // aqui habilitare los equipos



          require_once("../conexion/Conexion.php");
          require_once("../clases/Equipo.php");
          $Conexion_ID;
          $Conexion_ID = new Conexion();
          $Conexion_ID = $Conexion_ID->getConexion();

          $result = $Conexion_ID->query("SELECT * FROM `equipo` where estado=1");
          $listado = array();
          if ($result) :
            while ($fila = $result->fetch_object()) {
              $listado[] = new Equipo($fila->idequipo, $fila->nombre, $fila->camisa, $fila->idrepresentante, $fila->estado);
            }
          endif;

          if (is_array($listado)) :

            $i = 0;
            foreach ($listado as $key => $value) {
      ?>
              <tr>
            <?php
              $posiciones[] = new stdClass;
              $ID = $value->getIdequipo();

              $resultJJ_ida = $Conexion_ID->query("SELECT 
              
                        p.equipoa as idequipoa,
                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA, 
                        
                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,
                        
                        p.equipob as idequipob,
                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,
                        
                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB
                        
                        FROM goles as g, partido as p, equipo as e
                        
                        WHERE g.idpartido = p.idpartido AND p.equipoa = '$ID' AND e.idequipo = '$ID' AND p.estado = 0 AND e.estado=1 GROUP BY p.idpartido;");

              $resultJJ_vuelta = $Conexion_ID->query("SELECT 

                        p.equipoa as idequipoa,
                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA, 
                        
                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,
                        
                        p.equipob as idequipob,
                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,
                        
                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB
                        
                        FROM goles as g, partido as p, equipo as e
                        
                        WHERE g.idpartido = p.idpartido AND p.equipob = '$ID' AND e.idequipo = '$ID' AND p.estado = 0 AND e.estado=1 GROUP BY p.idpartido;");


              $JJ = 0;
              $JG = 0;
              $JE = 0;
              $JP = 0;
              $GF = 0;
              $GC = 0;
              $DIF = 0;
              $PTS = 0;
              $idE = 0;

              if ($resultJJ_vuelta && $resultJJ_ida) :

                while ($fila = $resultJJ_ida->fetch_object()) {
                  $JJ++;
                  $idE = $fila->idequipoa;

                  if ($fila->GolesA > $fila->GolesB) {
                    $JG++;
                  }

                  if ($fila->GolesA == $fila->GolesB) {
                    $JE++;
                  }

                  if ($fila->GolesA < $fila->GolesB) {
                    $JP++;
                  }

                  $GF = $GF + $fila->GolesA;

                  $GC = $GC + $fila->GolesB;
                }

                while ($fila = $resultJJ_vuelta->fetch_object()) {
                  $JJ++;
                  $idE = $fila->idequipob;

                  if ($fila->GolesB > $fila->GolesA) {
                    $JG++;
                  }

                  if ($fila->GolesB == $fila->GolesA) {
                    $JE++;
                  }

                  if ($fila->GolesB < $fila->GolesA) {
                    $JP++;
                  }

                  $GF = $GF + $fila->GolesB;

                  $GC = $GC + $fila->GolesA;
                }

                $DIF = $GF - $GC;

                if ($JG > 0) {
                  $PTS = $PTS + ($JG * 3);
                }

                if ($JE > 0) {
                  $PTS = $PTS + ($JE * 2);
                }

                $posiciones[$i]->id = $PTS;
                $posiciones[$i]->logico = $value->getIdequipo();
                $posiciones[$i]->Equipo = $value->getNombre();
                $posiciones[$i]->JJ = $JJ;
                $posiciones[$i]->JG = $JG;
                $posiciones[$i]->JE = $JE;
                $posiciones[$i]->JP = $JP;
                $posiciones[$i]->GF = $GF;
                $posiciones[$i]->GC = $GC;
                $posiciones[$i]->DIF = $DIF;
                $posiciones[$i]->PTS = $PTS;
                $posiciones[$i]->idEquipo = $idE;
                $i++;

              endif;
            }
          endif;


          $contador = count($posiciones);
          $controlador_equipo = 0;
          if ($contador > 0) {
            arsort($posiciones);
            echo "<script type=\"text/javascript\">alert(\"$contador\");</script>";
            if ($contador > 8) {

              $daoE->DesactivarEquipoDatosTodos();
              echo "<script type=\"text/javascript\">alert(\"CUARTOS\");</script>";
              foreach ($posiciones as $key => $value) {
                $daoE->DesactivarEquipoDatos($value->idEquipo, 1);
                $controlador_equipo++;
                if ($controlador_equipo == 8) {
                  break;
                }
              }
            } elseif ($contador > 4) {
              $daoE->DesactivarEquipoDatosTodos();
              echo "<script type=\"text/javascript\">alert(\"SEMI\");</script>";
              foreach ($posiciones as $key => $value) {
                $daoE->DesactivarEquipoDatos($value->idEquipo, 1);
                $controlador_equipo++;
                if ($controlador_equipo == 4) {
                  break;
                }
              }
            } elseif ($contador > 2) {
              $daoE->DesactivarEquipoDatosTodos();
              echo "<script type=\"text/javascript\">alert(\"FINAL\");</script>";
              foreach ($posiciones as $key => $value) {
                $daoE->DesactivarEquipoDatos($value->idEquipo, 1);
                $controlador_equipo++;
                if ($controlador_equipo == 2) {
                  break;
                }
              }
            } elseif ($contador == 2) {
              $daoE->DesactivarEquipoDatosTodos();
              echo "<script type=\"text/javascript\">alert(\"GANADOR\");</script>";
              foreach ($posiciones as $key => $value) {
                $daoE->DesactivarEquipoDatos($value->idEquipo, 1);
                break;
              }
            }
            ?>
                <script type="text/javascript">
                  $(location).attr('href', "../views/vis_jornada.php");
                </script>
            <?php
          }
        } else {
            ?>
            <script type="text/javascript">
              $(location).attr('href', "../views/vis_jornadadatos.php");
            </script>
  <?php
        }
      }
    }
    break;
}



  ?>

  <script type="text/javascript">
    msj();
    setTimeout(function() {
      location.reload();
    }, 1500);

    function msj() {


      setTimeout(function() {
        document.getElementById("msjsuccess").style.display = 'none';
      }, 3500);

      setTimeout(function() {
        document.getElementById("msjerror").style.display = 'none';
      }, 3500);

      setTimeout(function() {

      }, 3500);

    };
  </script>