<?php
require_once("../../conexion/Conexion.php");
require_once("../../clases/Representante.php");
$Conexion_ID;
$Conexion_ID = new Conexion();
$Conexion_ID = $Conexion_ID->getConexion();

$result = $Conexion_ID->query("SELECT * FROM `representante`");
$listado = null;
if ($result) {
    while ($fila = $result->fetch_object()) {
        $listado[] = new Representante($fila->dui, $fila->nombre, $fila->apellido, $fila->sexo, $fila->fecha_nacimiento, $fila->telefono, " ", $fila->estado);
    }
}
?>

<table id="tbrepresentante" class="table table-striped table-bordered" style="width:100% ">
    <thead align="center">
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>Equipos</th>
            <th>Acciones</th>
        </tr>
    </thead>


    <tbody>

        <?php
        if (is_array($listado) && $listado != null) :

            foreach ($listado as $key => $value) {
        ?>

        <tr>
            <td style="text-align: center;">
                <?php echo $value->getNombre() . ' ' . $value->getApellido() ?>
            </td>

            <td style="text-align: center;">
                <?php echo $value->getTelefono() ?>
            </td>

            <td style="text-align: center;">
                <?php
                        if ($value->getEstado() == 1) {
                            echo "Activo";
                        } else {
                            echo "De baja";
                        }
                        ?>
            </td>

            <td style="text-align: center; size: 20px;">

                <button type="button" class="btn btn-round btn-editar" onclick="mostrarEquipos()"
                    data-target="#modalEquipos" data-toggle="modal" data-dui='<?php echo $value->getDui(); ?>'
                    data-toggle="tooltip">
                    <li class="fa fa-eye"> Ver</li>
                </button>

            </td>



            <td style="text-align: center;">
                <div class="btn-group" role="group">

                    <button type="button" class="btn btn-round btn-editar" onclick="abrirmodalEditar()"
                        data-target="#modalmodificarR" data-toggle="modal"
                        data-nombre='<?php echo $value->getNombre(); ?>'
                        data-apellido='<?php echo $value->getApellido(); ?>' data-dui='<?php echo $value->getDui(); ?>'
                        data-sexo='<?php echo $value->getSexo(); ?>' data-fecha='<?php echo $value->getFecha_nac(); ?>'
                        data-telefono='<?php echo $value->getTelefono(); ?>'
                        data-estado='<?php echo $value->getEstado(); ?>' data-toggle="tooltip">
                        <li class="fa fa-edit"></li>

                        <?php if ($value->getEstado() == 1) : ?>

                    </button>

                    <button type="button" onclick="abrirmodaldeBaja()" data-target="#DeBajaRepresentante"
                        data-toggle="modal" data-id="<?php echo $value->getDui(); ?>" class="btn btn-round btn-baja">
                        <li class="fa fa-thumbs-o-down"></li>
                        <!--fa fa-thumbs-o-up -->
                    </button>

                    <?php else : ?>

                    </button><button type="button" onclick="abrirmodaldeAlta()" data-target="#DeAltaRepresentante"
                        data-toggle="modal" data-id="<?php echo $value->getDui(); ?>" class="btn btn-round btn-alta">
                        <li class="fa fa-thumbs-o-up"></li>
                        <!--fa fa-thumbs-o-up -->
                    </button>

                    <?php endif; ?>

                </div>
            </td>
        </tr>
        <?php }
        endif; ?>
    </tbody>
</table>