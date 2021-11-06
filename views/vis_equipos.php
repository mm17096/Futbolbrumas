<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Equipos</title>

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
    <link href="../build/css/diseño.css" rel="stylesheet">
    <link href="../alerta/build/toastr.css" rel="stylesheet" type="text/css" />
</head>

<body class="nav-md">
    <main class="page-content">
        <div class="container body">
            <div class="main_container">
                <!-- top navigation -->

                <?php
        session_start();
        $_SESSION['index'] = null;
        unset($_SESSION['index']);
        if (isset($_SESSION['identidad']) && isset($_SESSION['usuario'])) {
          require_once('menu.php');
        } else {
          header("Location: ../views/index.php");
        }
        include_once("../dao/DaoEquipo.php");
        include_once("../dao/DaoRepresentante.php");
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
                        <div class="col-md-12 col-sm-6  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-group"></i> Datos Equipos</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <button type="button" class="btn btn-round btn-guardar" data-toggle="modal"
                                        data-target=".bs-example-modal-lg"> Agregar Equipo</button>
                                </div>
                                <!--Respuesta JS-->
                                <div class="col-xs-70">
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-10">
                                        <div id="resultados"></div>
                                    </div>
                                    <div class="col-xs-1"></div>
                                </div>
                                <!--termina Respuesta JS-->
                                <!--INICIO DE TABLA-->
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <div id="equipotabla">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INICIO DE TABLA-->
                                <!-- INICIA MODAL PORA INGRESAR UN NUEVO EQUIPO-->
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modalE"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="../controller/equipo_controller.php?action=guardar"
                                                method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Equipo</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="panel-body">
                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="nombre"
                                                                        class="col-form-label col-md-6 col-sm-6">Nombre
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" id="nombre" name="nombre"
                                                                        class="form-control" onblur="validarEquipo()"
                                                                        placeholder="Ingrese nombre de equipo"
                                                                        autocomplete="off" required>
                                                                    <div class="mensajeEquipo"
                                                                        style="display: none; color: orange;">
                                                                        <i class="fa fa-exclamation-triangle">El nombre
                                                                            del equipo ya existe!</i>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="camisa"
                                                                        class="col-form-label col-md-6 col-sm-6"
                                                                        mame="noSS">Camiseta <span
                                                                            class="required">*</span></label>
                                                                    <input type="file" id="camisa" accept="imagen/*"
                                                                        name="camisa" class="form-control-file"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="idrepresentante"
                                                                        class="col-form-label col-md-3 col-sm-3">Representante<span
                                                                            class="required">*</span></label>
                                                                    <select id="idrepresentante" name="idrepresentante"
                                                                        class="form-control" required>
                                                                        <option value="">seleccione representante
                                                                        </option>
                                                                        <?php
                                    $daoRR = new DaoRepresentante();
                                    $fila = $daoRR->listaRepresentanteR();
                                    foreach ($fila as $key => $value) {
                                    ?>
                                                                        <option value="<?php echo $value->getDui(); ?>">
                                                                            <?php echo $value->getNombre(); ?>
                                                                            <?php echo $value->getApellido(); ?>
                                                                        </option>
                                                                        <?php
                                    }
                                    ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn btn-round  btn-cancelar"
                                                        data-dismiss="modal">
                                                        <li class="fa fa-close cancelar"></li> Cancelar
                                                    </button>
                                                    <button type="submit" class="btn btn-round btn-guardar"
                                                        value="guardar">
                                                        <li class="fa fa-save"></li> Guardar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- TERMINA MODAL AGREGAR EQUIPO/modal -->
                                <!-- INICIA MODAL PARA MODIFICAR EQUIPO-->
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                    id="editEquipoModal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form class=""
                                                action="../controller/equipo_controller.php?action=actualizar"
                                                method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Modificar Equipo</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">×</span></button>
                                                </div>
                                                <!--Imput de ID-->
                                                <input type="hidden" name="id_edit" id="id_edit">
                                                <div class="modal-body">
                                                    <div class="panel-body">
                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="nombre"
                                                                        class="col-form-label col-md-6 col-sm-6">Nombre
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" id="nombre_edit"
                                                                        name="nombre_edit" class="form-control"
                                                                        required="required" onblur="validarEquipo()">
                                                                </div>
                                                                <div class="form-group ">

                                                                    <label for="camisa"
                                                                        class="col-form-label col-md-6 col-sm-6"
                                                                        name="camisa">Camiseta <span
                                                                            class="required">*</span></label>
                                                                    <input type="file" id="camisa_edit"
                                                                        name="camisa_edit" class="form-control-file"
                                                                        accept="imagen/*">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="idrepresentante"
                                                                        class="col-form-label col-md-3 col-sm-3">Representante<span
                                                                            class="required">*</span></label>
                                                                    <select id="idrepresentante_edit"
                                                                        name="idrepresentante_edit" class="form-control"
                                                                        required="required">
                                                                        <option value="">seleccione representante
                                                                        </option>
                                                                        <?php
                                    $daoRR = new DaoRepresentante();
                                    $fila = $daoRR->listaRepresentanteR();
                                    foreach ($fila as $key => $value) {
                                    ?>
                                                                        <option value="<?php echo $value->getDui(); ?>">
                                                                            <?php echo $value->getNombre(); ?>
                                                                            <?php echo $value->getApellido(); ?>
                                                                        </option>
                                                                        <?php
                                    }
                                    ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn btn-round  btn-cancelar"
                                                        data-dismiss="modal">
                                                        <li class="fa fa-close cancelar"></li> Cancelar
                                                    </button>
                                                    <button type="submit" class="btn btn-round btn-guardar">
                                                        <li class="fa fa-save"></li> Guardar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- TERMINA MODAL PARA MODIFICAR EQUIPO -->
                                <!-- COMIENZA MODAL PARA DAR DE BAJA AL EQUIPO -->
                                <div class="modal fade " id="dar_baja">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <form id="baja" name="baja" action="baja" method="POST">
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="myModalLabel">Dar de Baja al Equipo</h2>
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <input type="hidden" name="desactivar_idequipo"
                                                                id="desactivar_idequipo">
                                                            <h2 for="">¿Seguro que quieres dar de baja a este registro?
                                                            </h2>
                                                            <div>Esta acción se puede deshacer</div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn btn-round  btn-cancelar"
                                                        data-dismiss="modal">
                                                        <li class="fa fa-close cancelar"></li> Cancelar
                                                    </button>
                                                    <button type="submit" class="btn btn-round btn-guardar">
                                                        <li class="fa fa-thumbs-o-down"></li> Dar de Baja
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- TERMINA MODAL PARA DAR DE ALTA AL EQUIPO -->
                                <div class="modal fade" id="dar_alta">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <form id="alta" name="alta" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Dar de Alta al Equipo</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <input type="hidden" name="activar_idequipo"
                                                                id="activar_idequipo">
                                                            <h2 for="">¿Seguro que quieres dar de alta a este registro?
                                                            </h2>
                                                            <div>Esta acción se puede deshacer</div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn btn-round  btn-cancelar"
                                                        data-dismiss="modal">
                                                        <li class="fa fa-close cancelar"></li> Cancelar
                                                    </button>
                                                    <button type="submit" class="btn btn-round btn-guardar">
                                                        <li class="fa fa-thumbs-o-up"></li> Dar de Alta
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- TERMINA MODAL PARA DAR DE ALTA AL EQUIPO -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Contenido -->
            <!-- Pied de  Pagina -->
            <?php
      require_once('pie.php');
      ?>
            <!-- /Pie de Pagina -->
        </div>
    </main>


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

    <script src="../scripts/equipo/equipo.js"></script>
    <script src="../alerta/build/alerts.js"></script>
    <script src="../alerta/build/toastr.js"></script>
</body>

</html>