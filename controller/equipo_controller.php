<?php
session_start();
 require_once "../clases/Equipo.php";
 require_once "../dao/DaoEquipo.php";
 require_once "../dao/DaoJugador.php";
 require_once "../dao/DaoRepresentante.php";
 require_once "../helpers/utils.php";


//VARIABLES PARA AGREGAR UN NUEVO EQUIPO
$idequipo = isset($_POST['idequipo']) ? $_POST['idequipo'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$representante = isset($_POST['idrepresentante']) ? $_POST['idrepresentante'] : "";

//Guardar imagen
if (isset($_FILES['camisa']) != null) {
    $imagen = addslashes(file_get_contents($_FILES['camisa']['tmp_name']));
} else {
    $imagen = '';
}

 $action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";

//variables de Actualizar
$nombre_edit = (isset($_POST["nombre_edit"])) ? $_POST["nombre_edit"] : "";

if (isset($_FILES['camisa_edit']) && $_FILES['camisa_edit']['tmp_name'] != null) {
    $camisa_edit = addslashes(file_get_contents($_FILES['camisa_edit']['tmp_name']));
} else {
    $camisa_edit ='';
}
$representante_edit = (isset($_POST["idrepresentante_edit"])) ? $_POST["idrepresentante_edit"] : "";
$id_edit = (isset($_POST["id_edit"])) ? $_POST["id_edit"] : "";
$estadoedit = (isset($_POST["estadoedit"])) ? $_POST["estadoedit"] : "";

//Variables Elininar
$delete_id= (isset($_REQUEST["delete_id"])) ? $_REQUEST["delete_id"] : "";
$estado_nombre= (isset($_REQUEST["estado_nombre"])) ? $_REQUEST["estado_nombre"] : "";
$estado_idrepresentante= (isset($_REQUEST["estado_idrepresentante"])) ? $_REQUEST["estado_idrepresentante"] : "";
$estado_estado = (isset($_REQUEST["estado_estado"])) ? $_REQUEST["estado_estado"] : "";
//$estado_camisa = (isset($_FILES["estado_camisa"])) ? $_FILES["estado_camisa"] : "";

//VARIABLES PARA DAR DE BAJA AL EQUIPO
$desactivar_idequipo= (isset($_REQUEST["desactivar_idequipo"])) ? $_REQUEST["desactivar_idequipo"] : "";
$des_nombre= (isset($_REQUEST["des_nombre"])) ? $_REQUEST["des_nombre"] : "";
$des_camisa= (isset($_REQUEST["des_camisa"])) ? $_REQUEST["des_camisa"] : "";
$des_idrepresentante= (isset($_REQUEST["des_idrepresentante"])) ? $_REQUEST["des_idrepresentante"] : "";

//VARIABLES PARA DAR DE ALTA AL EQUIPO
$activar_idequipo= (isset($_REQUEST["activar_idequipo"])) ? $_REQUEST["activar_idequipo"] : "";
$act_nombre= (isset($_REQUEST["act_nombre"])) ? $_REQUEST["act_nombre"] : "";
$act_camisa= (isset($_REQUEST["act_camisa"])) ? $_REQUEST["act_camisa"] : "";
$act_idrepresentante= (isset($_REQUEST["act_idrepresentante"])) ? $_REQUEST["act_idrepresentante"] : "";



//Dao Equipo
 $daoE= new DaoEquipo();
 $daoJJ= new DaoJugador();
 $daoR= new DaoRepresentante();
 $conexion=new Conexion();


    if($action!=""){
        switch($action){
            case 'guardar':

                if($nombre!=""  && $representante!="" && $imagen != ""){
                    if($daoE->registroEquipo(new Equipo(null,$nombre,$imagen,$representante,0))==1){
                        $_SESSION['action_success'] = "completo";
                        echo '<script>window.location="' . base_url . 'views/vis_equipos.php"</script>';
                    }


                }
                else{

                        $_SESSION['action_success'] = "error";
                        echo '<script>window.location="' . base_url . 'views/vis_equipos.php"</script>';

                }


                break;
            case 'actualizar':
                if($nombre_edit!="" && $representante_edit!=""){
                    if($camisa_edit!=""){
                        if($daoE->actualizarEquipo(new Equipo($id_edit,$nombre_edit,$camisa_edit,$representante_edit,$estadoedit))==1){
                            $_SESSION['action_success'] = "modificado";
                            echo '<script>window.location="' . base_url . 'views/vis_equipos.php"</script>';

                         }

                    }else{
                        if($daoE->actualizarEquiposinIMG(new Equipo($id_edit,$nombre_edit," ",$representante_edit,$estadoedit))==1){
                            $_SESSION['action_success'] = "modificado";
                            echo '<script>window.location="' . base_url . 'views/vis_equipos.php"</script>';



                        }

                    }

                }else{
                    $_SESSION['action_success'] = "error";
                    echo '<script>window.location="' . base_url . 'views/vis_equipos.php"</script>';

                }
            break;
            case 'dar_baja':
            if($desactivar_idequipo!="" ){
             if ($daoJJ->partidoactivo($desactivar_idequipo) == 1) {
                 if($daoE->DesactivarEquipo(new Equipo($desactivar_idequipo,$des_nombre,$des_camisa,$des_idrepresentante,0))==1){

                     $_SESSION['action_success'] = "modificadobaja";
                     echo '<script>window.location="' . base_url . 'views/vis_equipos.php"</script>';
                 }
                 }else{

                     $messages[] = "El equipo ya esta compitiendo en el torneo.";
                      ?>
                          <div id="msjerror" class="alert alert-danger" role="alert">
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
                if($activar_idequipo!="" ){
                    if ($daoJJ->listaDejugadoresEquipo($activar_idequipo) == 1) {
                     if($daoE->ActivarEquipo(new Equipo($activar_idequipo,$act_nombre,$act_camisa,$act_idrepresentante,1))==1){
                        $_SESSION['action_success'] = "modificadoalta";
                        echo '<script>window.location="' . base_url . 'views/vis_equipos.php"</script>';
                     }
                     }else{
                         $messages[] = "El equipo debe de tener 3 o mas jugadores para dar de Alta.";
                         ?>
                             <div id="msjerror" class="alert alert-danger" role="alert">
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
             case 'verificarEquipo':


                    if($daoE->verificarNombreEquipo($_POST['nombre']) == 1){
                        print json_encode(array("Error", $_POST));
                        exit();
                    } else {
                        print json_encode(array("Exito", $_POST));
                        exit();
                    }


            break;
            case 'verificarequipoEdit':


                if($daoE->verificarNombreEquipoEdit($_POST['nombre']) == 1){
                    print json_encode(array("Error", $_POST));
                    exit();
                } else {
                    print json_encode(array("Exito", $_POST));
                    exit();
                }


        break;

        }

    }
?>
<!--<script type="text/javascript">
    msj();

    function msj() {

        setTimeout(function() {
            document.getElementById("msjsuccess").style.display = 'none';
        }, 3500);

        setTimeout(function() {
            document.getElementById("msjerror").style.display = 'none';
        }, 3500);

    };
</script>-->
