<?php 
require_once "../clases/Jugador.php";
require_once "../dao/DaoJugador.php";
require_once "../dao/DaoEquipo.php";

$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
 //variables para guardar
$nombre = (isset($_REQUEST["nombre"])) ? $_REQUEST["nombre"] : "";
$apellido =(isset($_REQUEST["apellido"])) ? $_REQUEST["apellido"] : "";
$fecha_nacimiento = (isset($_REQUEST["fecha_nacimiento"])) ? $_REQUEST["fecha_nacimiento"] : "";
$numero_camisa = (isset($_REQUEST["numero_camisa"])) ? $_REQUEST["numero_camisa"] : "";
$posicion =(isset($_REQUEST["posicion"])) ? $_REQUEST["posicion"] : "";
$nacionalidad =(isset($_REQUEST["nacionalidad"])) ? $_REQUEST["nacionalidad"] : "";
$estado =(isset($_REQUEST["estado"])) ? $_REQUEST["estado"] : "";
$equipo = (isset($_REQUEST["equipo"])) ? $_REQUEST["equipo"] : "";


//variables para modificar
$idjugador_edit = (isset($_REQUEST["id_edit"])) ? $_REQUEST["id_edit"] : "";
$nombre_edit = (isset($_REQUEST["nombreedit"])) ? $_REQUEST["nombreedit"] : "";
$apellido_edit =(isset($_REQUEST["apellidoedit"])) ? $_REQUEST["apellidoedit"] : "";
$fecha_nacimientoedit = (isset($_REQUEST["fechanacimientoedit"])) ? $_REQUEST["fechanacimientoedit"] : "";
$numero_camisaedit = (isset($_REQUEST["numerocamisaedit"])) ? $_REQUEST["numerocamisaedit"] : "";
$posicion_edit =(isset($_REQUEST["posicionedit"])) ? $_REQUEST["posicionedit"] : "";
$nacionalidad_edit =(isset($_REQUEST["nacionalidadedit"])) ? $_REQUEST["nacionalidadedit"] : "";
$estado_edit =(isset($_REQUEST["estadoedit"])) ? $_REQUEST["estadoedit"] : "";
$equipo_edit = (isset($_REQUEST["equipoedit"])) ? $_REQUEST["equipoedit"] : "";



//varible para eliminar
$delete_idjugador =(isset($_REQUEST["delete_idjugador"])) ? $_REQUEST["delete_idjugador"] : "";

$daoJ = new DaoJugador();
$daoe= new DaoEquipo();
if($action != ""){
    switch($action){
        case 'guardar':
            if($nombre!="" && $apellido!="" && $fecha_nacimiento!="" && $numero_camisa!="" && $posicion!="" && $nacionalidad!="" && $estado!="" && $equipo!=""){
                if($daoJ->registroJugador(new Jugador(null,$nombre,$apellido,$fecha_nacimiento,$numero_camisa,$posicion,$nacionalidad,$estado,$equipo,0))==1){
                    //AQUI VALIDAREMOS QUE LOS EQUIPOS TENGAN MAS DE 22 JGADORES
                    if(count($daoJ->listaDejugadoresEquipo($equipo))>=12){
                        $daoe->actualizarEstadoEquipo($equipo);
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
            }else{
                $errors[] = "Erro al guardar los datos, intentalo nuevamente";
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
        case 'actualizar':
            if($nombre_edit!="" && $apellido_edit!="" && $fecha_nacimientoedit!="" && $numero_camisaedit!="" && $posicion_edit!="" && $nacionalidad_edit!="" && $estado_edit!="" && $equipo_edit!=""){
            if($daoJ->actualizarJugador(new Jugador($idjugador_edit,$nombre_edit,$apellido_edit,$fecha_nacimientoedit,$numero_camisaedit,$posicion_edit,$nacionalidad_edit,$estado_edit,$equipo_edit,0))==1){
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
        }else{
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
        case 'eliminar':
            if($delete_idjugador!=""){
                if($daoJ->eliminarJugador(new Jugador($delete_idjugador,null,null,null,null,null,null,null,null,null))==1){
                    $messages[] = "El Jugador se  ha sido Eliminado con éxito.";
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
                }else{
                    $messages[] = "El Jugador no se puede Eliminar";
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
    }
}

?>