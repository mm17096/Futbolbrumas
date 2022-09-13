<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
    <thead align="center">
        <tr>

            <th>Nombre completo</th>
            <th>Fecha de Nacimiento</th>
            <th>número de camisa</th>
            <th>Posición </th>
            <th>Equipo</th>
            <th>Titular</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
    session_start();
    include_once("../dao/DaoJugador.php");
    include_once("../dao/DaoEquipo.php");

    $fecha = date("dd-mm-YYYY");
    $daoJ = new DaoJugador();
    $daoEquipo = new DaoEquipo();
    if ($_SESSION['identidad']->tipo == 'usuario') {
      $fila = $daoJ->listaDejugadores_es($_SESSION['identidad']->dui);
    } else {
      $fila = $daoJ->listaDejugadores();
    }

    foreach ($fila as $key => $value) {
    ?>

        <tr>

            <td><?php echo $value->getNombre(); ?> <?php echo $value->getApellido(); ?></td>
            <td align="center">
                <?php echo str_replace('-', '/', date('d-m-Y', strtotime($value->getFechanacimiento()))); ?></td>
            <td align="center"><?php echo $value->getNumerocamisa(); ?></td>
            <td align="center"><?php echo $value->getPosicion(); ?></td>
            <td align="center"><?php echo $daoEquipo->BuscarEquipo($value->getIdequipo())->getNombre(); ?></td>
            <!--<button type="button" class="btn btn-round btn-guardar" data-toggle="modal" data-target=".bs-example-modal-lg">Agregar Jugador</button>-->
            <td align="center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?php if ($value->getCancha()) { ?>
                    <button href="#cambio" type="button" class="btn btn-round btn-alta" data-toggle="modal"
                        data-idjugador='<?php echo $value->getIdjugador(); ?>'
                        data-posicion='<?php echo $value->getPosicion(); ?>'
                        data-equipo='<?php echo $value->getIdequipo(); ?>'>
                        <li class="fa fa-thumbs-o-up"></li>
                        <!--fa fa-thumbs-o-up -->
                    </button>

                    <?php } else { ?>
                    <button href="#titular" type="button" class="btn btn-round btn-baja" data-toggle="modal"
                        data-idjugador="<?php echo $value->getIdjugador(); ?>"
                        data-posicion='<?php echo $value->getPosicion(); ?>'
                        data-equipo='<?php echo $value->getIdequipo(); ?>'>
                        <li class="fa fa-thumbs-o-down"></li>
                        <!--fa fa-thumbs-o-up -->
                    </button>
                    <?php } ?>
                </div>
            </td>
            <td align="center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button href="#editJugadorModal" data_target="editJugadorModal" class="btn btn-round btn-editar"
                        data-toggle="modal" data-idjugador='<?php echo $value->getIdjugador(); ?>'
                        data-nombre='<?php echo $value->getNombre(); ?>'
                        data-apellido='<?php echo $value->getApellido(); ?>'
                        data-fechanacimiento='<?php echo $value->getFechaNacimiento(); ?>'
                        data-numerodecamisa='<?php echo $value->getNumerocamisa(); ?>'
                        data-posicion='<?php echo $value->getPosicion(); ?>'
                        data-equipo='<?php echo $value->getIdequipo(); ?>' data-toggle="tooltip">
                        <li class="fa fa-edit"></li>
                    </button>
                    <?php if ($value->getEstado()) { ?>
                    <button href="#dar_baja" data_target="dar_baja" class="btn btn-round btn-alta" data-toggle="modal"
                        data-idjugador='<?php echo $value->getIdjugador(); ?>'>
                        <li class="fa fa-thumbs-o-up"></li>
                        <!--fa fa-thumbs-o-up -->
                    </button>

                    <?php } else { ?>
                    <button href="#dar_alta" type="button" class="btn btn-round btn-baja" data-toggle="modal"
                        data-idjugador="<?php echo $value->getIdjugador(); ?>">
                        <li class="fa fa-thumbs-o-down"></li>
                        <!--fa fa-thumbs-o-up -->
                    </button>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <?php }  ?>
    </tbody>
</table>
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

<!-- Datatables -->

<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
