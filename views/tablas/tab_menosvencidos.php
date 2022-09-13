<table id="tbmenosvencidos" class="table table-striped table-bordered" style="width:100%">
    <thead style="text-align: center;">
        <tr>
            <th scope="col">Nombre del Portero</th>
            <th scope="col">Equipo del Portero</th>
            <th scope="col">Goles en Contra</th>
        </tr>
    </thead>
    <tbody>

        <?php
        require_once("../../conexion/Conexion.php");
        require_once("../../clases/Equipo.php");
        $Conexion_ID;
        $Conexion_ID = new Conexion();
        $Conexion_ID = $Conexion_ID->getConexion();
        $aux = 0;

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

                        (SELECT nombre FROM jugador  as j WHERE posicion = 'Portero' AND j.idequipo = '$ID' AND j.cancha = 1) AS Portero,

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB

                        FROM goles as g, partido as p, equipo as e

                        WHERE g.idpartido = p.idpartido AND p.equipoa = '$ID' AND e.idequipo = '$ID' AND p.estado = 0 AND e.estado = 1 GROUP BY p.idpartido;");

                    $resultJJ_vuelta = $Conexion_ID->query("SELECT

                        (SELECT nombre FROM jugador  as j WHERE posicion = 'Portero' AND j.idequipo = '$ID' AND j.cancha = 1) AS Portero,

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB

                        FROM goles as g, partido as p, equipo as e

                        WHERE g.idpartido = p.idpartido AND p.equipob = '$ID' AND e.idequipo = '$ID' AND p.estado = 0 AND e.estado = 1 GROUP BY p.idpartido;");

                    $GF = 0;
                    $GC = 0;
                    $portero = "";
                    $equipo = "";
                    $JJ = 0;


                    if ($resultJJ_vuelta && $resultJJ_ida) :

                        $aux++;
                        while ($fila = $resultJJ_ida->fetch_object()) {

                            $JJ++;
                            $portero = $fila->Portero;

                            $equipo = $fila->EquipoA;

                            $GF = $GF + $fila->GolesA;

                            $GC = $GC + $fila->GolesB;
                        }

                        while ($fila = $resultJJ_vuelta->fetch_object()) {

                            $JJ++;
                            $portero = $fila->Portero;

                            $equipo = $fila->EquipoB;

                            $GF = $GF + $fila->GolesB;

                            $GC = $GC + $fila->GolesA;
                        }


                        $posiciones[$i]->id = $GC;
                        $posiciones[$i]->nombre = $portero;
                        $posiciones[$i]->equipo = $equipo;
                        $posiciones[$i]->GC = $GC;
                        $posiciones[$i]->JJ = $JJ;

                        $i++;

                    endif;
                }
            endif;
            if ($aux != 0) {
                asort($posiciones);
                foreach ($posiciones as $key => $value) {
                  if($value->JJ > 0){
                    ?>

                    <td style="text-align: center; size: 20px;">
                        <!-- NOMBRE -->
                        <?php echo $value->nombre; ?>
                    </td>

                    <td style="text-align: center; size: 20px;">
                        <!-- JJ -->
                        <?php echo $value->equipo; ?>
                    </td>

                    <td style="text-align: center; size: 20px;">
                        <!-- GC -->
                        <?php echo $value->GC; ?>
                    </td>

                </tr>
        <?php }
            }
          }?>
    </tbody>
</table>
