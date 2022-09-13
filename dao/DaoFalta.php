<?php
require_once ("../clases/Falta.php");
require_once ("../conexion/Conexion.php");



class DaoFalta{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }


    function registroFaltas(Falta $e){

        if(!($e instanceof Falta)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Falta";
            return 0;
        }
        $result= $this->Conexion_ID->query("insert into falta values('".$e->getIdFalta()."','".$e->getDescripcion()." ','".$e->getTipo()."','".$e->getTiempo()."','".$e->getJugador()."','".$e->getIdPartido()."')");
        if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }


    function listaFaltas($jugador,$partido){
      $result=$this->Conexion_ID->query("SELECT f.idfalta FROM falta f INNER JOIN jugador j ON f.idjugador = j.idjugador INNER JOIN partido p ON  f.idpartido = p.idpartido  WHERE p.idpartido= '".$partido."'  AND j.idjugador='".$jugador."'");
        $falta= 0;
        if($result){
          while($fila=$result->fetch_object()){
              $falta=$falta+1;

          }

        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_connect_error();
        }

        return $falta;
    }


    function listaFaltasBorrar($jugador,$partido){
      $result=$this->Conexion_ID->query("SELECT f.idfalta,f.observacion,f.tipo,f.tiempo,f.idjugador,f.idpartido FROM falta f INNER JOIN jugador j ON f.idjugador = j.idjugador INNER JOIN partido p ON  f.idpartido = p.idpartido  WHERE p.idpartido= '".$partido."'  AND j.idjugador='".$jugador."'");
        $listado =array();
        if($result){
          while($fila=$result->fetch_object()){
            $listado[]=new Falta($fila->idfalta,$fila->observacion,$fila->tipo,$fila->tiempo,$fila->idjugador,$fila->idpartido);

          }

        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_connect_error();
        }

        return $listado;
    }

    function eliminarFalta($id){

        $result= $this->Conexion_ID->query("DELETE FROM falta  WHERE idfalta='".$id."' ");
        if(!$result){
            return 0;
        }else {
            return 1;
        }

    }




}
?>
