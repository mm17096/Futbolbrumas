<?php
require_once ("../clases/DetPartido.php");
require_once ("../conexion/Conexion.php");



class DaoDetPartido{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }


    function registroDetalle(DetPartido $e){

        if(!($e instanceof DetPartido)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Estadio";
            return 0;
        }
        $result= $this->Conexion_ID->query("insert into detpartido values('".$e->getIdDetPartido()."','".$e->getDetalle()."','".$e->getIdPartido()."')");
        if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }





}
?>
