<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Canchas</title>

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

  <link href="../alerta/build/toastr.css" rel="stylesheet" type="text/css" />
  <!--Diseño css Sistema FutSal las Brumas-->
  <link href="../build/css/diseño.css" rel="stylesheet">

</head>

<body class="nav-md">
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
      ?>

      <style type="text/css">
        .required {
          color: red;
        }

      </style>
      <!-- Contenido -->
      <div class="right_col" role="main">

        <div class="row">
          <div class="col-md-12 col-sm-6  ">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-estadio"></i> Datos Cancha</h2>

                <div class="clearfix"></div>
              </div>

              <div class="x_content">


              <div class="col-sm-6">
                <button type="button" class="btn btn-round btn-guardar" data-toggle="modal" data-target=".bs-example-modal-lg"> Agregar Cancha</button>
              </div>
                <!-- modal agregar -->
                <div class="col-sm-6" style="position:relative;">
                  <div class="col-xs-10">
                    <div id="resultados"></div>
                  </div>
                </div>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" id="addmodal" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form class="" method="POST" id="addCancha" name="addCancha">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Cancha</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="panel-body">
                            <div class="row">

                              <div class="col-lg-6">
                                <input type="hidden" name="accion_add" id="accion_add">
                                <div class="form-group">
                                  <label class="col-form-label col-md-6 col-sm-6">Nombre<span class="required">*</span></label>
                                  <input class="form-control" onblur="validarNombre()"  maxlength="30" minlength="5" id="nombre" name="nombre" placeholder="Nombre de cancha" autocomplete="off" required oninvalid="this.setCustomValidity('Agregue una nombre con 5 caracteres como minimo y 30 como máximo.')"></input>
                                  <span class="mensajenombre" style="display: none; color: orange;position:fixed;">
                                  <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, agregue un nombre de cancha.
                                  </span>
                                  <span class="mensajenombref" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Agregue un nombre con 5 caracteres como minimo.
                                  </span>
                                </div>

                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Dirección<span class="required">*</span></label>
                                  <textarea class="form-control" onblur="validarDirec()" id="direccion" name="direccion" maxlength="80" minlength="16" placeholder="Dirección de cancha" autocomplete="off" required oninvalid="this.setCustomValidity('Agregue una nombre con 9 caracteres como minimo y 80 como máximo.')"></textarea>
                                  <span class="mensajedirec" style="display: none; color: orange;position:fixed;">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, agregue una dirección.
                                  </span>
                                  <span class="mensajedirecf" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Agregue una dirección con 16 caracteres como minimo.
                                  </span>
                                </div>
                              </div>

                              <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="coorx" name="coorx" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="coory" name="coory" />
                                </div>

                                <div class="form-group">
                                  <label> Ubicación Google Maps</label>
                                  <br>
                                  <button type="button" class="btn btn-round btn-maps" data-toggle="modal" onclick="verMapa()">
                                    <li class="fa fa-map-marker"></li> Agregar
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal" onclick="location.reload()" >
                            <li class="fa fa-close cancelar"></li> Cancelar
                          </button>
                          <button type="submit" class="btn btn-round btn-guardar" disabled id="btnadd" name="btnadd">
                            <li class="fa fa-save"></li> Guardar
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- /modal modificar -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" id="editCanchaModal" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form class="" method="POST" id="editCancha" name="editCancha">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Cancha</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="panel-body">
                            <div class="row">

                              <div class="col-lg-6">
                                <input type="hidden"  name="id_edit" id="id_edit">

                                <div class="form-group">
                                  <label class="col-form-label col-md-6 col-sm-6">Nombre<span class="required">*</span></label>
                                  <input class="form-control" onblur="validarNombreEdit()" onkeydown="Activar()" id="nombre_edit" name="nombre_edit" maxlength="25" minlength="5" placeholder="Nombre de cancha" autocomplete="off" required oninvalid="this.setCustomValidity('Agregue una nombre con 5 caracteres como minimo y 25 como máximo.')"></input>
                                  <span class="mensajenombreedit" style="display: none; color: orange;position:fixed;">
                                  <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, agregue un nombre de cancha.
                                  </span>
                                  <span class="mensajenombreeditf" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Agregue una nombre con 5 caracteres como minimo.
                                  </span>
                                </div>

                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Dirección<span class="required">*</span></label>
                                  <textarea class="form-control" onblur="validarDirecEdit()" onkeydown="Activar()" id="direccion_edit" name="direccion_edit" maxlength="80" minlength="16" placeholder="Dirección de cancha" autocomplete="off" required oninvalid="this.setCustomValidity('Agregue una nombre con 16 caracteres como minimo y 80 como máximo.')"></textarea>
                                  <span class="mensajedirecedit" style="display: none; color: orange;position:fixed;">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, agregue una dirección.
                                  </span>
                                  <span class="mensajedirecfedit" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Agregue una dirección con 16 caracteres como minimo.
                                  </span>
                                </div>
                              </div>

                              <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="coorx_edit" name="coorx_edit" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="coory_edit" name="coory_edit" />
                                </div>

                                <div class="form-group">
                                  <label> Ubicación Google Maps</label>
                                  <br>
                                  <button type="button" class="btn btn-round btn-maps" data-toggle="modal" onclick="verMapa()">
                                    <li class="fa fa-map-marker"></li> Modificar
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal" onclick="location.reload()">
                            <li class="fa fa-close cancelar"></li> Cancelar
                          </button>
                          <button type="submit"class="btn btn-round btn-guardar"  id="btnedit" name="btnedit">
                            <li class="fa fa-edit"></li> Modificar
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


                <!--Modal Baja-->
                <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="dar_baja">
                  <div class="modal-dialog modal-lg-6">
                    <div class="modal-content">
                      <form id="baja" action="baja" method="POST">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Dar de Baja</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="panel-body">
                            <div class="row">
                              <input type="hidden" name="delete_id" id="delete_id">
                              <h4 for="">¿Seguro que quieres dar de baja a este registro?</h4>
                              <div>Esta acción se puede deshacer</div>
                            </div>

                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                            <li class="fa fa-close cancelar"></li> Cancelar
                          </button>
                          <button type="submit" class="btn btn-round btn-guardar">
                            <li class="fa fa-thumbs-o-down"></li> Dar Baja
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!--Modal Alta-->
                <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="dar_alta">
                  <div class="modal-dialog modal-lg-6">
                    <div class="modal-content">
                      <form id="alta" action="alta" method="POST">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Dar de Alta</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="panel-body">
                            <div class="row">
                              <input type="hidden" name="delete_ida" id="delete_ida">
                              <h4 for="">¿Seguro que quieres dar de alta a este registro?</h4>
                              <div>Esta acción se puede deshacer</div>
                            </div>

                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                            <li class="fa fa-close cancelar"></li> Cancelar
                          </button>
                          <button type="submit" class="btn btn-round btn-guardar">
                            <li class="fa fa-thumbs-o-up"></li> Dar Alta
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


                <!--TABLA-->
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <br>
                        <br>
                        <div id="canchatabla"></div>
                      </div>
                    </div>
                    <input type="hidden" id="tabid"  name="tabid" />
                  </div>
                </div>



              </div>
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
  </div>


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
  <script src="../scripts/cancha/cancha.js"></script>
  <script src="../alerta/build/toastr.js"></script>
  <script src="../alerta/build/alerts.js"></script>



</body>
</html>
