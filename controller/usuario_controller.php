<?php
session_start();

if (!isset($_SESSION['Attempts'])) {
    $_SESSION['Attempts'] = 0;
}
require_once "../clases/Representante.php";
require_once "../dao/DaoRepresentante.php";
require_once "../clases/Usuarios.php";
require_once "../dao/DaoUsuario.php";
require_once "../clases/Empleado.php";
require_once "../dao/DaoEmpleado.php";
require_once "../helpers/utils.php";

$action = (isset($_GET["action"])) ? $_GET["action"] : "";
//variables de Inicio de Sesion
$usuario = (isset($_GET["usuario"])) ? $_GET["usuario"] : "";
$password = (isset($_GET["password"])) ? $_GET["password"] : "";

$usuario_edit = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$clave_edit = isset($_POST['clave']) ? $_POST['clave'] : "";
//$clave2_edit = isset($_POST['clave2']) ? $_POST['cleve2'] : "";
$correo_edit = isset($_POST['correo']) ? $_POST['correo'] : "";
$id_edit = isset($_POST['id']) ? $_POST['id'] : "";

//Guardar imagen
if (isset($_FILES['imagen']) != null) {
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
} else {
    $imagen = 'esto';
}

//Dao Equipo
$daoE = new DaoEmpleado();
$daoR = new DaoRepresentante();
$daoU = new DaoUsuario();

if ($action != "") {

    switch ($action) {
        case 'iniciar':

            if ($usuario != "" && $password != "") {
                $user = $daoU->loging($usuario, $password);

                if ($user != false) {

                    if ($user->tipo == "administrador") {
                        $identidad = $daoE->BuscarEmpleado($user->idempleado);

                        if ($identidad != null) {

                            $_SESSION['usuario'] = $user;
                            $_SESSION['identidad'] = $identidad;
                            $_SESSION['action_login'] = 'completo';
                            echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                        } else {

                            $_SESSION['action_login'] = 'error';
                            echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
                        }
                    } else if ($user->tipo == "usuario") {
                        $identidad = $daoR->BuscarRepresentante($user->idrepresentante);

                        if ($identidad != null) {

                            $_SESSION['usuario'] = $user;
                            $_SESSION['identidad'] = $identidad;
                            $_SESSION['action_login'] = 'completo';
                            echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                        } else {

                            $_SESSION['action_login'] = 'error';
                            $_SESSION['Attempts']++;
                            echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
                        }
                    }
                } else {

                    $_SESSION['action_login'] = 'error';
                    $_SESSION['Attempts']++;
                    echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
                }
            } else {

                $_SESSION['action_login'] = 'error';
                $_SESSION['Attempts']++;
                echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
            }
            break;

        case 'cerrar':

            $daoU->logout();

            break;

        case 'modificar':
            if ($id_edit != "") {

                if ($daoU->UpdateUsuario(new Usuario($id_edit, null, null, $_SESSION['identidad']->tipo, $correo_edit, $usuario_edit, Utils::encriptacion($clave_edit)), $imagen) == 1) {

                    $_SESSION['perfil_success'] = 'completo';
                    echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                } else {

                    $_SESSION['perfil_success'] = 'error';
                    echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                }
            } else {
                $_SESSION['perfil_success'] = 'error';
                echo '<script>window.location="' . base_url . 'views/index.php"</script>';
            }
            break;
    }
}
