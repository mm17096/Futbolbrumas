<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FutSal Las Brumas</title>

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

    <!--Diseño css Sistema FutSal las Brumas-->
    <link href="../build/css/diseño.css" rel="stylesheet">

    <script type="text/javascript">
    function msj() {

        setTimeout(function() {
            document.getElementById("msjsuccess").style.display = 'none';
        }, 3500);

    }
    </script>

</head>

<body class="nav-md" onload="msj()">

    <?php
    session_start();
    require_once "../helpers/utils.php";
    if (isset($_POST['user']) && isset($_POST['password'])) {

        $usuario = isset($_POST['user']) ? $_POST['user'] : false;
        $clave = isset($_POST['password']) ? $_POST['password'] : false;

        if ($usuario != "" && $clave != "") {
            echo '<script>window.location="' . base_url . 'controller/usuario_controller.php?action=iniciar&usuario=' . $usuario . '&password=' . $clave . '"</script>';
        }
    }

    if (isset($_GET['sesion'])) {

        if ($_GET['sesion'] == "logout") {
            echo '<script>window.location="' . base_url . 'controller/usuario_controller.php?action=cerrar"</script>';
        }
    }
    ?>

    <div class="container body">
        <div class="main_container">
            <!-- top navigation -->
            <?php
            require_once('menu.php');
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

            <div class="right_col" role="main">
            </div>

            <!-- MENSAJE DE ACCIONES -->
            <?php

            if (isset($_SESSION['action_login']) && $_SESSION['action_login'] == 'completo') {
                $_SESSION['action_login'] = null;
                unset($_SESSION['action_error']);
                $_SESSION['Attempts'] = 0;
                $messages[] = "Bienvenido " . $_SESSION['identidad']->nombre;
            ?>
            <div id="msjsuccess" class="alert alert-success" role="alert" style=" position: absolute;
                                                   right: 30px;
                                                      top: 75px;">
                <strong>¡Bien hecho!</strong>
                <?php
                    foreach ($messages as $message) {
                        echo $message;
                    }
                    ?>
            </div>
            <?php
            }
            ?>
            <!-- MENSAJE DE ACCIONES -->

            <!-- MODAL AGREGAR-->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" id="modalperfil" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="../controller/usuario_controller.php?action=modificar" method="POST"
                            enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Formulario de
                                    Representante</h4>
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="col-form-label col-md-6 col-sm-6">Correo
                                                    <span class="required">*</span></label>
                                                <input type="email" class="form-control" id="correo" name="correo"
                                                    value="<?= isset($_SESSION['usuario']) && $_SESSION['usuario']->correo != "" ? $_SESSION['usuario']->correo : ''; ?>"
                                                    autocomplete="off" required>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-form-label col-md-6 col-sm-6">Usuario
                                                    <span class="required">*</span></label>
                                                <input type="text" class="form-control" id="usuario" name="usuario"
                                                    value="<?= isset($_SESSION['usuario']) && $_SESSION['usuario']->nombre != "" ? $_SESSION['usuario']->nombre : ''; ?>"
                                                    autocomplete="off" required>

                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label col-md-6 col-sm-6">Contrasenia
                                                    <span class="required">*</span></label>
                                                <input type="password" class="form-control" id="clave" name="clave"
                                                    value="<?= isset($_SESSION['usuario']) && $_SESSION['usuario']->clave != "" ? Utils::desencriptacion($_SESSION['usuario']->clave) : ''; ?>"
                                                    autocomplete="off" required>

                                            </div>
                                            <!--
                                            <div class="form-group">
                                                <label class="col-form-label col-md-6 col-sm-6">Confirmar Contrasenia
                                                    <span class="required">*</span></label>
                                                <input type="password" class="form-control" id="clave2" name="clave2"
                                                    autocomplete="off" required>

                                            </div>
                                            -->
                                            <div class="form-group">

                                                <input type="hidden" class="form-control" id="id" name="id"
                                                    value="<?= isset($_SESSION['usuario']) && $_SESSION['usuario']->idusuario != "" ? $_SESSION['usuario']->idusuario : ""; ?>"
                                                    autocomplete="off" required>

                                            </div>
                                        </div>

                                        <div class="col-lg-6">


                                            <div class="form-group">
                                                <label class="col-form-label col-md-6 col-sm-6">Imagen de Perfil
                                                    <span class="required">*</span></label>
                                                <input type="file" accept="imagen/*" class="form-control" id="imagen" name="imagen"
                                                    autocomplete="off" required>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                                    <li class="fa fa-close cancelar"></li> Cancelar
                                </button>
                                <button type="submit" class="btn btn-round btn-guardar" id="btng" name="btng">
                                    <li class="fa fa-save"></li>Actualizar
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- MODAL AGREGAR-->

            <!-- Pied de  Pagina -->
            <?php
            require_once('pie.php');
            ?>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

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


</body>

</html>