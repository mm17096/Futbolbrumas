<?php

 require_once "../clases/Equipo.php";
 require_once "../dao/DaoEquipo.php";


 $action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
 //variables de Guardar
 $nombre = (isset($_REQUEST["nombre"])) ? $_REQUEST["nombre"] : "";
 $estadio = (isset($_REQUEST["estadio"])) ? $_REQUEST["estadio"] : "";
//variables de Actualizar
$nombre_edit = (isset($_REQUEST["nombre_edit"])) ? $_REQUEST["nombre_edit"] : "";
$estadio_edit = (isset($_REQUEST["estadio_edit"])) ? $_REQUEST["estadio_edit"] : "";
$id_edit = (isset($_REQUEST["id_edit"])) ? $_REQUEST["id_edit"] : "";

//Variables Elininar
$delete_id= (isset($_REQUEST["delete_id"])) ? $_REQUEST["delete_id"] : "";

//Dao Equipo
 $daoE= new DaoEquipo();
 

 
    if($action!=""){
        switch($action){
            case 'guardar':
                
                if($nombre!="" && $estadio!=""){
                    if($daoE->registroEquipo(new Equipo(null,$nombre,$estadio,0,0))==1){
                        $messages[] = "El Equipo ha sido guardado con éxito.";
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
                    $errors[] = "Error en Nombre o Estadio, algun proceso mal hecho";
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
                if($nombre_edit!="" && $estadio_edit!=""){
                    if($daoE->actualizarEquipo(new Equipo($id_edit,$nombre_edit,$estadio_edit,0,0))==1){
                        $messages[] = "El Equipo ha sido Actualizado con éxito.";
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
                    $errors[] = "Error en Nombre o Estadio, algun proceso mal hecho";
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
                if($delete_id!=""){
                    if($daoE->eliminarEquipo(new Equipo($delete_id,null,null,null))==1){
                        $messages[] = "El Equipo ha sido Eliminado con éxito.";
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
                        $messages[] = "El Equipo no se puede Eliminar esta Relacionado.";
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