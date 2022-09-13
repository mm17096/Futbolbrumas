
<?php
session_start();
require_once "../clases/Cancha.php";
require_once "../dao/DaoCancha.php";

$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
//variables de Guardar
$nombre = (isset($_REQUEST["nombre"])) ? $_REQUEST["nombre"] : "";
$direccion = (isset($_REQUEST["direccion"])) ? $_REQUEST["direccion"] : "";
$coorx = (isset($_REQUEST["coorx"])) ? $_REQUEST["coorx"] : "";
$coory = (isset($_REQUEST["coory"])) ? $_REQUEST["coory"] : "";
//variables de Actualizar
$nombre_edit = (isset($_REQUEST["nombre_edit"])) ? $_REQUEST["nombre_edit"] : "";
$direccion_edit = (isset($_REQUEST["direccion_edit"])) ? $_REQUEST["direccion_edit"] : "";
$coorx_edit = (isset($_REQUEST["coorx_edit"])) ? $_REQUEST["coorx_edit"] : "";
$coory_edit = (isset($_REQUEST["coory_edit"])) ? $_REQUEST["coory_edit"] : "";
$id_edit = (isset($_REQUEST["id_edit"])) ? $_REQUEST["id_edit"] : "";



//Variables Elininar
$delete_idb= (isset($_REQUEST["delete_id"])) ? $_REQUEST["delete_id"] : "";
$delete_ida= (isset($_REQUEST["delete_ida"])) ? $_REQUEST["delete_ida"] : "";



$daoE= new DaoCancha();


   if($action!=""){
       switch($action){
           case 'guardar':
               if($nombre!="" && $direccion!=""){
                   if($daoE->registroCancha(new Cancha(null,$nombre,$direccion,$coorx,$coory,true))==1){

                     //alerta
                     $messages[] = "El registro se ha almacenado con éxito.";
                     ?>
                         <div id="msjerror" class="alert alert-success" role="alert">
                                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                                 <i class="fa fa-check"></i>
                                 <strong>Registro Almacenado</strong>
                                 <?php
                                                         foreach ($messages as $message) {
                                                                 echo $message;
                                                             }
                                                         ?>
                         </div>

                     <?php

                 }
             }else{
               $errors[] = "Ocurrió un error al almacenar el registro.";
                ?>

                       <div id="msjerror" class="alert alert-danger" role="alert">
                           <button type="button" class="close" data-dismiss="alert">&times;</button>
                               <strong>Error de Registro</strong>

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
               if($nombre_edit!="" && $direccion_edit!=""){
                   if($daoE->actualizarCancha(new Cancha($id_edit,$nombre_edit,$direccion_edit,$coorx_edit,$coory_edit,true))==1){
                     //alerta
                     $errors[] = "El registro se ha modificado con éxito";
                   ?>
                   <div id="msjerror" class="alert alert-info" role="alert">
                       <i class="fa fa-exclamation-circle"></i>
                       <strong>Registro modificado</strong>

                           <?php
                           foreach ($errors as $error) {
                               echo $error;
                           }
                           ?>
                   </div>
                   <?php

                 }
             }else{
               $errors[] = "Ocurrió  un error al actualizar el registro.";
                ?>

                       <div id="msjerror" class="alert alert-danger" role="alert">
                           <button type="button" class="close" data-dismiss="alert">&times;</button>
                               <strong>Error de Registro</strong>
                               <?php
                                   foreach ($errors as $error) {
                                           echo $error;
                                       }
                                   ?>
                       </div>

                <?php

             }

         break;
           case 'baja':
               if($delete_idb!=""){
                   if($daoE->estadoCancha(new Cancha($delete_idb,null,null,null,null,false))==1){
                     //alerta
                     $messages[] = "El registro se ha dado de baja con éxito.";
                     ?>
                         <div id="msjerror" class="alert alert-ba" role="alert">
                                 <i class="fa fa-thumbs-o-down"></i>
                                 <strong>Registro Dado Baja</strong>
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


            case 'alta':
                if($delete_ida!=""){
                    if($daoE->estadoCancha(new Cancha($delete_ida,null,null,null,null,true))==1){

                      //alerta
                      $messages[] = "El registro se ha dado de alta con éxito.";
                      ?>
                          <div id="msjerror" class="alert alert-ba" role="alert">
                                  <i class="fa fa-thumbs-o-up"></i>
                                  <strong>Registro Dado Alta</strong>
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
 <script type="text/javascript">
    msj();

    function msj() {

        setTimeout(function() {
            document.getElementById("msjsuccess").style.display = 'none';
        }, 3500);

        setTimeout(function() {
            document.getElementById("msjerror").style.display = 'none';
        }, 3500);

    };
</script>
