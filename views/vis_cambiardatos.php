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

        }
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
                    <form action="../controller/usuario_controller.php?action=cambiarclave" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <h1>Modificar Datos</h1>
                        <div class="form-group">
                            <label style="right: 20px; max-width: 50%;" class="col-md-4 col-sm-12">Nueva Clave <span class="required" style="color: red;"> *</span></label>
                            <input type="password" class="form-control" id="clave" name="clave" oninput="verificarpassreset()" placeholder="Nueva Contraseña" required>
                        </div>

                        <div class="form-group">
                            <label style="right: 20px; max-width: 50%;" class="col-md-4 col-sm-12">Confirmar <span class="required" style="color: red;"> *</span></label>
                            <input type="password" class="form-control" id="clave2" name="clave2" oninput="verificarpassreset()" placeholder="Confirmar Contraseña" required>
                        </div>

                        <?php session_start(); ?>

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?=$_SESSION['id']?>" placeholder="Codigo de confirmación" required>
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
                                <p>©Todos los derechos resevados UES FMP 2021</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>
</body>

</html>