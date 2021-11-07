<?php
session_start();
require_once "../clases/jornada.php";
//require_once "../clases/Partidos.php";

require_once "../dao/DaoJornada.php";
require_once "../dao/DaoEquipo.php";

//require_once "../dao/DaoPartido.php";

//variables de Guardar
$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
$fecha = (isset($_REQUEST["fechainicio"])) ? $_REQUEST["fechainicio"] : "";
$domingo = (isset($_REQUEST["domingo"])) ? $_REQUEST["domingo"] : "";
$lunes = (isset($_REQUEST["lunes"])) ? $_REQUEST["lunes"] : "";
$martes = (isset($_REQUEST["martes"])) ? $_REQUEST["martes"] : "";
$miercoles = (isset($_REQUEST["miercoles"])) ? $_REQUEST["miercoles"] : "";
$jueves = (isset($_REQUEST["jueves"])) ? $_REQUEST["jueves"] : "";
$viernes = (isset($_REQUEST["viernes"])) ? $_REQUEST["viernes"] : "";
$sabado = (isset($_REQUEST["sabado"])) ? $_REQUEST["sabado"] : "";
$primera_hora = (isset($_REQUEST["primera"])) ? $_REQUEST["primera"] : "";
$segunda_hora = (isset($_REQUEST["segunda"])) ? $_REQUEST["segunda"] : "";
$tercera_hora = (isset($_REQUEST["tercera"])) ? $_REQUEST["tercera"] : "";
$cuarta_hora = (isset($_REQUEST["cuarta"])) ? $_REQUEST["cuarta"] : "";
$quinta_hora = (isset($_REQUEST["quinta"])) ? $_REQUEST["quinta"] : "";





$fecha_actual = date('Y-m-d');



//Dao 
$daoEquipo = new DaoEquipo();
$daoJornada = new DaoJornada();
//$daoPartido= new DaoPartido();

//clases
$equipos = $daoEquipo->listaEquipo();

//variables

$equiposA = array();                     //matriz A
$equiposB = array();                     // MAtriz B
$numEquipos = count($equipos);
$numero_jornada = 0;
$numero_partidos_jornada = 0;
//$total = 0;





//GENERAR EL NUMERO DE JORNADAS QUE SE JUGARAN
if ($numEquipos % 2 == 0) {
    $numero_jornada = count($equipos) - 1;   //Numero de Jornadas
    $numero_partidos_jornada = count($equipos) / 2; //numero de partidos por jornadas
} else {
    //PARTIDOS IMPAR 
    $numero_jornada = count($equipos);
    $numero_partidos_jornada = round(count($equipos) / 2) - 1;
}

//GENERAR JORNADA


if ($numEquipos % 2 == 0) {

    $numero_jornada = count($equipos) - 1;   //Numero de Jornadas

    $numero_partidos_jornada = count($equipos) / 2; //numero de partidos por jornadas
    $k = 0;
    //PARTIDOS PAR
    //PARTIDOS DE IDA Y VUELTA
    for ($i = 0; $i < $numero_jornada; $i++) {
        for ($j = 0; $j < $numero_partidos_jornada; $j++) {
            $equiposA[$i][$j] = $equipos[$k]->getIdequipo();

            $k++;
            if ($k == $numero_jornada) {
                $k = 0;
            }
        }
    }

    for ($i = 0; $i < $numero_jornada; $i++) {
        if ($i % 2 == 0) {
            $equiposB[$i][0] = $equipos[count($equipos) - 1]->getIdequipo();
        } else {
            $equiposB[$i][0]  = $equiposA[$i][0];
            $equiposA[$i][0]  = $equipos[count($equipos) - 1]->getIdequipo();
        }
    }

    $equipoMasAlto = count($equipos) - 1;
    $equipoImparMasAlto = $equipoMasAlto - 1;

    for ($i = 0, $k = $equipoImparMasAlto; $i < $numero_jornada; $i++) {
        for ($j = 1; $j < $numero_partidos_jornada; $j++) {
            $equiposB[$i][$j] = $equipos[$k]->getIdequipo();
            $k--;

            if ($k == -1)
                $k = $equipoImparMasAlto;
        }
    }
} else {
    //PARTIDOS IMPAR 
    $numero_jornada = count($equipos) - 1;
    $numero_partidos_jornada = round(count($equipos) / 2) - 1;

    $k = 0;
    //PARTIDOS PAR
    //PARTIDOS DE IDA Y VUELTA
    for ($i = 0; $i < $numero_jornada; $i++) {
        for ($j = 0; $j < $numero_partidos_jornada; $j++) {
            $equiposA[$i][$j] = $equipos[$k]->getIdequipo();

            $k++;
            if ($k == $numero_jornada) {
                $k = 0;
            }
        }
    }

    for ($i = 0; $i < $numero_jornada; $i++) {
        if ($i % 2 == 0) {
            $equiposB[$i][0] = $equipos[count($equipos) - 1]->getIdequipo();
        } else {
            $equiposB[$i][0]  = $equiposA[$i][0];
            $equiposA[$i][0]  = $equipos[count($equipos) - 1]->getIdequipo();
        }
    }

    $equipoMasAlto = count($equipos) - 1;
    $equipoImparMasAlto = $equipoMasAlto - 1;

    for ($i = 0, $k = $equipoImparMasAlto; $i < $numero_jornada; $i++) {
        for ($j = 1; $j < $numero_partidos_jornada; $j++) {
            $equiposB[$i][$j] = $equipos[$k]->getIdequipo();

            $k--;

            if ($k == -1)
                $k = $equipoImparMasAlto;
        }
    }
}

if ($action == 'guardar') {   
    

      //variables para realizar jornadas
      $contador=0;

    //separar la fecha de inicio de las jornadas
    if ($fecha_actual < $fecha) {

        //ASIGNACION DE FECHAS DE JORNADAS PARA PARTIDOS
        $anio = date("Y", strtotime($fecha));
        $mes = date("m", strtotime($fecha));
        $dia = date("d", strtotime($fecha));

        while($contador<(2*$numero_jornada)) {// dos dias por las 2 matrices
           
            if(!checkdate($mes, $dia, $anio)) { //validando si existe la fecha
                $mes++;
                $dia = 1;
                if($mes==13 && !checkdate($mes, $dia, $anio) ){
                    $anio++;
                    $mes=1;
                    print($dia);
                    print($mes);
                    print($anio);
                    break;
                }
                break;
            }
            $dia++;
            
        }
    }


  

    

}
?>
<script type="text/javascript">
    msj();

    function msj() {

        setTimeout(function() {
            document.getElementById("msjsuccess").style.display = 'none';
        }, 3500);

        setTimeout(function() {
            document.getElementById("msjerror").style.display = 'none';
        }, 3500);

    };
</script>