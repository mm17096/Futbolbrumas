<?php
session_start();

if (!isset($_SESSION['Attempts'])) {
    $_SESSION['Attempts'] = 5;
}
require_once "../clases/Representante.php";
require_once "../dao/DaoRepresentante.php";
require_once "../clases/Usuarios.php";
require_once "../dao/DaoUsuario.php";
require_once "../clases/Empleado.php";
require_once "../dao/DaoEmpleado.php";
require_once "../helpers/utils.php";

$action = (isset($_GET["action"])) ? $_GET["action"] : "";

if ($action == "") {
    $action = (isset($_POST["action"])) ? $_POST["action"] : "";
}
//variables de Inicio de Sesion
$usuario = (isset($_GET["usuario"])) ? $_GET["usuario"] : "";
$password = (isset($_GET["password"])) ? $_GET["password"] : "";

//Variables de modificacion
$usuario_edit = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$usuarioact = isset($_POST['usuarioact']) ? $_POST['usuarioact'] : "";
$clave_edit = isset($_POST['clave']) ? $_POST['clave'] : "";
$claveact = isset($_POST['claveact']) ? $_POST['claveact'] : "";
$correo_edit = isset($_POST['correo']) ? $_POST['correo'] : "";
$id_edit = isset($_POST['id']) ? $_POST['id'] : "";

//variables de restauracion
$duires = (isset($_POST["dui"])) ? $_POST["dui"] : "";
$correores = (isset($_POST["correo"])) ? $_POST["correo"] : "";

