<table id="tbgoleador" class="table table-striped table-bordered" style="width:100% ">
    <thead style="text-align: center;">
        <tr>
            <th scope="col">Nombre del Jugador</th>
            <th scope="col">Equipo del Jugador</th>
            <th scope="col">Goles Realizados</th>
        </tr>
    </thead>
    <tbody>

        <?php
            require_once("../../conexion/Conexion.php");
            require_once("../../clases/Equipo.php");
            $Conexion_ID;
            $Conexion_ID = new Conexion();
            $Conexion_ID = $Conexion_ID->getConexion();

            $result = $Conexion_ID->query("SELECT CONCAT(j.nombre,' ' ,j.apellido) AS Jugador,e.nombre as Equipo, COUNT(g.idgoles) as GolesAFavor FROM `goles` as g, jugador as j, equipo as e
            WHERE j.idjugador = g.idjugador AND e.idequipo = j.idequipo GROUP BY j.idjugador ORDER BY COUNT(g.idgoles) DESC LIMIT 5;");

            if ($result) :
                while ($fila = $result->fetch_object()) {
        ?>
        <tr>
            <td style="text-align: center; size: 20px;">
                <?php echo $fila->Jugador; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <?php echo $fila->Equipo; ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <?php echo $fila->GolesAFavor; ?>
            </td>
        </tr>
        <?php }
            endif; ?>
    </tbody>
</table>
