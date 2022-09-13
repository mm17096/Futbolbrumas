<?php
require_once ("../clases/Cancha.php");
require_once ("../conexion/Conexion.php");

class DaoCancha{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }


    function listaCancha(){
        $result=$this->Conexion_ID->query("SELECT * FROM cancha ORDER BY idcancha ASC");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Cancha($fila->idcancha,$fila->nombre,$fila->direccion,$fila->longitud,$fila->latitud,$fila->estado);
            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $listado;
    }



    function registroCancha(Cancha $e){

        if(!($e instanceof Cancha)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Cancha";
            return 0;
        }
        $result= $this->Conexion_ID->query("insert into cancha values('".$e->getId()."','".$e->getNombre()."','".$e->getLatitud()."','".$e->getLongitud()."','".$e->getDireccion()."','".$e->getEstado()."')");
        if(!$result){
            return 0;
        }else {
            return 1;
        }

    }
    function listaCanchaActivas(){
        $result=$this->Conexion_ID->query("SELECT * FROM	cancha WHERE cancha.estado = 1");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Cancha($fila->idcancha,$fila->nombre,$fila->direccion,$fila->longitud,$fila->latitud,$fila->estado);
            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $listado;
    }
    function listaCanchaInactiva(){
        $result=$this->Conexion_ID->query("SELECT * FROM	cancha WHERE cancha.estado = 0");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Cancha($fila->idcancha,$fila->nombre,$fila->direccion,$fila->longitud,$fila->latitud,$fila->estado);
            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $listado;
    }

    function actualizarCancha(Cancha $e){


            if(!($e instanceof Cancha)){
                $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Cancha";
                return 0;
            }
            $result= $this->Conexion_ID->query("UPDATE cancha SET nombre ='".$e->getNombre()."',direccion ='".$e->getDireccion()."', longitud='".$e->getLongitud()."', latitud='".$e->getLatitud()."' WHERE idcancha='".$e->getId()."' ");
            if(!$result){
                return 0;
            }else {
                return 1;
            }

    }

    function estadoCancha(Cancha $e){

        if(!($e instanceof Cancha)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo clase cancha";
            return 0;
        }
        $result= $this->Conexion_ID->query("UPDATE cancha SET estado ='".$e->getEstado()."' WHERE idcancha='".$e->getId()."' ");
        if(!$result){
            return 0;
        }else {
            return 1;
        }

    }
    function BuscarCancha($id){
        $result=$this->Conexion_ID->query("SELECT * FROM cancha WHERE idcancha='".$id."'");
        $cancha=null;
        if($result){
            while($fila=$result->fetch_object()){
                $cancha=new Cancha($fila->idcancha,$fila->nombre,$fila->direccion,$fila->longitud,$fila->latitud,$fila->estado);

            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $cancha;
    }


}
?>
