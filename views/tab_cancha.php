<table id="example1" class="table table-striped table-bordered" style="width:100%">
  <thead align="center">
    <tr>
      <th>N°</th>
      <th>Cancha</th>
      <th>Dirección</th>
      <th>Ubicación</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>


    <?php
                    include_once ("../dao/DaoCancha.php");
                    $daoE=new DaoCancha();
                    $fila=$daoE->listaCancha();
                    $i=0;
                    $j=0;
                    foreach($fila as $key=>$value){

    ?>
    <tr>
      <td align="center"><?php  echo $i=$i+1; ?></td>
      <td align="center"><?php  echo $value->getNombre(); ?></td>
      <td align="center"><?php  echo $value->getDireccion(); ?></td>
      <?php if ($value->getLongitud()!=null && $value->getLatitud()!=null) {
         $j=$j+1;
        ?>
        <td align="center">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-round btn-editar" onclick="verMapaTabla(<?php echo $j; ?>)">
              <li class="fa fa-eye">Ver</li>
            </button>
          </div>
        </td>
        <input type="hidden" id="tablong<?php echo $j; ?>" name="tablong<?php echo $j; ?>"  value="<?php  echo $value->getLongitud(); ?>"/>
        <input type="hidden" id="tablat<?php  echo $j; ?>"  name="tablat<?php  echo $j; ?>"  value="<?php  echo $value->getLatitud(); ?>"/>


      <?php
    }else{
      ?>
      <td align="center"><?php  echo "No disponible"?></td>
      <?php
    }
      ?>
      <td align="center"><?php  echo ($value->getEstado()==true)?"Activa":"Inactiva"; ?></td>
      </td>
      <td align="center">
        <div class="btn-group" role="group">
          <button href="#"  data-target="#editCanchaModal" class="btn btn-round btn-editar"  data-toggle="modal"
          data-cancha='<?php echo $value->getId();?>'
          data-nombre='<?php echo $value->getNombre();?>'
          data-direccion='<?php echo $value->getDireccion();?>'
          data-long='<?php echo $value->getLongitud();?>'
          data-lat='<?php echo $value->getLatitud();?>'
          data-toggle="tooltip">
            <li class="fa fa-edit"></li>
          </button>
          <?php if($value->getEstado()){?>
          <button href="#dar_baja"  class="btn btn-round btn-alta"  data-toggle="modal" data-idc="<?php  echo $value->getId(); ?>">
            <li class="fa fa-thumbs-o-up"></li>
            <!--fa fa-thumbs-o-up -->
          </button>
        <?php }else{ ?>
          <button href="#dar_alta" type="button" class="btn btn-round btn-baja" data-toggle="modal" data-idca="<?php  echo $value->getId(); ?>">
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
