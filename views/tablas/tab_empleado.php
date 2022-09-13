<?php
require_once("../../conexion/Conexion.php");
require_once("../../clases/Empleado.php");
$Conexion_ID;
$Conexion_ID = new Conexion();
$Conexion_ID = $Conexion_ID->getConexion();

$result = $Conexion_ID->query("SELECT * FROM `empleado`");
$listado = null;
if ($result) {
    while ($fila = $result->fetch_object()) {
        $listado[] = new Empleado($fila->dui, $fila->nombre, $fila->apellido, $fila->sexo, $fila->fecha_nacimiento, $fila->telefono, $fila->estado);
    }
}

?>

<table id="tbempleado" class="table table-striped table-bordered" style="width:100% ">
    <thead align="center">
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>Correo</th>
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
                <?php
                        $dui = $value->getDui();
                        $result = $Conexion_ID->query("SELECT correo FROM `usuario` WHERE idempleado = '$dui'");
                        $correo = '';
                        if ($result) {
                            while ($fila = $result->fetch_object()) {
                                $correo = $fila->correo;
                            }
                        }

                        if ($correo != '') {
                            echo $correo;
                        } else {
                            echo 'sin correo';
                        }
                        ?>
            </td>

               <?php
                    $dui = $value->getDui();
                    $result = $Conexion_ID->query("SELECT tipo FROM `usuario` WHERE idempleado = '$dui'");
                    if ($result) {
                        while ($fila = $result->fetch_object()) {
                            $tipo = $fila->tipo;
                        }
                    }
                ?>


            <td style="text-align: center;">
                <div class="btn-group" role="group">

                    <button type="button" class="btn btn-round btn-editar" onclick="abrirmodalEditar()"
                        data-target="#modalmodificarE" data-toggle="modal"
                        data-nombre='<?php echo $value->getNombre(); ?>'
                        data-apellido='<?php echo $value->getApellido(); ?>' data-dui='<?php echo $value->getDui(); ?>'
                        data-sexo='<?php echo $value->getSexo(); ?>' 
                        data-tipo='<?php echo $tipo;?>'
                        data-fecha='<?php echo $value->getFechaNacimiento(); ?>'
                        data-telefono='<?php echo $value->getTelefono(); ?>'
                        data-estado='<?php echo $value->getEstado(); ?>' data-toggle="tooltip">
                        <li class="fa fa-edit"></li>

                        <?php if ($value->getEstado() == 1) : ?>

                    </button>

                    </button><button type="button" onclick="abrirmodaldeBaja()" data-target="#DeBajaEmpleado"
                        data-toggle="modal" data-id="<?php echo $value->getDui(); ?>" class="btn btn-round btn-alta">
                        <li class="fa fa-thumbs-o-up"></li>
                        <!--fa fa-thumbs-o-up -->
                    </button>

                    <?php else : ?>

                    <button type="button" onclick="abrirmodaldeAlta()" data-target="#DeAltaEmpleado" data-toggle="modal"
                        data-id="<?php echo $value->getDui(); ?>" class="btn btn-round btn-baja">
                        <li class="fa fa-thumbs-o-down"></li>
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