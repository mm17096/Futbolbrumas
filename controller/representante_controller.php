<?php
session_start();
require_once "../clases/Representante.php";
require_once "../dao/DaoRepresentante.php";
require_once "../clases/Usuarios.php";
require_once "../dao/DaoUsuario.php";
require_once "../clases/Equipo.php";
require_once "../helpers/utils.php";


$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
//variables de Guardar
$nombre = (isset($_REQUEST["nombre"])) ? $_REQUEST["nombre"] : "";
$apellido = (isset($_REQUEST["apellido"])) ? $_REQUEST["apellido"] : "";
$dui = (isset($_REQUEST["dui"])) ? $_REQUEST["dui"] : "";
$correo = (isset($_REQUEST["correo"])) ? $_REQUEST["correo"] : "";
$sexo = (isset($_REQUEST["sexo"])) ? $_REQUEST["sexo"] : "";
$date = (isset($_REQUEST["date"])) ? $_REQUEST["date"] : "";
$telefono = (isset($_REQUEST["telefono"])) ? $_REQUEST["telefono"] : "";
//variables de Actualizar
$nombre_update = (isset($_REQUEST["nombre_update"])) ? $_REQUEST["nombre_update"] : "";
$apellido_update = (isset($_REQUEST["apellido_update"])) ? $_REQUEST["apellido_update"] : "";
$dui_update = (isset($_REQUEST["dui_update"])) ? $_REQUEST["dui_update"] : "";
$sexo_update = (isset($_REQUEST["sexo_update"])) ? $_REQUEST["sexo_update"] : "";
$date_update = (isset($_REQUEST["date_update"])) ? $_REQUEST["date_update"] : "";
$telefono_update = (isset($_REQUEST["telefono_update"])) ? $_REQUEST["telefono_update"] : "";
$estado = (isset($_REQUEST["estado"])) ? $_REQUEST["estado"] : "";
//Variables de Baja
$dui_baja = (isset($_REQUEST["dui_baja"])) ? $_REQUEST["dui_baja"] : "";
//Variables de Alta
$dui_alta = (isset($_REQUEST["dui_alta"])) ? $_REQUEST["dui_alta"] : "";
//Dao Equipo
$daoR = new DaoRepresentante();
$daoU = new DaoUsuario();

if ($action != "") {
    switch ($action) {
        case 'guardar':

            if ($nombre != "" && $apellido != "" && $dui != "" && $sexo != "" && $date != "" && $telefono != "" && $correo != "") {

                if ($daoR->enviarcorreo($correo, $nombre, $apellido, $dui) == true) {

                    if ($daoR->registroRepresentante(new Representante($dui, $nombre, $apellido, $sexo, $date, $telefono, $correo, true)) == 1) {

                        if ($daoU->registroUsuarioRe(new Usuario(null, null, $dui, 'usuario', $correo, $correo, Utils::encriptacion($dui))) == 1) {

                            $_SESSION['action_success'] = "completo";
                            echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
                        } else {

                            $_SESSION['action_success'] = "error";
                            echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
                        }
                    } else {

                        $_SESSION['action_success'] = "error";
                        echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
                    }
                } else {

                    $_SESSION['action_success'] = "error";
                    echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
                }
            } else {

                $_SESSION['action_success'] = "error";
                echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
            }
            break;

        case 'actualizar':
            if ($nombre_update != "" && $apellido_update != "" && $dui_update != "" && $sexo_update != "" && $date_update != "" && $telefono_update != "" && $estado != "") {

                if ($daoR->modificarRepresentante(new Representante($dui_update, $nombre_update, $apellido_update, $sexo_update, $date_update, $telefono_update, "", $estado)) == 1) {

                    $_SESSION['action_success'] = "modificado";
                    echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
                } else {

                    $_SESSION['action_success'] = "error";
                    echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
                }
            }
            break;

        case 'debaja':
            if ($dui_baja != "") {

                if ($daoR->dardebajaRepresentante($dui_baja) == 1) {

                    $_SESSION['action_success'] = "modificadobaja";
                    echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
                } else {

                    $_SESSION['action_success'] = "error";
                    echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
                }
            } else {
                $_SESSION['action_success'] = "error";
                echo '<script>window.location="' . base_url . 'views/vis_representantes.php"</script>';
            }
            break;

        case 'dealta':
            if ($dui_alta != "") {

                if ($daoR->dardealtaRepresentante($dui_alta) == 1) {

                    $_SESSION['action_success'] = "modificadoalta";
                    print json_encode(array("Exito", $_POST));
                    exit();
                } else {

                    $_SESSION['action_success'] = "error";
                    print json_encode(array("Error", $_POST));
                    exit();
                }
            } else {
                
                $_SESSION['action_success'] = "error";
                print json_encode(array("Error", $_POST));
                exit();
            }
            break;

        case 'verificarcorreo':

            if (isset($_POST['correo'])) {
                if ($daoR->BuscarcorreoRepresentante($_POST['correo']) == 1) {
                    print json_encode(array("Error", $_POST));
                    exit();
                } else {
                    print json_encode(array("Exito", $_POST));
                    exit();
                }
            }

            break;

        case 'verificardui':

            if (isset($_POST['dui'])) {
                if ($daoR->BuscarduiRepresentante($_POST['dui']) == 1) {
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