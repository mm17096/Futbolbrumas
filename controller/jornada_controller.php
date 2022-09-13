<?php
session_start();
require_once "../clases/jornada.php";
require_once "../clases/Cancha.php";
require_once "../clases/Arbitro.php";
require_once "../clases/Partido.php";
require_once "../clases/Torneo.php";

require_once "../dao/DaoJornada.php";
require_once "../dao/DaoEquipo.php";
require_once "../dao/DaoCancha.php";
require_once "../dao/DaoArbitro.php";
require_once "../dao/DaoPartido.php";
require_once "../dao/DaoTorneo.php";


print_r("dsasdas");
//DIAS Y HORAS
$horas = array();
$dias = array();

//variables de Guardar
$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
$fecha = (isset($_REQUEST["fechainicio"])) ? $_REQUEST["fechainicio"] : "";

$domingo = (isset($_REQUEST["domingo"])) ? $_REQUEST["domingo"] : "";
$dias[0] = $domingo;
$lunes = (isset($_REQUEST["lunes"])) ? $_REQUEST["lunes"] : "";
$dias[1] = $lunes;
$martes = (isset($_REQUEST["martes"])) ? $_REQUEST["martes"] : "";
$dias[2] = $martes;
$miercoles = (isset($_REQUEST["miercoles"])) ? $_REQUEST["miercoles"] : "";
$dias[3] = $miercoles;
$jueves = (isset($_REQUEST["jueves"])) ? $_REQUEST["jueves"] : "";
$dias[4] = $jueves;
$viernes = (isset($_REQUEST["viernes"])) ? $_REQUEST["viernes"] : "";
$dias[5] = $viernes;
$sabado = (isset($_REQUEST["sabado"])) ? $_REQUEST["sabado"] : "";
$dias[6] = $sabado;

$ocho = (isset($_REQUEST["ocho"])) ? $_REQUEST["ocho"] : "";
$horas[0] = $ocho;
$nueve = (isset($_REQUEST["nueve"])) ? $_REQUEST["nueve"] : "";
$horas[1] = $nueve;
$diez = (isset($_REQUEST["diez"])) ? $_REQUEST["diez"] : "";
$horas[2] = $diez;
$once = (isset($_REQUEST["once"])) ? $_REQUEST["once"] : "";
$horas[3] = $once;
$una = (isset($_REQUEST["una"])) ? $_REQUEST["una"] : "";
$horas[4] = $una;
$dos = (isset($_REQUEST["dos"])) ? $_REQUEST["dos"] : "";
$horas[5] = $dos;
$tres = (isset($_REQUEST["tres"])) ? $_REQUEST["tres"] : "";
$horas[6] = $tres;
$cuatro = (isset($_REQUEST["cuatro"])) ? $_REQUEST["cuatro"] : "";
$horas[7] = $cuatro;
$cinco = (isset($_REQUEST["cinco"])) ? $_REQUEST["cinco"] : "";
$horas[8] = $cinco;
$seis = (isset($_REQUEST["seis"])) ? $_REQUEST["seis"] : "";
$horas[9] = $seis;
$siete = (isset($_REQUEST["siete"])) ? $_REQUEST["siete"] : "";
$horas[10] = $siete;






$fecha_actual = date('Y-m-d');



//Dao 
$daoEquipo = new DaoEquipo();
$daoJornada = new DaoJornada();
$daoCancha = new DaoCancha();
$daoArbitro = new DaoArbitro();
$daoPartido = new DaoPartido();
$daoTorneo = new DaoTorneo();

//clases
$equipos = $daoEquipo->listaEquipoActivos();
$canchas = $daoCancha->listaCanchaActivas();
$arbitros = $daoArbitro->listaArbitroActivos();
$partidosActivos = $daoPartido->listaPartidos();



//variables

$equiposA = array();                     //matriz A
$equiposB = array();
$horas_partidos = array();
$numEquipos = count($equipos);
$numero_jornada = 0;
$numero_partidos_jornada = 0;
$partido_cancha = 0;
$cantidad_dias = 0;
$cantidad_horas = 0;
$cantidad_cancha = 0;
$mensaje = true;
//$total = 0;

//contar dias y horas
foreach ($dias as $key => $dia) {
    if ($dia != "") {
        $cantidad_dias++;
    }
}

