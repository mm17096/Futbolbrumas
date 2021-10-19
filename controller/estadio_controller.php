<?php

require_once "../clases/Estadio.php";
require_once "../dao/DaoEstadio.php";


$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
//variables de Guardar
$nombre = (isset($_REQUEST["nombre"])) ? $_REQUEST["nombre"] : "";
$capacidad = (isset($_REQUEST["capacidad"])) ? $_REQUEST["capacidad"] : "";
$direccion = (isset($_REQUEST["direccion"])) ? $_REQUEST["direccion"] : "";
$coorx = (isset($_REQUEST["coorx"])) ? $_REQUEST["coorx"] : "";
$coory = (isset($_REQUEST["coory"])) ? $_REQUEST["coory"] : "";
//variables de Actualizar
$nombre_edit = (isset($_REQUEST["nombre_edit"])) ? $_REQUEST["nombre_edit"] : "";
$capacidad_edit = (isset($_REQUEST["capacidad_edit"])) ? $_REQUEST["capacidad_edit"] : "";
$direccion_edit = (isset($_REQUEST["direccion_edit"])) ? $_REQUEST["direccion_edit"] : "";
$coorx_edit = (isset($_REQUEST["coorx_edit"])) ? $_REQUEST["coorx_edit"] : "";
$coory_edit = (isset($_REQUEST["coory_edit"])) ? $_REQUEST["coory_edit"] : "";
$id_edit = (isset($_REQUEST["id_edit"])) ? $_REQUEST["id_edit"] : "";

//Variables Elininar
$delete_id= (isset($_REQUEST["delete_idE"])) ? $_REQUEST["delete_idE"] : "";



$daoE= new DaoEstadio();


   if($action!=""){
       switch($action){
           case 'guardar':

               if($nombre!="" && $capacidad!="" && $direccion!=""){
                   if($daoE->registroEstadio(new Estadio(null,$nombre,$capacidad,$direccion,$coorx,$coory))==1){
                       $messages[] = "El Estadio ha sido registrado con éxito.";
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
               if($nombre_edit!="" && $capacidad_edit!=""){
                   if($daoE->actualizarEstadio(new Estadio($id_edit,$nombre_edit,$capacidad_edit,$direccion_edit,$coorx_edit,$coory_edit))==1){
                       $messages[] = "El Estadio ha sido Actualizado con éxito.";
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
                   if($daoE->eliminarEstadio(new Estadio($delete_id,null,null,null,null,null))==1){
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
