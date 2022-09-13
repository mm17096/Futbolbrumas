<table id="tbpartidosporjugar" class="table table-striped table-bordered" style="width:100%">
    <thead style="text-align: center;">
        <tr>
            <th scope="col">Equipo A</th>
            <th scope="col">Equipo B</th>
            <th scope="col">Fecha & Hora</th>
            <th scope="col">Cancha</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Formación</th>
        </tr>
    </thead>
    <tbody>

        <?php
        require_once("../../conexion/Conexion.php");
        require_once("../../clases/Cancha.php");
        require_once("../../clases/Jugador.php");
        $Conexion_ID;
        $Conexion_ID = new Conexion();
        $Conexion_ID = $Conexion_ID->getConexion();

        $result = $Conexion_ID->query("SELECT

        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA,


        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,

        date_format(p.fecha_partido, '%d-%m-%Y') as Fecha, date_format(p.fecha_partido, '%hh:%mm %p') as Hora,
        c.latitud as Latitud, c.longitud as Longitud, c.nombre as Cancha

        FROM partido as p, equipo as e, cancha as c

        WHERE p.estado = 1 AND c.idcancha = p.idcancha GROUP BY p.idpartido;");

        $listado = array();
        if ($result) :
            while ($fila = $result->fetch_object()) {
                    $listado[] = new Cancha($fila->EquipoA, $fila->EquipoB, $fila->Fecha . ' | ' . $fila->Hora, $fila->Longitud, $fila->Latitud, $fila->Cancha);
            }
        endif;

        if (is_array($listado)) :

            $j = 0;
            foreach ($listado as $key => $value) {
        ?>
        <tr>
            <td style="text-align: center; size: 20px;">
                <?php echo $value->getId(); ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <?php echo $value->getNombre(); ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <?php echo $value->getDireccion(); ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <?php echo $value->getEstado(); ?>
            </td>

            <?php if ($value->getLongitud() != null && $value->getLatitud() != null) {
                        $j = $j + 1;
                    ?>
            <td align="center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-round btn-editar" onclick="verMapaTabla(<?php echo $j; ?>)">
                        <li class="fa fa-eye">Ver</li>
                    </button>
                </div>
            </td>
            <input type="hidden" id="tablong<?php echo $j; ?>" name="tablong<?php echo $j; ?>"
                value="<?php echo $value->getLongitud(); ?>" />
            <input type="hidden" id="tablat<?php echo $j; ?>" name="tablat<?php echo $j; ?>"
                value="<?php echo $value->getLatitud(); ?>" />
            <?php } ?>

            <td style="text-align: center; size: 20px;">
                <!-- Formacion -->
                <button type="button" class="btn btn-round btn-editar" onclick="mostrarFormacion()"
                    data-target="#modalFormacion"
                    data-toggle="modal"
                    data-equipoa="<?php echo $value->getId(); ?>"
                    data-equipob="<?php echo $value->getNombre(); ?>"
                    data-toggle="tooltip">
                    <li class="fa fa-eye"> Ver</li>
                </button>
            </td>
        </tr>
        <?php }
        endif; ?>
    </tbody>
</table>
