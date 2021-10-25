<?php
session_start();

if(!isset($_SESSION['Attempts'])){
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
                            $_SESSION['Attempts'] ++;
                            echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
                        }
                    }
                } else {

                    $_SESSION['action_login'] = 'error';
                    $_SESSION['Attempts'] ++;
                    echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
                }
            } else {

                $_SESSION['action_login'] = 'error';
                $_SESSION['Attempts'] ++;
                echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
            }
            break;

        case 'cerrar':

            $daoU->logout();

            break;

        case 'modificar':
            if ($dui_baja != "") {

                if ($daoR->dardebajaRepresentante($dui_baja) == 1) {

                    $_SESSION['action_success'] = true;
                    echo '<script>window.location="' . base_url . 'views/vis_representantes.php?action=true"</script>';
                } else {

                    $_SESSION['action_error'] = true;
                    echo '<script>window.location="' . base_url . 'views/vis_representantes.php?action=false"</script>';
                }
            } else {
                $_SESSION['action_error'] = true;
                echo '<script>window.location="' . base_url . 'views/vis_representantes.php?action=false"</script>';
            }
            break;
    }
} else {
    echo "<script type='text/javascript'> alert('Metodo vacio');</script>";
}
