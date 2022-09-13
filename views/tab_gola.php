<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
  <thead align="center">
    <tr>
      <th>N°</th>
      <th>Nombre</th>
      <th># Camiseta</th>
      <th># Goles</th>
      <th>Acción</th>
    </tr>
  </thead>

  <tbody>
      <?php
      $id=$_REQUEST["id"];
      $partido=$_REQUEST["partido"];
      include_once ("../dao/DaoJugador.php");
      include_once ("../dao/DaoGol.php");
      $daoJ=new DaoJugador();
      $dao= new DaoGoles();
      $fila=$daoJ->listaDejugadoresEquipotabla($id);
      $i=0;
      foreach($fila as $key=>$value){
      ?>
    <tr>
      <td align="center"><?php  echo $i=$i+1; ?></td>
      <td align="center" style="width: 40%"><?php  echo $value->getNombre()." ".$value->getApellido();?></td>
      <td align="center" style="width: 1%"><?php  echo $value->getNumerocamisa();?></td>
      <td align="center" style="width: 1%"><?php  echo $dao->listaGolesJugador($value->getIdjugador(),$partido); ?></td>
      <td align="center">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-round btn-gol"  data-toggle="modal" data-target="#modalGol" data-partidog='<?php  echo $partido; ?>' data-jugadorg='<?php  echo $value->getIdjugador();?>'>
            <li class="fa fa-plus"></li>
          </button>
            <button type="button" class="btn btn-round btn-baja"  data-toggle="modal" data-target="#modalBorrar" data-partidod='<?php  echo $partido; ?>' data-jugadord='<?php  echo $value->getIdjugador();?>'>
            <li class="fa fa-remove"></li>
            </button>
        </div>
      </td>
    </tr>
    <?php }  ?>
  </tbody>
</table>
