
<?php

require_once "../clases/Arbitro.php";
require_once "../dao/DaoArbitro.php";

$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
//variables de Guardar
$dui = (isset($_REQUEST["dui"])) ? $_REQUEST["dui"] : "";
$nombre = (isset($_REQUEST["nombre"])) ? $_REQUEST["nombre"] : "";
$apellido = (isset($_REQUEST["apellido"])) ? $_REQUEST["apellido"] : "";
$telefono= (isset($_REQUEST["telefono"])) ? $_REQUEST["telefono"] : "";
$sexo = (isset($_REQUEST["gender"])) ? $_REQUEST["gender"] : "";
$fecha= (isset($_REQUEST["fecha"])) ? $_REQUEST["fecha"] : "";
$direccion = (isset($_REQUEST["direccion"])) ? $_REQUEST["direccion"] : "";

//variables de Actualizar
$dui_edit = (isset($_REQUEST["dui_edit"])) ? $_REQUEST["dui_edit"] : "";
$nombre_edit  = (isset($_REQUEST["nombre_edit"])) ? $_REQUEST["nombre_edit"] : "";
$apellido_edit  = (isset($_REQUEST["apellido_edit"])) ? $_REQUEST["apellido_edit"] : "";
$telefono_edit = (isset($_REQUEST["telefono_edit"])) ? $_REQUEST["telefono_edit"] : "";
$sexo_edit  = (isset($_REQUEST["gender_edit"])) ? $_REQUEST["gender_edit"] : "";
$fecha_edit = (isset($_REQUEST["fecha_edit"])) ? $_REQUEST["fecha_edit"] : "";
$direccion_edit  = (isset($_REQUEST["direccion_edit"])) ? $_REQUEST["direccion_edit"] : "";



//Variables Elininar
$delete_idb= (isset($_REQUEST["delete_id"])) ? $_REQUEST["delete_id"] : "";
$delete_ida= (isset($_REQUEST["delete_ida"])) ? $_REQUEST["delete_ida"] : "";



$daoE= new DaoArbitro();


   if($action!=""){
       switch($action){
           case 'guardar':

               if($nombre!="" && $direccion!=""){
                 if($daoE->registroArbitro(new arbitro($dui,$nombre,$apellido,$sexo,$direccion,$telefono,$fecha,true))==1){
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
         }
           break;
           case 'actualizar':
               if($nombre_edit!="" && $direccion_edit!=""){
                   if($daoE->ActualizarArbitro(new arbitro($dui_edit,$nombre_edit,$apellido_edit,$sexo_edit,$direccion_edit,$telefono_edit,$fecha_edit,true))==1){
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
                 else{
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
             }

           break;
           case 'baja':
               if($delete_idb!=""){
                   if($daoE->estadoArbitro(new Arbitro($delete_idb,null,null,null,null,null,null,false))==1){
                     //alerta
                     $messages[] = "El registro se ha dado de baja con éxito.";
                     ?>
                         <div id="msjerror" class="alert alert-ba" role="alert">
                                 <button type="button" class="close" data-dismiss="alert">&times;</button>
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
                    if($daoE->estadoArbitro(new Arbitro($delete_ida,null,null,null,null,null,null,true))==1){
                      //alerta
                      $messages[] = "El registro se ha dado de alta con éxito.";
                      ?>
                          <div id="msjerror" class="alert alert-ba" role="alert">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
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
