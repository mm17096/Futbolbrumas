<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
  <thead align="center">
    <tr>
      <th>N°</th>
      <th>Nombre</th>
      <th># Camiseta</th>
      <th>Agregar</th>
    </tr>
  </thead>

  <tbody>
      <?php
      $id=$_REQUEST["id"];
      $partido=$_REQUEST["partido"];
      include_once ("../dao/DaoJugador.php");
      $daoJ=new DaoJugador();
      $fila=$daoJ->listaDejugadoresEquipotabla($id);
      $i=0;
      foreach($fila as $key=>$value){
        if ($value->getTitular()== true) {

      ?>
    <tr>
      <td align="center"><?php  echo $i=$i+1; ?></td>
      <td align="center"><?php  echo $value->getNombre()." ".$value->getApellido();?></td>
      <td align="center"><?php  echo $value->getNumerocamisa();?></td>
      <td align="center">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-round btn-gol"  data-toggle="modal" data-target="#modalCambioA" data-partidoca='<?php  echo $partido; ?>' data-jugadorca='<?php  echo $value->getIdjugador();?>'>
            <li class="fa fa-plus"></li>  Cambio
          </button>
          
        </div>
      </td>
    </tr>
      <?php }  ?>
    <?php }  ?>
  </tbody>
</table>
