<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Equipos</title>

  <!--Alerta-->
  <link href="../alerta/build/toastr.css" rel="stylesheet" type="text/css" />
  <link href="../alerta/build/toastr.min.css" rel="stylesheet" type="text/css" />
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
    

</head>

<body class="nav-md" >
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
                <h2><i class="fa fa-group"></i>Jornadas</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">




                <button type="button" class="btn btn-round btn-guardar" data-toggle="modal" data-target=".bs-example-modal-lg">Generar Jornadas</button>

                <div   id="resultado" >

                </div>
                <!-- modal -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_jornada">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form id="Addjornada" action="Addjornada" method="POST">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Jornadas</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="panel-body">
                            <div class="row">


                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="col-form-label col-md-12 col-sm-12">Seleccionar Dias a Jugar<span class="required">*</span></label>

                                  <div class="col-md-12 col-sm-12 ">
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green checked" style="position: relative;">
                                          <input type="checkbox" value="lunes" id="lunes" name="lunes" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4926896" _msttexthash="155376"> Lunes</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="martes" id="martes" name="martes" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> Martes</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="miercoles" id="miercoles" name="miercoles" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> Miercoles</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="jueves" id="jueves" name="jueves" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> Jueves</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="viernes" id="viernes" name="viernes" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> Viernes</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="sabado" id="sabado" name="sabado" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> Sabado</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="domingo" id="domingo" name="domingo" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> Domingo</font>
                                      </label>
                                    </div>

                                  </div>

                                </div>

                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="col-form-label col-md-12 col-sm-12">Seleccionar Horas a Jugar<span class="required">*</span></label>

                                  <div class="col-md-12 col-sm-12 ">
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green checked" style="position: relative;">
                                          <input type="checkbox" value="primera" id="primera" name="primera" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4926896" _msttexthash="155376">8:00 am</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="segunda" id="segunda" name="segunda" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267">10:00 am</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="tercera" id="tercera" name="tercera" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267">1:00 pm</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="cuarta" id="cuarta" name="cuarta" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> 3:00 pm</font>
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label class="">
                                        <div class="icheckbox_flat-green" style="position: relative;">
                                          <input type="checkbox" value="quinta" id="quinta" name="quinta" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> 6:00 pm</font>
                                      </label>
                                    </div>


                                  </div>

                                </div>

                              </div>


                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="col-form-label col-md-6 col-sm-6">Fecha Inicio<span class="required">*</span></label>
                                  <input id="fechainicio" name="fechainicio" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'">
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
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

                <!--Tabla Jornada-->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <div id="jornadatabla"></div>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                    <div id="resultados"></div>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                <!--Vista/js/Controlador/-js/-vista-->

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
  <script src="../scripts/jornada/jornada.js" type="text/javascript" charset="utf-8"></script>




</body>

</html>