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
          <a href="sesion.php" class="site_title" style="padding-left: 0px;">
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
                    <form action="cambiardatos.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <h1>Validar Codigo</h1>
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12">Codigo <span class="required" style="color: red;"> *</span></label>
                            <input class="form-control" id="user" name="user" placeholder="Codigo de confirmación" required>
                        </div>

                        <button type="submit" class="btn btn-round btn-guardar">
                            <li class="fa fa-lock"></li> Validar Codigo
                        </button>

                        <div class="clearfix"></div>

                        <div class="separator">


                            <div class="clearfix"></div>
                            
                            <br/><br/><br/><br/><br/>

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