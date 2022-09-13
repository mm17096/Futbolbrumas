<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
  <thead align="center">
    <tr>
      <th>N°</th>
      <th>Nombre</th>
      <th># Camiseta</th>
      <th># Goles</th>
      <th>Agregar</th>
    </tr>
  </thead>

  <tbody>
      <?php
      $id=$_REQUEST["id"];
      $partido=$_REQUEST["partido"];
      include_once ("../dao/DaoJugador.php");
      include_once ("../dao/DaoFalta.php");
      $daoJ=new DaoJugador();
      $dao= new DaoFalta();
      $fila=$daoJ->listaDejugadoresEquipotabla($id);
      $i=0;
      foreach($fila as $key=>$value){
      ?>
    <tr>
      <td align="center" style="width: 1%"><?php  echo $i=$i+1; ?></td>
      <td align="center" style="width: 35%"><?php  echo $value->getNombre()." ".$value->getApellido();?></td>
      <td align="center" style="width: 10%"><?php  echo $value->getNumerocamisa();?></td>
      <td align="center" style="width: 10%"><?php  echo $dao->listaFaltas($value->getIdjugador(),$partido); ?></td>
      <td align="center">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-round btn-gol"  data-toggle="modal" data-target="#modalFalta" data-partidof='<?php  echo $partido; ?>' data-jugadorf='<?php  echo $value->getIdjugador();?>'>
            <li class="fa fa-plus"></li>
          </button>
          <button type="button" class="btn btn-round btn-baja"  data-toggle="modal" data-target="#modalBorrarFalta" data-partidodf='<?php  echo $partido; ?>' data-jugadordf='<?php  echo $value->getIdjugador();?>'>
          <li class="fa fa-remove"></li>
          </button>
        </div>
      </td>
    </tr>
    <?php }  ?>
  </tbody>
</table>
