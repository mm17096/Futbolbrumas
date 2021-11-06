<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
  <thead align="center">
    <tr>
      <th>Nombre</th>
      <th>Representante</th>
      <th>Camiseta</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once ("../dao/DaoEquipo.php");
      include_once ("../dao/DaoRepresentante.php");
      $daoE=new DaoEquipo();
      $daoRepresentante=new DaoRepresentante();
      $fila=$daoE->listaEquipo();   
      foreach($fila as $key=>$value){                       
    ?>
    <tr>
      <td align="center"><?php echo $value->getNombre();?></td>
      <td align="center"><?php echo $daoRepresentante->BuscarRepresentanteR($value->getIdrepresentante())->getNombre()?>  <?php echo $daoRepresentante->BuscarRepresentanteR($value->getIdrepresentante())->getApellido()?></td>
      <td align="center" class="col-6-lg-6">
      <img height="60px" src="data:a/jpg;base64,<?php echo base64_encode($value->getCamisa())?>"  class="card-ing-top">  
      </td>
      <td align="center">
        <div class="btn-group" role="group" aria-label="Basic example"> 
         
          <button href="#editEquipoModal" class="btn btn-round btn-editar"
          data-toggle="modal"
          data-idequipo='<?php echo $value->getIdequipo();?>'
          data-nombre='<?php echo $value->getNombre();?>' 
          data-idrepresentante='<?php echo $value->getIdrepresentante();?>'
          data-toggle="tooltip">
            <li class="fa fa-edit"></li>
          </button>
          <?php if($value->getEstado()){?>
          <button href="#dar_baja"  data_target="dar_baja"  class="btn btn-round btn-alta"  data-toggle="modal" data-idequipo='<?php  echo $value->getIdequipo(); ?>'>
            <li class="fa fa-thumbs-o-up"></li>
            <!--fa fa-thumbs-o-up -->
          </button>
          
        <?php }else{ ?>
          <button href="#dar_alta" type="button" class="btn btn-round btn-baja" data-toggle="modal" data-idequipo="<?php  echo $value->getIdequipo(); ?>">
            <li class="fa fa-thumbs-o-down"></li>
            <!--fa fa-thumbs-o-up -->
          </button>
        <?php } ?>
        </div>
      </td>
    </tr>
    <?php } ?>
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
