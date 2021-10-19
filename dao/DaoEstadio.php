<?php
require_once ("../clases/Estadio.php");
require_once ("../conexion/Conexion.php");

class DaoEstadio{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }
    function BuscarEstadio($id){
        $result=$this->Conexion_ID->query("SELECT * FROM cancha WHERE idcancha= '$id'");
        $estadio=null;
        if($result){
            while($fila=$result->fetch_object()){
                $estadio=new Estadio($fila->idcancha,$fila->nombre,$fila->capacidad,$fila->direccion,$fila->coordenadax,$fila->coordenaday);
            }
        }if(!$result){
            //$this->Errno=mysqli_conecct_errno();
            //$this->Errror=mysqli_conecct_error();
        }
        return $estadio;
    }
    function listaEstadio(){
        $result=$this->Conexion_ID->query("SELECT * FROM cancha ORDER BY idcancha asc");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Estadio($fila->idcancha,$fila->nombre,$fila->estado,$fila->direccion,$fila->latitud,$fila->longitud);
            }
        }if(!$result){
            //$this->Errno=mysqli_conecct_errno();
            //$this->Errror=mysqli_conecct_error();
        }
        return $listado;
    }


    function registroEstadio(Estadio $e){
        if(!($e instanceof Estadio)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Estadio";
            return 0;
        }

        $result= $this->Conexion_ID->query("insert into cancha values('".$e->getNombre()."','".$e->getLatitud()."','".$e->getLongitud()."','".$e->getDireccion()."','".$e->getEstado()."')");
        
        if(!$result){
          //$this->Errno=mysqli_conecct_errno();
          //$this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }
    function actualizarEstadio(Estadio $e){


            if(!($e instanceof Estadio)){
                $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Estadio";
                return 0;
            }
            $result= $this->Conexion_ID->query("UPDATE estadio SET nombre ='".$e->getNombre()."' ,capacidad='".$e->getEstado()."',direccion ='".$e->getDireccion()."', coordenadax='".$e->getLatitud()."', coordenaday='".$e->getLongitud()."' WHERE idestadio='".$e->getId()."' ");
            if(!$result){
                //$this->Errno=mysqli_conecct_errno();
                //$this->Errror=mysqli_conecct_error();
                return 0;
            }else {
                return 1;
            }

    }

    function eliminarEstadio(Estadio $e){

        if(!($e instanceof Estadio)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Estadio";
            return 0;
        }
        $result= $this->Conexion_ID->query("DELETE FROM cancha  WHERE idcancha ='".$e->getId()."' ");
        if(!$result){
            return 0;
        }else {
            return 1;
        }

    }


}
?>
