<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Registro Resultados</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

  <link href="../build/css/diseño.css" rel="stylesheet">

  <link href="../build/css/diseño.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- top navigation -->
      <?php
      session_start();
      require_once('menu.php');
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
                <h2><i class="fa fa-file-text"></i> Registro de resultados</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div id="wizard" class="form_wizard wizard_horizontal">
                  <ul class="wizard_steps">
                    <li>
                      <a href="#step-1">
                        <span class="step_no">1</span>
                        <span class="step_descr">
                                          Goles<br />
                                          <small>Registro de goles</small>
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a href="#step-2">
                        <span class="step_no">2</span>
                        <span class="step_descr">
                                          Faltas<br />
                                          <small>Registro de faltas</small>
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a href="#step-3">
                        <span class="step_no">3</span>
                        <span class="step_descr">
                                          Cambios<br />
                                          <small>Registro de cambios jugador</small>
                                      </span>
                      </a>
                    </li>

                  </ul>
                  <div id="step-1">
                    <form class="align-center">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3>Equipo A</h3></center>
                          </div>
                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead align="center">
                              <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th># Camiseta</th>
                                <th># Goles</th>
                                <th>Agregar</th>
                              </tr>
                            </thead>


                            <tbody>
                              <tr>
                                <td align="center">1</td>
                                <td align="center">Rodolfo Zelaya</td>
                                <td align="center">10</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">2</td>
                                <td align="center">Marvin Monterrosa</td>
                                <td align="center">6</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol"lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">3</td>
                                <td align="center">Narciso Orellana</td>
                                <td align="center">8</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">4</td>
                                <td align="center">Byan Tamacas</td>
                                <td align="center">3</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">5</td>
                                <td align="center">Oscar Maldonado</td>
                                <td align="center">1</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>

                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3>Equipo B</h3></center>
                          </div>
                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead align="center">
                              <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th># Camiseta</th>
                                <th># Goles</th>
                                <th>Agregar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td align="center">1</td>
                                <td align="center">Xavier García</td>
                                <td align="center">2</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">2</td>
                                <td align="center">Kevin Carabantes</td>
                                <td align="center">1</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">3</td>
                                <td align="center">Diego Chávez</td>
                                <td align="center">5</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">4</td>
                                <td align="center">Marvin Ramos</td>
                                <td align="center">10</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">5</td>
                                <td align="center">William Canales</td>
                                <td align="center">8</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-gol" data-toggle="modal" data-target=".bs-example-modal-sm">
                                      <li class="fa fa-plus"></li> Gol
                                    </button>
                                  </div>

                                </td>
                              </tr>


                            </tbody>
                          </table>
                        </div>
                      </div>
                    </form>

                  </div>
                  <div id="step-2">

                    <form class="align-center">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3>Equipo A</h3></center>
                          </div>
                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead align="center">
                              <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th># Camiseta</th>
                                <th># Goles</th>
                                <th>Agregar</th>
                              </tr>
                            </thead>


                            <tbody>
                              <tr>
                                <td align="center">1</td>
                                <td align="center">Rodolfo Zelaya</td>
                                <td align="center">10</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">2</td>
                                <td align="center">Marvin Monterrosa</td>
                                <td align="center">6</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">3</td>
                                <td align="center">Narciso Orellana</td>
                                <td align="center">8</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">4</td>
                                <td align="center">Byan Tamacas</td>
                                <td align="center">3</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">5</td>
                                <td align="center">Oscar Maldonado</td>
                                <td align="center">1</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr>

                            </tbody>

                          </table>
                        </div>

                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3>Equipo B</h3></center>
                          </div>
                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead align="center">
                              <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th># Camiseta</th>
                                <th># Goles</th>
                                <th>Agregar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td align="center">1</td>
                                <td align="center">Xavier García</td>
                                <td align="center">2</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">2</td>
                                <td align="center">Kevin Carabantes</td>
                                <td align="center">1</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">3</td>
                                <td align="center">Diego Chávez</td>
                                <td align="center">5</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">4</td>
                                <td align="center">Marvin Ramos</td>
                                <td align="center">10</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr


                              >

                              <tr>
                                <td align="center">5</td>
                                <td align="center">William Canales</td>
                                <td align="center">8</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-falta" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-faltas">
                                      <li class="fa fa-plus"></li> Tarjeta
                                    </button>
                                  </div>

                                </td>
                              </tr>


                            </tbody>
                          </table>
                        </div>
                      </div>
                    </form>


                  </div>
                  <div id="step-3">
                    <form class="align-center">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3>Equipo A</h3></center>
                          </div>
                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead align="center">
                              <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th># Camiseta</th>
                                <th># Goles</th>
                                <th>Agregar</th>
                              </tr>
                            </thead>


                            <tbody>
                              <tr>
                                <td align="center">1</td>
                                <td align="center">Rodolfo Zelaya</td>
                                <td align="center">10</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">2</td>
                                <td align="center">Marvin Monterrosa</td>
                                <td align="center">6</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">3</td>
                                <td align="center">Narciso Orellana</td>
                                <td align="center">8</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">4</td>
                                <td align="center">Byan Tamacas</td>
                                <td align="center">3</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">5</td>
                                <td align="center">Oscar Maldonado</td>
                                <td align="center">1</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </div>

                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3>Equipo B</h3></center>
                          </div>
                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead align="center">
                              <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th># Camiseta</th>
                                <th># Goles</th>
                                <th>Agregar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td align="center">1</td>
                                <td align="center">Xavier García</td>
                                <td align="center">2</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">2</td>
                                <td align="center">Kevin Carabantes</td>
                                <td align="center">1</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">3</td>
                                <td align="center">Diego Chávez</td>
                                <td align="center">5</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">4</td>
                                <td align="center">Marvin Ramos</td>
                                <td align="center">10</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>

                              <tr>
                                <td align="center">5</td>
                                <td align="center">William Canales</td>
                                <td align="center">8</td>
                                <td align="center">0</td>
                                <td align="center">
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-round btn-cambio" lass="btn btn-round btn-success" data-toggle="modal" data-target=".bs-cambios">
                                      <li class="fa fa-plus"></li> Cambio
                                    </button>
                                  </div>

                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </form>



                </div>
              </div>

              <!-- Modal Goles -->
              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h6 class="modal-title" id="myModalLabel2">Registro de Goles</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="panel-body">
                        <div class="form-group">
                          <label class="col-form-label col-md-6 col-sm-6">Tipo<span class="required">*</span></label>
                          <input class="form-control"  type="textarea"  required='required'>
                        </div>
                      <div class="form-group">
                        <label class="col-form-label col-md-6 col-sm-6">Tiempo<span class="required">*</span></label>
                        <input class="form-control" class='time' type="time" name="time" required='required'>
                      </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                        <li class="fa fa-close cancelar"></li> Cancelar
                      </button>
                      <button type="button" class="btn btn-round btn-guardar">
                        <li class="fa fa-save"></li> Guardar
                      </button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- /Modal Goles -->

              <!-- /Modal Faltas -->
              <div class="modal fade bs-faltas" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h6 class="modal-title" id="myModalLabel2">Registro de Amonestaciosnes</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="panel-body">
                        <div class="form-group">
                          <label class="col-form-label col-md-3 col-sm-3">Tipo<span class="required">*</span></label>
                          <select class="form-control">
                            <option>~Seleccione~</option>
                            <option>Tarjeta Amarilla</option>
                            <option>Tarjeta Roja</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label class="col-form-label col-md-6 col-sm-6">Tiempo<span class="required">*</span></label>
                        <input class="form-control" class='time' type="time" name="time" required='required'>
                      </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                        <li class="fa fa-close cancelar"></li> Cancelar
                      </button>
                      <button type="button" class="btn btn-round btn-guardar">
                        <li class="fa fa-save"></li> Guardar
                      </button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- /Modal Faltas -->


              <!-- /Modal cambios -->
              <div class="modal fade bs-cambios" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h6 class="modal-title" id="myModalLabel2">Registro de cambios jugador</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="panel-body">
                        <div class="form-group">
                          <label class="col-form-label col-md-3 col-sm-3">Jugador<span class="required">*</span></label>
                          <select class="form-control">
                            <option>~Seleccione~</option>
                            <option>Mario Jacobo</option>
                            <option>Isaac Portillo</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label class="col-form-label col-md-6 col-sm-6">Tiempo<span class="required">*</span></label>
                        <input class="form-control" class='time' type="time" name="time" required='required'>
                      </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                        <li class="fa fa-close cancelar"></li> Cancelar
                      </button>
                      <button type="button" class="btn btn-round btn-guardar">
                        <li class="fa fa-save"></li> Guardar
                      </button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- /Modal Faltas -->


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
  <!-- jQuery Smart Wizard -->
  <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>
