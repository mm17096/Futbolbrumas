<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>backup de la Base de Dato</title>
		 <!-- Bootstrap -->
		 <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
        <!-- starrr -->
        <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="../views/js/tabla.js" rel="stylesheet">
        <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!--Diseño css Sistema FutSal las Brumas-->
        <!--Diseño css Sistema FutSal las Brumas-->

        <link href="../build/css/diseño.css" rel="stylesheet">
        <link href="../alerta/build/toastr.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="nav-md" onload="msj()">
		<main class="page-content">
            <div class="container body">
                <div class="main_container">
                    <?php
                      session_start();
                      $_SESSION['index'] = null;
                      unset($_SESSION['index']);
                      if (isset($_SESSION['identidad']) && isset($_SESSION['usuario'])) {
                        require_once('menu.php');
                      } else {
                        header("Location: ../views/index.php");
                      }
                        include_once ("../dao/DaoJugador.php");
                        include_once ("../dao/DaoEquipo.php");
                    ?>
                    <style type="text/css">
                    .required {
                    color: red;
                    }

                    .form-group {
                    width: 70%;
                    margin-left: auto;
                    margin-right: auto;
                    }
                    </style>
                    <!-- Contenido -->
                    <div class="right_col" role="main">
                        <div class="row">
                            <div class="col-md-12 col-sm-6  " >
								<div class="x_panel"><!----->
                                    <div class="x_title">
                                        <h2><li class="fa fa-database">
                                            Base de Datos.
                                        </li></h2>
                                        <div class="clearfix"></div>
                                    </div>

                                    <?php
                                        //$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";

                                        if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'realizado') {

                                            $_SESSION['action_success'] = null;
                                            unset($_SESSION['action_success']);
                                            $messages[] = "Se ha realizado la copia de seguridad con éxito.";
                                            ?>
                                                <div id="msjerror" class="alert alert-success" role="alert" style=" position: absolute;
                                                            right: 15%;
                                                                top: 0px;" >
                                                        <button type="button" class="close" data-dismiss="alert"></button>
                                                        <i class="fa fa-check"></i>
                                                        <strong>Hecho: </strong>
                                                        <?php
                                                                                foreach ($messages as $message) {
                                                                                        echo $message;
                                                                                    }
                                                                                ?>
                                                </div>

                                            <?php
                                        } else if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'error') {

                                            $_SESSION['action_success'] = null;
                                            unset($_SESSION['action_success']);
                                            $errors[] = "Ocurrio un error inesperado al crear la copia de seguridad.";
                                            ?>

                                                <div id="msjerror" class="alert alert-danger" role="alert" style=" position: absolute;
                                                            right: 15%;
                                                                top: 0px;">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <strong>Error: </strong>
                                                        <?php
                                                            foreach ($errors as $error) {
                                                                    echo $error;
                                                                }
                                                            ?>
                                                </div>

                                            <?php
                                        }else if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'sirestaurado') {

                                            $_SESSION['action_success'] = null;
                                            unset($_SESSION['action_success']);
                                            $messages[] = "Restauración completada con éxito.";
                                            ?>
                                                <div id="msjerror" class="alert alert-success" role="alert" style=" position: absolute;
                                                            right: 15%;
                                                                top: 0px;" >
                                                        <button type="button" class="close" data-dismiss="alert"></button>
                                                        <i class="fa fa-check"></i>
                                                        <strong>Hecho: </strong>
                                                        <?php
                                                                                foreach ($messages as $message) {
                                                                                        echo $message;
                                                                                    }
                                                                                ?>
                                                </div>

                                            <?php
                                        }else if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'sierror') {

                                            $_SESSION['action_success'] = null;
                                            unset($_SESSION['action_success']);
                                            $errors[] = "Ocurrio un error inesperado, no se pudo hacer la restauración completamente.";
                                            ?>

                                                <div id="msjerror" class="alert alert-danger" role="alert" style=" position: absolute;
                                                            right: 15%;
                                                                top: 0px;">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <strong>Error: </strong>
                                                        <?php
                                                            foreach ($errors as $error) {
                                                                    echo $error;
                                                                }
                                                            ?>
                                                </div>

                                            <?php
                                        }
                                    ?>
                                        <!-- MENSAJE DE ACCIONES -->
                                    <br>
                                    <br>
                                    <div class="">
                                        <div class="col-lg-12">
                                            <a class="glyphicon glyphicon-circle-arrow-down" href="../BRMI/php/Backup.php">  Realizar copia de seguridad</a>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="card-body">
                                        <form class=""  action="../BRMI/php/Restore.php" method="POST" >
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Selecciona un punto de restauración</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <select name="restorePoint" class="form-control">
                                                            <option value="" disabled="" selected="" class="form-control">Selecciona un punto de restauración</option>
                                                            <?php
                                                                include_once '../BRMI/php/Connet.php';
                                                                $ruta=BACKUP_PATH;
                                                                if(is_dir($ruta)){
                                                                if($aux=opendir($ruta)){
                                                                while(($archivo = readdir($aux)) !== false){
                                                                if($archivo!="."&&$archivo!=".."){
                                                                $nombrearchivo=str_replace(".sql", "", $archivo);
                                                                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                                                                $ruta_completa=$ruta.$archivo;
                                                                if(is_dir($ruta_completa)){
                                                                }else{
                                                                echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                                                                }
                                                                }
                                                                }
                                                                closedir($aux);
                                                                }
                                                                }else{
                                                                echo $ruta." No es ruta válida";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="col-lg-4">
                                                    <button type="submit" class="btn btn-round btn-guardar">Restaurar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


								</div><!----->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require_once('pie.php');
            ?>
        </main>
		<!-- Pied de  Pagina -->

        <!-- /Pie de Pagina -->

        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../vendors/moment/min/moment.min.js"></script>
        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="../vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="../vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
        <!-- Parsley -->
        <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="../vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="../vendors/starrr/dist/starrr.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- Datatables -->
        <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="../vendors/jszip/dist/jszip.min.js"></script>
        <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

        <script src="../scripts/equipo/equipo.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
