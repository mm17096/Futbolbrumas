<!DOCTYPE html>
<html lang="en">
    <head> <!--encabezado-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jugadores</title>

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

    </head><!--FIN de encabezado-->
    <body  class="nav-md">
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
                                        <h2><li class="fa fa-group">
                                            Datos de Jugadores
                                        </li></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content"><!-- buxo con esto -->
                                        <button type="button" class="btn btn-round btn-guardar" data-toggle="modal" data-target=".bs-example-modal-lg">Agregar Jugador</button>
                                    </div><!-- buxo con esto aqui se cierra -->

                                    <!--Respuesta JS-->
                                    <div class="col-xs-70">
                                        <div class="col-xs-1"></div>
                                        <div class="col-xs-10">
                                            <div id="resultados"></div>
                                        </div>
                                        <div class="col-xs-1"></div>
                                    </div>
                                    <!--Fin Respuesta JS-->
                                    <!--Iniciotabla-->
                                    <div class="x_content">
                                        <div class="row"></div>
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <div id="jugadortabla">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Fin Iniciotabla-->
                                    <!--INICIA modal agregar un NUEVO JUGADOR-->
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalJ"  aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form class="" action="" method="post" id="addJugador" name="addJugador" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Jugadores</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel-body">
                                                            <div class="row">

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="nombre" class="col-form-label col-md-6 col-sm-6">Nombres<span class="required">*</span></label>
                                                                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese nombres del Jugador"  minlength="5" maxlength="25" onblur="validarnombre()" onkeypress="return soloLetras(event)" autocomplete="off">
                                                                        <span class="mensajenombre"
                                                                        style="display: none; color: orange;"><i
                                                                            class="fa fa-exclamation-triangle"></i>
                                                                        Debe completar los campos obligatorios</span>
                                                                        <input type="hidden" name="fullnombre" id="fullnombre">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="apellido" class="col-form-label col-md-6 col-sm-6">Apellidos<span class="required">*</span></label>
                                                                        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingrese apellidos del Jugador"  onblur="validarapellido()" onkeypress="return soloLetras(event)" minlength="5" maxlength="25">
                                                                        <span class="mensajeapellido"
                                                                        style="display: none; color: orange;">
                                                                        <i class="fa fa-exclamation-triangle"> </i>
                                                                        Debe completar los campos obligatorios</span>

                                                                        <input type="hidden" name="fullapellido" id="fullapellido">
                                                                    </div>

                                                                    <div class="form-group">
                                                                  
                                                                        <label for="fechanacimiento" class="col-form-label col-md-10 col-sm-6">Fecha de Nacimiento<span class="required">*</span></label>
                                                                        <input  type="date" class="form-control" id="fechanacimiento" name="fechanacimiento"  placeholder=""  onblur="validarfecha()" autocomplete="off" >
                                                                        <div class="mensajefecha"
                                                                            style="display: none; color: orange;">
                                                                            <i class="fa fa-exclamation-triangle">
                                                                                Debe ser mayor de 13 años
                                                                            </i>
                                                                            <input type="hidden" name="fullfechanacimiento" id="fullfechanacimiento">
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                <div class="form-group">
                                                                        <label for="idequipo" class="col-form-label col-md-3 col-sm-9">Equipo<span class="required">*</span></label>
                                                                        <select id="idequipo" name="idequipo" class="form-control" onclick="abilitarcamisa()"  onblur="validarequipo()">
                                                                            <option value="">seleccione una opcion</option>
                                                                            <?php
                                                                            $daoE=new DaoEquipo();
                                                                            $fila=$daoE->listaEquipo();
                                                                            foreach($fila as $key=>$value){                                                                        
                                                                            ?>
                                                                            <option value="<?php  echo $value->getIdequipo(); ?>">
                                                                            <?php  echo $value->getNombre(); ?> </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <span class="mensajequipo"
                                                                        style="display: none; color: orange;"><i
                                                                            class="fa fa-exclamation-triangle"> </i>
                                                                        Debe seleccionar un equipo</span>

                                                                    <input type="hidden" name="fullequipo" id="fullequipo">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="numero_camisa" class="col-form-label col-md-10 col-sm-6">Número  de camisa<span class="required">*</span></label>
                                                                        <input disabled id="numero_camisa" name="numero_camisa" onblur="validarnumero()" Type="number" value="" class="form-control" placeholder="Ingrese número  de camisa"  min="1" max="30">                                                                    
                                                                        <div class="mensajenuemro" style="display: none; color: orange;">
                                                                            <i class="fa fa-exclamation-triangle">
                                                                              El numero de camisa ya fue asignado
                                                                            </i>
                                                                            <input type="hidden" name="fullnumerocamisa" id="fullnumerocamisa">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="posicion" class="col-form-label col-md-3 col-sm-9">Posición<span class="required">*</span></label>
                                                                        <select id="posicion" name="posicion" class="form-control"  onblur="validarposicion()">
                                                                            <option value="">seleccione una opcion</option>
                                                                            <option>Delantero</option>
                                                                            <option>Defensa</option>
                                                                            <option>Media</option>
                                                                            <option>Portero</option>
                                                                        </select>
                                                                        <span class="mensajeposicion"
                                                                        style="display: none; color: orange;"><i
                                                                        class="fa fa-exclamation-triangle"> </i>
                                                                        Debe seleccionar posicion del jugador</span>

                                                                        <input type="hidden" name="fullposicion" id="fullposicion">
                                                                    </div>

                                                                   

                                                                    
                                                                </div>


                                                            </div>
                                                            

                                                        </div>
                                                        

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="reset" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                                                            <li class="fa fa-close cancelar"></li>Cancelar
                                                        </button>
                                                        <button type="submit" class="btn btn-round btn-guardar" id="btnn" disabled onclick="agregarJugador()">
                                                            <li   class="fa fa-save" ></li>Guardar
                                                        </button>                                                       
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--TERMINA modal agregar un NUEVO JUGADOR-->

                                    <!--INICIA modal modificar JUGADOR-->
                                    <div class="modal fade bs-example-modal-lg"  id="editJugadorModal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form method="post" name="editJugador" id="editJugador">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Editar Jugador</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <!--Imput de ID-->
                                                    <input type="hidden" name="id_edit" id="id_edit">
                                                    <div class="modal-body">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                


                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="nombre" class="col-form-label col-md-6 col-sm-6">Nombres<span class="required">*</span></label>
                                                                        <input  type="text" id="nombreedit" name="nombreedit"  required="required" class="form-control" onkeypress="return soloLetras(event)"
                                                                        minlength="5" maxlength="25" onblur="validarnombreEdit()" autocomplete="off">
                                                                        <span class="mensajenombreedit" style="display: none; color: orange;">
                                                                        <i class="fa fa-exclamation-triangle"></i> Debe completar los campos obligatorios</span>

                                                                        <input type="hidden" name="fullnombreedit" id="fullnombreedit">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="apellido" class="col-form-label col-md-6 col-sm-6">Apellidos<span class="required">*</span></label>
                                                                        <input type="text" id="apellidoedit" name="apellidoedit" class="form-control"  required="required" onkeypress="return soloLetras(event)"
                                                                        minlength="5" maxlength="25" onblur="validarapellidoEdit()" autocomplete="off">
                                                                        <span class="mensajeapellidoedit" style="display: none; color: orange;">
                                                                        <i class="fa fa-exclamation-triangle"></i> Debe completar los campos obligatorios</span>

                                                                        <input type="hidden" name="fullapellidoedit" id="fullapellidoedit">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="fechanacimiento" class="col-form-label col-md-10 col-sm-6">Fecha de Nacimiento<span class="required">*</span></label>
                                                                        <input  type="date" class="form-control" id="fechanacimientoedit" name="fechanacimientoedit" required="required" onblur="validarfechaEdit()" autocomplete="off" >
                                                                        <div class="mensajefechaEdit"
                                                                            style="display: none; color: orange;">
                                                                            <i class="fa fa-exclamation-triangle">
                                                                                Debe ser mayor de 13 años</i>
                                                                                <input type="hidden" name="fullfechaedit" id="fullfechaedit">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="idequipo" class="col-form-label col-md-3 col-sm-9">Equipo<span class="required">*</span></label>
                                                                        <select id="equipoedit" name="equipoedit" class="form-control" required="required" onclick="abilitarcamisaEdit()" onblur="validarequipoEdit()">
                                                                            <option value="">seleccione una opcion</option>
                                                                            <?php
                                                                            $daoE=new DaoEquipo();
                                                                            $fila=$daoE->listaEquipo();
                                                                            foreach($fila as $key=>$value){                                                                        
                                                                            ?>
                                                                            <option value="<?php  echo $value->getIdequipo(); ?>">
                                                                            <?php  echo $value->getNombre(); ?> </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <span class="mensajeequipoedit" style="display: none; color: orange;">
                                                                        <i class="fa fa-exclamation-triangle"></i>Debe seleccionar un equipo</span>

                                                                        <input type="hidden" name="fullequipoedit" id="fullequipoedit">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="numero_camisa" class="col-form-label col-md-10 col-sm-6">Número  de camisa<span class="required">*</span></label>
                                                                        <input  enabled id="numerocamisaedit" onblur="validarnumeroEdit()" id="numerocamisaedit" name="numerocamisaedit" Type="number" value="" class="form-control"  required="required" min="1" max="30">                                                                    
                                                                        <span class="mensajenumerocamisaedit" style="display: none; color: orange;">
                                                                            <i class="fa fa-exclamation-triangle">
                                                                              El numero de camisa ya existe!
                                                                            </i>
                                                                        </span>
                                                                        <input type="hidden" name="fullnumerocamisaedit" id="fullnumerocamisaedit">
                                                                    </div>

                                                                    <div class="form-group">
                                                                            <label for="posicion" class="col-form-label col-md-3 col-sm-9">Posición<span class="required">*</span></label>
                                                                        <select id="posicionedit" name="posicionedit" class="form-control" required="required" onblur="validarposicionEdit()">
                                                                            <option value="">seleccione una opcion</option>
                                                                            <option>Delantero</option>
                                                                            <option>Defensa</option>
                                                                            <option>Media</option>
                                                                            <option>Portero</option>
                                                                        </select>
                                                                        <span class="mensajeposicionedit" style="display: none; color: orange;">
                                                                            <i class="fa fa-exclamation-triangle">
                                                                              Debe seleccionar posicion del jugador
                                                                            </i>
                                                                        </span>
                                                                        <input type="hidden" name="fullposicionedit" id="fullposicionedit">
                                                                    </div>

                                                                    
                                                                </div>
                                                            </div>                                                           
                                                        </div>                                                       
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                                                            <li class="fa fa-close cancelar"></li>Cancelar
                                                        </button>
                                                        <button type="submit" class="btn btn-round btn-guardar" >
                                                            <li class="fa fa-edit"></li>Editar
                                                        </button>                                                       
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--TERMINA modal Modificar JUGADOR-->

                                    <!--Modal Eliminar-->
                                    <div id="deleteJugadorModal" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form name="deleteJugador" id="deleteJugador">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Eliminar Jugador</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Seguro que quieres eliminar este registro?</p>
                                                        <p class=""><small>Esta acción no se puede deshacer.</small></p>
                                                        <!--Variable a donde se guardara id a eliminar-->
                                                        <input type="hidden" name="delete_idjugador" id="delete_idjugador">
                                                    </div>                                   
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn  btn-round btn-guardar" id="dat_eliminado">
                                                            <li class="fa fa-save" ></li>Eliminar
                                                        </button>
                                        
                                                        <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
                                                            <li class="fa fa-close cancelar"></li> Cancelar
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--fin Modal Eliminar-->
                                               <!-- COMIENZA MODAL PARA DAR DE BAJA AL JUGADOR-->
                                               <div class="modal fade " id="dar_baja">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                        <form id="baja" name="baja" method="POST">
                                            <div class="modal-header">
                                            <h2 class="modal-title" id="myModalLabel">Dar de Baja al Jugador</h2>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="panel-body">
                                                <div class="row">
                                                <input type="hidden" name="desactivar_idjugador" id="desactivar_idjugador">
                                                <h2 for="">¿Seguro que quieres dar de baja a este registro?</h2>
                                                <div>Esta acción se puede deshacer</div>
                                                </div>

                                            </div>
                                            </div>

                                            <div class="modal-footer">
                                            <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
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
                                    <!-- TERMINA MODAL PARA DAR DE BAJA AL JUGADOR -->    
                                    <!-- INICIA MODAL PARA DAR DE ALTA AL JUGADOR --> 
                                    <div class="modal fade " id="dar_alta">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                        <form id="alta" action="alta" method="POST">
                                            <div class="modal-header">
                                            <h2 class="modal-title" id="myModalLabel">Dar de Alta al Jugador</h2>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="panel-body">
                                                <div class="row">
                                                <input type="hidden" name="activar_idjugador" id="activar_idjugador">
                                                <h2 for="">¿Seguro que quieres dar de alta a este registro?</h2>
                                                    
                                                        <div>Esta acción se puede deshacer</div>
                                                    
                                                
                                                </div>

                                            </div>
                                            </div>

                                            <div class="modal-footer">
                                            <button type="button" class="btn btn btn-round  btn-cancelar" data-dismiss="modal">
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
                                    <!-- TERMINA MODAL PARA DAR DE ALTA AL JUGADOR --> 
                                    
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

        <script src="../scripts/jugador/jugador.js"></script> 
        <script src="../alerta/build/alerts.js"></script>
        <script src="../alerta/build/toastr.js"></script>

        
        
    

        
    </body>
</html>