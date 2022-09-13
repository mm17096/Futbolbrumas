<?php
require_once("../../conexion/Conexion.php");
require_once("../../clases/Equipo.php");
$Conexion_ID;
$Conexion_ID = new Conexion();
$Conexion_ID = $Conexion_ID->getConexion();

$partido = (isset($_GET["partido"])) ? $_GET["partido"] : "";
$Equipo = (isset($_GET["equipo"])) ? $_GET["equipo"] : "";

$result = $Conexion_ID->query("SELECT j.idjugador, e.idequipo FROM jugador as j, equipo as e WHERE j.idequipo = e.idequipo AND e.nombre = '$Equipo' ");
$listado = array();
$listado_goles = array();
$listado_faltas = array();
$listado_cambios = array();

if ($result) :
    while ($fila = $result->fetch_object()) {
        $listado[] = new Equipo($fila->idjugador, $fila->idequipo, $fila->idjugador, $fila->idjugador, $fila->idjugador);
    }
endif;

if (is_array($listado)) :
    foreach ($listado as $key => $value) {
?>
<?php
        $ID = $value->getIdequipo();
        $Idequipo = $value->getNombre();

        $result_goles = $Conexion_ID->query("SELECT (SELECT j.nombre FROM jugador as j WHERE j.idjugador = '$ID') as Jugador, MINUTE(g.tiempo) as Hora
        FROM `goles` as g, equipo as e, jugador as j
        WHERE g.idjugador = '$ID' AND g.idpartido = '$partido' AND j.idequipo = e.idequipo AND e.idequipo = '$Idequipo'  GROUP BY g.tiempo;");

        $result_faltas = $Conexion_ID->query("SELECT (SELECT nombre FROM jugador WHERE idjugador = '$ID') as Jugador, f.tipo, MINUTE(f.tiempo) as Hora
        FROM `falta` as f, jugador as j, equipo as e
        WHERE f.idjugador = '$ID' AND idpartido = '$partido' AND e.idequipo = '$Idequipo' AND j.idequipo = e.idequipo GROUP BY f.tiempo;");

        $result_cambios = $Conexion_ID->query("SELECT (SELECT nombre FROM jugador WHERE idjugador = '$ID') as Jugador_sale, 
        (SELECT nombre FROM jugador WHERE idjugador = c.idjugadorb) as Jugador_entra, MINUTE(c.tiempo) as Hora
        FROM `cambio` as c, jugador as j, equipo as e, partido as p
        WHERE c.idjugadora = '$ID' AND c.idpartido = '$partido' AND e.idequipo = '$Idequipo' AND j.idequipo = e.idequipo GROUP BY c.tiempo;");


        if ($result_goles->num_rows > 0) {
            while ($fila = $result_goles->fetch_object()) {
                $listado_goles[] = new Equipo($fila->Jugador, $fila->Hora, $fila->Hora, $fila->Hora, $fila->Hora);
            }
        }

        if ($result_faltas->num_rows > 0) {
            while ($fila = $result_faltas->fetch_object()) {
                $listado_faltas[] = new Equipo($fila->Jugador, $fila->tipo, $fila->Hora, $fila->Hora, $fila->Hora);
            }
        }

        if ($result_cambios->num_rows > 0) {
            while ($fila = $result_cambios->fetch_object()) {
                $listado_cambios[] = new Equipo($fila->Jugador_sale, $fila->Jugador_entra, $fila->Hora, $fila->Hora, $fila->Hora);
            }
        }
    }
endif;

?>

<h3 style="color: black;"> <?php echo $Equipo ?> </h3>

<br>
<h5 style="color: black;">Goles <input width="35px" type="image" src="imagen/gol.png"></h5>
<br>
<?php if (!empty($listado_goles)) { ?>
    <table>
        <thead style="text-align: center;">
            <tr>
                <th scope="col">Jugador</th>
                <th scope="col" style="color: black;">|</th>
                <th scope="col">Minuto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listado_goles as $key => $value) {
                if ($value->getIdequipo() != "" && $value->getNombre() != "") {
            ?>
                    <tr>
                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getIdequipo(); ?>
                        </td>

                        <td style="text-align: center; size: 35px; color: black;">
                            <?php echo '|' ?>
                        </td>

                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getNombre(); ?>'
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
<?php } else {
    echo "No hubo goles";
} ?>
<br>
<h5 style="color: black;">Faltas <input width="35px" type="image" src="imagen/falta-de-futbol.png"></h5>
<br>
<?php if (!empty($listado_faltas)) { ?>
    <table>
        <thead style="text-align: center;">
            <tr>
                <th scope="col">Jugador</th>
                <th scope="col" style="color: black;">|</th>
                <th scope="col">Tarjeta</th>
                <th scope="col" style="color: black;">|</th>
                <th scope="col">Minuto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listado_faltas as $key => $value) {
                if ($value->getIdequipo() != "" && $value->getNombre() != "" && $value->getCamisa()) {
            ?>
                    <tr>
                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getIdequipo(); ?>
                        </td>

                        <td style="text-align: center; size: 35px; color: black;">
                            <?php echo '|' ?>
                        </td>

                        <td style="text-align: center; size: 20px;">
                            <?php 
                            if($value->getNombre() == "Tarjeta Amarilla"){
                            ?>
                            <input width="15px" type="image" src="imagen/tarjeta-amarilla.png">
                            <?php
                            }else if($value->getNombre() == "Tarjeta Roja"){
                            ?>
                             <input width="15px" type="image" src="imagen/tarjeta-roja.png">
                            <?php 
                            }?>
                        </td>

                        <td style="text-align: center; size: 35px; color: black;">
                            <?php echo '|' ?>
                        </td>

                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getCamisa(); ?>'
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
<?php } else {
    echo "No hubo faltas";
} ?>

<br>
<h5 style="color: black;">Cambios <input width="30px" type="image" src="imagen/cambiar.png"></h5>
<br>
<?php if (!empty($listado_cambios)) { ?>
    <table>
        <thead style="text-align: center;">
            <tr>
                <th scope="col"> <input width="25px" type="image" src="imagen/jugador_sale.png"> </th>
                <th scope="col" style="color: black;">|</th>
                <th scope="col"> <input width="25px" type="image" src="imagen/jugador_entra.png"> </th>
                <th scope="col" style="color: black;">|</th>
                <th scope="col">Minuto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listado_cambios as $key => $value) {
                if ($value->getIdequipo() != "" && $value->getNombre() != "") {
            ?>
                    <tr>
                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getIdequipo(); ?>
                        </td>

                        <td style="text-align: center; size: 35px; color: black;">
                            <?php echo '|' ?>
                        </td>

                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getNombre(); ?>
                        </td>

                        <td style="text-align: center; size: 35px; color: black;">
                            <?php echo '|' ?>
                        </td>

                        <td style="text-align: center; size: 20px;">
                            <?php echo $value->getCamisa(); ?>'
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
<?php } else {
    echo "No hubo cambios";
} ?>
