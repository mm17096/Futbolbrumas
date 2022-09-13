<?php


?>
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
            //include "../globals/conexion.php";
            //require_once("../clases/Equipo.php");
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
                <td style="width: 65%;  height: 1%; text-align: center;" class="titulo2" colspan="3"><h5>Torneo de Fútbol Sala, Las Brumas,Cojutepeque, Cuscatlán.<p></p>REPORTE: PORTEROS MENOS VENCIDOS.</h5></td>
            </tr>
        </table>
        
    </page_header>

    <?php
   

        
        $contador = 1;
        echo "<p></p> ";
        echo '<table border="0" rules="all" cellspacing=0 cellpadding=1>
        <tr>
            <th style="width: 25%; text-align: center; height: 25px">Número</th>
            <th style="width: 20%; text-align: ;">Nombre del Portero</th>
            <th style="width: 20%; text-align: center;">Equipo del Portero</th>
            <th style="width: 20%; text-align: center;">Goles en contra</th>
        </tr>';
        
        require_once("../conexion/Conexion.php");
        require_once("../clases/Equipo.php");
        $Conexion_ID;
        $Conexion_ID = new Conexion();
        $Conexion_ID = $Conexion_ID->getConexion();
        $aux = 0;

        $result = $Conexion_ID->query("SELECT * FROM `equipo` WHERE estado = 1");
        $listado = array();
        if ($result) :
            while ($fila = $result->fetch_object()) {
                $listado[] = new Equipo($fila->idequipo, $fila->nombre, $fila->camisa, $fila->idrepresentante, $fila->estado);
            }
        endif;

        if (is_array($listado)) :

            $i = 0;
            foreach ($listado as $key => $value) {
        
                
                    
                    $posiciones[] = new stdClass;
                    $ID = $value->getIdequipo();

                    $resultJJ_ida = $Conexion_ID->query("SELECT

                        (SELECT nombre FROM jugador  as j WHERE posicion = 'Portero' AND j.idequipo = '$ID' AND j.titular = 1) AS Portero,

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipoa) AS EquipoA,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipoa) as GolesA,

                        (SELECT e.nombre FROM equipo AS e WHERE e.idequipo = p.equipob) AS EquipoB,

                        (SELECT COUNT(g.idgoles) FROM goles as g, jugador as j, equipo as e
                        WHERE g.idjugador = j.idjugador AND g.idpartido = p.idpartido AND e.idequipo = j.idequipo AND e.idequipo = p.equipob) as GolesB

                        FROM goles as g, partido as p, equipo as e

                        WHERE g.idpartido = p.idpartido AND p.equipoa = '$ID' AND e.idequipo = '$ID' AND p.estado = 0 AND e.estado = 1 GROUP BY p.idpartido;");

                    $resultJJ_vuelta = $Conexion_ID->query("SELECT

                        (SELECT nombre FROM jugador  as j WHERE posicion = 'Portero' AND j.idequipo = '$ID' AND j.titular = 1) AS Portero,

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


                    if ($resultJJ_vuelta->num_rows != 0 && $resultJJ_ida->num_rows != 0) :

                        $aux++;
                        while ($fila = $resultJJ_ida->fetch_object()) {

                            $portero = $fila->Portero;

                            $equipo = $fila->EquipoA;

                            $GF = $GF + $fila->GolesA;

                            $GC = $GC + $fila->GolesB;
                        }

                        while ($fila = $resultJJ_vuelta->fetch_object()) {

                            $portero = $fila->Portero;

                            $equipo = $fila->EquipoB;

                            $GF = $GF + $fila->GolesB;

                            $GC = $GC + $fila->GolesA;
                        }


                        $posiciones[$i]->id = $GC;
                        $posiciones[$i]->nombre = $portero;
                        $posiciones[$i]->equipo = $equipo;
                        $posiciones[$i]->GC = $GC;

                        $i++;

                    endif;
                }
            endif;
            if ($aux != 0) {
                asort($posiciones);
                foreach ($posiciones as $key => $value) {
            

                echo '<tr>';
                echo '<td style="width: 5%; text-align: center; height: 15px">' . $contador++ . '</td>';
                echo '<td style="width: 30%; text-align: left;">' . $value->nombre . '</td>';
                echo '<td style="width: 20%; text-align: center;">' . $value->equipo. '</td>';
                echo '<td style="width: 10%; text-align: center;">' . $value->GC . '</td>';



                echo '</tr>';
        } 
            }
       
           
            echo '</table>';
    

                ?>
    <page_footer>
    </page_footer>
    
</page>