//Guardar imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['tmp_name'] != null) {
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
} else {
    $imagen = '';
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
                            $_SESSION['Attempts']--;
                            echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
                        }
                    }
                } else {

                    $_SESSION['action_login'] = 'error';
                    $_SESSION['Attempts']--;
                    echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
                }
            } else {

                $_SESSION['action_login'] = 'error';
                $_SESSION['Attempts']--;
                echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
            }
            break;

        case 'cerrar':

            $daoU->logout();

            break;

        case 'modificar':
            if ($id_edit != "") {
                if ($imagen != "") {
                    if ($daoU->UpdateUsuario(new Usuario($id_edit, null, null, $_SESSION['identidad']->tipo, $correo_edit, $usuario_edit, Utils::encriptacion($clave_edit)), $imagen) == 1) {
                        $user = $daoU->BuscarUser($id_edit);
                        if ($user != false) {
                         /*
                            if ($claveact != $clave_edit || $usuarioact != $usuario_edit) {
                                if ($daoU->confirmarcambiosUsuario($correo_edit, $_SESSION['identidad']->nombre, $_SESSION['identidad']->apellido, $usuario_edit, $clave_edit) == true) {
                                    $_SESSION['perfil_success'] = 'completo';
                                } else {
                                    $_SESSION['perfil_success'] = 'Incompleto';
                                }
                                $_SESSION['usuario'] = $user;
                                echo '<script>window.location="' . base_url . 'views/index.php?correo=enviado"</script>';
                            }
                         */
                            $_SESSION['perfil_success'] = 'completo';
                            $_SESSION['usuario'] = $user;
                            echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                        } else {
                            $_SESSION['perfil_success'] = 'Incompleto';
                            echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                        }
                    } else {

                        $_SESSION['perfil_success'] = 'Incompleto';
                        echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                    }
                } else {
                    if ($daoU->UpdateUsuariosinIMG(new Usuario($id_edit, null, null, $_SESSION['identidad']->tipo, $correo_edit, $usuario_edit, Utils::encriptacion($clave_edit)), $imagen) == 1) {
                        $user = $daoU->BuscarUser($id_edit);
                        if ($user != false) {
                        /*
                            if ($claveact != $clave_edit || $usuarioact != $usuario_edit) {
                                if ($daoU->confirmarcambiosUsuario($correo_edit, $_SESSION['identidad']->nombre, $_SESSION['identidad']->apellido, $usuario_edit, $clave_edit) == true) {
                                    $_SESSION['perfil_success'] = 'completo';
                                } else {
                                    $_SESSION['perfil_success'] = 'Incompleto';
                                }
                                $_SESSION['usuario'] = $user;
                                echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                            }
                        */
                            $_SESSION['perfil_success'] = 'completo';
                            $_SESSION['usuario'] = $user;
                            echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                        }
                    } else {

                        $_SESSION['perfil_success'] = 'error';
                        echo '<script>window.location="' . base_url . 'views/index.php"</script>';
                    }
                }
            } else {
                $_SESSION['perfil_success'] = 'error';
                echo '<script>window.location="' . base_url . 'views/index.php"</script>';
            }
            break;

        case 'verificarcorreo':

            if (isset($_POST['correo'])) {
                if ($daoU->Buscarcorreo($_POST['correo']) == 1) {
                    print json_encode(array("Error", $_POST));
                    exit();
                } else {
                    print json_encode(array("Exito", $_POST));
                    exit();
                }
            }

            break;

        case 'verificarusuario':

            if (isset($_POST['usuario'])) {
                if ($daoU->Buscarusuario($_POST['usuario']) == 1) {
                    print json_encode(array("Error", $_POST));
                    exit();
                } else {
                    print json_encode(array("Exito", $_POST));
                    exit();
                }
            }

            break;


        case 'modificarnuevo':

            if (isset($_POST['id'])) {
                if ($daoU->modificarnuevo($_POST['id']) == 1) {
                    $user = $daoU->BuscarUser($_POST['id']);
                    if ($user != false) {
                        $_SESSION['usuario'] = $user;
                        print json_encode(array("Exito", $_POST));
                        exit();
                    } else {
                        print json_encode(array("Error", $_POST));
                        exit();
                    }
                } else {
                    print json_encode(array("Error", $_POST));
                    exit();
                }
            }

            break;

        case 'verificardatos':

            if ($duires != "" && $correores != "") {
                if ($daoU->verificardatos($duires, $correores) == 1) {
                    $codigo = Utils::codigoseguridad();
                    if ($daoU->cambiarcodigo($correores, $codigo) == 1) {
                        if ($daoU->codigoverificacion($correores, $codigo) == true) {
                            $_SESSION['id'] = $duires;
                            echo '<script>window.location="' . base_url . 'views/vis_verificarcodigo.php"</script>';
                        } else {
                            $_SESSION['falloverificacion'] = true;
                            echo '<script>window.location="' . base_url . 'views/vis_recuperardatos.php"</script>';
                        }
                    } else {
                        $_SESSION['falloverificacion'] = true;
                        echo '<script>window.location="' . base_url . 'views/vis_recuperardatos.php"</script>';
                    }
                } else {
                    $_SESSION['falloverificacion'] = true;
                    echo '<script>window.location="' . base_url . 'views/vis_recuperardatos.php"</script>';
                }
            } else {
                $_SESSION['falloverificacion'] = true;
                echo '<script>window.location="' . base_url . 'views/vis_recuperardatos.php"</script>';
            }

            break;

        case 'verificarcodigo':

            if (isset($_POST['codigo']) && isset($_POST['id'])) {
                if ($daoU->verificarcodigo($_POST['codigo'], $_POST['id']) == 1) {
                    $_SESSION['id'] = $_POST['id'];
                    echo '<script>window.location="' . base_url . 'views/vis_cambiardatos.php"</script>';
                } else {
                    $_SESSION['falloverificacion'] = true;
                    echo '<script>window.location="' . base_url . 'views/vis_verificarcodigo.php"</script>';
                }
            }

            break;

        case 'cambiarclave':

            if (isset($_POST['clave']) && isset($_SESSION['id'])) {
                if ($daoU->modificarclave(Utils::encriptacion($_POST['clave']), $_SESSION['id'])) {
                    $_SESSION['modificacionfull'] = true;
                    $_SESSION['id'] = null;
                    unset($_SESSION['id']);
                    echo '<script>window.location="' . base_url . 'views/vis_sesion.php"</script>';
                } else {
                    $_SESSION['fallomodificacion'] = true;
                    echo '<script>window.location="' . base_url . 'views/vis_cambiardatos.php"</script>';
                }
            }

            break;
    }
}
