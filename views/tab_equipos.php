<h2 style="text-align: center;">Lista de Equipos</h2>
<table id="tablaequipos" class="table table-striped table-bordered" style="width:100%">
  <thead align="center">
    <tr>
      <th>Nombre Equipo</th>
      <th>Representante</th>
      <th>N° Jugadores</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once ("../dao/DaoEquipo.php");
      include_once ("../dao/DaoRepresentante.php");
      include_once ("../dao/DaoJugador.php");
      
      $daoE=new DaoEquipo();
      $daoRepresentante=new DaoRepresentante();
      $daoJugador=new DaoJugador();
      $fila=$daoE->listaEquipoActivos();   
      foreach($fila as $key=>$value){                       
    ?>
    <tr>
      <td align="center"><?php echo $value->getNombre();?></td>
      <td align="center"><?php echo $daoRepresentante->BuscarRepresentanteR($value->getIdrepresentante())->getNombre()?>  <?php echo $daoRepresentante->BuscarRepresentanteR($value->getIdrepresentante())->getApellido()?></td>
      <td align="center"><?php echo count($daoJugador->listaDejugadoresEquipotabla($value->getIdequipo()));?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php

  include_once ("../dao/DaoPartido.php");
  $daoPartido=new DaoPartido();
  if(count($daoPartido->listaPartidos())!=0){
?>

<h2 style="text-align: center;">Lista de Partidos</h2>
<table id="tablapartidos" class="table table-striped table-bordered" style="width:100%">
  <thead align="center">
    <tr>
      
      <th>N° Jornada</th>
      <th>Fecha Partido</th>
      <th>Hora</th>
      <th>Equipo A  vs Equipo B</th>
      <th>Arbitro</th>
      <th>Cancha</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once ("../dao/DaoPartido.php");
      include_once ("../dao/DaoEquipo.php");
      include_once ("../dao/DaoArbitro.php");
      include_once ("../dao/DaoCancha.php");

      $daoPartido=new DaoPartido();
      $daoEquipo=new DaoEquipo();
      $daoArbitro=new DaoArbitro();
      $daoCancha=new DaoCancha();

      $fila=$daoPartido-> listaPartidos();   
      foreach($fila as $key=>$value){    
        $date = new DateTime($value->getFechapartido());                   
    ?>
    <tr> 
    <td align="center"><?php echo $value->getIdjornada();?></td>
      <td align="center"><?php echo $date->format('d-m-Y')?></td>
      <td align="center"><?php echo $date->format('H:i:s');?></td>
      <td align="center"><?php echo $daoEquipo->BuscarEquipo($value->getEquipoa())->getNombre(); ?>   vs  <?php echo $daoEquipo->BuscarEquipo($value->getEquipob())->getNombre();?></td>
      
      <td align="center"><?php echo $daoArbitro->BuscarArbitro($value->getIdarbitroa())->getNombre();?><?php echo $daoArbitro->BuscarArbitro($value->getIdarbitroa())->getApellido() ;?></td>
      <td align="center"><?php echo $daoCancha->BuscarCancha($value->getIdcancha())->getNombre() ;?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php
  }
?>
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
