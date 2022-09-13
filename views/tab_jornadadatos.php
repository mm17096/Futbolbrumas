<!-- start project list -->

  <?php
    include_once ("../dao/DaoJornada.php");
    include_once ("../dao/DaoPartido.php");
    include_once ("../dao/DaoEquipo.php");
    include_once ("../dao/DaoCancha.php");
    $dao=new DaoJornada();
    $daop=new DaoPartido();
    $daoc=new DaoCancha();



if (count($dao->listaJornadasClasificatoria("rondas"))!=0) {
  // Rondas
  $fila=$dao->listaJornadasClasificatoria("rondas");
  foreach($fila as $key=>$value){
    $contador=0;
    $filap=$daop->DatosPartidoJornada($value->getIdjornada());
    foreach ($filap as $key => $value) {
        if ($value->getEstado()) {
          $contador=$contador +1;
        }
    }

    if ($contador !=0) {
      $daoEquipo=new DaoEquipo();
      $i=0;
?>
<table class="table table-striped projects">
  <h2><b>Jornada <?php  echo $value->getIdjornada(); ?></b></h2>
<thead>
<tr>
  <th style="width: 8%">N°</th>
  <th style="width: 15%">Equipo A </th>
  <th style="width: 15%">Equipo B</th>
  <th>Cancha</th>
  <th>Fecha</th>
  <th>Hora</th>
  <th style="width: 20%">Acción</th>
</tr>
</thead>
<?php  foreach($filap as $key=>$values){
  if ($values->getEstado()) {

?>
<tbody>
<tr>
  <td><?php echo $i=$i+1; ?></td>
  <td>
    <a><?php echo $daoEquipo->BuscarEquipo($values->getEquipoa())->getNombre();?></a>
  </td>
  <td>
    <a><?php echo $daoEquipo->BuscarEquipo($values->getEquipob())->getNombre();?></a>
  </td>
  <td>
    <a><?php echo $daoc->BuscarCancha($values->getIdcancha())->getNombre();?></a>
  </td>
  <td >
    <a><?php echo str_replace('-','/',date('d-m-Y',strtotime($values->getFechapartido())));?></a>
  </td>
  <td>
    <a><?php echo str_replace('-','/',date('h:i A',strtotime($values->getFechapartido())));?></a>
  </td>
  <td>
    <button type="button" class="btn btn-round btn-info" onclick="rederigir(<?php  echo $values->getIdPartido(); ?>)">
        <li class="fa fa-file-text"></li> Datos Partido
    </button>
  </td>
</tr>
</tbody>
<?php } ?>
<?php } ?>
<?php } ?>
</table>
<?php }

}else {
  if (count($dao->listaJornadasClasificatoria("cuartos"))!=0) {
    // Cuartos
    $fila=$dao->listaJornadasClasificatoria("cuartos");
    foreach($fila as $key=>$value){
      $contador=0;
      $filap=$daop->DatosPartidoJornada($value->getIdjornada());
      foreach ($filap as $key => $value) {
          if ($value->getEstado()) {
            $contador=$contador +1;
          }
      }

      if ($contador !=0) {
        $daoEquipo=new DaoEquipo();
        $i=0;
  ?>
  <table class="table table-striped projects">
    <h2><b>Cuartos de final</b></h2>
  <thead>
    <tr>
      <th style="width: 8%">N°</th>
      <th style="width: 15%">Equipo A </th>
      <th style="width: 15%">Equipo B</th>
      <th>Cancha</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th style="width: 20%">Acción</th>
    </tr>
  </thead>
  <?php  foreach($filap as $key=>$values){
    if ($values->getEstado()) {

  ?>
  <tbody>
  <tr>
    <td><?php echo $i=$i+1; ?></td>
    <td>
      <a><?php echo $daoEquipo->BuscarEquipo($values->getEquipoa())->getNombre();?></a>
    </td>
    <td>
      <a><?php echo $daoEquipo->BuscarEquipo($values->getEquipob())->getNombre();?></a>
    </td>
    <td>
      <a><?php echo $daoc->BuscarCancha($values->getIdcancha())->getNombre();?></a>
    </td>
    <td >
      <a><?php echo str_replace('-','/',date('d-m-Y',strtotime($values->getFechapartido())));?></a>
    </td>
    <td>
      <a><?php echo str_replace('-','/',date('h:i A',strtotime($values->getFechapartido())));?></a>
    </td>
    <td>
      <button type="button" class="btn btn-round btn-info" onclick="rederigir(<?php  echo $values->getIdPartido(); ?>)">
          <li class="fa fa-file-text"></li> Datos Partido
      </button>
    </td>
  </tr>
  </tbody>
  <?php } ?>
  <?php } ?>
  <?php } ?>
  </table>
  <?php }



  }else {
    if (count($dao->listaJornadasClasificatoria("semifinal"))!=0) {
      // Semifinal

      $fila=$dao->listaJornadasClasificatoria("semifinal");
      foreach($fila as $key=>$value){
        $contador=0;
        $filap=$daop->DatosPartidoJornada($value->getIdjornada());
        foreach ($filap as $key => $value) {
            if ($value->getEstado()) {
              $contador=$contador +1;
            }
        }

        if ($contador !=0) {
          $daoEquipo=new DaoEquipo();
          $i=0;
    ?>
    <table class="table table-striped projects">
      <h2><b>Semifinal</b></h2>
    <thead>
      <tr>
        <th style="width: 8%">N°</th>
        <th style="width: 15%">Equipo A </th>
        <th style="width: 15%">Equipo B</th>
        <th>Cancha</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th style="width: 20%">Acción</th>
      </tr>
    </thead>
    <?php  foreach($filap as $key=>$values){
      if ($values->getEstado()) {

    ?>
    <tbody>
    <tr>
      <td><?php echo $i=$i+1; ?></td>
      <td>
        <a><?php echo $daoEquipo->BuscarEquipo($values->getEquipoa())->getNombre();?></a>
      </td>
      <td>
        <a><?php echo $daoEquipo->BuscarEquipo($values->getEquipob())->getNombre();?></a>
      </td>
      <td>
        <a><?php echo $daoc->BuscarCancha($values->getIdcancha())->getNombre();?></a>
      </td>
      <td >
        <a><?php echo str_replace('-','/',date('d-m-Y',strtotime($values->getFechapartido())));?></a>
      </td>
      <td>
        <a><?php echo str_replace('-','/',date('h:i A',strtotime($values->getFechapartido())));?></a>
      </td>
      <td>
        <button type="button" class="btn btn-round btn-info" onclick="rederigir(<?php  echo $values->getIdPartido(); ?>)">
            <li class="fa fa-file-text"></li> Datos Partido
        </button>
      </td>
    </tr>
    </tbody>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    </table>
    <?php }


    }else {
      if (count($dao->listaJornadasClasificatoria("final"))!=0) {
        // Final
        $fila=$dao->listaJornadasClasificatoria("final");
        foreach($fila as $key=>$value){
          $contador=0;
          $filap=$daop->DatosPartidoJornada($value->getIdjornada());
          foreach ($filap as $key => $value) {
              if ($value->getEstado()) {
                $contador=$contador +1;
              }
          }

          if ($contador !=0) {
            $daoEquipo=new DaoEquipo();
            $i=0;
      ?>
      <table class="table table-striped projects">
        <h2><b>Final</b></h2>
      <thead>
        <tr>
          <th style="width: 8%">N°</th>
          <th style="width: 15%">Equipo A </th>
          <th style="width: 15%">Equipo B</th>
          <th>Cancha</th>
          <th>Fecha</th>
          <th>Hora</th>
          <th style="width: 20%">Acción</th>
        </tr>
      </thead>
      <?php  foreach($filap as $key=>$values){
        if ($values->getEstado()) {

      ?>
      <tbody>
      <tr>
        <td><?php echo $i=$i+1; ?></td>
        <td>
          <a><?php echo $daoEquipo->BuscarEquipo($values->getEquipoa())->getNombre();?></a>
        </td>
        <td>
          <a><?php echo $daoEquipo->BuscarEquipo($values->getEquipob())->getNombre();?></a>
        </td>
        <td>
          <a><?php echo $daoc->BuscarCancha($values->getIdcancha())->getNombre();?></a>
        </td>
        <td >
          <a><?php echo str_replace('-','/',date('d-m-Y',strtotime($values->getFechapartido())));?></a>
        </td>
        <td>
          <a><?php echo str_replace('-','/',date('h:i A',strtotime($values->getFechapartido())));?></a>
        </td>
        <td>
          <button type="button" class="btn btn-round btn-info" onclick="rederigir(<?php  echo $values->getIdPartido(); ?>)">
              <li class="fa fa-file-text"></li> Datos Partido
          </button>
        </td>
      </tr>
      </tbody>
      <?php } ?>
      <?php } ?>
      <?php } ?>
      </table>
      <?php }

      }
      ?>
              <h4 align="center">¡No hay partidos dispnibles para el registro de resulados!</h4>
  <?php

    }
  }
}

?>
