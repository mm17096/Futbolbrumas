<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Ábitros</title>

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
                <h2><i class="fa fa-estadio"><img src="imagen/cancha.png"/></i> Datos Árbitro</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">


                <div class="col-sm-6">
                <button type="button" class="btn btn-round btn-guardar" data-toggle="modal" data-target=".bs-example-modal-lg"> Agregar Ábitro</button>
              </div>
                <div class="col-sm-6">
                <div class="col-xs-70">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                    <div id="resultados"></div>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                </div>

                <!-- modal agregar -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" id="addmodal" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form class="" method="POST" id="addArbitro" name="addArbitro">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Árbitro</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="panel-body">
                            <div class="row">

                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="col-form-label col-md-6 col-sm-6">DUI<span class="required">*</span></label>
                                  <input class="form-control" onblur="validarDui()" onkeypress="return formatoDui(this, event)" maxlength="10" id="dui" name="dui" placeholder="Número de DUI" autocomplete="off"  required></input>
                                  <span class="mensajedui" style="display: none; color: orange;position:fixed;">
                                  <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, agregue un número de DUI.
                                  </span>
                                  <span class="mensajeduif" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Por favor, agregue un número de DUI válido
                                  </span>

                                </div>
                                <div class="form-group">
                                  <label class="col-form-label col-md-6 col-sm-6">Nombres<span class="required">*</span></label>
                                  <input class="form-control" onblur="validarNombre()" onkeypress="return Letras(event)" minlength="5" maxlength="20" id="nombre" name="nombre" placeholder="Nombre de árbitro" autocomplete="off" required></input>

                                  <span class="mensajenombre" style="display: none; color: orange;position:fixed;">
                                  <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, complete el campo Nombre.
                                  </span>
                                  <span class="mensajenombref" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Agregue un nombre con 5 caracteres como minimo.
                                  </span>

                                </div>
                                <div class="form-group">
                                  <label class="col-form-label col-md-6 col-sm-6">Apellidos<span class="required">*</span></label>
                                  <input class="form-control" onblur="validarApellido()" onkeypress="return Letras(event)" minlength="5" maxlength="20" id="apellido" name="apellido" placeholder="Apellidos de árbitro" autocomplete="off" required></input>
                                  <span class="mensajeapellido" style="display: none; color: orange;position:fixed;">
                                  <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, complete el campo Apellido.
                                  </span>
                                  <span class="mensajeapellidof" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Agregue un apellido con 5 caracteres como minimo.
                                  </span>

                                </div>

                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Teléfono<span class="required">*</span></label>
                                <input class="form-control" onblur="validarTel()" onkeypress="return formatoTel(this, event)" maxlength="9" id="telefono" name="telefono" placeholder="Número telefónico" autocomplete="off" required></input>
                                <span class="mensajetel" style="display: none; color: orange;position:fixed;">
                                <i class="fa fa-exclamation-triangle"></i>
                                  Por favor, agregue un número de teléfono.
                                </span>
                                <span class="mensajetelf" style="display: none; color: red;position:fixed;">
                                  <i class="fa fa-close"></i>
                                  Por favor, agregue un número de teléfono válido
                                </span>
                                </div>
                              </div>

                              <div class="col-lg-6">
                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Género<span class="required">*</span></label>
                                  <br>
                                  <br>
                                  <p>
              											M:
              											<input type="radio"  onblur="validarGenero()" name="gender" id="genderM" value="M" required/> F:
              											<input type="radio"  name="gender" id="genderF" value="F" />
                                    <span class="mensajegen" style="display: none; color: orange;position:fixed;">
                                      <i class="fa fa-exclamation-triangle"></i>
                                      Por favor, Por favor, seleccione un género.
                                    </span>
                                  </p>
                                </div>

                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Fecha nacimiento<span class="required">*</span></label>
                                <input type="date"class="form-control" onblur="validarfecha()" id="fecha" name="fecha" required></input>
                                <span class="mensajefecha" style="display: none; color: red;position:fixed;">
                                  <i class="fa fa-close"></i>
                                  Debe de ser mayor de edad (18 años).
                                </span>

                                </div>

                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Dirección<span class="required">*</span></label>
                                  <textarea class="form-control" onblur="validarDirec()" onkeypress="validarDirec()" id="direccion" name="direccion" maxlength="80" minlength="16"  placeholder="Dirección de residencia" autocomplete="off" required oninvalid="this.setCustomValidity('Agregue una dirección con 16 caracteres como minimo y 80 como máximo.')"></textarea>
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
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal" onclick="location.reload()">
                            <li class="fa fa-close cancelar"></li> Cancelar
                          </button>
                          <button type="submit"class="btn btn-round btn-guardar" disabled id="btng" name="btng">
                            <li class="fa fa-save"></li> Guardar
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- /modal modificar -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" id="editArbitroModal" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form class="" method="POST" id="editArbitro" name="editArbitro">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Árbitro</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="panel-body">
                            <div class="row">

                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="col-form-label col-md-6 col-sm-6">DUI<span class="required">*</span></label>
                                  <input class="form-control" onblur="validarDuiEdit()" onkeypress="return formatoDui(this, event)" id="dui_edit" name="dui_edit" maxlength="10"  placeholder="Número de DUI" autocomplete="off"  readonly required></input>
                                  <span class="mensajeduiedit" style="display: none; color: orange;position:fixed;">
                                  <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, agregue un número de DUI.
                                  </span>
                                  <span class="mensajeduieditf" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Por favor, agregue un número de DUI válido
                                  </span>

                                </div>
                                <div class="form-group">
                                  <label class="col-form-label col-md-6 col-sm-6">Nombres<span class="required">*</span></label>
                                  <input class="form-control" onblur="validarNombreEdit()" onkeypress="return Letras(event)"  id="nombre_edit" name="nombre_edit" minlength="5" maxlength="20" placeholder="Nombre de árbitro" autocomplete="off" required></input>

                                  <span class="mensajenombreedit" style="display: none; color: orange;position:fixed;">
                                  <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, complete el campo Nombre.
                                  </span>
                                  <span class="mensajenombreeditf" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Agregue un nombre con 5 caracteres como minimo.
                                  </span>

                                </div>
                                <div class="form-group">
                                  <label class="col-form-label col-md-6 col-sm-6">Apellidos<span class="required">*</span></label>
                                  <input class="form-control" onblur="validarapellidoEdit()" onkeypress="return Letras(event)"  id="apellido_edit" name="apellido_edit" minlength="5" maxlength="20" placeholder="Apellidos de árbitro" autocomplete="off" required></input>
                                  <span class="mensajeapellidoedit" style="display: none; color: orange;position:fixed;">
                                  <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, complete el campo Apellido.
                                  </span>
                                  <span class="mensajeapellidoeditf" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Agregue un apellido con 5 caracteres como minimo.
                                  </span>

                                </div>

                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Teléfono<span class="required">*</span></label>
                                <input class="form-control" onblur="validarTelEdit()" onkeypress="return formatoTel(this, event)"  id="telefono_edit" name="telefono_edit" maxlength="9" placeholder="Número telefónico" autocomplete="off" required></input>
                                <span class="mensajeteledit" style="display: none; color: orange;position:fixed;">
                                <i class="fa fa-exclamation-triangle"></i>
                                  Por favor, agregue un número de teléfono.
                                </span>
                                <span class="mensajeteleditf" style="display: none; color: red;position:fixed;">
                                  <i class="fa fa-close"></i>
                                  Por favor, agregue un número de teléfono válido
                                </span>
                                </div>

                              </div>

                              <div class="col-lg-6">
                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Género<span class="required">*</span></label>
                                  <br>
                                  <br>
                                  <p>
                                    M:
                                    <input type="radio"  onblur="validarGeneroEdit()" name="gender_edit" id="genderM_edit" name="gender" value="M" required/> F:
                                    <input type="radio"  name="gender_edit" id="genderF_edit" value="F" />
                                    <span class="mensajegenedit" style="display: none; color: orange;position:fixed;">
                                      <i class="fa fa-exclamation-triangle"></i>
                                      Por favor, Por favor, seleccione un género.
                                    </span>
                                  </p>

                                </div>

                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Fecha nacimiento<span class="required">*</span></label>
                                <input type="date"class="form-control" onclick="validarfechaEdit()" id="fecha_edit" name="fecha_edit" required></input>
                                <span class="mensajefechaedit" style="display: none; color: red;position:fixed;">
                                  <i class="fa fa-close"></i>
                                  Debe de ser mayor de edad (18 años).
                                </span>
                                </div>

                                <div class="form-group ">
                                  <label class="col-form-label col-md-6 col-sm-6">Dirección<span class="required">*</span></label>
                                  <textarea class="form-control" onblur="validarDirecEdit()" onkeypress="validarDirec()" id="direccion_edit" name="direccion_edit" maxlength="80" minlength="16"  placeholder="Dirección de residencia" autocomplete="off" required oninvalid="this.setCustomValidity('Agregue una dirección con 16 caracteres como minimo y 80 como máximo.')"></textarea>
                                  <span class="mensajedirecedit" style="display: none; color: orange;position:fixed;">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    Por favor, agregue una dirección.
                                  </span>
                                  <span class="mensajedireceditf" style="display: none; color: red;position:fixed;">
                                    <i class="fa fa-close"></i>
                                    Agregue una dirección con 16 caracteres como minimo.
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal" >
                            <li class="fa fa-close cancelar"></li> Cancelar
                          </button>
                          <button type="submit" class="btn btn-round btn-guardar"  id="btnedit" name="btnedit">
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
                          <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal" onclick="location.reload()">
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
                        <div id="arbitrotabla"></div>
                      </div>
                    </div>
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
  <script src="../scripts/arbitro/arbitro.js"></script>

</body>
</html>
