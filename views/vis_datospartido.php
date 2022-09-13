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

  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
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


      <?php

            include_once ("../dao/DaoPartido.php");
            include_once ("../dao/DaoEquipo.php");
            include_once ("../dao/DaoJugador.php");
            $id=$_REQUEST["idpartido"];
            $dao=new DaoEquipo();
            $daoE=new DaoPartido();
            $fila=$daoE->DatosPartido($id);
            $Idpartido =0;
            $idequipoa =0;
            $idequipob =0;


            foreach($fila as $key=>$value){
               $idpartido = $value->getIdPartido();
               $idequipoa = $value->getEquipoa();
               $idequipob = $value->getEquipob();
            }

            $filas=null;
            $filasb=null;
            $daoJ="";
            $daoJ=new DaoJugador();
            $filasb=$daoJ->listaDejugadoresEquipotabla($idequipob);

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
                <!-- modal agregar -->
                <div class="col-sm-6">
                <div class="col-xs-70">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                    <div id="resultados"></div>
                  </div>
                  <div class="col-xs-1"></div>
                </div>
                </div>
                  <?php $validar=1 ?>
                  <input type="hidden"  id="idpartido" name="idpartido" value="<?php echo $idpartido; ?>" />
                  <input type="hidden"  id="equipoa" name="equipoa" value="<?php echo $idequipoa; ?>" />
                  <input type="hidden"  id="equipob" name="equipob" value="<?php echo $idequipob; ?>" />

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
                            <center><h3><?php echo $dao->ObtenerNombreEquipo($idequipoa); ?></h3></center>
                          </div>
                          <div id="idequipoa"></div>
                        </div>

                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3><?php echo $dao->ObtenerNombreEquipo($idequipob); ?></h3></center>
                          </div>
                        <div id="idequipob"></div>

                        <?php
                        if ($validar==1) {
                        for ($i=0; $i <8 ; $i++) {
                          ?>
                          <br>
                          <br>
                        <?php
                        }
                    }
                          ?>
                        </div>
                      </div>
                    </form>
                  </div>


                  <div id="step-2">

                    <form class="align-center">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3><?php echo $dao->ObtenerNombreEquipo($idequipoa); ?></h3></center>
                          </div>
                          <div id="idequipofaltaa"></div>
                        </div>
                          <?php $validar=0; ?>
                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3><?php echo $dao->ObtenerNombreEquipo($idequipob); ?></h3></center>
                          </div>
                          <div id="idequipofaltab"></div>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div id="step-3">
                    <form class="align-center">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3><?php echo $dao->ObtenerNombreEquipo($idequipoa); ?></h3></center>
                          </div>
                          <div id="idequipocambioa"></div>
                        </div>

                        <div class="col-md-6">
                          <div class="x_title">
                            <center><h3><?php echo $dao->ObtenerNombreEquipo($idequipob); ?></h3></center>
                          </div>
                          <div id="idequipocambiob"></div>
                        </div>
                      </div>
                    </form>
                </div>

              </div>
<div class="col-sm-12">
  <div class="col-lg-12">
              <div align="center" style="height: : -100%;" style="top: 40px; left: 40px;"  >
              <button type="button" class="btn btn-round btn-guardar" data-toggle="modal" data-target="#modalFinalizar"><li class="fa fa-check-circle-o"></li> Finalizar</button>
              </div>
  </div>
