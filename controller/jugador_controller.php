<?php
require_once "../clases/Jugador.php";
require_once "../dao/DaoJugador.php";
require_once "../dao/DaoEquipo.php";
require_once("../conexion/Conexion.php");
require_once "../helpers/utils.php";

$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
//variables para guardar
$nombre = (isset($_REQUEST["nombre"])) ? $_REQUEST["nombre"] : "";
$apellido = (isset($_REQUEST["apellido"])) ? $_REQUEST["apellido"] : "";
$fechanacimiento = (isset($_REQUEST["fechanacimiento"])) ? $_REQUEST["fechanacimiento"] : "";
$numero_camisa = (isset($_REQUEST["numero_camisa"])) ? $_REQUEST["numero_camisa"] : "";
$posicion = (isset($_REQUEST["posicion"])) ? $_REQUEST["posicion"] : "";
$idequipo = (isset($_REQUEST["idequipo"])) ? $_REQUEST["idequipo"] : "";
$estado = (isset($_REQUEST["estado"])) ? $_REQUEST["estado"] : "";



//variables para modificar
$idjugador_edit = (isset($_REQUEST["id_edit"])) ? $_REQUEST["id_edit"] : "";
$nombre_edit = (isset($_REQUEST["nombreedit"])) ? $_REQUEST["nombreedit"] : "";
$apellido_edit = (isset($_REQUEST["apellidoedit"])) ? $_REQUEST["apellidoedit"] : "";
$fecha_nacimientoedit = (isset($_REQUEST["fechanacimientoedit"])) ? $_REQUEST["fechanacimientoedit"] : "";
$numero_camisaedit = (isset($_REQUEST["numerocamisaedit"])) ? $_REQUEST["numerocamisaedit"] : "";
$posicion_edit = (isset($_REQUEST["posicionedit"])) ? $_REQUEST["posicionedit"] : "";
$equipo_edit = (isset($_REQUEST["equipoedit"])) ? $_REQUEST["equipoedit"] : "";
$estado_edit = (isset($_REQUEST["estadoedit"])) ? $_REQUEST["estadoedit"] : "";


//variable para dar de baja al jugador
$activar_idjugador = (isset($_REQUEST["activar_idjugador"])) ? $_REQUEST["activar_idjugador"] : "";
$desactivar_idjugador = (isset($_REQUEST["desactivar_idjugador"])) ? $_REQUEST["desactivar_idjugador"] : "";
$des_nombre = (isset($_REQUEST["des_nombre"])) ? $_REQUEST["des_nombre"] : "";
$des_apellido = (isset($_REQUEST["des_apellido"])) ? $_REQUEST["des_apellido"] : "";
$des_fechanacimiento = (isset($_REQUEST["des_fechanacimiento"])) ? $_REQUEST["des_fechanacimiento"] : "";
$des_numerocamisa = (isset($_REQUEST["des_numerocamisa"])) ? $_REQUEST["des_numerocamisa"] : "";
$des_posicion = (isset($_REQUEST["des_posicion"])) ? $_REQUEST["des_posicion"] : "";
$des_equipo = (isset($_REQUEST["des_equipo"])) ? $_REQUEST["des_equipo"] : "";
$des_estado = (isset($_REQUEST["des_estado"])) ? $_REQUEST["des_estado"] : "";

//variable para dar de alta al jugador
$activar_idjugador = (isset($_REQUEST["activar_idjugador"])) ? $_REQUEST["activar_idjugador"] : "";
$act_nombre = (isset($_REQUEST["act_nombre"])) ? $_REQUEST["act_nombre"] : "";
$act_apellido = (isset($_REQUEST["act_apellido"])) ? $_REQUEST["act_apellido"] : "";
$act_fechanacimiento = (isset($_REQUEST["act_fechanacimiento"])) ? $_REQUEST["act_fechanacimiento"] : "";
$act_numerocamisa = (isset($_REQUEST["act_numerocamisa"])) ? $_REQUEST["act_numerocamisa"] : "";
$act_posicion = (isset($_REQUEST["act_posicion"])) ? $_REQUEST["act_posicion"] : "";
$act_equipo = (isset($_REQUEST["act_equipo"])) ? $_REQUEST["act_equipo"] : "";
$act_estado = (isset($_REQUEST["act_estado"])) ? $_REQUEST["act_estado"] : "";


