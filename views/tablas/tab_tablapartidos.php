<table class="table table-striped table-bordered" style="width:100% " id="tbpartidos">
    <thead class="thead-dark">
        <tr>
            <th scope="col" style="text-align: center;">Equipo</th>
            <th scope="col" style="text-align: center;">Goles</th>
            <th scope="col" style="text-align: center;">Equipo Contrario</th>
            <th scope="col" style="text-align: center;">Goles</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $ID = (isset($_GET["id"])) ? $_GET["id"] : "";

        require_once("../../conexion/Conexion.php");
        require_once("../../clases/Equipo.php");
        $Conexion_ID;
        $Conexion_ID = new Conexion();
        $Conexion_ID = $Conexion_ID->getConexion();

        $resultJJ_ida = $Conexion_ID->query("SELECT 

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA, 
                        
                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,
                        
                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,
                        
                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB
                        
                        FROM goles as g, partido as p, equipo as e
                        
                        WHERE g.idpartido = p.idpartido AND p.equipoa = '$ID' AND e.idequipo = '$ID' AND p.estado = 0 AND e.estado = 1 GROUP BY p.idpartido;");

        $resultJJ_vuelta = $Conexion_ID->query("SELECT 

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA, 
                        
                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,
                        
                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,
                        
                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB
                        
                        FROM goles as g, partido as p, equipo as e
                        
                        WHERE g.idpartido = p.idpartido AND p.equipob = '$ID' AND e.idequipo = '$ID' AND p.estado = 0 AND e.estado = 1 GROUP BY p.idpartido;");

        $listado = array();
        if ($resultJJ_vuelta && $resultJJ_ida) :
            while ($fila = $resultJJ_ida->fetch_object()) {
                $listado[] = new Equipo($ID, $fila->EquipoA, $fila->GolesA, $fila->EquipoB, $fila->GolesB);
            }

            while ($fila = $resultJJ_vuelta->fetch_object()) {
                $listado[] = new Equipo($ID, $fila->EquipoB, $fila->GolesB, $fila->EquipoA, $fila->GolesA);
            }


            if (is_array($listado)) :

                foreach ($listado as $key => $value) {
        ?>
                    <tr>
                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getNombre() ?>
                        </td>

                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getCamisa() ?>
                        </td>

                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getIdrepresentante() ?>
                        </td>

                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getEstado() ?>
                        </td>
                    </tr>
            <?php }
            endif; ?>

        <?php else :
            echo "No hay datos para mostrar";
        ?>

        <?php endif; ?>
    </tbody>
</table>