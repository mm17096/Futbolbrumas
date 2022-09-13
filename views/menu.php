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
                            <li><a href="vis_tbposiciones.php">Tabla de Posiciones</a></li>
                            <li><a href="vis_tbpartidosfaltantes.php">Partidos por Jugar</a></li>
                            <li><a href="vis_tbpartidosjugados.php">Partidos Jugados</a></li>
                            <li><a href="vis_mayorgoleador.php">Mayor Goleadores</a></li>
                            <li><a href="vis_pmenosvencido.php">Portero Menos Vencido</a></li>
                        </ul>
                    </li>

                    <?php if (isset($_SESSION['identidad']) && isset($_SESSION['usuario'])) : ?>

                        <?php if ($_SESSION['identidad']->tipo == 'administrador') : ?>
                            <li><a><i class="fa fa-estadio"><img class="fa fa-estadio" src="imagen/partido.png" /></i>
                                    Partidos<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="vis_jornadadatos.php"> Registro de resultados</a></li>

                                </ul>
                            </li>

                            <li><a><i class="fa fa-calendar"></i> Jornadas<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="vis_jornada.php">Generador de Jornadas</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <li><a><i class="fa fa-estadio"><img class="fa fa-estadio" src="imagen/equipo.png" /></i>
                                Equipos<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="vis_equipos.php">Registros</a></li>
                            </ul>
                        </li>

                        <?php if ($_SESSION['identidad']->tipo == 'administrador' || $_SESSION['identidad']->tipo == 'empleado') : ?>
                            <li><a><i class="fa fa-estadio"><img class="fa fa-estadio" src="imagen/representante.png" /></i>
                                    Representantes<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="vis_representantes.php">Registros</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <li><a><i class="fa fa-estadio"><img src="imagen/jugador.png" /></i> Jugadores<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="vis_jugadores.php">Registros</a></li>
                            </ul>
                        </li>

                        <?php if ($_SESSION['identidad']->tipo == 'administrador' || $_SESSION['identidad']->tipo == 'empleado') : ?>
                            <li><a><i class="fa fa-estadio"><img src="imagen/arbitro.png" /></i> Árbitros<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="vis_arbitros.php">Registros</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['identidad']->tipo == 'administrador' || $_SESSION['identidad']->tipo == 'empleado') : ?>
                            <li><a><i class="fa fa-estadio"><img src="imagen/cancha.png" /></i> Canchas<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="vis_canchas.php">Registros</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['identidad']->tipo == 'administrador') : ?>
                            <li><a><i class="fa fa-estadio"><img class="fa fa-estadio" src="imagen/representante.png" /></i>
                                    Empleados<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="vis_empleado.php">Registros</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if ($_SESSION['identidad']->tipo == 'administrador') : ?>
                            <li><a><i class="fa fa-database"></i>
                                    Base de Datos<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="hacer_Backup.php">Backup</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <li><a href="basecompe.php"><i class="fa fa-book"></i><span> Base de competencia </span></a></li>
            </div>

            <?php if (isset($_SESSION['identidad']) && isset($_SESSION['usuario'])) : ?>

                <?php if ($_SESSION['identidad']->tipo == 'administrador' || $_SESSION['identidad']->tipo == 'empleado') : ?>
                    <div class="menu_section">
                        <h3>Acceso</h3>
                        <ul class="nav side-menu">
                            <li><a href="#"><i class="fa fa-user"></i><span> Usuarios</span></a></li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Reportes</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-file-text"></i> Listado reporte.<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="jugador_porequipo.php"> Jugadores por equipo</a></li>
                                    <li><a href="partidos_jornada.php">Partidos por Jornada</a></li>
                                    <li><a href="maximos_goleadores.php"> Máximos goleadores </a></li>
                                    <li><a href="porteros_menosVencido.php"> Porteros menos vencidos</a></li>
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

                    <?php if (isset($_SESSION['identidad']) && isset($_SESSION['usuario'])) : ?>
                        <a href="vis_sesion.php" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">

                        <?php echo $_SESSION['identidad']->tipo;
                        if (isset($_SESSION['usuario']) && $_SESSION['usuario']->imagen != null) : ?>
                                <img height="60px" src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['usuario']->imagen) ?>">
                            <?php else : ?>
                                <img src="imagen/usuario.png" alt="">
                            <?php endif; ?>

                           <?php echo $_SESSION['identidad']->nombre .' '. $_SESSION['identidad']->apellido?>

                        </a>

                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                            <?php if (isset($_SESSION['index'])) : ?>
                                <a class="dropdown-item" data-target="#modalperfil" data-toggle="modal" data-toggle="tooltip"><i class="fa fa-user pull-right"></i>Perfil</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="index.php?sesion=logout"><i class="fa fa-sign-out pull-right"></i>Cerrar
                                Sesión</a>
                        </div>
                    <?php else : ?>
                        <a class="dropdown-item" href="vis_sesion.php"><i class="fa fa-user"></i> Inicio de Sesión</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /Menu Suoperior-->
