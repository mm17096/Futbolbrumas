<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>backup de la Base de Dato</title>
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
        <!--Diseño css Sistema FutSal las Brumas-->

        <link href="../build/css/diseño.css" rel="stylesheet">
        <link href="../alerta/build/toastr.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="nav-md" onload="msj()">
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
                  <h2><b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Base de Competencia</b><p></p><small><b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TORNEO DE FUTBOL SALA, LAS BRUMAS, COJUTEPEQUE, CUSCATLÁN.</small></b></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="capiuno-tab" data-toggle="tab" href="#uno" role="tab" aria-controls="uno" aria-selected="true">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="dos-tab" data-toggle="tab" href="#dos" role="tab" aria-controls="dos" aria-selected="false">Disciplinario</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tres-tab" data-toggle="tab" href="#tres" role="tab" aria-controls="tres" aria-selected="false">Sanciones</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="cuatro-tab" data-toggle="tab" href="#cuatro" role="tab" aria-controls="cuatro" aria-selected="false">Organización</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="cinco-tab" data-toggle="tab" href="#cinco" role="tab" aria-controls="cinco" aria-selected="false">Inscripciones</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="seis-tab" data-toggle="tab" href="#seis" role="tab" aria-controls="seis" aria-selected="false">Desarrollo del torneo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="siete-tab" data-toggle="tab" href="#siete" role="tab" aria-controls="siete" aria-selected="false">Partidos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ocho-tab" data-toggle="tab" href="#ocho" role="tab" aria-controls="ocho" aria-selected="false">Arbitraje</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="capiuno-tab">
                      <br>
                      <br>
                      DIRECTIVA DE FUTBOL SALA COLONIA LAS BRUMAS, COJUTEPEQUE, FUTSALBRUMAS.
                      <br>
                      <br>
                      <b>Art. 1.- </b> La directiva tomará muy en cuenta la disciplina de los representantes o jugadores antes,
                        durante y después de los partidos, siempre y cuando los antes mencionados se encuentren en
                        las instalaciones deportivas de esta chancha, se llamará verbalmente la atención por primera
                        vez, si incurre en la misma falta u otra que a consideración de esta directiva no es de acorde
                        para la afición, será sancionado con un partido de suspensión de acuerdo a la magnitud del
                        caso. Y SERA ESTA DIRECTIVA quien decidirá si el o los partidos pueden ser
                        conmutables o no.
                        <br>
                        <br>
                        <b>LA DIRECTIVA SE GUARDA EL DERECHO DE ADMISION DE CUALQUIER
                            JUGADOR QUE TRAIGA TRAYECTORIA DE PROBLEMAS EN LOS TORNEOS.</b>
                        <br>
                        <br>
                        <b>Art. 2.- </b>  Para evitar sanciones económicas sugerimos a los representantes de los equipos
                                            separarse de sus barras, ya que estas pueden causar algún problema donde se vean
                                            involucrados. El representante de equipo que no acate dicha disposición será responsable de
                                            los actos que se susciten y que involucren a sus jugadores, y será esta directiva quien
                                            sancionara de acuerdo a la gravedad del caso.
                        <br>
                        <br>
                        <b> Nota. Todo caso que no se encuentre solución en estas bases de competencia será la
                            directiva que tendrá la potestad de liberar o castigar al jugador, representantes o equipo
                            que cometa una infracción. Considerando los votos de estos para tal efecto. Será de
                            forma secreta</b>

                      </div>
                      <div class="tab-pane fade" id="dos" role="tabpanel" aria-labelledby="dos-tab">
                      <br>
                      REGLAMENTO DISCIPLINARIO.
                      <br>
                      <br>
                      <b>Art. 3.- </b>Las Sanciones disciplinarias se aplicaran a personas naturales o equipos, y estas serán:
                      <br>
                      <br>
                      PERSONAS NATURALES.
                      <br>
                      &nbsp; &nbsp; &nbsp;a) Amonestación.<br>
                      &nbsp; &nbsp; &nbsp;b) Multas.<br>
                      &nbsp; &nbsp; &nbsp;c) Suspención.<br>
                      &nbsp; &nbsp; &nbsp;d) Expulsión.
                      <br>
                      <br>
                      <b>Art. 4.- </b>Las bases que servirán para sancionar serán:
                      <br>
                            &nbsp; &nbsp; &nbsp;a) Informe arbitral.<br>
                            &nbsp; &nbsp; &nbsp;b) Informe de cualquier miembro de la Directiva que hayan presenciado los hechos.<br>
                            &nbsp; &nbsp; &nbsp;c) nforme de cualquier visor legalmente acreditado por la junta directiva.
                      <br>
                      <br>
                        <b>   Nota: En cada torneo se creara el comité de disciplina que estará formado por
                            representantes de los equipos participantes u por alguna persona particular que colabore
                            con la directiva. Siempre y cuando se logre establecer
                        </b>
                        <br>
                        <br>
                        <b>Art. 5.- </b>Las faltas disciplinarias cometidas por los jugadores se clasifican así.
                        <br>
                            &nbsp; &nbsp; &nbsp;a) Leves.<br>
                            &nbsp; &nbsp; &nbsp;b) Menos Graves.<br>
                            &nbsp; &nbsp; &nbsp;c) Graves.<br>
                            &nbsp; &nbsp; &nbsp;d) Gravísimas.
                        <br>
                        <br>
                        <b>Art. 6.- </b>Son faltas leves:
                        <br>
                            &nbsp; &nbsp; &nbsp;a)  Cortar el avance de un jugador del equipo contrario, deteniendo el balón con las manos intencionalmente.<br>
                            &nbsp; &nbsp; &nbsp;b)  Hacer gestos a ademanes así como reclamos con inconformidad a fallos arbitrales.<br>
                            &nbsp; &nbsp; &nbsp;c)  Lanzar el balón fuera del terreno de juego en señal de protesta.<br>
                            &nbsp; &nbsp; &nbsp;d)  Colocarse de forma incorrecta frente al balón, cuando va a ser cobrado un castigo o una falta después de la prevención del árbitro. Así como interrumpir el
                            &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;saque rápido de los laterales de la cancha<br>
                            &nbsp; &nbsp; &nbsp;e)  Exagerar el tiempo para sacar o cobrar una falta. Siempre y cuando el árbitro así lo estime conveniente<br>
                            &nbsp; &nbsp; &nbsp;f)   Efectuar jugadas peligrosas o bruscas sin intención de dañar al jugador contrario.<br>
                            &nbsp; &nbsp; &nbsp;g) Interrumpir el desarrollo de un partido, por comportamiento incorrecto o actos antideportivos al momento del desarrollo del mismo.
                        <br>
                        <br>
                        <b>Art. 7.- </b>Son Faltas menos graves:
                        <br>
                            &nbsp; &nbsp; &nbsp;a)   Insultar de palabra a un compañero de equipo o contrario y haya expulsión.<br>
                            &nbsp; &nbsp; &nbsp;b)  Amenazar con gestos o ademanes a otro jugador, aficionado, árbitro, representante de equipo o directivo del presente torneo.<br>
                            &nbsp; &nbsp; &nbsp;c)  Intento de agresión u agresión a un jugador y exista expulsión.<br>
                            &nbsp; &nbsp; &nbsp;d)  Contestar la agresión de la que haya sido objeto y exista expulsión.<br>
                            &nbsp; &nbsp; &nbsp;e)  Juego brusco mal intencionado y exista contacto hacia el jugador.
                        <br>
                        <br>
                        <b>Art. 8.- </b> Son Faltas graves:
                        <br>
                            &nbsp; &nbsp; &nbsp;a)   Agredir a otro jugador dentro del terreno de juego, antes, en el intermedio o después de haber terminado el partido, esto sin necesidad que existiera informe
                            &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;arbitral u otro, esto sin necesidad de tarjetas.<br>
                            &nbsp; &nbsp; &nbsp;b)  Reñir o pelear con uno o varios jugadores o secundar riña tumultuaria<br>
                            &nbsp; &nbsp; &nbsp;c)  Insultar o amenazar con palabras, hechos o señales injuriosas al árbitro o miembros de esta Directiva. Esto sin necesidad de informe o tarjetas.<br>
                            &nbsp; &nbsp; &nbsp;d)   Negarse a abandonar el terreno de juego, al ser expulsado por el árbitro.<br>
                            &nbsp; &nbsp; &nbsp;e)   Hacer gestos obscenos al público.
                        <br>
                        <br>
                        <b>Art. 9.- </b>Son Faltas Gravísimas:
                        <br>
                            &nbsp; &nbsp; &nbsp;a)  Participar en un partido con síntomas de haber ingerido licor, o en estado de ebriedad.<br>
                            &nbsp; &nbsp; &nbsp;b)  Agredir al árbitro o Directivos antes, durante o después de un partido.<br>
                            &nbsp; &nbsp; &nbsp;c)  Suplantar a otro jugador en una alineación.<br>
                            &nbsp; &nbsp; &nbsp;d)   Lanzar un escupitajo a otro jugador contrario o compañero de equipo, Representante o árbitro, en todos los casos siempre que sea informado por el árbitro.
                      <br>
                      <br>
                      </div>
                      <div class="tab-pane fade" id="tres" role="tabpanel" aria-labelledby="tres-tab">
                        <br>
                        <br>
                        SANCIONES.
                        <br>
                        <br>
                        <b>Art. 10.- </b> Cualquiera de las faltas leves, reportadas por el arbitro, serán sancionadas con la
                                          amonestación, el jugador que fuera amonestado dos veces en un mismo partido se le
                                          sancionará con un juego, el cual puede ser conmutable, el jugador que tuviere tres
                                          amonestaciones en diferente fecha, se le sancionara con un juego de suspensión, el cual puede
                                          ser conmutable, dicho monto será abalado por la directiva
                        <br>
                        <br>
                        <b>Art. 11.- </b> Cualquiera de las faltas menos Graves, En las que el jugador incurriere, serán
                                          sancionado por el arbitro con expulsión inmediata del terreno de juego, esto en sus literales A
                                          y B, en el caso que él jugador fuere expulsado quedara automáticamente castigado con cuatro
                                          juegos de suspensión, de los cuales dos podrán ser conmutables y para los literales C, D y E,
                                          serán seis partidos de suspensión de los cuales tres podrán ser conmutables, el costo de esta
                                          sanción será puesta por la directiva.
                        <br>
                        <br>
                        <b>Art. 12.- </b> Cualquiera de las faltas graves, en las que el jugador incurriere, y fueran reportadas
                                          por el árbitro, serán sancionadas con la inmediata expulsión del terreno de juego y además con
                                          ocho juegos de suspensión de los cuales cuatro podrán ser conmutables.
                        <br>
                        <br>
                        <b>Art. 13.- </b> Cualquiera de las faltas gravísimas en las que el jugador incurriere, y que sea
                                          reportada por el arbitro u otra persona autorizada, serán sancionada con la inmediata expulsión
                                          del torneo. Y además con una suspensión no menor a un torneo y además será responsable de
                                          cualquier daño que este causare. Si la directiva estima conveniente podrá levantar este castigo
                                          previo a pago de una multa y si el jugador no trae record de problemático en el mismo.
                        <br>
                        <br>
                        <b>Art. 14.- </b> todas las sanciones serán aplicables, aun cuando el partido en que se cometieran las
                                          faltas fuese dado por suspendido o nulo.

                      </div>
                      <div class="tab-pane fade" id="cuatro" role="tabpanel" aria-labelledby="cuatro-tab">
                        <br>
                        <br>
                        DE LA ORGANIZACIÓN.
                        <br>
                        <br>
                        <b>Art. 15.- </b> La directiva de Fútbol de la colonia las brumas de Cojutepeque, Que en texto de este
                                          reglamento se denominara “ LA DIRECTIVA”, Será el ente que organizará, dirigirá,
                                          coordinara, y controlara la actividad deportiva de equipos que forman las categorías que
                                          existieren bajo su dominio. Sean estas, Infantil, Juvenil, Femenino, Papi o libres.
                        <br>
                        <br>
                        <b>Art. 16.- </b> Esta Directiva deberá de actuar con estricto apego a las normativas de las presentes
                                          bases de competencia, para llevar un recto y cristalino desempeño en su gestión como regidor
                                          del futbol sala.

                        <br>
                        <br>
                        <b>Art. 17.- </b> habrá promoción de ascenso en el futbol sala, ascenderá el campeón y subcampeón de
                                          cada categoría y descenderán los dos últimos lugares a la categoría inmediata inferior, siempre
                                          y cuando sean dos categorías de igual edad.
                                          Los equipos ascendidos y descendidos deberán obligatoriamente participar con el sesenta por
                                          ciento de sus jugadores con los que ascendió o descendió a la categoría inmediata superior o
                                          inferior y participar al menos una temporada en la categoría que estuviere. El equipo que no
                                          acatare esta disposición no podrá participar en ninguna categoría regulada por esta directiva ni
                                          sus jugadores podrán participar con ningún equipo en la presente temporada. Esto siempre y
                                          cuando existieran 2 categorías en mencionado torneo.
                      </div>
                      <div class="tab-pane fade" id="cinco" role="tabpanel" aria-labelledby="cinco-tab">
                        <br>
                        <br>
                        DE LAS INSCRIPCIONES.
                        <br>
                        <br>
                        <b>Art. 18.- </b> La directiva comunicara la fecha de convocatoria para la inscripción de equipos y
                                          jugadores.
                        <br>
                        <br>
                        <b>Art. 19.- </b> La inscripción de equipos participantes se hará con presentación de la solicitud de
                                          inscripción colectiva, proporcionada por la Directiva y recibo de pago por derecho de
                                          inscripción.
                        <br>
                        <br>
                        <b>Art. 20.- </b>La hoja o solicitud de inscripción deberá de tener.
                        <br>
                            &nbsp; &nbsp; &nbsp;a)  Nombre del equipo.<br>
                            &nbsp; &nbsp; &nbsp;b)  Nombre y firma del jugador, si es de categorías infantiles o juveniles fecha de nacimiento.<br>
                            &nbsp; &nbsp; &nbsp;c)  Nombre y firma del representante propietario y representante suplente.<br>
                            &nbsp; &nbsp; &nbsp;d)  8 jugadores inscritos y si existieran más deberán cancelar cada uno como adicional.
                        <br>
                        <br>
                        <b>Art. 21.- </b> se deberán cancelar al entregar la hoja de inscripción el valor por inscripción más
                                          el valor de la fianza. Esto se puede prorrogar lo mas hasta la 3ra fecha, de lo contrario se
                                          impondrá una multa que designara la directiva. El valor de la inscripción y fianza queda a
                                          criterio de esta directiva tomando en cuenta el valor actual de los trofeos o de la
                                          premiación.
                        <br>
                        <br>
                        <b>Art. 22.- </b> Si a falta de entrega de un equipo de su hoja de inscripción se tomara la tercera
                                          hoja de alineación quedando como inscritos los jugadores anotados es las primeras tres
                                          fechas aunque algún jugador no hubiere participado en el partido ocupando así el cupo en
                                          dicha hoja.
                        <br>
                        <br>
                        <b>Art. 23.- </b>  Todo equipo perderá el derecho a la fianza en los siguientes casos.
                        <br>
                            &nbsp; &nbsp; &nbsp;a)  Por retiro del equipo por no presentarse a tres partidos alternos o dos seguidos en un mismo torneo.<br>
                            &nbsp; &nbsp; &nbsp;b)  Por agresión al arbitro o a algún contrario sin que el equipo o jugador pagué los daños ocasionados.<br>
                            &nbsp; &nbsp; &nbsp;c)  Por no cancelar el arbitraje y su equipo fuera retirado del torneo.
                      </div>
                      <div class="tab-pane fade" id="seis" role="tabpanel" aria-labelledby="seis-tab">
                        <br>
                        <br>
                        DESARROLLO DEL TORNEO.
                        <br>
                        <br>
                        <b>Art. 24.- </b> Se entregaran un total de 8 carnet por equipo para que inscriba formalmente a sus
                                          jugadores y si existieren adicionales se les darán a cada equipo, debiendo pagar el costo
                                          adicional.

                        <br>
                        <br>
                        <b>Art. 25.- </b> Cuando se extravíe o se deteriore un carnet. El equipo interesado podrá solicitar su
                                          reposición con el pago respectivo del mismo, que será determinado por la Directiva. Dicho
                                          carnet se le anotaran todas las sanciones anteriores cometidas, siempre y cuando estas no las
                                          hubiera pagado.
                        <br>
                        <br>
                        <b>Art. 26.- </b> cada equipo acreditara a dos representantes ante la Directiva, uno propietario y otro
                                          suplente. El representante es el vocero del equipo, el suplente podrá estar presente en las
                                          reuniones las cuales serán semanalmente pero no tendrá ni voz ni voto. No así si el primero
                                          estuviera ausente.<br>
                                          A su vez todo aquel representante que este presente deberá guardar respeto y orden a sus
                                          demás colegas, procurando que sus intervenciones y acciones no lesionen la moral, el honor ni
                                          la vida de nadie, ni las gestión que este realizando la Directiva.
                                          Ningún jugador de cualquier equipo tendrá derecho a voz en las reuniones a no ser que fuera
                                          representante.
                        <br>
                        <br>
                        <b>Art. 27.- </b> La infracción a lo expuesto en el articulo 26, será ocasionada a una multa de $ 1.00
                                          a cada equipo involucrado además con una sanción de no poder jugar un juego oficial si el
                                          caso es el representante jugador de su equipo, este no podrá ser inconmutable. Si es tomada
                                          como grave con la suspensión de 3 juegos y si es gravísima se optara de retirar del torneo.

                        <br>
                        <br>
                        <b>Art. 28.- </b> en caso de ausencia del representante propietario o suplente el equipo podrá acreditar
                                          un representante específico vía carta a la directiva, el cual deberá de presentar nombramiento
                                          firmado por el representante propietario del equipo, y este tendrá los mismos derechos que los demás.
                        <br>
                        <br>
                        <b>Art. 29.- </b> El representante que llegue con 20 minutos de retrazo a una reunión o de igual forma si
                                          no se hace presente nadie en representación de su equipo será multado con $ 1.00 por la no
                                          asistencia, además se le restara un punto de la tabla de posiciones. Esta multa deberá ser
                                          pagada a mas tardar en la siguiente reunión hábil de lo contrario se incrementara en dos puntos de la tabla de posiciones.
                        <br>
                        <br>
                        <b>Art. 30.- </b> Las Inscripciones de los jugadores se harán única y exclusivamente, el día establecido
                                          por esta directiva para sus reuniones. Los pagos económicos por expulsiones serán cancelados
                                          el mismo día de la reunión, los pagos de otro tipo de sanciones podrán ser cancelados en cualquier momento de los partidos.
                        <br>
                        <br>
                        <b>Art. 31.- </b> se permitirá a los equipos inscribir, desincribir y reponer jugadores hasta el último partido de la 2da vuelta o en su defecto en el último partido de la fecha antes de las semifinales
                                          si fuera de 3 vueltas, de igual manera aplica para las transferencias. Dichos jugadores inscritos
                                          será obligatorio participar de al menos un juego de lo contrario no podrá disputar la fase de finales

                        <br>
                        <br>
                        <b>Art. 32.- </b> El costo de la transferencia será designado por esta directiva, de igual forma la parte
                                          que se dará al equipo involucrado de donde proviene dicho jugador, siempre y cuando el
                                          jugador hubiere recibido de parte del equipo algún equipamiento deportivo. Para poder hacer
                                          una transferencia de jugadores, deberán de estar de acuerdo los dos representantes. Es de notar
                                          que ambos equipos pierden el derecho de sus jugadores al realizar transferencias y cualquier
                                          otro jugador podrá irse a cualquier equipo que el quiere sin tener el Abal del representante.
                        <br>
                        <br>
                        <b>Art. 33.- </b>  Los equipos podrán desincribir y sustituir jugadores después del periodo previsto en el artículo anterior en los casos siguientes.
                        <br>
                            &nbsp; &nbsp; &nbsp;a) Por muerte del jugador.<br>
                            &nbsp; &nbsp; &nbsp;b) Por auto detención formal del jugador previamente comprobada.<br>
                            &nbsp; &nbsp; &nbsp;c)  Por incapacidad física o lesión legalmente comprobada con incapacidad medica mínimo de un mes.<br>
                            &nbsp; &nbsp; &nbsp;d)  Por ausencia fuera del país de un jugador de forma legal mayor de un mes. (Entiéndase por forma legal, a viajes por medio de pasaporte visado o
                            &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;participación con alguna selección de futbol profesional o estudiantil)
                        <br>
                        <br>
                        <b>Art. 34.- </b> El sistema del campeonato podrá ser desarrollado a dos vueltas o como lo decida la
                                          directiva, que por razón de tiempo, por su reducido o amplio numero de equipos, lo estime
                                          conveniente y será por el sistema de uno contra todos.

                        <br>
                        <br>
                        <b>Art. 35.- </b> Clasifican los primeros 8 equipos con mayor puntaje y contara la diferencia de goles
                                          para su clasificación, si hubiera dos o mas con los mismo puntos y goles. Esto podrá ser modificado por esta directiva analizando el número de equipos en participación.
                                          De igual forma si existiera empate, pudiendo verse la serie de los goles entre si, o hasta algún partido extra para sacar las posiciones deseadas.
                        <br>
                        <br>
                        <b>Art. 36.- </b>Para las semifinales queda establecido que el sistema de eliminación será de la siguiente manera.<br>
                        &nbsp; &nbsp; &nbsp;- El numero uno se enfrentara contra el numero cuatro.<br>
                        &nbsp; &nbsp; &nbsp;- El Numero dos se enfrentara contra el numero tres.<br>
                        &nbsp; &nbsp; &nbsp;- El numero cinco contra el numero ocho para el caso de liguilla.<br>
                        &nbsp; &nbsp; &nbsp;- El numeró seis contra el numero siete para el caso de liguilla.
                        <br>
                        <br>
                        <b>Art. 37.- </b> Esta directiva podrá modificar el número de equipos que clasifiquen para las
                                          semifinales, dependiendo el número de equipos que participen en el torneo, de igual forma
                                          para las categorías que tengan un número de equipos reducidos.

                      </div>
                      <div class="tab-pane fade" id="siete" role="tabpanel" aria-labelledby="siete-tab">
                        <br>
                        <br>
                        DE LOS PARTIDOS.
                        <br>
                        <br>
                        <b>Art. 38.- </b> os partidos de campeonato se jugaran de acuerdo a las presentes bases de competencia
                                          emitidas por esta directiva. Las cuales podrán tener modificaciones al final del torneo para
                                          evitar errores cometidos en los futuros torneos a realizarse.

                        <br>
                        <br>
                        <b>Art. 39.- </b>  Todos los partidos de este torneo serán arbitrados por los árbitros que esta directiva
                                          sugiera. Esta decisión puede tomarse conjuntamente con los representantes siempre y cuando
                                          la directiva lo estime conveniente.
                        <br>
                        <br>
                        <b>Art. 40.- </b> Los equipo deberán presentar su alineación con cinco minutos de anticipación a la hora
                                          señalada para evitar cualquier contratiempo además de los carnet de sus jugadores.
                        <br>
                        <br>
                        <b>Art. 41.- </b> Para su identificación los jugadores deberán de presentarse uniformados, y portar en su
                                          parte trasera de su camisa un numero el cual debe ser visible y no debe ser improvisado, los carnet deberán ser presentados a la mesa antes de ingresar al terreno de juego. El equipo que
                                          presente un jugador con short y este tenga bolsas laterales; así mismo dos jugadores que porten
                                          en su camisola el mismo número y que participen en el juego, perderán los puntos en disputa, siempre y cuando sea reportado por el árbitro.
                        <br>
                                          El portero deberá de usar una camisa diferente de los demás jugadores de cancha así como
                                          podrá utilizar cualquier tipo de pans o short o calzoneta, cualquier jugador que se quede de
                                          portero deberá de utilizar su camisa debajo y encima otra para poder jugar cuando ingresé el
                                          portero de su equipo.
                        <br>
                        <br>
                        <b>Art. 42.- </b> El capitán o representante de cada equipo serán los responsables de entregar a la mesa la hoja de alineación, los carnets y el pago del arbitraje antes de iniciado el primer tiempo del partido
                        <br>
                        <br>
                        <b>Art. 43.- </b> Cada equipo deberá de presentar al arbitro antes de iniciar el partido un balón en buenas condiciones, el equipo que no presente balón perderá el partido a favor de su
                                          contrincante siempre que sea reportado por el árbitro. Si la directiva lo proporciona no aplica dicho artículo.
                        <br>
                        <br>
                        <b>Art. 44.- </b> Ningún equipo podrá iniciar un partido con menos de tres jugadores, el equipo que comience un juego con el número mínimo de jugadores podrán completar el número
                                          establecido en el transcurso del mismo siempre y cuanto este en la hoja de alineación, todos los equipos están en la obligación de ingresar al terreno de juego a la hora señalada aun si solo
                                          están tres jugadores. Pasados los 10 minutos de espera, Los equipos que no acaten esta disposición perderán los puntos en disputa y quedara descartado como equipo menos vencido
                                          por la falta cometida, ya que esto se toma como conveniencia. Si este esta en fase de cuartos o de semifinales Los diez minutos de espera no se minimizara del tiempo de juego, el equipo infractor correrá con los excedentes del partido sobre el arbitraje. Si los existiere
                        <br>
                        <br>
                        <b>Art. 45.- </b> Todo equipo deberá alinear a todos los jugadores que tiene inscritos para evitar
                                          cualquier sanción. El jugador que no este alineado al inicio del partido, no podrá participar en
                                          dicho juego. El equipo que no acate lo antes dispuesto será sancionado con una multa de $ 1.00, además perderá los puntos en disputa y 3 más de la tabla de clasificación, siempre y cuando sea reportado ya sea por el árbitro o por la persona que tenga la mesa.
                        <br>
                        <br>
                        <b>Art. 46.- </b> El árbitro hará una espera de diez minutos después de la hora señalada en los casos siguientes.
                        <br>
                            &nbsp; &nbsp; &nbsp;a)  Cuando uno de los equipos no se hubiera presentado y este fuera en cuartos de final o finales.<br>
                            &nbsp; &nbsp; &nbsp;b)  Cuando no hayan presentado su respectivo carnet o no se encuentren equipados, transcurrido el tiempo de tolerancia, el árbitro deberá de consignar en su &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;informe el motivo por el cual no se llevo a cabo dicho partido.
                        <br>
                        <br>
                        <b>Art. 47.- </b> solo se podrán reprogramar un partido en el caso que los puntos queden en el aire, si es necesario para clasificar, el costo de los honorarios del nuevo encuentro, correrá a cuenta del interesado, este puede ser programado al momento que fuere solicitado por dicho equipo.
                        <br>
                        <br>
                        <b>Art. 48.- </b> Se darán por validos los partidos que fuesen suspendidos, siempre y cuando la suspensión sea obligada por lluvia, falta de luz o cualquier causa natural, o por falta de
                                          seguridad hacia el árbitro, siempre y cuando el equipo afectado no sea el infractor. Cuando un partido sea suspendido a mas de la mitad del segundo tiempo. Y el marcador sea de dos o mas goles, el partido se dará como valido.
                                          Y si no fuera así se reprogramara de nuevo absorbiendo los gastos arbitrales si los existieren
                                          los equipos involucrados. Y jugando el tiempo restante para su clasificación. Siempre y cuando exista solicitud de alguno de los dos equipos involucrados
                        <br>
                        <br>
                        <b>Art. 49.- </b>Toda protesta sobre cualquier disposición o anomalía suscitada durante la realización
                                          de un partido oficial, deberán de ser presentadas ante esta Directiva por escrito y esta es la única que tendrá derecho de emitir un fallo al respecto.
                        <br>
                        <br>
                        <b>Art. 50.- </b> siempre que se cumpla con el requisito que señala el artículo anterior se reconocen como causas para perder los puntos en disputa a favor del contrincante los siguientes numerales.
                        <br>
                        &nbsp; &nbsp; &nbsp;a)  Cuando no sean entregados a la mesa los carnets y dichos jugadores participen en el partido al inicio del juego.<br>
                        &nbsp; &nbsp; &nbsp;b)  Cuando un equipo no se presente como lo establecen las presentes bases de competencia.( específicamente uniforme, balón etc.)<br>
                        &nbsp; &nbsp; &nbsp;c)  Cuando el partido sea suspendido por el árbitro por conducta hostil del representante o de uno o más de sus jugadores, o simpatizantes del equipo, esto debe &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de estar respaldado por el informe arbitral.<br>
                        &nbsp; &nbsp; &nbsp;d)  Cuando fraudulentamente o estando castigado, participe un jugador o bien se comprobare su ilegalidad en su inscripción.<br>
                        &nbsp; &nbsp; &nbsp;e)  Por invasión de la cancha por parte de los simpatizantes del equipo o de sus jugadores de banca, siempre y cuando sea suspendido por riña<br>
                        &nbsp; &nbsp; &nbsp;f)  Cuando se retire del terreno de juego antes de terminar el partido, en señal de protesta por fallos arbitrales o sin causa justificada, en cuyo caso perderá un &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;punto de la tabla de clasificación.<br>
                        &nbsp; &nbsp; &nbsp;g)  Cuando por cualquier causa durante el desarrollo de un partido el equipo quedara con menos de tres jugadores, siempre y cuando las causas del equipo &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;infractor no sean justiciables por motivos de fuerza mayor (lesiones notorias).<br>
                        &nbsp; &nbsp; &nbsp;h)  Cuando uno de los 2 equipos no presente balón en buen estado para jugar, siempre y cuando sea reportado por el árbitro, dando los puntos al equipo &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;contrario.<br>
                        &nbsp; &nbsp; &nbsp;i)  Cuando un jugador halla prestado su camisa para jugar y al momento de ingresar lo haga con otro numero distinto con el que inicio el partido. También &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;deberá ser reportado por el árbitro o en su defecto el que tenga la mesa<br>
                        &nbsp; &nbsp; &nbsp;j)  Cuando un equipo no jugare uniformado al menos con el mismo diseño de camisa, siempre y cuando este sea reportado por el árbitro.<br>
                        &nbsp; &nbsp; &nbsp;k)  Algunas de las tomadas como justificación de pérdidas de puntos que están en estas bases de competencia.
                        <br>
                        <br>
                        <b>Art. 51.- </b> toda conducta antideportiva por parte de jugadores, simpatizantes o representantes de
                                          algún equipo, que degenere en hechos que causen daños a la integridad física del arbitro, afición o jugadores contrarios o en algún bien del equipo contrario, serán sancionados a pagar dichos daños, si estos no acatan dicha disposición serán sancionados de acuerdo a la gravedad
                        <br>
                        <br>
                        <br>
                        <b>Art. 52.- </b> El equipo que no se presente a dos juegos consecutivos o tres alternos quedara automáticamente fuera del presente torneo, adquiriendo además una multa impuesta por esta
                                          directiva, perdiendo su fianza si la tuviere, además si tuviera deudas se sumaran todas y se dividirán en partes iguales con los jugadores inscritos, sus jugadores podrán participar con otro
                                          equipo, siempre y cuando paguen dicha multa y la respectiva trasferencia y su nueva inscripción, si fuera en el mismo torneo. Si no solo las multas. El representante del equipo si fuera jugador tendrá que pagar una multa más alta que la de los demás jugadores.
                        <br>
                        <br>
                        <b>Art. 53.- </b>  el jugador que firme en dos hojas colectivas y estas se encuentren en manos de la directiva, dicho jugador quedara sin poder participar en el presente torneo a menos que uno de
                                            los equipos lo libere haciéndose acreedor el jugador a una multa interpuesta por esta directiva. Este caso califica aun si firma en un equipo y decide jugar en otro que no entrego hoja de inscripción solo hoja de alineación.
                        <br>
                        <br>
                        <b>Art. 54.- </b> todo equipo o representante que tenga antecedentes de haberse retirado, su fianza
                                          inicial será de $ 10.00 o mas según lo decida esta directiva. Esto aplica para equipos que queden debiendo en torneos anteriores.
                        <br>
                        <br>
                        <b>Art. 55.- </b> El futbol sala de este torneo es eminentemente aficionado.

                      </div>
                      <div class="tab-pane fade" id="ocho" role="tabpanel" aria-labelledby="ocho-tab">
                        <br>
                        <br>
                        DEL ALBITRAJE.
                        <br>
                        <br>
                        <b>Art. 56.- </b>  los árbitros deberán de ser respetados por los representantes y jugadores en el ejercicios de su cargo, quedando obligados a brindarles apoyo y protección en todo momento
                                            para garantizar la independencia de su actuación y su integridad personal.
                        <br>
                        <br>
                        <b>Art. 57.- </b> Los árbitros deberán de rendir ante esta directiva un informe de todos los incidentes importantes que aprecien en el desarrollo de cada partido después de finalizado el mismo, este
                                          puede ser llenado por otra persona que presencio el hecho( persona que llevó la mesa) pero
                                          respaldado con la firma del arbitro dando fe que lo que se ha escrito es lo sucedido.
                        <br>
                        <br>
                        <b>Art. 58.- </b> La falta de eficiencia y rendimiento de los árbitros serán tomados en cuenta por la
                                          directiva, determinando esta si se cambia o permanece dicho arbitro.
                        <br>
                        <br>
                        <b>Art. 59.- </b> Será obligación de todo arbitro.
                        <br>
                        &nbsp; &nbsp; &nbsp;a) Presentarse al terreno de juego como mínimo diez minutos de anticipación antes de la hora oficial.<br>
                        &nbsp; &nbsp; &nbsp;b) Informar debidamente sobre cualquier observación a este Directiva.<br>
                        &nbsp; &nbsp; &nbsp;c) Agotar todos los medios que estén a su alcance antes de suspender un partido.<br>
                        &nbsp; &nbsp; &nbsp;d) No exigir retribución económica mayor a las pactadas, cualquier infracción a este literal deberá de comunicarse ante la Directiva inmediatamente.<br>
                        &nbsp; &nbsp; &nbsp;e) Demostrar buena conducta con los representantes, jugadores y aficionados que se encuentren en las instalaciones deportivas, de lo contrario podrá ser sancionado por la Directiva siempre y cuando se comprobare dicho incidente.<br>
                        &nbsp; &nbsp; &nbsp;f) No distraerse en ninguna parte del partido con los aficionados que lo rodean.<br>
                        &nbsp; &nbsp; &nbsp;g)  Si un árbitro no se presenta a dirigir un partido al cual se ha asignado y no presenta una justificación valida, tendrá que sacar el partido a honores.
                      </div>
                    </div>
                  </div>

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

        <script src="../scripts/equipo/equipo.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
