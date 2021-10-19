<?php

require_once "../clases/Juez.php";
require_once "../dao/DaoJuez.php";


$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
//variables de Guardar
$nombre = (isset($_REQUEST["juez"])) ? $_REQUEST["juez"] : "";

//variables de Actualizar
$nombre_edit = (isset($_REQUEST["juez_edit"])) ? $_REQUEST["juez_edit"] : "";

$id_edit = (isset($_REQUEST["id_juez"])) ? $_REQUEST["id_juez"] : "";

//Variables Elininar
$delete_id= (isset($_REQUEST["delete_idj"])) ? $_REQUEST["delete_idj"] : "";



$daoE= new DaoJuez();


   if($action!=""){
       switch($action){
           case 'guardar':

               if($nombre!=""){
                   if($daoE->registroJuez(new Juez(null,$nombre))==1){
                       $messages[] = "El Juez registrado con éxito.";
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
               if($nombre_edit!="" && $nombre_edit!=""){
                   if($daoE->ActualizarJuez(new juez($id_edit,$nombre_edit))==1){
                       $messages[] = "El Registro de Juez ha sido Actualizado con éxito.";
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
                   if($daoE->eliminarJuez(new Juez($delete_id,null))==1){
                       $messages[] = "El registro ha sido eliminado con éxito.";
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
                       $messages[] = "El Estadio no se puede Eliminar esta Relacionado.";
                       ?>
                           <div class="alert alert-danger" role="alert">
                                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                                   <strong>¡Error!</strong>
                                   </div>

                        <?php
                    }
                }

            break;

        }

    }


 ?>
