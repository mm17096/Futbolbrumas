<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;"> <a href="index.php" class="site_title"><i class="fa fa-trophy"></i> <span>Las Brumas</span></a>
    </div>

    <div class="clearfix"></div>
    <!-- Menu Logo-->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="imagen/logoprincipal.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Bienvenid@s,</span>
        <h2>FutSal Las Brumas</h2>
      </div>
    </div>


    <!-- /Menu Logo -->

    <!-- Menu Lateral-->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>Menú Principal</h3>
        <ul class="nav side-menu">
          <li><a href="index.php"><i class="fa fa-home"></i> <span> Inicio</span></a></li>

          <li><a><i class="fa fa-bar-chart"></i> Estadisticas<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Tabla de posiciones</a></li>
              <li><a href="#">Partidos por jugar</a></li>
            </ul>
          </li>

          <?php if (isset($_SESSION['identidad']) && isset($_SESSION['usuario'])) : ?>

            <?php if ($_SESSION['identidad']->tipo == 'administrador') : ?>
              <li><a><i class="fa fa-estadio"><img class="fa fa-estadio" src="imagen/partido.png" /></i>
                  Partidos<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="registro_resultados.php"> Registro de resultados</a></li>
                  <li><a href="#">Finalizados</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-calendar"></i> Jornadas<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Tabla de jornadas</a></li>
                </ul>
              </li>
            <?php endif; ?>

            <li><a><i class="fa fa-estadio"><img class="fa fa-estadio" src="imagen/equipo.png" /></i>
                Equipos<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="equipo.php">Registros</a></li>
              </ul>
            </li>

            <?php if ($_SESSION['identidad']->tipo == 'administrador') : ?>
              <li><a><i class="fa fa-estadio"><img class="fa fa-estadio" src="imagen/representante.png" /></i>
                  Representantes<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="vis_representantes.php">Registros</a></li>
                </ul>
              </li>
            <?php endif; ?>

            <li><a><i class="fa fa-estadio"><img src="imagen/jugador.png" /></i> Jugadores<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Registros</a></li>
              </ul>
            </li>

            <?php if ($_SESSION['identidad']->tipo == 'administrador') : ?>
              <li><a><i class="fa fa-estadio"><img src="imagen/arbitro.png" /></i> Árbitros<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Registros</a></li>
                </ul>
              </li>
            <?php endif; ?>

            <?php if ($_SESSION['identidad']->tipo == 'administrador') : ?>
              <li><a><i class="fa fa-estadio"><img src="imagen/cancha.png" /></i> Canchas<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Registros</a></li>
                </ul>
              </li>
            <?php endif; ?>
          <?php endif; ?>

          <li><a href="#"><i class="fa fa-book"></i><span> Base de competencia </span></a></li>
      </div>

      <?php if (isset($_SESSION['identidad']) && isset($_SESSION['usuario'])) : ?>

        <?php if ($_SESSION['identidad']->tipo == 'administrador') : ?>
          <div class="menu_section">
            <h3>Acceso</h3>
            <ul class="nav side-menu">
              <li><a href="#"><i class="fa fa-user"></i><span> Usuarios</span></a></li>
            </ul>
          </div>
          <div class="menu_section">
            <h3>Reportes y Consultas</h3>
            <ul class="nav side-menu">
              <li><a><i class="fa fa-file-text"></i> Listado reporte/consulta<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#"> Jugadores por equipo</a></li>
                  <li><a href="#"> Amonestados por equipo</a></li>
                  <li><a href="#"> Máximos goleadores </a></li>
                  <li><a href="#"> Porteros menos vencidos</a></li>
                </ul>
              </li>
            </ul>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <!-- /Menu Lateral -->

  </div>
</div>

<!-- Menu Suoperior-->
<div class="top_nav">
  <div class="nav_menu">
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <?php if (!isset($_SESSION['identidad']) && !isset($_SESSION['usuario'])) : ?>
            <a class="dropdown-item" href="sesion.php"><i class="fa fa-user"></i> Inicio de Sesión</a>
          <?php endif; ?>

          <?php if (isset($_SESSION['identidad']) && isset($_SESSION['usuario'])) : ?>
            <a href="sesion.php" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              <img src="imagen/usuario.png" alt="">
              <?php if($_SESSION['identidad']->tipo == 'administrador'):?>
                <?php echo 'Administrador '. $_SESSION['identidad']->nombre?>
              <?php else: ?>
                <?php echo 'Usuario '. $_SESSION['identidad']->nombre?>
              <?php endif; ?>
              
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#"><i class="fa fa-user pull-right"></i>Perfil</a>
              <a class="dropdown-item" href="index.php?sesion=logout"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a>
            </div>
          <?php endif; ?>
        </li>


      </ul>
    </nav>
  </div>
</div>
<!-- /Menu Suoperior-->