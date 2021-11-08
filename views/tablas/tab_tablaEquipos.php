<table class="table table-striped table-bordered" style="width:100% " id="tablaequipo">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Jugadores</th>
            <th scope="col">Estado</th>
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

            $result = $Conexion_ID->query("SELECT 
            e.idequipo as 'idequipo', 
            e.nombre as 'nombre',
            (SELECT COUNT(j.idjugador) WHERE j.idequipo = e.idequipo AND r.dui = e.idrepresentante) as 'jugadores', 
            e.idrepresentante as 'idrepresentante', 
            e.estado as 'estado' 
                        
            FROM `equipo` as e, jugador as j, representante as r 
            WHERE e.idrepresentante = r.dui
            AND e.idrepresentante = '$ID'
            AND j.idequipo = e.idequipo 
            GROUP BY  e.idequipo ORDER BY j.idjugador");
            
            $listado = array();
            if ($result) :
                while ($fila = $result->fetch_object()) {
                    $listado[] = new Equipo($fila->idequipo, $fila->nombre, $fila->jugadores, $fila->idrepresentante, $fila->estado);
                }
            

            if (is_array($listado)) :

                foreach ($listado as $key => $value) {
        ?>
        <tr>
            <td style="text-align: center; size: 20px;">
                <?php echo $value->getNombre(); ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <?php
                            if ($value->getCamisa() != null) {
                                echo $value->getCamisa();
                            } else {
                                echo "0";
                            }
                            ?>
            </td>

            <td style="text-align: center; size: 20px;">
                <?php
                            if ($value->getEstado() == 1) {
                                echo "Activo";
                            } else {
                                echo "De baja";
                            }
                            ?>
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