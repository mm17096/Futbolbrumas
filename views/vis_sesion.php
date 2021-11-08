<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

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
                document.getElementById("msjreset").style.display = 'none';
            }, 3000);

            setTimeout(function() {
                document.getElementById("msjerror").style.display = 'none';
            }, 3000);

            setTimeout(function() {
                document.getElementById("attempts").style.display = 'none';
            }, 3000);

            setTimeout(function() {
                document.getElementById("bloqueo").style.display = 'none';
            }, 9500);

            setTimeout(function() {
                document.getElementById("bloqueo2").style.display = 'none';
            }, 9500);

            setTimeout(function() {
                document.getElementById("bloqueo3").style.display = 'none';
            }, 9500);

        }
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
        <a href="index.php" class="site_title" style="padding-left: 0px;">
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

        <!-- MENSAJE DE ACCIONES -->
        <?php
        session_start();
        if (isset($_SESSION['Attempts'])) {
            $count = $_SESSION['Attempts'];
        } else {
            $count = 5;
        }

        if (isset($_SESSION['modificacionfull'])) {
            $_SESSION['modificacionfull'] = null;
            unset($_SESSION['modificacionfull']);
            $mensaje[] = "Contraseña modificada con éxito";

        ?>
            <div id="msjreset" class="alert alert-info" role="alert" style=" position: absolute;
                                                       right: 30px;
                                                          top: 5px;">
                <i class="fa fa-edit"></i>
                <strong>Modificación</strong>
                <p>
                    <?php
                    foreach ($mensaje as $message) {
                        echo $message;
                    }
                    ?>
            </div>
        <?php
        }

        if ($count <= 0) {
            $bloqueado = true;
            date_default_timezone_set("America/El_Salvador");
            setcookie("bloqueado", date('m-d-Y g:i:s a',), time() + 180);
            $_SESSION['bloqueado'] = true;
        }

        if (isset($_SESSION['action_login']) && $_SESSION['action_login'] == 'error' && !isset($_COOKIE['bloqueado']) && !isset($_SESSION['bloqueado'])) {

            $_SESSION['action_login'] = null;
            unset($_SESSION['action_login']);
            $errors[] = "Los datos no coinciden";
            $Attempts[] = "Intentos restantes: " . $_SESSION['Attempts'];

        ?>
            <div id="msjerror" class="alert alert-danger" role="alert" style=" position: absolute;
                                                                right: 30px;
                                                                    top: 5px;
                                                                    size: 5px;">
                <i class="fa fa-search"></i>
                <strong>Validación</strong>
                <p>
                    <?php
                    foreach ($errors as $error) {
                        echo $error;
                    }
                    ?>
            </div>

            <p>

            <div id="attempts" class="alert alert-danger" role="alert" style=" position: absolute;
                                                                right: 30px;
                                                                    top: 105px;
                                                                    size: 5px;">
                <i class="fa fa-exclamation-triangle"></i>
                <?php
                foreach ($Attempts as $attempts) {
                    echo $attempts;
                }
                ?>
            </div>

        <?php
        } else if (isset($_SESSION['action_login']) && $_SESSION['action_login'] == 'debaja') {
            $_SESSION['action_login'] = null;
            unset($_SESSION['action_login']);
            $msj[] = "Su usuario está de baja, no puede acceder";

        ?>
            <div id="msjerror" class="alert alert-danger" role="alert" style=" position: absolute;
                                                                right: 30px;
                                                                    top: 5px;
                                                                    size: 5px;">
                <i class="fa fa-close"></i>
                <strong>Validación</strong>
                <p>
                    <?php
                    foreach ($msj as $error) {
                        echo $error;
                    }
                    ?>
            </div>
        <?php
        }
        ?>
        <!-- MENSAJE DE ACCIONES -->

        <div class="login_wrapper">
            <div class="animate form login_form diseño">
                <section class="login_content">
                    <center>
                        <img src="imagen/logoprincipal.png" alt="" style="
                        width: 110x;
                        height: 110px;">
                    </center>

                    <form action="index.php" method="POST" autocomplete="off">
                        <h1>Inicio de Sesión</h1>

                        <?php

                        if (isset($_COOKIE['bloqueado']) ||  isset($_SESSION['bloqueado'])) {
                            $_SESSION['Attempts'] = 5;
                            $_SESSION['action_login'] = null;
                            unset($_SESSION['action_login']);
                            $_SESSION['bloqueado'] = null;
                            unset($_SESSION['bloqueado']);
                            $mensaje[] = "Sesión bloqueada por intentos erróneos  ";
                            $mensaje2[] = "Vuelva a intentarlo dentro de 3 minutos  ";
                            if (isset($_COOKIE['bloqueado'])) {
                                $mensaje3[] = "Bloqueado desde: " . $_COOKIE['bloqueado'];
                            } else {
                                date_default_timezone_set("America/El_Salvador");
                                $mensaje3[] = "Bloqueado desde: " . date('m-d-Y g:i:s a');
                            }
                        ?>

                            <center>
                                <div id="bloqueo" class="alert alert-danger" role="alert" style=" position: absolute;
                                                            top: 40px;
                                                            size: 5px;">
                                    <i class="fa fa-lock"></i>
                                    <strong>Bloqueado</strong>
                                    <i class="fa fa-lock"></i>
                                    <p>
                                        <?php
                                        foreach ($mensaje as $msj) {
                                            echo $msj;
                                        }
                                        ?>
                                </div>

                                <p>


                                <div id="bloqueo2" class="alert alert-danger" role="alert" style=" position: absolute;
                                                            top: 170px;
                                                            size: 5px;">
                                    <?php

                                    foreach ($mensaje2 as $msj2) {
                                        echo $msj2;
                                    }
                                    ?>
                                </div>

                                <p>

                                <div id="bloqueo3" class="alert alert-danger" role="alert" style=" position: absolute;
                                                       
                                                            top: 255px;
                                                            size: 5px;">
                                    <i class="fa fa-calendar"></i>
                                    <?php
                                    foreach ($mensaje3 as $msj3) {
                                        echo $msj3;
                                    }
                                    ?>
                                    <i class="fa fa-dashboard"></i>
                                </div>
                            </center>
                        <?php
                        } else {
                        ?>

                            <div class="form-group">
                                <label form="user" class="col-md-4 col-sm-12">Usuario<span class="required" style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="user" name="user" placeholder="Ingrese usuario" title="Puede agregar su correo o nombre de usuario" minlength="7" maxlength="30" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label form="pass" class="col-md-4 col-sm-12">Contraseña<span class="required" style="color: red;">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese contraseña" title="Utilice la contraseña que se le proporciono o usted modifico" autocomplete="off" minlength="8" maxlength="25" required>
                            </div>

                            <button type="submit" class="btn btn-round btn-guardar" name="btnsesion" id="btnsesion">
                                <li class="fa fa-sign-in"></li> Iniciar Sesión
                            </button>

                            <a href="vis_recuperardatos.php" class="btn btn btn-round  btn-link">¿Ha perdido su
                                contraseña?</a>

                            <div class="clearfix"></div>

                            <div class="separator">


                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-futbol-o" aria-hidden="true"></i> Las Brumas</h1>
                                    <p>©Todos los derechos reservados UES FMP 2021</p>
                                </div>
                            </div>

                        <?php } ?>
                    </form>

                </section>
            </div>

        </div>
    </div>

</body>

</html>