<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Modificar Datos</title>

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

    <script type="text/javascript">
    function verificarpassreset() {
        var clave = document.getElementById("clave").value;
        var clave2 = document.getElementById("clave2").value;

        if (clave != "" && clave2 != "") {
            if (clave == clave2) {
                document.getElementById("btnreset").removeAttribute("disabled");
            } else {
                document.getElementById("btnreset").setAttribute("disabled", "disabled");
            }
        } else {
            document.getElementById("btnreset").setAttribute("disabled", "disabled");
        }
    };

    //------ Validacion de la contrasenia --------//
    function valcontrasenia() {
        var mayus = new RegExp("^(?=.*[A-Z])");
        var special = new RegExp("^(?=.*[!@#$%&*-])");
        var numbers = new RegExp("(?=.*[0-9])");
        var lower = new RegExp("(?=.*[a-z])");
        var len = new RegExp("(?=.{8,})");

        var clave = document.getElementById("clave").value;
        var check = 0;

        var regExp = [mayus, special, numbers, lower, len];

        if (clave != "") {
            for (var i = 0; i < 5; i++) {
                if (regExp[i].test(clave)) {
                    check++;
                } else {

                }
            }
            //console.log(check);

            if (check >= 0 && check <= 2) {
                $("#mensajepass").text('Muy Insegura').css('color', 'red');
            } else if (check >= 3 && check <= 4) {
                $("#mensajepass").text('Poco Segura').css('color', 'orange');
            } else if (check == 5) {
                $("#mensajepass").text('Muy Segura').css('color', 'green');
            }
        } else {
            $("#mensajepass").text('');
        }
        verificarpassreset();
    };

    function valcontraseniaconfir() {
        var mayus = new RegExp("^(?=.*[A-Z])");
        var special = new RegExp("^(?=.*[!@#$%&*-])");
        var numbers = new RegExp("(?=.*[0-9])");
        var lower = new RegExp("(?=.*[a-z])");
        var len = new RegExp("(?=.{8,})");

        var clave = document.getElementById("clave2").value;
        var check = 0;

        var regExp = [mayus, special, numbers, lower, len];

        if (clave != "") {
            for (var i = 0; i < 5; i++) {
                if (regExp[i].test(clave)) {
                    check++;
                } else {

                }
            }

            //console.log(check);

            if (check >= 0 && check <= 2) {
                $("#mensajepassconfir").text('Muy Insegura').css('color', 'red');
            } else if (check >= 3 && check <= 4) {
                $("#mensajepassconfir").text('Poco Segura').css('color', 'orange');
            } else if (check == 5) {
                $("#mensajepassconfir").text('Muy Segura').css('color', 'green');
            }
        } else {
            $("#mensajepassconfir").text('');
        }
        verificarpassreset();
    };
    </script>

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

    <div class="content_sesion">
        <div class="login_wrapper">
            <div class="animate form login_form diseño">
                <section class="login_content">
                    <center>
                        <img src="imagen/logoprincipal.png" alt="" style="
                        width: 110x;
                        height: 110px;">
                    </center>
                    <form action="../controller/usuario_controller.php?action=cambiarclave" method="POST"
                        autocomplete="off" enctype="multipart/form-data">
                        <h1>Modificar Datos</h1>
                        <div class="form-group">
                            <label style="right: 20px; max-width: 50%;" class="col-md-4 col-sm-12">Nueva Clave <span
                                    class="required" style="color: red;"> *</span></label>
                            <div align="right">
                                <h6> <span id="mensajepass"></span> </h6>
                            </div>
                            <input type="password" class="form-control" id="clave" name="clave"
                                oninput="valcontrasenia()" minlength="8" maxlength="25" placeholder="Nueva Contraseña" required>
                        </div>

                        <div class="form-group">
                            <label style="right: 20px; max-width: 50%;" class="col-md-4 col-sm-12">Confirmar <span
                                    class="required" style="color: red;"> *</span></label>
                            <div align="right">
                                <h6> <span id="mensajepassconfir"></span> </h6>
                            </div>
                            <input type="password" class="form-control" id="clave2" name="clave2"
                                oninput="valcontraseniaconfir()" minlength="8" maxlength="25" placeholder="Confirmar Contraseña" required>
                        </div>

                        <button type="submit" class="btn btn-round btn-guardar" disabled id="btnreset" name="btnreset">
                            <li class="fa fa-refresh"></li> Modificar Datos
                        </button>

                        <div class="clearfix"></div>

                        <div class="separator">


                            <div class="clearfix"></div>
                            <br />

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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

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