<?php
include_once ("../dao/DaoGol.php");
$id=$_REQUEST["id"];
$partido=$_REQUEST["partido"];
$daoJ= new DaoGoles();
$fila= $daoJ->ListaGolesBorrar($id,$partido);

if ($fila!=null) {

 ?>
<table class="table table-striped projects">

  <thead>
    <tr>
      <th style="width: 1%">N°</th>
      <th style="width: 20%">Tipo</th>
      <th>Hora</th>
      <th style="width: 20%">Acción</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $i=0;
        foreach($fila as $key=>$value){
            ?>
    <tr>
      <td><?php echo $i=$i+1; ?></td>
      <td>
        <a><?php echo $value->getTipo();?></a>
      </td>
      <td>
        <a><?php echo str_replace('-','/',date('h:i A',strtotime($value->getTiempo())));?></a>
      </td>
      <td>
        <?php
        $m=0;
        $l=0;

         ?>
        <button type="button" class="btn btn-round btn-baja" onclick="borrar(<?php echo $value->getJugador().",". $value->getIdGol();?>)">
            <li class="fa fa-trash"></li>
        </button>
      </td>
    </tr>
  </tbody>
  <?php } ?>

</table>
<?php }else{
  ?>
      <p>¡Sin registro de goles para este jugador!</p>
  <?php
}


 ?>
