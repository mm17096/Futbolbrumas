<?php
require_once ("../clases/Equipo.php");
require_once ("../conexion/Conexion.php");
require_once ("../dao/DaoJugador.php");



class DaoEquipo{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }

    function CantidadEquipos($dui){
        $result=$this->Conexion_ID->query("SELECT COUNT(idequipo) as cantidad FROM equipo WHERE idrepresentante = '$dui'");
        $equipos = null;
        if($result){
            while($fila = $result->fetch_object()){
                $equipos = $fila->cantidad;
            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $equipos;
    }

    function BuscarEquipo($id){
        $result=$this->Conexion_ID->query("SELECT * FROM `equipo` WHERE idequipo=".$id);
        $equipo=null;
        if($result){
            while($fila=$result->fetch_object()){
                $equipo=new Equipo($fila->idequipo,$fila->nombre,$fila->idestadio,$fila->estado,$fila->puntos);
            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $equipo;
    }

    function listaEquipoPuntos(){
        $result=$this->Conexion_ID->query("SELECT equipo.idequipo, equipo.nombre,equipo.idestadio,equipo.puntos,equipo.estado FROM equipo ORDER BY equipo.puntos DESC");
        $listado = array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Equipo($fila->idequipo,$fila->nombre,$fila->idestadio,$fila->estado,$fila->puntos);

            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $listado;
    }
    function listaEquipo(){
        $result=$this->Conexion_ID->query("SELECT * FROM equipo order by idequipo asc");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Equipo($fila->idequipo, $fila->nombre, $fila->camisa, $fila->idrepresentante, $fila->estado);
            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $listado;
    }

    //VALIDACIONES PARA EQUIPOS QUE LLEVEN  MAS DE 22 JUGADORES
    function listaEquipoJornada(){// 1 cuando se agrega a la lista y 0 cuando ya jugo
        $result=$this->Conexion_ID->query("SELECT * FROM equipo  WHERE  equipo.estado = 1 ORDER BY equipo.idequipo ASC");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $daoJugador=new DaoJugador();
                $cantidadJugadorEquipo=$daoJugador->JugadoresActivos($fila->idequipo);
                if($cantidadJugadorEquipo!=null){
                    if($cantidadJugadorEquipo>=12){
                        $listado[]=new Equipo($fila->idequipo,$fila->nombre,$fila->idestadio,$fila->estado,$fila->puntos);
                    }
                }


            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $listado;
    }

    function registroEquipo(Equipo $e){

            if(!($e instanceof Equipo)){
                $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Equipo";
                return 0;
            }
            $result= $this->Conexion_ID->query("insert into equipo values('".$e->getId()."','".$e->getNombre()."','".$e->getIdEstadio()."','".$e->getEstado()."','".$e->getPuntos()."')");
            if(!$result){
                $this->Errno=mysqli_conecct_errno();
                $this->Errror=mysqli_conecct_error();
                return 0;
            }else {
                return 1;
            }

    }
    function actualizarEquipo(Equipo $e){

        if(!($e instanceof Equipo)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Equipo";
            return 0;
        }
        $result= $this->Conexion_ID->query("UPDATE equipo SET nombre ='".$e->getNombre()."' ,idestadio='".$e->getIdEstadio()."' WHERE idequipo='".$e->getId()."' ");
        if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }
    function eliminarEquipo(Equipo $e){

        if(!($e instanceof Equipo)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Equipo";
            return 0;
        }
        $result= $this->Conexion_ID->query("DELETE FROM equipo  WHERE idequipo='".$e->getId()."' ");
        if(!$result){
            return 0;
        }else {
            return 1;
        }

    }


    //codigo de Diego
    //para obtener puntos de equipo
        function ObtenerPuntosEquipo($id){

          $result=$this->Conexion_ID->query("SELECT * FROM equipo e WHERE e.idequipo='".$id."'");
          $listado= 0;// contendra todos nuestros datos de la base de datos
          if($result){
              while($fila=$result->fetch_object()){
                  $listado=$fila->puntos;

              }
          }if(!$result){
              $this->Errno=mysqli_conecct_errno();
              $this->Errror=mysqli_conecct_error();
          }
          return $listado;
        }


//Actulizar puntos de equipo
function actualizarPuntosEquipo($id,$puntos){

    $result= $this->Conexion_ID->query("UPDATE equipo SET puntos ='".$puntos."'  WHERE idequipo='".$id."' ");
    if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_conecct_error();
        return 0;
    }else {
        return 1;
    }

}

function actualizarEstadoEquipo($id){

    $result= $this->Conexion_ID->query("UPDATE `equipo` SET estado=1 WHERE idequipo='".$id."'");
    if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_conecct_error();
        return 0;
    }else {
        return 1;
    }

}

//para obtener nombre de equipo
    function ObtenerEquipo($id){

      $result=$this->Conexion_ID->query("SELECT * FROM equipo e WHERE e.idequipo='".$id."'");
      $listado= "";// contendra todos nuestros datos de la base de datos
      if($result){
          while($fila=$result->fetch_object()){
              $listado=$fila->nombre;

          }
      }if(!$result){
          $this->Errno=mysqli_conecct_errno();
          $this->Errror=mysqli_conecct_error();
      }
      return $listado;
    }



}
?>