foreach ($horas as $key => $hora) {
    if ($hora != "") {
        $horas_partidos[$cantidad_horas] = $hora;
        $cantidad_horas++;
    }
}


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
    print_r("par");

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
    print_r("impar");
    //PARTIDOS IMPAR 
    $numero_jornada = count($equipos);
    $numero_partidos_jornada = round(count($equipos) / 2) - 1;

    $k = 0;
    //PARTIDOS PAR
    //PARTIDOS DE IDA Y VUELTA
    for ($i = 0, $k=0;$i < $numero_jornada; $i++) {
        for ($j = -1; $j < $numero_partidos_jornada; $j++) {
            

            if($j>=0){
                $equiposA[$i][$j] = $equipos[$k]->getIdequipo();
            }
            $k++;
            if ($k == $numero_jornada) {
                $k = 0;
            }
        }
    }
    $equipoMasAlto = $numEquipos - 1;

    for ($i = 0, $k=$equipoMasAlto;$i<$numero_jornada ;$i++) {
        for ($j=0; $j<$numero_partidos_jornada ; $j++) { 
            $equiposB[$i][$j] = $equipos[$k]->getIdequipo();

            $k--;
            if ($k==-1) {
                $k=$equipoMasAlto;
            }
        }
       
    }


    for ($i = 0; $i < $numero_jornada; $i++)
    {
        for ($j = 0; $j < $numero_partidos_jornada; $j++)
        {   
            printf( $equiposA[$i][$j]."-".$equiposB[$i][$j].".......");
                
        }
        echo "<br>";
    }
  
}

/**
 * clasificacion
 * 1- rondas
 * 2-cuartos    (8)
 * 3-semifinal  (4)
 * 4-final      (2)
 */
//CLASIFICACION  DE PARTIDOS EN JORNDAS
$clasificacion = "";
$cantidad_jornada = count($daoJornada->listaJornadas());
if ($cantidad_jornada == 0) {
    $clasificacion = "rondas";
} else {

    if (count($equipos) == 8   || $clasificacion == "rondas") {
        $clasificacion = "cuartos";
    } else if (count($equipos) == 4 || $clasificacion == "cuartos" || $clasificacion == "rondas") {
        $clasificacion = "semifinal";
    } else if (count($equipos) == 2 || $clasificacion == "semifinal" || $clasificacion == "rondas") {
        $clasificacion = "final";
    } else {
        $clasificacion = "rondas";
    }
}



