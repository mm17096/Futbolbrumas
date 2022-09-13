<style type="text/css">
    .formatocontenidotabla {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 0.75rem;
    }

    .titulo1 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 8mm;
    }

    .titulo2 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 6mm;
    }

    .titulo3 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 4mm;
    }

    h2 {
        float: left;
    }

    h3 {
        float: left;
    }
    #cabecera img{
            width: 120px;
            /*float:right;*/
          }

    <?php
    $format = $_REQUEST['format'];
    $orientacion = $_REQUEST['orientacion'];

    if ($orientacion == 'P' && $format == 'LETTER') {
        echo 'table{	width: 190mm; }';
    }
    if ($orientacion == 'L' && $format == 'LETTER') {
        echo 'table{	width: 250mm; }';
    }
    if ($orientacion == 'P' && $format == 'LEGAL') {
        echo 'table{	width: 190mm; }';
    }
    if ($orientacion == 'L' && $format == 'LEGAL') {
        echo 'table{	width: 330mm; }';
    }
    ?>
</style>

<page backtop="45mm" backbottom="15mm" footer="page">
    <page_header>
        <?php

       include "../globals/conexion.php";
       // include "../conexion/Conexion.php";
        date_default_timezone_set('America/El_Salvador');
        ?>
        <table border="0" rules="all" cellspacing=1 cellpadding=1>
            <td ROWSPAN=7 style="width: 15%;">
                <div id="cabecera">
                    <img src="../views/imagen/logoprin.png" />
                </div>
            </td>
            <tr>
                <td style="width: 30%; height: -1%;  text-align: right;" class="titulotabla">Fecha generaci&oacute;n: <?php echo date("d-m-Y"); ?></td> 
            </tr>
            <tr>
                <td style="width: 50%; height: -1%; text-align: right;" class="titulotabla">Hora generada: <?php echo date("h:i:s:a "); ?></td>       
            </tr>
            <tr>
                <td style="width: 62%; height: 1%;  " class="titulotabla"></td>
            </tr>
            <tr>
                <td style="width: 70%; height: 1%;  " class="titulotabla"></td>
            </tr>
            <tr>
                <td style="width: 65%;  height: 1%; text-align: center;" class="titulo2" colspan="3"><h5>Torneo de Fútbol Sala, Las Brumas,Cojutepeque, Cuscatlán.<p></p>REPORTE: JUGADORES POR EQUIPO.</h5></td>
            </tr>
        </table>
    </page_header>

    <?php
  $result = $conexion->query("select e.nombre as nombree,e.idequipo as idequipo from equipo as e where e.estado=1 order by e.nombre");// $result = $conexion->query("select u.nombre as ubicacion,u.idubicacion as idubicacion from ubicacion as u order by u.nombre");
    if ($result) {
        while ($fila = $result->fetch_object()) {
           // $idubicacion = $fila->idubicacion;
            //$ubicacion = $fila->ubicacion;
            $idequipo=$fila->idequipo;
            $nombree=$fila->nombree;


            $contador = 1;

            echo "<p>" . $nombree . "</p>";

            echo '<table border="1" rules="all" cellspacing=0 cellpadding=1>
                <tr>
                    <th style="width: 5%; text-align: center; height: 15px">#</th>
                    <th style="width: 25%; text-align: center;">Nombre</th>
                    <th style="width: 25%; text-align: center;">Apellido</th>
                    <th style="width: 20%; text-align: center;">Número de camisa</th>
                    <th style="width: 20%; text-align: center;">posición</th>
                </tr>';

        $result1 = $conexion->query("select j.nombre as nombredelequipo, j.apellido as apellido, j.numero_camisa as numerocamiseta, j.posicion as posicion from jugador as j  WHERE j.idequipo=$idequipo and j.estado=1 order by j.nombre");//$result1 = $conexion->query("select cl.nombre as nombreclasificacion from clasificacion  as cl where cl.idubicacion=$idubicacion order by cl.nombre");
            if ($result1) {
                while ($fila1 = $result1->fetch_object()) {
                    echo '<tr>';
                    echo '<td style="width: 5%; text-align: center; height: 15px">' . $contador++ . '</td>';
                    echo '<td style="width: 20%; text-align: left;">' . $fila1->nombredelequipo . '</td>';
                    echo '<td style="width: 20%; text-align: left;">' . $fila1->apellido . '</td>';
                    echo '<td style="width: 10%; text-align: center;">' . $fila1->numerocamiseta . '</td>';
                    echo '<td style="width: 10%; text-align: center;">' . $fila1->posicion . '</td>';


                    echo '</tr>';
                }
            }

           //
            echo '</table>';
        }
    }
    ?>
    <page_footer>
    </page_footer>
</page>