<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Validar Codigo</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!--Diseño css Sistema FutSal las Brumas-->
    <link href="../build/css/diseño.css" rel="stylesheet">
    <link href="../resources/bootstrap/css/diseño.css" rel="stylesheet" type="text/css" />

</head>

<body class="login">

    <div class="col-md-3 left_col" style="
    max-width: 7%;
    border-radius: 30px;
    position: absolute;
    top: 10px;
    left: 10px;
    margin-bottom: 10px;">
        <a href="vis_sesion.php" class="site_title" style="padding-left: 0px;">
            <i class="fa fa-home" style="
              font-size: 12px;
              position: absolute;
              margin-top: 15px;">
            </i> <span style="
                                 font-size: 12px;
                                 position: absolute;
                                 margin-top: 0px;
                                 margin-left: 30px;"> Regresar</span>
        </a>
        <div class="clearfix"></div>
    </div>

    <?php
    session_start();

    $_SESSION['index'] = null;
    unset($_SESSION['index']);
    if (!isset($_SESSION['id'])) {
        header("Location: ../views/vis_sesion.php");
    }

    if (isset($_SESSION['falloverificacion'])) {

        $_SESSION['falloverificacion'] = null;
        unset($_SESSION['falloverificacion']);

        $mensaje[] = "Código de verificación incorrecto";
    ?>

        <div class="alert alert-danger" role="alert" style=" position: absolute;
                                                        right: 30px;
                                                            top: 5px;
                                                            size: 5px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fa fa-search"></i>
            <strong>Validación!</strong>
            <?php
            foreach ($mensaje as $error) {
                echo $error;
            }
            ?>
        </div>

    <?php
    } else if (isset($_SESSION['resetcodigo']) && $_SESSION['resetcodigo'] = 'completo') {
        $_SESSION['resetcodigo'] = null;
        unset($_SESSION['resetcodigo']);

        $mensaje[] = "Código de verificación reenviado";
    ?>

        <div class="alert alert-info" role="alert" style=" position: absolute;
                                                        right: 30px;
                                                            top: 5px;
                                                            size: 5px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fa fa-mail-forward"></i>
            <strong>Procedimiento!</strong>
            <?php
            foreach ($mensaje as $codigo) {
                echo $codigo;
            }
            ?>
        </div>

    <?php
    } else if (isset($_SESSION['resetcodigo']) && $_SESSION['resetcodigo'] = 'error') {
        $_SESSION['resetcodigo'] = null;
        unset($_SESSION['resetcodigo']);
        $mensaje[] = "Error al reenviar el código de verificación";
    ?>

        <div class="alert alert-danger" role="alert" style=" position: absolute;
                                                        right: 30px;
                                                            top: 5px;
                                                            size: 5px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fa fa-close"></i>
            <strong>Procedimiento!</strong>
            <?php
            foreach ($mensaje as $codigo) {
                echo $codigo;
            }
            ?>
        </div>

    <?php
    }
    ?>

    <div class="content_sesion">
        <div class="login_wrapper">
            <div class="animate form login_form diseño">
                <section class="login_content">
                    <center>
                        <img src="imagen/logoprincipal.png" alt="" style="
                        width: 110x;
                        height: 110px;">
                    </center>
                    <form action="../controller/usuario_controller.php?action=verificarcodigo" method="POST" autocomplete="off">
                        <h1>Validar Código</h1>
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12">Código <span class="required" style="color: red;">
                                    *</span></label>
                            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código de confirmación" maxlength="15" minlength="8" required>
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $_SESSION['id'] ?>" required>
                        </div>

                        <button type="submit" class="btn btn-round btn-guardar">
                            <li class="fa fa-lock"></li> Validar Código
                        </button>

                        <a href="../controller/usuario_controller.php?action=reenviarcodigo" class="btn btn btn-round  btn-link">¿Desea reenviar el código?</a>

                        <div class="clearfix"></div>

                        <div class="separator">


                            <div class="clearfix"></div>

                            <br /><br /><br /><br /><br />

                            <div>
                                <h1><i class="fa fa-futbol-o" aria-hidden="true"></i> Las Brumas</h1>
                                <p>©Todos los derechos reservados UES FMP 2021</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

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
</body>

</html>