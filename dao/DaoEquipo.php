<?php
require_once ("../clases/Equipo.php");
require_once ("../conexion/Conexion.php");
//require_once ("../dao/DaoJugador.php");



class DaoEquipo{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }
//muestra todos los datos en la tabla jugadores
function listaEquipoE(){
    $result=$this->Conexion_ID->query("SELECT * FROM equipo  order by idequipo asc");
    $listado= array();// contendra todos nuestros datos de la base de datos
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]=new Equipo($fila->idequipo,$fila->nombre,$fila->camisa,$fila->idrepresentante,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_connect_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}

function lista_Equipo_es($dui){
    $result=$this->Conexion_ID->query("SELECT * FROM equipo WHERE idrepresentante = '$dui'  order by idequipo asc");
    $listado= array();// contendra todos nuestros datos de la base de datos
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]=new Equipo($fila->idequipo,$fila->nombre,$fila->camisa,$fila->idrepresentante,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_connect_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}

function listaEquipo_es($dui){
    $result=$this->Conexion_ID->query("SELECT * FROM equipo WHERE idrepresentante = '$dui' order by idequipo asc");
    $listado= array();// contendra todos nuestros datos de la base de datos
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]=new Equipo($fila->idequipo,$fila->nombre,$fila->camisa,$fila->idrepresentante,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_connect_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}

    function listaEquipo(){
        $result=$this->Conexion_ID->query("SELECT * FROM equipo order by idequipo asc");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Equipo($fila->idequipo,$fila->nombre,$fila->camisa,$fila->idrepresentante,$fila->estado);

            }
        }if(!$result){
            $this->Errno=mysqli_connect_errno();
            $this->Errror=mysqli_connect_error();
        }
        return $listado;
    }

    function BuscarimagenEquipo($idequipo){

        $result=$this->Conexion_ID->query("SELECT * FROM equipo WHERE idequipo='".$idequipo."'");
        $equipo=null;
        if($result){
            while($fila=$result->fetch_object()){
                $equipo=new Equipo($fila->idequipo,$fila->nombre,$fila->camisa,$fila->idrepresentante,$fila->estado);

            }
        }if(!$result){
            $this->Errno=mysqli_connect_errno();
            $this->Errror=mysqli_connect_error();
        }
        return $equipo;
    }
    function BuscarEquipo($idequipo){
        $result=$this->Conexion_ID->query("SELECT * FROM equipo WHERE idequipo='".$idequipo."'");
        $equipo=null;
        if($result){
            while($fila=$result->fetch_object()){
                $equipo=new Equipo($fila->idequipo,$fila->nombre,$fila->camisa,$fila->idrepresentante,$fila->estado);

            }
        }if(!$result){
            $this->Errno=mysqli_connect_errno();
            $this->Errror=mysqli_connect_error();
        }
        return $equipo;
    }


    //para registrar los datos de los equipos
    function registroEquipo(Equipo $e){


        if(!($e instanceof Equipo)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Equipo";
            return 0;
        }
        $result= $this->Conexion_ID->query("INSERT into equipo VALUES('".$e->getIdequipo()."','".$e->getNombre()."','".$e->getCamisa()."','".$e->getIdrepresentante()."','".$e->getEstado()."')");
        if(!$result){
            $this->Errno=mysqli_connect_errno();
            $this->Errror=mysqli_connect_error();

            return 0;
        }else {
            return 1;
        }

}
  /*CODIGO PARA PODER ELIMINAR A UN EQUIPO
    function eliminarEquipo(Equipo $idequipo){

        if(!($e instanceof Equipo)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Equipo";
            return 0;
        }
        $result= $this->Conexion_ID->query("DELETE FROM equipo  WHERE idequipo='".$idequipo->getIdequipo()."' ");
        if(!$result){
            return 0;
        }else {
            return 1;
        }

    }
    */

    function Imagen($id){
        if(!($id instanceof Equipo)){
            $this->Error="Error de instanciado, \n el objeto no es de tipo clase Equipo";
            return 0;
        }
        $result= $this->Conexion_ID->query("SELECT*FROM equipo WHERE idequipo='".$id."'");
        if(!$result){
            return 0;
        }else{
            return 1;
        }

    }
    //CODIGO PARA DAR DE BAJA AL EQUIPO
    function DesactivarEquipo($id){
        if(!($id instanceof Equipo)){
            $this->Error="Error de instanciado, \n el objeto no es de tipo clase Equipo";
            return 0;
        }
        $result= $this->Conexion_ID->query("UPDATE equipo SET estado='".$id->getEstado()."'  WHERE idequipo='".$id->getIdequipo()."'");
        if(!$result){
            return 0;
        }else{
            return 1;
        }

    }

