<?php
require_once ("../clases/Arbitro.php");
require_once ("../conexion/Conexion.php");

class DaoArbitro{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }


    function listaArbitro(){
        $result=$this->Conexion_ID->query("SELECT * FROM arbitro");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Arbitro($fila->dui,$fila->nombre,$fila->apellidos,$fila->sexo,$fila->direccion,$fila->telefono,$fila->fecha_nacimiento,$fila->estado);
            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $listado;
    }


    function registroArbitro(Arbitro $e){

        if(!($e instanceof Arbitro)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Cancha";
            return 0;
        }
        $result= $this->Conexion_ID->query("insert into arbitro values('".$e->getDui()."','".$e->getNombre()."','".$e->getApellido()."','".$e->getSexo()."','".$e->getDireccion()."','".$e->getTelefono()."','".$e->getFecha()."','".$e->getEstado()."')");
        if(!$result){
            return 0;
        }else {
            return 1;
        }

    }
    function ActualizarArbitro(Arbitro $e){


            if(!($e instanceof Arbitro)){
                $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Cancha";
                return 0;
            }
            $result= $this->Conexion_ID->query("UPDATE arbitro SET dui ='".$e->getDui()."',nombre ='".$e->getNombre()."',apellidos ='".$e->getApellido()."',sexo ='".$e->getSexo()."',direccion ='".$e->getDireccion()."', telefono='".$e->getTelefono()."',fecha_nacimiento='".$e->getFecha()."'
            WHERE dui='".$e->getDui()."' ");
            if(!$result){
                return 0;
            }else {
                return 1;
            }

    }

    function estadoArbitro(Arbitro $e){

        if(!($e instanceof Arbitro)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo clase arbitro";
            return 0;
        }
        $result= $this->Conexion_ID->query("UPDATE arbitro SET estado ='".$e->getEstado()."' WHERE dui='".$e->getDui()."' ");
        if(!$result){
            return 0;
        }else {
            return 1;
        }

    }
    function listaArbitroActivos(){
        $result=$this->Conexion_ID->query("SELECT * FROM	arbitro WHERE	arbitro.estado = 1");
        $listado= array();// contendra todos nuestros datos de la base de datos
        if($result){
            while($fila=$result->fetch_object()){
                $listado[]=new Arbitro($fila->dui,$fila->nombre,$fila->apellidos,$fila->sexo,$fila->direccion,$fila->telefono,$fila->fecha_nacimiento,$fila->estado);
            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $listado;
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
    function BuscarArbitro($dui){
        $result=$this->Conexion_ID->query("SELECT * FROM arbitro where dui='".$dui."'");
        $arbitro=null;
        if($result){
            while($fila=$result->fetch_object()){
                $arbitro=new Arbitro($fila->dui,$fila->nombre,$fila->apellidos,$fila->sexo,$fila->direccion,$fila->telefono,$fila->fecha_nacimiento,$fila->estado);
            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
        }
        return $arbitro;
    }
 

}
?>