if (count($partidosActivos) == 0) {

    //CREAR EL TORNEO SI EN CASO NO HAY ACTIVO, EN CASO CONTRARIO SE CREARA
    if ($daoTorneo->TorneoActivo() == null) {
        $daoTorneo->registroTorneo(new Torneo(null, true));
    }
    $idTorneo = $daoTorneo->TorneoActivo()->getIdTorneo();


    if ($action == 'guardar' &&  $clasificacion == "rondas") {
        /**VALIDACIONES AL GUARDAR
         * 
         * verificar la cantidad de canchas y arbitro si alcanzan 
         * verificar si la cantidad de equipos son mauyor a la cantidad de horas por dia
         * 
         * 
         * 1-LA CANTIDAD DE HORAS SERA IGUAL A LA CANTIDAD DE PARTIDOS POR JORNADA
         * 2-EL MAXIMO DE DIAS QUE PUEDE ESCOJES ES LA CANTIDAD DE JORNADAS
         * 3-SI LA CANTIDAD DE PARTIDOS POR JORNADA ES MAS DE 5 SE UTILIZARAN 2 DIAS PARA REALIZAR LAS JORNADAS
         * 4-ASIGNARLE PARTIDOS A LAS DEMAS CANCHAS
         * 5-SE LE ASIGNARAN PARTIDOS A LAS DEMAS CANCHAS SI HAY ARBITRO QUE CUBRAN LA CANCHA
         * 6- la cantidad de dias sera igual a la cantidad de jornadas
         * SI LA CANTIDAD DE CANCHAS DE MAYOR A 1 , LA JORNADA SE ASIGNARIA UN SOLO DIA,
         */

        //variables para realizar jornadas
        $contador = 0;

        //separar la fecha de inicio de las jornadas
        if ($fecha_actual <= $fecha) {

            //ASIGNACION DE FECHAS DE JORNADAS PARA PARTIDOS
            $anio = date("Y", strtotime($fecha));
            $mes = date("m", strtotime($fecha));
            $dia = date("d", strtotime($fecha));
            $fechainicio = "";


            if (count($arbitros) >= 1 && count($canchas) >= 1) { // validacion si hay canchas y arbitros para asignacion de partidos

                if (count($canchas) > 1) { // validacion si hay arbitros tantos para la cantidad de canchas

                    if ($cantidad_dias >= 1) {


                        //limites de canchas o arbitros
                        $limite_de_cancha = 0;
                        if (count($canchas) >= count($arbitros)) {
                            $limite_de_cancha = count($arbitros);
                        } else if (count($arbitros) > count($canchas)) {
                            $limite_de_cancha = count($canchas);
                        }

                        if ($cantidad_horas == round($numero_partidos_jornada /  $limite_de_cancha)) {


                            while ($contador < 2 * $numero_jornada) { // Verifica la cantidad de jornadas dichas

                                if (!checkdate($mes, $dia, $anio)) { //validando si existe la fecha
                                    $mes++;
                                    $dia = 1;
                                    if ($mes == 13 && !checkdate($mes, $dia, $anio)) {
                                        $anio++;
                                        $mes = 1;
                                    }
                                }
                                // SE ASIGNARAN LAS FECHA INICIO FECHA FIN DE LAS JORNADAS
                                $dia_eventual = date("w", strtotime($anio . "-" . $mes . "-" . $dia));
                                $partido_contador = false;
                                $fechainicio = $anio . "-" . $mes . "-" . $dia;
                                if ($domingo == "domingo" && $dia_eventual == "0") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($lunes == "lunes" && $dia_eventual == "1") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($martes == "martes" && $dia_eventual == "2") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($miercoles == "miercoles" && $dia_eventual == "3") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($jueves == "jueves" && $dia_eventual == "4") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($viernes == "viernes" && $dia_eventual == "5") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($sabado == "sabado" && $dia_eventual == "6") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                }
                                $dia++; //incrementa los dias
                                if ($partido_contador) {
                                    $ultimaJornada = $daoJornada->UltmimaJornada()->getIdjornada();
                                    // contadores de arbitros y canchas
                                    $contador_cancha = 0;
                                    $contador_arbitro = 0;
                                    $contador_hora = 0; // aumentara cada vez que se registre un partido en cada cancha
                                    $controlador_fecha = 0; // controlada la fecha para cada uno de los partidos



                                    for ($i = 0; $i < $numero_partidos_jornada; $i++) { // cantidad de partidos por jornada
                                        //GUARDAR PARTIDOS
                                        //ASIGNAR LAS HORAS DE PARTIDO  EN DIFERENTES CANCHAS
                                        if ($contador_hora == 0) {
                                            $date = new DateTime($fechainicio);
                                            $time = new DateTime($horas_partidos[$controlador_fecha]);
                                            $merge = new DateTime($date->format('Y-m-d') . ' ' . $time->format('H:i:s'));
                                            $controlador_fecha++;
                                        }


                                        if ($contador > $numero_jornada) { // partidos de vuelta
                                            $daoPartido->registroPartido(new Partido(null, $merge->format('Y-m-d H:i:s'), $equiposB[$contador - $numero_jornada - 1][$i], $equiposA[$contador - $numero_jornada - 1][$i], $arbitros[$contador_arbitro]->getDui(), $arbitros[$contador_arbitro]->getDui(), $ultimaJornada, $canchas[$contador_cancha]->getId(), 1));
                                            //aumenta hora de partidos en todas las canchas
                                            $contador_hora++;
                                        } else { //partidos de ida
                                            $daoPartido->registroPartido(new Partido(null, $merge->format('Y-m-d H:i:s'), $equiposA[$contador - 1][$i], $equiposB[$contador - 1][$i], $arbitros[$contador_arbitro]->getDui(), $arbitros[$contador_arbitro]->getDui(), $ultimaJornada, $canchas[$contador_cancha]->getId(), 1));
                                            //aumenta hora de partidos en todas las canchas
                                            $contador_hora++;
                                        }
                                        $contador_cancha++; //aumenta la cantidad cancha
                                        $contador_arbitro++; //aumenta arbitro

                                        if ($contador_hora == $limite_de_cancha) {
                                            $contador_hora = 0;
                                        }
                                        if ($limite_de_cancha == $contador_cancha && $limite_de_cancha == $contador_arbitro) {
                                            // reinicia conteo para siguiente partido
                                            $contador_cancha = 0;
                                            $contador_arbitro = 0;
                                        }
                                    }
                                }
                                $partido_contador = false;
                            }


                            $contador = 0; //reinicio de contador jornadas
                            if ($mensaje) {
                                $messages[] = "El registro se ha almacenado con éxito.";
?>
                                <div id="msjerror" class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <i class="fa fa-check"></i>
                                    <strong>Registro Almacenado</strong>
                                    <?php
                                    foreach ($messages as $message) {
                                        echo $message;
                                    }
                                    ?>
                                </div>

                            <?php
                            }
                        } else {

                            $errors[] = "debe seleccionar " . round($numero_partidos_jornada / $limite_de_cancha) . " horas.";
                            ?>

                            <div id="msjerror" class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <strong>Error de Registro</strong>
                                <?php
                                foreach ($errors as $error) {
                                    echo $error;
                                }
                                ?>
                            </div>

                        <?php
                        }
                    } else { // si en caso no selecciona dias para poder jugar
                        $errors[] = "Seleccionar Dias para Jugar";
                        ?>

                        <div id="msjerror" class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <strong>Error de Registro</strong>
                            <?php
                            foreach ($errors as $error) {
                                echo $error;
                            }
                            ?>
                        </div>

                        <?php

                    }
                } else { // solo se encuentra 1 cancha disponible

                    if ($cantidad_dias >= 1) { // validacion de dias

                        if ($cantidad_horas == $numero_partidos_jornada) {


                            while ($contador < 2 * $numero_jornada) { // Verifica la cantidad de jornadas dichas

                                if (!checkdate($mes, $dia, $anio)) { //validando si existe la fecha
                                    $mes++;
                                    $dia = 1;
                                    if ($mes == 13 && !checkdate($mes, $dia, $anio)) {
                                        $anio++;
                                        $mes = 1;
                                    }
                                }
                                // SE ASIGNARAN LAS FECHA INICIO FECHA FIN DE LAS JORNADAS
                                $dia_eventual = date("w", strtotime($anio . "-" . $mes . "-" . $dia));
                                $partido_contador = false;
                                $fechainicio = $anio . "-" . $mes . "-" . $dia;
                                if ($domingo == "domingo" && $dia_eventual == "0") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($lunes == "lunes" && $dia_eventual == "1") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($martes == "martes" && $dia_eventual == "2") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($miercoles == "miercoles" && $dia_eventual == "3") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($jueves == "jueves" && $dia_eventual == "4") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($viernes == "viernes" && $dia_eventual == "5") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($sabado == "sabado" && $dia_eventual == "6") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                }
                                $dia++; //incrementa los dias
                                if ($partido_contador) {
                                    $contador_arbitro = 0;
                                    $ultimaJornada = $daoJornada->UltmimaJornada()->getIdjornada();
                                    for ($i = 0; $i < $numero_partidos_jornada; $i++) {

                                        //ASIGNAR LAS HORAS DE PARTIDO
                                        $date = new DateTime($fechainicio);
                                        $time = new DateTime($horas_partidos[$i]);
                                        $merge = new DateTime($date->format('Y-m-d') . ' ' . $time->format('H:i:s'));
                                        //GUARDAR PARTIDOS

                                        //VALIDAR ARBITROS
                                        if ($contador_arbitro == count($arbitros)) {
                                            $contador_arbitro = 0;
                                        }
                                        if ($contador > $numero_jornada) {
                                            $daoPartido->registroPartido(new Partido(null, $merge->format('Y-m-d H:i:s'), $equiposB[$contador - $numero_jornada - 1][$i], $equiposA[$contador - $numero_jornada - 1][$i], $arbitros[$contador_arbitro]->getDui(), $arbitros[$contador_arbitro]->getDui(), $ultimaJornada, $canchas[0]->getId(), 1));
                                        } else {
                                            $daoPartido->registroPartido(new Partido(null, $merge->format('Y-m-d H:i:s'), $equiposA[$contador - 1][$i], $equiposB[$contador - 1][$i], $arbitros[$contador_arbitro]->getDui(), $arbitros[$contador_arbitro]->getDui(), $ultimaJornada, $canchas[0]->getId(), 1));
                                        }

                                        $contador_arbitro++; //aumenta arbitro

                                    }
                                }
                                $partido_contador = false;
                            }


                            $contador = 0; //reinicio de contador jornadas
                            if ($mensaje) {
                                $messages[] = "El registro se ha almacenado con éxito.";
                        ?>
                                <div id="msjerror" class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <i class="fa fa-check"></i>
                                    <strong>Registro Almacenado</strong>
                                    <?php
                                    foreach ($messages as $message) {
                                        echo $message;
                                    }
                                    ?>
                                </div>

                            <?php
                            }
                        } else {

                            $errors[] = "debe seleccionar " . $numero_partidos_jornada . " horas.";
                            ?>

                            <div id="msjerror" class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <strong>Error de Registro</strong>
                                <?php
                                foreach ($errors as $error) {
                                    echo $error;
                                }
                                ?>
                            </div>

                        <?php
                        }
                    } else { // si en caso no selecciona dias para poder jugar
                        $errors[] = "Seleccionar Dias para Jugar";
                        ?>

                        <div id="msjerror" class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <strong>Error de Registro</strong>
                            <?php
                            foreach ($errors as $error) {
                                echo $error;
                            }
                            ?>
                        </div>

                <?php

                    }
                    //AQUI VALIDAR LA CANTIDAD DE HORAS QUE ESCOJERA POR LA CANTIDAD DE PARTIDOS POR JORNADA


                }
            } else {

                $errors[] = "No hay canchas o arbitro disponibles.";
                ?>

                <div id="msjerror" class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>Error de Registro</strong>
                    <?php
                    foreach ($errors as $error) {
                        echo $error;
                    }
                    ?>
                </div>

            <?php
            }
        } else {

            $errors[] = "la fecha seleccionada es menor a la actual.";
            ?>

            <div id="msjerror" class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"></button>
                <strong>Error de Registro</strong>
                <?php
                foreach ($errors as $error) {
                    echo $error;
                }
                ?>
            </div>

            <?php
        }
    } else if ($action == 'guardar') {

        //variables para realizar jornadas
        $contador = 0;

        //separar la fecha de inicio de las jornadas
        if ($fecha_actual <= $fecha) {

            //ASIGNACION DE FECHAS DE JORNADAS PARA PARTIDOS
            $anio = date("Y", strtotime($fecha));
            $mes = date("m", strtotime($fecha));
            $dia = date("d", strtotime($fecha));
            $fechainicio = "";


            if (count($arbitros) >= 1 && count($canchas) >= 1) { // validacion si hay canchas y arbitros para asignacion de partidos

                if (count($canchas) > 1) { // validacion si hay arbitros tantos para la cantidad de canchas

                    if ($cantidad_dias >= 1) {


                        //limites de canchas o arbitros
                        $limite_de_cancha = 0;
                        if (count($canchas) >= count($arbitros)) {
                            $limite_de_cancha = count($arbitros);
                        } else if (count($arbitros) > count($canchas)) {
                            $limite_de_cancha = count($canchas);
                        }

                        if ($cantidad_horas == round($numero_partidos_jornada /  $limite_de_cancha)) {

                            while ($contador < 1) { // Verifica la cantidad de jornadas dichas

                                if (!checkdate($mes, $dia, $anio)) { //validando si existe la fecha
                                    $mes++;
                                    $dia = 1;
                                    if ($mes == 13 && !checkdate($mes, $dia, $anio)) {
                                        $anio++;
                                        $mes = 1;
                                    }
                                }
                                // SE ASIGNARAN LAS FECHA INICIO FECHA FIN DE LAS JORNADAS
                                $dia_eventual = date("w", strtotime($anio . "-" . $mes . "-" . $dia));
                                $partido_contador = false;
                                $fechainicio = $anio . "-" . $mes . "-" . $dia;
                                if ($domingo == "domingo" && $dia_eventual == "0") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($lunes == "lunes" && $dia_eventual == "1") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($martes == "martes" && $dia_eventual == "2") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($miercoles == "miercoles" && $dia_eventual == "3") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($jueves == "jueves" && $dia_eventual == "4") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($viernes == "viernes" && $dia_eventual == "5") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($sabado == "sabado" && $dia_eventual == "6") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                }
                                $dia++; //incrementa los dias
                                if ($partido_contador) {
                                    $ultimaJornada = $daoJornada->UltmimaJornada()->getIdjornada();


                                    // contadores de arbitros y canchas
                                    $contador_cancha = 0;
                                    $contador_arbitro = 0;
                                    $contador_hora = 0; // aumentara cada vez que se registre un partido en cada cancha
                                    $controlador_fecha = 0; // controlada la fecha para cada uno de los partidos



                                    for ($i = 0; $i < $numero_partidos_jornada; $i++) { // cantidad de partidos por jornada
                                        //GUARDAR PARTIDOS
                                        //ASIGNAR LAS HORAS DE PARTIDO  EN DIFERENTES CANCHAS
                                        if ($contador_hora == 0) {
                                            $date = new DateTime($fechainicio);
                                            $time = new DateTime($horas_partidos[$controlador_fecha]);
                                            $merge = new DateTime($date->format('Y-m-d') . ' ' . $time->format('H:i:s'));
                                            $controlador_fecha++;
                                        }


                                        if ($contador > $numero_jornada) { // partidos de vuelta
                                            $daoPartido->registroPartido(new Partido(null, $merge->format('Y-m-d H:i:s'), $equiposB[$contador - $numero_jornada - 1][$i], $equiposA[$contador - $numero_jornada - 1][$i], $arbitros[$contador_arbitro]->getDui(), $arbitros[$contador_arbitro]->getDui(), $ultimaJornada, $canchas[$contador_cancha]->getId(), 1));
                                            //aumenta hora de partidos en todas las canchas
                                            $contador_hora++;
                                        } else { //partidos de ida
                                            $daoPartido->registroPartido(new Partido(null, $merge->format('Y-m-d H:i:s'), $equiposA[$contador - 1][$i], $equiposB[$contador - 1][$i], $arbitros[$contador_arbitro]->getDui(), $arbitros[$contador_arbitro]->getDui(), $ultimaJornada, $canchas[$contador_cancha]->getId(), 1));
                                            //aumenta hora de partidos en todas las canchas
                                            $contador_hora++;
                                        }
                                        $contador_cancha++; //aumenta la cantidad cancha
                                        $contador_arbitro++; //aumenta arbitro

                                        if ($contador_hora == $limite_de_cancha) {
                                            $contador_hora = 0;
                                        }
                                        if ($limite_de_cancha == $contador_cancha && $limite_de_cancha == $contador_arbitro) {
                                            // reinicia conteo para siguiente partido
                                            $contador_cancha = 0;
                                            $contador_arbitro = 0;
                                        }
                                    }
                                }
                                $partido_contador = false;
                            }


                            $contador = 0; //reinicio de contador jornadas
                            if ($mensaje) {
                                $messages[] = "El registro se ha almacenado con éxito.";
            ?>
                                <div id="msjerror" class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <i class="fa fa-check"></i>
                                    <strong>Registro Almacenado</strong>
                                    <?php
                                    foreach ($messages as $message) {
                                        echo $message;
                                    }
                                    ?>
                                </div>

                            <?php
                            }
                        } else {

                            $errors[] = "debe seleccionar " . round($numero_partidos_jornada / $limite_de_cancha) . " horas.";
                            ?>

                            <div id="msjerror" class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <strong>Error de Registro</strong>
                                <?php
                                foreach ($errors as $error) {
                                    echo $error;
                                }
                                ?>
                            </div>

                        <?php
                        }
                    } else { // si en caso no selecciona dias para poder jugar
                        $errors[] = "Seleccionar Dias para Jugar";
                        ?>

                        <div id="msjerror" class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <strong>Error de Registro</strong>
                            <?php
                            foreach ($errors as $error) {
                                echo $error;
                            }
                            ?>
                        </div>

                        <?php

                    }
                } else { // solo se encuentra 1 cancha disponible

                    if ($cantidad_dias >= 1) { // validacion de dias

                        if ($cantidad_horas == $numero_partidos_jornada) {

                            while ($contador < 1) { // Verifica la cantidad de jornadas dichas

                                if (!checkdate($mes, $dia, $anio)) { //validando si existe la fecha
                                    $mes++;
                                    $dia = 1;
                                    if ($mes == 13 && !checkdate($mes, $dia, $anio)) {
                                        $anio++;
                                        $mes = 1;
                                    }
                                }
                                // SE ASIGNARAN LAS FECHA INICIO FECHA FIN DE LAS JORNADAS
                                $dia_eventual = date("w", strtotime($anio . "-" . $mes . "-" . $dia));
                                $partido_contador = false;
                                $fechainicio = $anio . "-" . $mes . "-" . $dia;
                                if ($domingo == "domingo" && $dia_eventual == "0") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($lunes == "lunes" && $dia_eventual == "1") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($martes == "martes" && $dia_eventual == "2") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($miercoles == "miercoles" && $dia_eventual == "3") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($jueves == "jueves" && $dia_eventual == "4") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($viernes == "viernes" && $dia_eventual == "5") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                } else if ($sabado == "sabado" && $dia_eventual == "6") {
                                    $daoJornada->registroJornada(new Jornada(null, $fechainicio, $fechainicio, $clasificacion, $idTorneo));
                                    $partido_contador = true;
                                    $contador++;
                                }
                                $dia++; //incrementa los dias
                                if ($partido_contador) {
                                    $contador_arbitro = 0;
                                    $ultimaJornada = $daoJornada->UltmimaJornada()->getIdjornada();
                                    for ($i = 0; $i < $numero_partidos_jornada; $i++) {

                                        //ASIGNAR LAS HORAS DE PARTIDO
                                        $date = new DateTime($fechainicio);
                                        $time = new DateTime($horas_partidos[$i]);
                                        $merge = new DateTime($date->format('Y-m-d') . ' ' . $time->format('H:i:s'));
                                        //GUARDAR PARTIDOS

                                        //VALIDAR ARBITROS
                                        if ($contador_arbitro == count($arbitros)) {
                                            $contador_arbitro = 0;
                                        }
                                        if ($contador > $numero_jornada) {
                                            $daoPartido->registroPartido(new Partido(null, $merge->format('Y-m-d H:i:s'), $equiposB[$contador - $numero_jornada - 1][$i], $equiposA[$contador - $numero_jornada - 1][$i], $arbitros[$contador_arbitro]->getDui(), $arbitros[$contador_arbitro]->getDui(), $ultimaJornada, $canchas[0]->getId(), 1));
                                        } else {
                                            $daoPartido->registroPartido(new Partido(null, $merge->format('Y-m-d H:i:s'), $equiposA[$contador - 1][$i], $equiposB[$contador - 1][$i], $arbitros[$contador_arbitro]->getDui(), $arbitros[$contador_arbitro]->getDui(), $ultimaJornada, $canchas[0]->getId(), 1));
                                        }

                                        $contador_arbitro++; //aumenta arbitro

                                    }
                                }
                                $partido_contador = false;
                            }


                            $contador = 0; //reinicio de contador jornadas
                            if ($mensaje) {
                                $messages[] = "El registro se ha almacenado con éxito.";
                        ?>
                                <div id="msjerror" class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <i class="fa fa-check"></i>
                                    <strong>Registro Almacenado</strong>
                                    <?php
                                    foreach ($messages as $message) {
                                        echo $message;
                                    }
                                    ?>
                                </div>

                            <?php
                            }
                        } else {

                            $errors[] = "debe seleccionar " . $numero_partidos_jornada . " horas.";
                            ?>

                            <div id="msjerror" class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <strong>Error de Registro</strong>
                                <?php
                                foreach ($errors as $error) {
                                    echo $error;
                                }
                                ?>
                            </div>

                        <?php
                        }
                    } else { // si en caso no selecciona dias para poder jugar
                        $errors[] = "Seleccionar Dias para Jugar";
                        ?>

                        <div id="msjerror" class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <strong>Error de Registro</strong>
                            <?php
                            foreach ($errors as $error) {
                                echo $error;
                            }
                            ?>
                        </div>

                <?php

                    }
                    //AQUI VALIDAR LA CANTIDAD DE HORAS QUE ESCOJERA POR LA CANTIDAD DE PARTIDOS POR JORNADA


                }
            } else {

                $errors[] = "No hay canchas o arbitro disponibles.";
                ?>

                <div id="msjerror" class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>Error de Registro</strong>
                    <?php
                    foreach ($errors as $error) {
                        echo $error;
                    }
                    ?>
                </div>

            <?php
            }
        } else {

            $errors[] = "la fecha seleccionada es menor a la actual.";
            ?>

            <div id="msjerror" class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"></button>
                <strong>Error de Registro</strong>
                <?php
                foreach ($errors as $error) {
                    echo $error;
                }
                ?>
            </div>

    <?php
        }
    }
} else {
    $errors[] = "Partidos Activos.";
    ?>

    <div id="msjerror" class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"></button>
        <strong>Error de Registro</strong>
        <?php
        foreach ($errors as $error) {
            echo $error;
        }
        ?>
    </div>

<?php
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