//CODIGO PARA DAR DE ALTA AL EQUIPO
   function ActivarEquipo($id){
        if(!($id instanceof Equipo)){
            $this->Error="Error de instanciado, \n el objeto no es de tipo clase Equipo";
            return 0;
        }
        $result= $this->Conexion_ID->query("UPDATE equipo SET estado='".$id->getEstado()."'  WHERE idequipo='".$id->getIdequipo()."'");
        if(!$result){
            return 0;
        }else{
            return 1;
        }

    }

//Actulizar estado de equipo

function actualizarEstadoEquipo($idequipo){

    $result= $this->Conexion_ID->query("UPDATE `equipo` SET estado=1 WHERE idequipo='".$idequipo."'");
    if(!$result){
        $this->Errno=mysqli_connect_errno();
        $this->Errror=mysqli_connect_error();
        return 0;
    }else {
        return 1;
    }

}

//para obtener nombre de equipo
    function ObtenerEquipo($idequipo){

      $result=$this->Conexion_ID->query("SELECT * FROM equipo e WHERE e.idequipo='".$idequipo."'");
      $listado= "";// contendra todos nuestros datos de la base de datos
      if($result){
          while($fila=$result->fetch_object()){
              $listado=$fila->nombre;

          }
      }if(!$result){
        $this->Errno=mysqli_connect_errno();
        $this->Errror=mysqli_connect_error();
      }
      return $listado;
    }

    function actualizarEquipo(Equipo $idequipo){

        if(!($idequipo instanceof Equipo)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Equipo";
            return 0;
        }
        $result= $this->Conexion_ID->query("UPDATE equipo SET nombre ='".$idequipo->getNombre()."' ,camisa='".$idequipo->getCamisa()."',idrepresentante='".$idequipo->getIdrepresentante()."' WHERE idequipo='".$idequipo->getIdequipo()."'");
        if(!$result){
            $this->Errno=mysqli_connect_errno();
            $this->Errror=mysqli_connect_error();
            return 0;
        }else {
            return 1;
        }

    }



function verificarNombreEquipo($nombre){

    $result= $this->Conexion_ID->query("SELECT e.nombre FROM equipo e where e.nombre='".$nombre."'");

    if($result && $result->num_rows == 1){
        return 1;
    }else{
        return 0;
    }
}
function verificarNombreEquipoEdit($nombre){

    $result= $this->Conexion_ID->query("SELECT e.nombre FROM equipo e where e.nombre='".$nombre."'");

    if($result && $result->num_rows == 1){
        return 1;
    }else{
        return 0;
    }
}

    function actualizarEquiposinIMG(Equipo $idequipo){

        if(!($idequipo instanceof Equipo)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Equipo";
            return 0;
        }
        $result= $this->Conexion_ID->query("UPDATE equipo SET nombre ='".$idequipo->getNombre()."',idrepresentante='".$idequipo->getIdrepresentante()."' WHERE idequipo='".$idequipo->getIdequipo()."'");
        if(!$result){
            $this->Errno=mysqli_connect_errno();
            $this->Errror=mysqli_connect_error();
            return 0;
        }else {
            return 1;
        }


    }
    function listaEquipoActivos(){
        $result=$this->Conexion_ID->query("SELECT * FROM equipo WHERE estado =1 order by idequipo asc ");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Equipo($fila->idequipo,$fila->nombre,$fila->camisa,$fila->idrepresentante,$fila->estado);

            }
        }if(!$result){
            $this->Errno=mysqli_connect_errno();
            $this->Errror=mysqli_connect_error();
        }
        return $listado;
    }
    function listaEquipoInactivo(){
        $result=$this->Conexion_ID->query("SELECT * FROM equipo WHERE estado =0 order by idequipo asc ");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Equipo($fila->idequipo,$fila->nombre,$fila->camisa,$fila->idrepresentante,$fila->estado);

            }
        }if(!$result){
            $this->Errno=mysqli_connect_errno();
            $this->Errror=mysqli_connect_error();
        }
        return $listado;
    }
    function listaEquipos(){
        $result=$this->Conexion_ID->query("SELECT * FROM equipo  order by idequipo asc ");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Equipo($fila->idequipo,$fila->nombre,$fila->camisa,$fila->idrepresentante,$fila->estado);

            }
        }if(!$result){
            $this->Errno=mysqli_connect_errno();
            $this->Errror=mysqli_connect_error();
        }
        return $listado;
    }

    //Codigo de Diego

function ObtenerNombreEquipo($id){

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


  function DesactivarEquipoDatosTodos(){
        $result= $this->Conexion_ID->query("UPDATE equipo SET estado =0");
        if(!$result){
            return 0;
        }else{
            return 1;
        }

    }

    function DesactivarEquipoDatos($id, $estado){
        $result= $this->Conexion_ID->query("UPDATE equipo SET estado ='$estado'  WHERE idequipo = '$id'");
        if(!$result){
            return 0;
        }else{
            return 1;
        }

    }


}
