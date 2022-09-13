<table id="tbposiciones" class="table table-striped table-bordered" style="width:100%">
    <thead style="text-align: center;">
        <tr>
            <th scope="col">Equipo</th>
            <th scope="col">JJ</th>
            <th scope="col">JG</th>
            <th scope="col">JE</th>
            <th scope="col">JP</th>
            <th scope="col">GF</th>
            <th scope="col">GC</th>
            <th scope="col">DIF</th>
            <th scope="col">PTS</th>
            <th scope="col">Partidos</th>
        </tr>
    </thead>
    <tbody>

        <?php
        require_once("../../conexion/Conexion.php");
        require_once("../../clases/Equipo.php");
        $Conexion_ID;
        $Conexion_ID = new Conexion();
        $Conexion_ID = $Conexion_ID->getConexion();

        $result = $Conexion_ID->query("SELECT * FROM `equipo`");
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

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB

                        FROM goles as g, partido as p, equipo as e

                        WHERE g.idpartido = p.idpartido AND p.equipoa = '$ID' AND e.idequipo = '$ID' AND p.estado = 0 GROUP BY p.idpartido;");

                $resultJJ_vuelta = $Conexion_ID->query("SELECT

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB

                        FROM goles as g, partido as p, equipo as e

                        WHERE g.idpartido = p.idpartido AND p.equipob = '$ID' AND e.idequipo = '$ID' AND p.estado = 0 GROUP BY p.idpartido;");

                $JJ = 0;
                $JG = 0;
                $JE = 0;
                $JP = 0;
                $GF = 0;
                $GC = 0;
                $DIF = 0;
                $PTS = 0;

                if ($resultJJ_vuelta && $resultJJ_ida) :

                    while ($fila = $resultJJ_ida->fetch_object()) {
                        $JJ++;

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

                    $i++;

                endif;
            }
        endif;

            arsort($posiciones);
            foreach ($posiciones as $key => $value) {
              if($value->JJ > 0){
            ?>

            <td style="text-align: center; size: 20px;">
                <!-- NOMBRE -->
                <?php echo $value->Equipo; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <!-- JJ -->
                <?php echo $value->JJ; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <!-- JG -->
                <?php echo $value->JG; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <!-- JE -->
                <?php echo $value->JE; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <!-- JP -->
                <?php echo $value->JP; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <!-- GF -->
                <?php echo $value->GF; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <!-- GC -->
                <?php echo $value->GC; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <!-- DIF -->
                <?php echo $value->DIF; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <!-- PTS -->
                <?php echo $value->PTS; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <!-- Partidos -->
                <button type="button" class="btn btn-round btn-editar" onclick="mostrarPartidos()"
                    data-target="#modalPartidos" data-toggle="modal" data-id='<?php echo $value->logico ?>'
                    data-toggle="tooltip">
                    <li class="fa fa-eye"> Ver</li>
                </button>
            </td>
        </tr>
        <?php }
      }?>
    </tbody>
</table>