</div>



              <!-- Modal Goles -->
              <div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalGol" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <form  method="POST" id="addGol" name="addGol">
                    <div class="modal-header">
                      <h6 class="modal-title" id="myModalLabel2">Registro de Goles</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="panel-body">
                        <input type="hidden"  id="idpartidogol" name="idpartidogol"/>
                        <input type="hidden"  id="idjugadorgol" name="idjugadorgol"/>

                        <div class="form-group">
                          <label class="col-form-label col-md-3 col-sm-3">Tipo<span class="required">*</span></label>
                          <select class="form-control" id="tipo_gol" name="tipo_gol" required >
                            <option value="">~Seleccione~</option>
                            <option value="Penal">Penal</option>
                            <option value="Jugada">Jugada</option>
                            <option value="Tiro libre">Tiro libre</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label class="col-form-label col-md-6 col-sm-6">Tiempo<span class="required">*</span></label>
                        <input class="form-control" class='time' type="time" id="tiempo" name="tiempo" value="00:00" min="00:01" max="00:40" required='required'>
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

              <!-- /Modal Goles -->

              <!-- /Modal Faltas -->
              <div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalFalta" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <form  method="POST" id="addFalta" name="addFalta">
                    <div class="modal-header">
                      <h6 class="modal-title" id="myModalLabel2">Registro de Amonestaciosnes</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden"  id="idpartidofalta" name="idpartidofalta"/>
                      <input type="hidden"  id="idjugadorfalta" name="idjugadorfalta"/>
                      <div class="panel-body">
                        <div class="form-group">
                          <label class="col-form-label col-md-3 col-sm-3">Tipo<span class="required">*</span></label>
                          <select class="form-control" id="tipo_falta" name="tipo_falta" required>
                            <option value="">~Seleccione~</option>
                            <option value="Tarjeta Roja">Tarjeta Roja</option>
                            <option value="Tarjeta Amarilla">Tarjeta Amarilla</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label class="col-form-label col-md-6 col-sm-6">Tiempo<span class="required">*</span></label>
                        <input class="form-control" class='time' type="time" id="tiempo_falta" name="tiempo_falta" value="00:00" min="00:01" max="00:40" required='required'>
                      </div>
                      <div class="form-group">
                      <label class="col-form-label col-md-6 col-sm-6">Descripción<span class="required"></span></label>
                      <textarea class="form-control"  id="descripcion" name="descripcion"  placeholder="Descripción de falta" autocomplete="off"></textarea>
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
              <!-- /Modal Faltas -->


              <!-- /Modal cambios -->
              <div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalCambioA" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <form  method="POST" id="addCambioA" name="addCambioA">
                    <div class="modal-header">
                      <h6 class="modal-title" id="myModalLabel2">Registro de cambios jugador</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden"  id="idjugadorcambioa" name="idjugadorcambioa"/>
                      <input type="hidden"  id="idpartidocambioa" name="idpartidocambioa"/>
                      <div class="panel-body" id="refrescarA">
                        <div class="form-group">
                          <label class="col-form-label col-md-3 col-sm-3">Jugador<span class="required">*</span></label>
                          <select class="form-control" id="jugadorcambioa" name="jugadorcambioa" required>
                            <option value="">~Seleccione~</option>
                            <?php
                            $filas=null;
                            $daoJ="";
                            $daoJ=new DaoJugador();

                            $filas=$daoJ->listaDejugadoresEquipotabla($idequipoa);
                            foreach($filas as $key=>$values){
                                  if($values->getTitular()== false){
                           ?>
                           <option value="<?php  echo $values->getIdjugador(); ?>">
                               <?php  echo $values->getNombre()." ".$values->getApellido(); ?></option>
                           <?php
                          }
                          }
                          ?>
                          </select>
                        </div>
                      <div class="form-group">
                        <label class="col-form-label col-md-6 col-sm-6">Tiempo<span class="required">*</span></label>
                        <input class="form-control" class='time' type="time" id="tiempo_cambioa" name="tiempo_cambioa" value="00:00" min="00:01" max="00:40" required='required'>
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


              <div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalCambioB" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <form  method="POST" id="addCambioB" name="addCambioB">
                    <div class="modal-header">
                      <h6 class="modal-title" id="myModalLabel2">Registro de cambios jugador</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body" id="refrescarB">
                      <input type="hidden"  id="idpartidocambiob" name="idpartidocambiob"/>
                      <input type="hidden"  id="idjugadorcambiob" name="idjugadorcambiob"/>
                      <div class="panel-body">
                        <div class="form-group">
                          <label class="col-form-label col-md-3 col-sm-3">Jugador<span class="required">*</span></label>
                          <select class="form-control" id="jugadorcambiob" name="jugadorcambiob" required >
                            <option value="">~Seleccione~</option>
                            <?php


                            foreach($filasb as $key=>$values){
                                  if($values->getTitular()== false){
                           ?>
                           <option value="<?php  echo $values->getIdjugador(); ?>">
                               <?php  echo $values->getNombre()." ".$values->getApellido(); ?></option>
                           <?php
                          }
                          }
                          ?>
                          </select>
                        </div>
                      <div class="form-group">
                        <label class="col-form-label col-md-6 col-sm-6">Tiempo<span class="required">*</span></label>
                        <input class="form-control" class='time' type="time" id="tiempo_cambiob" name="tiempo_cambiob" value="00:00" min="00:01" max="00:40" required='required'>
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
              <!-- /Modal cambios -->


              <!-- Modal titular -->
                          <div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalTitulares" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <form class="" method="POST" id="addTitular" name="addTitular">
                                  <div class="modal-header">
                                    <h6 class="modal-title" id="myModalLabel">Titulares</h6>

                                  </div>
                                  <div class="modal-body">
                                    <div class="panel-body">
                                      <div class="row">

                                        <div class="col-lg-6">
                                          <div class="x_title">
                                            <center><h4><?php echo $dao->ObtenerNombreEquipo($idequipoa); ?></h4></center>
                                          </div>

                                      <table class="table table-striped projects">
                                        <thead>
                                          <tr>
                                            <th style="width: 1%">N°</th>
                                            <th style="width: 55%">Jugador</th>
                                            <th>Posición</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          include_once ("../dao/DaoJugador.php");
                                          $daoJ=new DaoJugador();
                                          $fila=$daoJ->listaDejugadoresEquipotabla($idequipoa);
                                          $conta=0;
                                          foreach($fila as $key=>$value){
                                            if ($value->getEstado()) {

                                            $conta=$conta+1;
                                          ?>

                                            <tr>
                                              <td><?php echo $conta; ?></td>
                                              <td>
                                            <div class="checkbox">
                                            <label class="">
                                              <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox"  value="<?php echo $value->getIdjugador(); ?>" id="idjugadora<?php echo $conta; ?>" name="idjugadora<?php echo $conta; ?>" <?php echo ($value->getCancha()) ? 'checked' : ''; ?> style="position: absolute; opacity: 0;" class="flat" ><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                              </div>
                                              <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> <?php  echo $value->getNombre()." ".$value->getApellido();?></font>
                                            </label>
                                          </div>
                                          </td>
                                          <td>
                                            <a><?php echo $value->getPosicion()?></a>
                                          </td>

                                          <?php } ?>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                  </table>

                                            <input type="hidden"  id="conta" name="conta" value="<?php echo $conta; ?>"/>
                                        </div>

                                        <div class="col-lg-6">
                                          <div class="x_title">
                                            <center><h4><?php echo $dao->ObtenerNombreEquipo($idequipob); ?></h4></center>
                                          </div>
                                          <table class="table table-striped projects">
                                            <thead>
                                              <tr>
                                                <th style="width: 1%">N°</th>
                                                <th style="width: 55%">Jugador</th>
                                                <th>Posición</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                          <?php
                                          include_once ("../dao/DaoJugador.php");
                                          $daoJ=new DaoJugador();
                                          $fila=$daoJ->listaDejugadoresEquipotabla($idequipob);
                                          $contb=0;
                                          foreach($fila as $key=>$value){
                                            if ($value->getEstado()) {
                                                $contb=  $contb+1;
                                          ?>

                                            <tr>
                                              <td><?php echo $contb; ?></td>
                                              <td>
                                                <div class="checkbox">
                                                  <label class="">
                                                    <div class="icheckbox_flat-green" style="position: relative;">
                                                      <input type="checkbox" value="<?php echo $value->getIdjugador(); ?>" id="idjugadorb<?php echo $contb; ?>" <?php echo ($value->getCancha()) ? 'checked' : ''; ?> name="idjugadorb<?php echo $contb;?>" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <font _mstmutation="1" _msthash="4927143" _msttexthash="202267"> <?php  echo $value->getNombre()." ".$value->getApellido();?></font>
                                                  </label>
                                                </div>
                                              </td>
                                        <td>
                                          <a><?php echo $value->getPosicion()?></a>
                                        </td>
                                      <?php } ?>
                                    </tr>
                                     <?php } ?>
                                   </tbody>
                                 </table>

                                      <input type="hidden"  id="contb" name="contb" value="<?php echo $contb; ?>"/>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-round btn-guardar" id="btnadd" name="btnadd">
                                      <li class="fa fa-save"></li> Guardar
                                    </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

              <!-- Modal Finalizar-->
                          <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modalFinalizar">
                            <div class="modal-dialog modal-lg-6">
                              <div class="modal-content">
                                <form  method="POST" id="addFin" action="addFin">
                                  <div class="modal-header">
                                    <h6 class="modal-title" id="myModalLabel">Finalizar registro partido</h6>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="panel-body">
                                      <input type="hidden"  id="idpartidofin" name="idpartidofin" value="<?php echo $idpartido; ?>" />
                                      <input type="hidden"  id="equipoafin" name="equipoafin" value="<?php echo $idequipoa; ?>" />
                                      <input type="hidden"  id="equipobfin" name="equipobfin" value="<?php echo $idequipob; ?>" />

                                      <div class="row">
                                        <input type="hidden" name="delete_ida" id="delete_ida">
                                        <h4 for="">¿Seguro que quiere dar por finalizado el registro de datos?</h4>
                                        <div>Esta acción no se puede deshacer</div>
                                      </div>

                                    </div>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                                      <li class="fa fa-close cancelar"></li> Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-round btn-guardar">
                                      <li class="fa fa-thumbs-o-up"></li> Aceptar
                                    </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>


                          <!-- /Modal borrar goles -->
                          <div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalBorrar" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <form  method="POST" id="addCambioB" name="addCambioB">
                                <div class="modal-header">
                                  <h6 class="modal-title" id="myModalLabel2">Eliminar gol</h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden"  id="idpartidoborrar" name="idpartidoborrar"/>
                                  <input type="hidden"  id="idjugadorborrar" name="idjugadorborrar"/>
                                  <div class="panel-body">
                                    <div id="borrargoles">  </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                                    <li class="fa fa-close cancelar"></li> Cancelar
                                  </button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>

                          <!-- /Modal borrar faltas -->
                          <div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalBorrarFalta" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <form  method="POST" id="addCambioB" name="addCambioB">
                                <div class="modal-header">
                                  <h6 class="modal-title" id="myModalLabel2">Eliminar falta</h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden"  id="idpartidoborrarfalta" name="idpartidoborrarfalta"/>
                                  <input type="hidden"  id="idjugadorborrarfalta" name="idjugadorborrarfalta"/>
                                  <div class="panel-body">
                                    <div id="borrarfaltas">  </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                                    <li class="fa fa-close cancelar"></li> Cancelar
                                  </button>
                                </div>
                              </form>
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
  <!-- jQuery Smart Wizard -->
  <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
  <script src="../scripts/partido/partido.js"></script>


  <script src="../scripts/goles/goles.js"></script>
  <script src="../scripts/falta/falta.js"></script>
  <script src="../scripts/Cambios/cambios.js"></script>
  <script src="../scripts/partido/partido.js"></script>

</body>

</html>

<?php

include_once ("../dao/DaoJugador.php");
$daoJ=new DaoJugador();
$filax=$daoJ->listaDejugadoresEquipotabla($idequipoa);
$x=0;
foreach($filax as $key=>$values){
  if ($values->getTitular()) {
      $x=$x+1;
  }
}
include_once ("../dao/DaoJugador.php");
$daoJ=new DaoJugador();
$filas=$daoJ->listaDejugadoresEquipotabla($idequipob);
$B=0;
foreach($filas as $key=>$values){
  if ($values->getTitular()== true) {
      $B=$B+1;
  }
}


if ($x < 3 || $B < 3) {
  ?>

  <script type="text/javascript">
$(function(){

  $('#modalTitulares').modal({backdrop: 'static', keyboard: false});

});

</script>

<?php
}
?>
