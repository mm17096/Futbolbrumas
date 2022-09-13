<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Empleado</title>

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
                                <h2><i class="fa fa-group"></i> Datos Empleados</h2>

                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <button type="button" class="btn btn-round btn-guardar" data-toggle="modal" data-target=".bs-example-modal-lg"> Agregar Empleados</button>


                                <!-- MENSAJE DE ACCIONES -->
                                <?php
                                //$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";

                                if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'completo') {

                                    $_SESSION['action_success'] = null;
                                    unset($_SESSION['action_success']);
                                    $messages[] = "El registro se ha almacenado con éxito";
                                ?>
<<<<<<< HEAD
                                <div id="msjsuccess" class="alert alert-success" role="alert" style=" position: absolute;
                                                      right: 50px;
                                                      top: 0px;">
                                    <i class="fa fa-check"></i>
                                    <strong>Registro Almacenado</strong>
                                    <?php
=======
                                    <div class="alert alert-success" role="alert"  style="top: 0px;
                                                                                  margin-right: 64%;">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <i class="fa fa-check"></i>
                                        <strong>Registro Almacenado!</strong>
                                        <?php
>>>>>>> 25402d3774f90247d85a7ed8b5fe53398f2f487e
                                        foreach ($messages as $message) {
                                            echo $message;
                                        }
                                        ?>
                                    </div>
                                <?php
                                } else if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'modificado') {

                                    $_SESSION['action_success'] = null;
                                    unset($_SESSION['action_success']);
                                    $errors[] = "El registro se ha modificado con éxito";
                                ?>
<<<<<<< HEAD
                                <div id="msjerror" class="alert alert-info" role="alert" style=" position: absolute;
                                                       right: 50px;
                                                          top: 0px;">
                                    <i class="fa fa-info-circle"></i>
                                    <strong>Registro Modificado</strong>

                                    <?php
=======
                                    <div class="alert alert-info" role="alert"  style="top: 0px;
                                                                                  margin-right: 66%;">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <i class="fa fa-info-circle"></i>
                                        <strong>Registro Modificado!</strong>

                                        <?php
>>>>>>> 25402d3774f90247d85a7ed8b5fe53398f2f487e
                                        foreach ($errors as $error) {
                                            echo $error;
                                        }
                                        ?>
                                    </div>
                                <?php
                                } else if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'modificadobaja') {

                                    $_SESSION['action_success'] = null;
                                    unset($_SESSION['action_success']);
                                    $errors[] = "El registro se ha dado de baja con éxito";
                                ?>
<<<<<<< HEAD
                                <div id="msjerror" class="alert alert-ba" role="alert" style=" position: absolute;
                                                       right: 50px;
                                                          top: 0px;">
                                    <i class="fa fa-thumbs-o-down"></i>
                                    <strong>Registro Dado de Baja</strong>
                                    <?php
=======
                                    <div class="alert alert-info" role="alert" style="top: 0px;
                                                                                  margin-right: 60%;">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <i class="fa fa-exclamation-circle"></i>
                                        <strong>Registro Dado de Baja!</strong>
                                        <?php
>>>>>>> 25402d3774f90247d85a7ed8b5fe53398f2f487e
                                        foreach ($errors as $error) {
                                            echo $error;
                                        }
                                        ?>
                                    </div>
                                <?php
                                } else if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'modificadoalta') {

                                    $_SESSION['action_success'] = null;
                                    unset($_SESSION['action_success']);
                                    $errors[] = "El registro se ha dado de alta con éxito";
                                ?>
<<<<<<< HEAD
                                <div id="msjerror" class="alert alert-ba" role="alert" style=" position: absolute;
                                                       right: 50px;
                                                          top: 0px;">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <strong>Registro Dado de Alta</strong>
                                    <?php
=======
                                    <div class="alert alert-info" role="alert" style="top: 0px;
                                                                                  margin-right: 65%;">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <i class="fa fa-exclamation-circle"></i>
                                        <strong>Registro Dado de Alta!</strong>

                                        <?php
>>>>>>> 25402d3774f90247d85a7ed8b5fe53398f2f487e
                                        foreach ($errors as $error) {
                                            echo $error;
                                        }
                                        ?>
                                    </div>
                                <?php
<<<<<<< HEAD
                                }  else if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'error') {
=======
                                } else if (isset($_SESSION['action_success']) && $_SESSION['action_success'] == 'error') {
>>>>>>> 25402d3774f90247d85a7ed8b5fe53398f2f487e

                                    $_SESSION['action_success'] = null;
                                    unset($_SESSION['action_success']);
                                    $errors[] = "Error en algún proceso, no se completó la acción";
                                ?>
<<<<<<< HEAD
                                <div id="msjerror" class="alert alert-danger" role="alert" style=" position: absolute;
                                                       right: 50px;
                                                          top: 0px;">
                                    <i class="fa fa-close"></i>
                                    <strong>Error en el proceso</strong>
                                    <?php
=======
                                    <div class="alert alert-danger" role="alert"  style="top: 0px;
                                                                                  margin-right: 60%;">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <i class="fa fa-close"></i>
                                        <strong>Error en el proceso!</strong>
                                        <?php
>>>>>>> 25402d3774f90247d85a7ed8b5fe53398f2f487e
                                        foreach ($errors as $error) {
                                            echo $error;
                                        }
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- MENSAJE DE ACCIONES -->

                                <!-- MODAL AGREGAR-->
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" id="modalguardarE" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form method="POST" id="addEmpleado" name="addEmpleado">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Agregar Empleado</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">Nombre
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" minlength="5" maxlength="20" onblur="validarnombre()" onkeypress="return soloLetras(event)" pattern="[A-Z a-z]{1,20}" title="Formato solicitado: Letras Mayúsculas o Minúsculas" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombres" autocomplete="off" required>
                                                                    <span class="mensajenombre" style="display: none; color: orange;"><i class="fa fa-exclamation-triangle"></i>
                                                                        Debe completar los campos obligatorios</span>

                                                                    <input type="hidden" name="fullnombre" id="fullnombre">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">Apellido
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" onblur="validarapellido()" onkeypress="return soloLetras(event)" minlength="5" maxlength="20" pattern="[A-Z a-z]{1,20}" title="Formato solicitado: Letras Mayúsculas o Minúsculas" name="apellido" id="apellido" class="form-control" placeholder="Ingrese Apellidos" autocomplete="off" required>
                                                                    <span class="mensajeapellido" style="display: none; color: orange;">
                                                                        <i class="fa fa-exclamation-triangle"> </i>
                                                                        Debe completar los campos obligatorios</span>

                                                                    <input type="hidden" name="fullapellido" id="fullapellido">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">DUI
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" oninput="validacionDui()" onblur="validarDuifinal()" onkeypress="return soloNumeros(event)" minlength="10" maxlength="10" name="dui" id="dui" pattern="[0-9]{8}[_-][0-9]{1}" title="Formato solicitado: 00000000-0" class="form-control" placeholder="0000000-0" autocomplete="off" required>
                                                                    <span class="mensajedui" style="display: none; color: orange;">
                                                                        <i class="fa fa-exclamation-triangle"> </i>
                                                                        Digite correctamente el DUI</span>
                                                                    <span class="mensajeduiexiste" style="display: none; color: red;">
                                                                        El DUI ya está en uso</span>

                                                                    <input type="hidden" name="duivalidado" id="duivalidado">

                                                                    <input type="hidden" name="fulldui" id="fulldui">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">Correo
                                                                        <span class="required">*</span></label>
                                                                    <input type="email" onblur="validarcorreo()" minlength="15" maxlength="30" title="Formato solicitado: Debe ser un correo valido" name="correo" id="correo" class="form-control" placeholder="Ingrese Correo Electrónico" autocomplete="off" required>
                                                                    <span class="mensajecorreo" style="display: none; color: orange;">
                                                                        <i class="fa fa-exclamation-triangle">
                                                                        </i> Digite correctamente el Correo</span>
                                                                    <span class="mensajecorreoexiste" style="display: none; color: red;">
                                                                        El Correo ya está en uso</span>

                                                                    <input type="hidden" name="fullcorreo" id="fullcorreo">
                                                                </div>


                                                            </div>

                                                            <div class="col-lg-6">

                                                                <div class="form-group">
                                                                    <label form="sexo" class="col-form-label col-md-3 col-sm-3">Sexo<span class="required">*</span></label>
                                                                    <select name="sexo" id="sexo" class="form-control" onblur="validarsexo()" required>
                                                                        <option value="">~Seleccione~</option>
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Femenino">Femenino</option>
                                                                    </select>
                                                                    <span class="mensajesexo" style="display: none; color: orange;"><i class="fa fa-exclamation-triangle"> </i>
                                                                        Debe seleccionar sexo</span>

                                                                    <input type="hidden" name="fullsexo" id="fullsexo">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">
                                                                        Fecha de Nacimiento
                                                                        <span class="required">*</span></label>
                                                                    <input type="date" name="date" id="date" onblur="validarfecha()" title="Mayoría de edad requerida" class="form-control" placeholder="Ingrese Fecha de Nacimiento" autocomplete="off" required>
                                                                    <span class="mensajefecha" style="display: none; color: orange;"><i class="fa fa-exclamation-triangle"> </i>
                                                                        Debe ser mayor de edad</span>

                                                                    <input type="hidden" name="fulldate" id="fulldate">
                                                                </div>

                                                                <div class="form-group">
<<<<<<< HEAD
                                                                    <label form="tipo"
                                                                        class="col-form-label col-md-3 col-sm-3">Tipo<span
                                                                            class="required">*</span></label>
                                                                    <select name="tipo" id="tipo" class="form-control"
                                                                        onblur="validartipo()" required>
                                                                        <option value="">~Seleccione~</option>
                                                                        <option value="administrador">Administrador</option>
                                                                        <option value="empleado">Empleado</option>
                                                                    </select>
                                                                    <span class="mensajetipo"
                                                                        style="display: none; color: orange;"><i
                                                                            class="fa fa-exclamation-triangle"> </i>
                                                                        Debe seleccionar tipo</span>

                                                                    <input type="hidden" name="fulltipo" id="fulltipo">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label
                                                                        class="col-form-label col-md-6 col-sm-6">Teléfono
=======
                                                                    <label class="col-form-label col-md-6 col-sm-6">Teléfono
>>>>>>> 25402d3774f90247d85a7ed8b5fe53398f2f487e
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" oninput="validacionTelefono()" onblur="validarTelfinal()" onkeypress="return soloNumeros(event)" name="telefono" id="telefono" pattern="[0-9]{4}[_-][0-9]{4}" title="Formato solicitado: 0000-0000" maxlength="9" minlength="9" class="form-control" placeholder="0000-0000" autocomplete="off" required>
                                                                    <span class="mensajetel" style="display: none; color: orange;"> <i class="fa fa-exclamation-triangle">
                                                                        </i> Digite correctamente el Teléfono</span>

                                                                    <input type="hidden" name="telefonovalidado" id="telefonovalidado">

                                                                    <input type="hidden" name="fulltel" id="fulltel">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                                                        <li class="fa fa-close cancelar"></li> Cancelar
                                                    </button>
                                                    <button type="submit" disabled onclick="agregarEmpleado()" class="btn btn-round btn-guardar" id="btng" name="btng">
                                                        <li onclick="agregarEmpleado()" class="fa fa-save"></li>
                                                        Guardar
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- MODAL AGREGAR-->

                                <!-- MODAL EDITAR-->
                                <div id="modalmodificarE" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form method="POST" id="updateEmpleado" name="updateEmpleado">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Modificar Empleado
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">Nombre
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" onblur="validarnombreEdit()" onkeypress="return soloLetras(event)" minlength="5" maxlength="20" title="Formato solicitado: Letras Mayúsculas o Minúsculas" name="nombre_update" id="nombre_update" class="form-control" placeholder="Ingrese Nombres" autocomplete="off" required>
                                                                    <span class="mensajenombreedit" style="display: none; color: orange;"><i class="fa
                                                                        fa-exclamation-triangle">
                                                                        </i> Debe completar los campos
                                                                        obligatorios</span>

                                                                    <input type="hidden" name="fullnombreedit" id="fullnombreedit">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">Apellido
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" onblur="validarapellidoEdit()" onkeypress="return soloLetras(event)" minlength="5" maxlength="20" title="Formato solicitado: Letras Mayúsculas o Minúsculas" name="apellido_update" id="apellido_update" class="form-control" placeholder="Ingrese Apellidos" autocomplete="off" required>
                                                                    <span class="mensajeapellidoedit" style="display: none; color: orange;">
                                                                        <i class="fa fa-exclamation-triangle">
                                                                        </i> Debe completar los campos
                                                                        obligatorios</span>

                                                                    <input type="hidden" name="fullapellidoedit" id="fullapellidoedit">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">DUI
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" oninput="validacionDuiEdit()" onblur="validarDuifinalEdit()" onkeypress="return soloNumeros(event)" name="dui_update" id="dui_update" pattern="[0-9]{8}[_-][0-9]{1}" title="Formato solicitado: 00000000-0" maxlength="10" minlength="10" class="form-control" placeholder="0000000-0" autocomplete="off" required>
                                                                    <span class="mensajeduiedit" style="display: none; color: orange;"><i class="fa fa-exclamation-triangle">
                                                                        </i> Digite correctamente el DUI</span>
                                                                    <span class="mensajeduiexisteedit" style="display: none; color: red;">
                                                                        El DUI ya esta en uso</span>

                                                                    <input type="hidden" name="duivalidado_update" id="duivalidado_update">

                                                                    <input type="hidden" name="duiactedit" id="duiactedit">

                                                                    <input type="hidden" name="fullduiedit" id="fullduiedit">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label form="tipo_update"
                                                                        class="col-form-label col-md-3 col-sm-3">Tipo<span
                                                                            class="required">*</span></label>
                                                                    <select name="tipo_update" id="tipo_update" class="form-control"
                                                                        onblur="validartipoEdit()" required>
                                                                        <option value="">~Seleccione~</option>
                                                                        <option value="administrador">Administrador</option>
                                                                        <option value="empleado">Empleado</option>
                                                                    </select>
                                                                    <span class="mensajetipoedit"
                                                                        style="display: none; color: orange;"><i
                                                                            class="fa fa-exclamation-triangle"> </i>
                                                                        Debe seleccionar tipo</span>

                                                                    <input type="hidden" name="fulltipoedit" id="fulltipoedit">
                                                                </div>


                                                            </div>

                                                            <div class="col-lg-6">

                                                                <div class="form-group">
                                                                    <label form="sexo" class="col-form-label col-md-3 col-sm-3">Sexo<span class="required">*</span></label>
                                                                    <select name="sexo_update" id="sexo_update" onblur="validarsexoEdit()" class="form-control" required>
                                                                        <option value="">~Seleccione~</option>
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Femenino">Femenino</option>
                                                                    </select>
                                                                    <span class="mensajesexoedit" style="display: none; color: orange;"><i class="fa fa-exclamation-triangle">
                                                                        </i> Debe seleccionar sexo</span>

                                                                    <input type="hidden" name="fullsexoedit" id="fullsexoedit">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">
                                                                        Fecha de Nacimiento
                                                                        <span class="required">*</span></label>
                                                                    <input type="date" name="date_update" onblur="validarfechaEdit()" id="date_update" class="form-control" placeholder="Ingrese Fecha de Nacimiento" autocomplete="off" required>
                                                                    <span class="mensajefechaedit" style="display: none; color: orange;"><i class="fa fa-exclamation-triangle">
                                                                        </i> Debe ser mayor de edad</span>

                                                                    <input type="hidden" name="fulldateedit" id="fulldateedit">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="col-form-label col-md-6 col-sm-6">Teléfono
                                                                        <span class="required">*</span></label>
                                                                    <input type="text" oninput="validacionTelefonoEdit()" onblur="validarTelfinalEdit()" onkeypress="return soloNumeros(event)" name="telefono_update" id="telefono_update" pattern="[0-9]{4}[_-][0-9]{4}" title="Formato solicitado: 0000-0000" maxlength="9" minlength="9" class="form-control" placeholder="0000-0000" autocomplete="off" required>
                                                                    <span class="mensajeteledit" style="display: none; color: orange;"><i class="fa fa-exclamation-triangle">
                                                                        </i> Digite correctamente el Teléfono</span>

                                                                    <input type="hidden" name="telefonovalidado_update" id="telefonovalidado_update">

                                                                    <input type="hidden" name="fullteledit" id="fullteledit">
                                                                </div>

                                                                <input type="hidden" name="estado" id="estado">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                                                        <li class="fa fa-close cancelar"></li> Cancelar
                                                    </button>
                                                    <button type="submit" disabled onclick="modificarEmpleado()" class="btn btn-round btn-guardar" id="btngedit" name="btngedit">
                                                        <li onclick="modificarEmpleado()" class="fa fa-edit"></li>
                                                        Actualizar Datos
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- MODAL EDITAR-->

                                <!-- MODAL DE BAJA-->

                                <div id="DeBajaEmpleado" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form name="bajaEmpleado" id="bajaEmpleado">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Dar de Baja a Empleado</h4>

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>

                                                <div class="modal-body">
<<<<<<< HEAD
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <input type="hidden" name="desactivar_idequipo"
                                                                id="desactivar_idequipo">
                                                            <h2 for="">¿Seguro que quieres dar de baja a este registro?
                                                            </h2>
                                                            <div>Esta acción se puede deshacer</div>
=======
                                                    <p>¿Seguro que desea dar de baja a este registro?</p>
                                                    <p><small>Esta acción se puede deshacer.</small></p>
                                                    <!--Variable a donde se guardara id a eliminar-->
                                                    <input type="hidden" name="dui_baja" id="dui_baja">
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <button id="cancelar" name="cancelar" type="button" data-dismiss="modal" class="btn btn btn-round  btn-cancelar"><span class="fa fa-close"></span>
                                                                Cancelar</button>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button type="submit" onclick="debajaEmpleado()" class="btn btn-round btn-guardar"><span class="fa fa-thumbs-o-down"></span>
                                                                Dar de Baja</button>
>>>>>>> 25402d3774f90247d85a7ed8b5fe53398f2f487e
                                                        </div>

                                                    </div>
                                                </div>

                                                <input type="hidden" name="dui_baja" id="dui_baja">

                                                <div class="modal-footer text-center">

                                                    <button id="cancelar" name="cancelar" type="button"
                                                        data-dismiss="modal"
                                                        class="btn btn btn-round  btn-cancelar"><span
                                                            class="fa fa-close"></span>
                                                        Cancelar</button>

                                                    <button type="submit" onclick="debajaEmpleado()"
                                                        class="btn btn-round btn-guardar"><span
                                                            class="fa fa-thumbs-o-down"></span>
                                                        Dar de Baja</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- MODAL DE BAJA-->

                                <!-- MODAL DE ALTA-->

                                <div id="DeAltaEmpleado" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form name="altaEmpleado" id="altaEmpleado">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Dar de Alta a Empleado</h4>

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>

                                                <div class="modal-body">
<<<<<<< HEAD
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <input type="hidden" name="desactivar_idequipo"
                                                                id="desactivar_idequipo">
                                                            <h2 for="">¿Seguro que quieres dar de baja a este registro?
                                                            </h2>
                                                            <div>Esta acción se puede deshacer</div>
=======
                                                    <p>¿Seguro que desea dar de alta a este registro?</p>
                                                    <p><small>Esta acción se puede deshacer.</small></p>
                                                    <!--Variable a donde se guardara id a eliminar-->
                                                    <input type="hidden" name="dui_alta" id="dui_alta">
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <button id="cancelar" name="cancelar" type="button" data-dismiss="modal" class="btn btn btn-round  btn-cancelar"><span class="fa fa-close"></span>
                                                                Cancelar</button>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button type="submit" onclick="dealtaEmpleado()" class="btn btn-round btn-guardar"><span class="fa fa-thumbs-o-up"></span>
                                                                Dar de Alta</button>
>>>>>>> 25402d3774f90247d85a7ed8b5fe53398f2f487e
                                                        </div>

                                                    </div>
                                                </div>

                                                <input type="hidden" name="dui_alta" id="dui_alta">

                                                <div class="modal-footer text-center">

                                                    <button id="cancelar" name="cancelar" type="button"
                                                        data-dismiss="modal"
                                                        class="btn btn btn-round  btn-cancelar"><span
                                                            class="fa fa-close"></span>
                                                        Cancelar</button>

                                                    <button type="submit" onclick="dealtaEmpleado()"
                                                        class="btn btn-round btn-guardar"><span
                                                            class="fa fa-thumbs-o-up"></span>
                                                        Dar de Alta</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- MODAL DE ALTA-->

                                <!--TABLA-->

                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">

                                                <div id="tablaempleado">

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
        </div>
        <!-- Pied de  Pagina -->
        <?php require_once('pie.php'); ?>
        <!-- /Pie de Pagina -->
    </div>

    <!-- Validaciones y Metodos-->
    <script src="../scripts/empleado/empleado.js" type="text/javascript" charset="utf-8"></script>
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

    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</body>

</html>