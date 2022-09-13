<table id="partidosjugados" class="table table-striped table-bordered" style="width:100%">
    <thead style="text-align: center; font-size: 13px;">
        <tr>
            <th scope="col">ID Partido</th>
            <th scope="col">Equipo A</th>
            <th scope="col">Goles</th>
            <th scope="col">Equipo B</th>
            <th scope="col">Goles</th>
            <th scope="col">Fecha & Hora</th>
            <th scope="col">Resumen de Partido</th>
        </tr>
    </thead>
    <tbody>

        <?php
        require_once("../../conexion/Conexion.php");
        require_once("../../clases/Cancha.php");
        $Conexion_ID;
        $Conexion_ID = new Conexion();
        $Conexion_ID = $Conexion_ID->getConexion();

        ?>
        <tr>
            <?php
            $listado = array();

            $result = $Conexion_ID->query("SELECT p.idpartido,
 
                (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA, 
                                       
                                       (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                                       WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,
                                       
                                       (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,
                                       
                                       (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                                       WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB,
                                      
                                      date_format(p.fecha_partido, '%d-%m-%Y') as Fecha, 
                                      
                                      date_format(p.fecha_partido, '%hh:%mm %p') as Hora
                                       
                                       
                                       FROM goles as g, partido as p, equipo as e
                                       
                                       WHERE g.idpartido = p.idpartido AND p.estado = 0 GROUP BY p.idpartido;");

            if ($result) :

                while ($fila = $result->fetch_object()) {
                        $listado[] = new Cancha($fila->idpartido, $fila->EquipoA, $fila->GolesA, $fila->EquipoB, $fila->GolesB, $fila->Fecha . ' | ' . $fila->Hora);
                }

            endif;

            foreach ($listado as $key => $value) {
            ?>

            <td style="text-align: center; font-size: 13px;">
                <!-- NOMBRE -->
                <?php echo $value->getId(); ?>
            </td>

            <td style="text-align: center; font-size: 13px;">
                <!-- JJ -->
                <?php echo $value->getNombre(); ?>
            </td>

            <td style="text-align: center; font-size: 13px;">
                <!-- JG -->
                <?php echo $value->getDireccion(); ?>
            </td>

            <td style="text-align: center; font-size: 13px;">
                <!-- JE -->
                <?php echo $value->getLongitud(); ?>
            </td>

            <td style="text-align: center; font-size: 13px;">
                <!-- JP -->
                <?php echo $value->getLatitud(); ?>
            </td>

            <td style="text-align: center; font-size: 13px;">
                <!-- GF -->
                <?php echo $value->getEstado(); ?>
            </td>

            <td style="text-align: center; font-size: 13px;">
                <!-- Partidos -->
                <button type="button" class="btn btn-round btn-editar" onclick="mostrarResumen()"
                    data-target="#modalResumen" data-toggle="modal" 
                    data-idpartido='<?php echo $value->getId(); ?>'
                    data-equipoa='<?php echo $value->getNombre(); ?>'
                    data-equipob='<?php echo $value->getLongitud(); ?>'
                    data-toggle="tooltip">
                    <li class="fa fa-eye"> Ver</li>
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>