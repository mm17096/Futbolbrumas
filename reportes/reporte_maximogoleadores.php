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
                <td style="width: 65%;  height: 1%; text-align: center;" class="titulo2" colspan="3"><h5>Torneo de FÚtbol Sala, Las Brumas,Cojutepeque, Cuscatlán.<p></p>REPORTE: MAXIMOS GOLEADORES.</h5></td>
            </tr>
        </table>
    </page_header>

    <?php
            echo "<p></p> ";
            echo '<table border="0" rules="all" cellspacing=0 cellpadding=1>
                <tr>
                    <th style="width: 15%; text-align: center; height: 50px">Número</th>
                    <th style="width: 30%; text-align: align;">Nombre del Jugador</th>
                    <th style="width: 30%; text-align: center;">Equipo</th>
                    <th style="width: 20%; text-align: center;">Goles</th>
                   
                </tr>';
                $contador = 1;
        $result1 = $conexion->query("SELECT concat(j.nombre,' ',j.apellido) as nombrejugador,e.nombre as nombre, COUNT(g.tipo) as cantidadgoles from `goles` g

		INNER JOIN partido p on p.idpartido=g.idpartido
        INNER JOIN jornada jj on jj.idjornada=p.idjornada
        INNER JOIN torneo t on t.idtorneo=jj.torneo
        INNER JOIN jugador j on j.idjugador=g.idjugador
        inner join equipo e on e.idequipo=j.idequipo
        WHERE t.estado=1 and e.estado=1
        GROUP BY nombrejugador,e.nombre
        ORDER BY  cantidadgoles desc
        limit 5");
            if ($result1) {
                while ($fila1 = $result1->fetch_object()) {
                    echo '<tr>';
                    echo '<td style="width: 5%; text-align: center; height: 15px">' . $contador++ . '</td>';
                    echo '<td style="width: 30%; text-align: left;">' . $fila1->nombrejugador . '</td>';
                    echo '<td style="width: 20%; text-align: center;">' . $fila1->nombre . '</td>';
                    echo '<td style="width: 10%; text-align: center;">' . $fila1->cantidadgoles . '</td>';



                    echo '</tr>';
                }
            }

           //
            echo '</table>';
        //}
    //}
    ?>
    <page_footer>
    </page_footer>
</page>