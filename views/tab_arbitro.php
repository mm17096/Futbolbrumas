<table id="example1" class="table table-striped table-bordered" style="width:100%">
  <thead align="center">
    <tr>
      <th>N°</th>
      <th>DUI</th>
      <th>Nombre</th>
      <th>Teléfono</th>
      <th>Dirección</th>
      <th>Género</th>
      <th>Edad</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>

    <?php
    function obtenerEdad($fecha_nacimiento)
    {
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
    }
                    include_once ("../dao/DaoArbitro.php");
                    $daoE=new DaoArbitro();
                    $fila=$daoE->listaArbitro();
                    $i=0;
                    foreach($fila as $key=>$value){

    ?>
    <tr>
      <td align="center"><?php  echo $i=$i+1; ?></td>
      <td align="center"><?php  echo $value->getDui(); ?></td>
      <td align="center"><?php  echo $value->getNombre()." ".$value->getApellido(); ?></td>
      <td align="center"><?php  echo $value->getTelefono(); ?></td>
      <td align="center"><?php  echo $value->getDireccion(); ?></td>
      <td align="center"><?php  echo ($value->getSexo()==="M")?"Masculino":"Femenino"; ?></td>
      <td align="center"><?php  echo obtenerEdad($value->getFecha()); ?></td>
      <td align="center"><?php  echo ($value->getEstado()==true)?"Activo":"Inactivo"; ?></td>
      <td align="center">
        <div class="btn-group" role="group">
          <button href="#"  data-target="#editArbitroModal" class="btn btn-round btn-editar"  data-toggle="modal"
          data-dui='<?php echo $value->getDui();?>'
          data-nombre='<?php echo $value->getNombre();?>'
          data-apellido='<?php echo $value->getApellido();?>'
          data-sexo='<?php echo $value->getSexo();?>'
          data-direccion='<?php echo $value->getDireccion();?>'
          data-telefono='<?php echo $value->getTelefono();?>'
          data-fecha='<?php echo $value->getFecha();?>'
          data-toggle="tooltip">
            <li class="fa fa-edit"></li>
          </button>
          <?php if($value->getEstado()){?>
          <button href="#dar_baja"  class="btn btn-round btn-alta"  data-toggle="modal" data-duib="<?php  echo $value->getDui(); ?>">
            <li class="fa fa-thumbs-o-up"></li>
            <!--fa fa-thumbs-o-up -->
          </button>
        <?php }else{ ?>
          <button href="#dar_alta" type="button" class="btn btn-round btn-baja" data-toggle="modal" data-duia="<?php  echo $value->getDui(); ?>">
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
