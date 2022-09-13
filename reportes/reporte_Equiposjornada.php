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
            /*float:center;*/
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
                <td style="width: 65%;  height: 1%; text-align: center;" class="titulo2" colspan="3"><h5>Torneo de Fútbol Sala, Las Brumas,Cojutepeque, Cuscatlán.<p></p>REPORTE: PARTIDOS POR JORNADA.</h5></td>
            </tr>
        </table>
    </page_header>
    <?php
  $result = $conexion->query("SELECT date_format(j.fecha_inicio, '%d-%m-%Y') as desde ,date_format(j.fecha_fin, '%d-%m-%Y') as hasta, j.idjornada as idjornada from jornada j
  INNER JOIN torneo t on t.idtorneo=j.torneo
  WHERE t.estado=1
  ORDER BY j.idjornada");// $result = $conexion->query("select u.nombre as ubicacion,u.idubicacion as idubicacion from ubicacion as u order by u.nombre");
    if ($result) {
        while ($fila = $result->fetch_object()) {

            $idjornada=$fila->idjornada;
            $desde=$fila->desde;
            $hasta=$fila->hasta;
            $contador = 1;

           echo "Desde: ";
            echo "  $desde ";
            echo " Hasta:   ";
            echo "   $hasta";
            echo "<p></p> ";

            echo '<table border="1" rules="all" cellspacing=0 cellpadding=1>

                <tr>
                    <th style="width: 5%; text-align: center; height: 15px">#</th>
                    <th style="width: 20%; text-align: center;">FECHA</th>
                    <th style="width: 10%; text-align: center;">HORA</th>
                    <th style="width: 20%; text-align: center;">EQUIPO A</th>
                    <th style="width: 20%; text-align: center;">EQUIPO B</th>
                    <th style="width: 20%; text-align: center;">CANCHA</th>
                </tr>';
                date_default_timezone_set('America/El_Salvador');
        $result1 = $conexion->query("SELECT date_format(p.fecha_partido, '%d-%m-%Y') as fecha,date_format(p.fecha_partido, '%h:%m %p') as hora,e.nombre as equipoaa, ee.nombre as equipobb, c.nombre as nombrecancha from partido p
        INNER JOIN jornada j on j.idjornada=p.idjornada
        INNER JOIN equipo e on e.idequipo=p.equipoa
        INNER JOIN equipo ee on ee.idequipo=p.equipob
        INNER join cancha c on c.idcancha=p.idcancha
        WHERE j.idjornada=$idjornada and p.estado=1 
        ORDER BY p.fecha_partido
        ");
            if ($result1) {
                while ($fila1 = $result1->fetch_object()) {
                    echo '<tr>';
                    echo '<td style="width: 5%; text-align: center; height: 15px">' . $contador++ . '</td>';
                    echo '<td style="width: 15%; text-align: center;">' . $fila1->fecha.' </td>';
                    echo '<td style="width: 10%; text-align: center;">' . $fila1->hora.' </td>';
                    echo '<td style="width: 20%; text-align: center;">' . $fila1->equipoaa. '</td>';
                    echo '<td style="width: 20%; text-align: center;">' . $fila1->equipobb. '</td>';
                    echo '<td style="width: 20%; text-align: center;">' . $fila1->nombrecancha. '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
            echo "<p></p> ";
        }
    }
    ?>
    <page_footer>
    </page_footer>
</page>
