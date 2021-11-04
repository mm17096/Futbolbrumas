<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recuperar Datos</title>

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
        
        function msj() {

            setTimeout(function() {
                document.getElementById("msjerror").style.display = 'none';
            }, 3000);
        };
    </script>

</head>

<body class="login" onload="msj()">

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

    if (isset($_SESSION['falloverificacion'])) {

        $_SESSION['falloverificacion'] = null;
        unset($_SESSION['falloverificacion']);

        $mensaje[] = "Fallo en la verificacion de datos";
    ?>

        <div id="msjerror" class="alert alert-danger" role="alert" style=" position: absolute;
                                                        right: 30px;
                                                            top: 5px;
                                                            size: 5px;">
            <strong>Error!</strong>
            <?php
            foreach ($mensaje as $error) {
                echo $error;
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
                    <form action="../controller/usuario_controller.php?action=verificardatos" method="POST" autocomplete="off">
                        <h1>Recuperar Datos</h1>
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12">DUI <span class="required" style="color: red;">
                                    *</span></label>
                            <input class="form-control" id="dui" name="dui" placeholder="Numero de DUI" minlength="10" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12">Correo <span class="required" style="color: red;">
                                    *</span></label>
                            <input class="form-control" id="correo" name="correo" placeholder="Correo electronico">
                        </div>

                        <button type="submit" class="btn btn-round btn-guardar">
                            <li class="fa fa-search"></li> Verificar Datos
                        </button>

                        <div class="clearfix"></div>

                        <div class="separator">


                            <div class="clearfix"></div>
                            <br />
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
    </script>
</body>

</html>