$daoJ = new DaoJugador();
$daoe = new DaoEquipo();
$conexion = new Conexion();
if ($action != "") {
    switch ($action) {
        case 'guardar':

            if ($nombre != "" && $apellido != "" && $fechanacimiento != "" && $numero_camisa != "" && $posicion != "" && $idequipo != "") {


                if ($daoJ->registroJugador(new Jugador(null, $nombre, $apellido, $fechanacimiento, $numero_camisa, $posicion, $idequipo, 1)) == 1) {

                    //AQUI VALIDAREMOS QUE LOS EQUIPOS TENGAN MAS DE 22 JGADORES
                    if (count($daoJ->listaDejugadoresEquipo($idequipo)) >= 3) {
                        $daoe->actualizarEstadoEquipo($idequipo);
                    }
                    $messages[] = "El Jugador ha sido guardado con éxito.";
                    ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>

                        <strong>¡Bien hecho!</strong>
                        <?php

                        foreach ($messages as $message) {
                            echo $message;
                        }
                        ?>
                    </div>

                <?php

                }
            } else {
                $errors[] = "Erro al guardar los datos, intentalo nuevamente";
                ?>

                <div class="alert alert-danger" role="alert">
                    <label type="text" class="close" data-dismiss="alert">&times;</label>
                    <strong>Error!</strong>
                    <?php
                    foreach ($errors as $error) {
                        echo $error;
                    }
                    ?>
                </div>

                <?php
            }
            break;
        case 'actualizar':
            if ($nombre_edit != "" && $apellido_edit != "" && $fecha_nacimientoedit != "" && $numero_camisaedit != "" && $equipo_edit != "" && $posicion_edit != "") {
                if ($daoJ->actualizarJugador(new Jugador($idjugador_edit, $nombre_edit, $apellido_edit, $fecha_nacimientoedit, $numero_camisaedit, $posicion_edit, $equipo_edit, $estado_edit)) == 1) {
                    $messages[] = "El Jugador ha sido Actualizado  con éxito.";
                ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡Bien hecho!</strong>
                        <?php
                        foreach ($messages as $message) {
                            echo $message;
                        }
                        ?>
                    </div>

                <?php

                }
            } else {
                $errors[] = "Error al guardar los datos, intentalo nuevamente";
                ?>

                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong>
                    <?php
                    foreach ($errors as $error) {
                        echo $error;
                    }
                    ?>
                </div>

                <?php
            }
            break;
        case 'dar_baja':
            if ($desactivar_idjugador != "") {
                if ($daoJ->DesactivarJugador(new Jugador($desactivar_idjugador, $des_nombre, $des_apellido, $des_fechanacimiento, $des_numerocamisa, $des_posicion, $des_equipo, 0)) == 1) {
                    $messages[] = "El Jugador se ha dado de baja exitosamente .";
                ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡Bien hecho!</strong>
                        <?php
                        foreach ($messages as $message) {
                            echo $message;
                        }
                        ?>
                    </div>

                <?php
                } else {
                    $messages[] = "El Jugador no se puede dar de baja, vuelva a intentarlo";
                ?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡Error!</strong>
                        <?php
                        foreach ($messages as $message) {
                            echo $message;
                        }
                        ?>
                    </div>

                <?php
                }
            }
            break;
        case 'dar_alta':
            if ($activar_idjugador != "") {
                if ($daoJ->ActivarJugador(new Jugador($activar_idjugador, $act_nombre, $act_apellido, $act_fechanacimiento, $act_numerocamisa, $act_posicion, $act_equipo, 1)) == 1) {
                    $messages[] = "El Jugador se ha dado de Alta nuevamente .";
                ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡Bien hecho!</strong>
                        <?php
                        foreach ($messages as $message) {
                            echo $message;
                        }
                        ?>
                    </div>

                <?php
                } else {
                    $messages[] = "El Jugador no se puede dar de Alta, vuelva a intentarlo";
                ?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡Error!</strong>
                        <?php
                        foreach ($messages as $message) {
                            echo $message;
                        }
                        ?>
                    </div>

<?php
                }
            }
            break;

        case 'verificarcamisa':

            if (isset($_POST['idequipo'])) {
                if ($daoJ->verificarcamisa($_POST['idequipo'], $_POST['numero']) == 1) {
                    print json_encode(array("Error", $_POST));
                    exit();
                } else {
                    print json_encode(array("Exito", $_POST));
                    exit();
                }
            }

            break;

        case 'verificarcamisaEdit':

            if (isset($_POST['equipoedit'])) {
                if ($daoJ->verificarcamisaEdit($_POST['equipoedit'], $_POST['numero']) == 1) {
                    print json_encode(array("Error", $_POST));
                    exit();
                } else {
                    print json_encode(array("Exito", $_POST));
                    exit();
                }
            }

            break;
    }
}

?>