<?php
require_once ("../clases/Cambio.php");
require_once ("../conexion/Conexion.php");



class DaoCambios{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }


    function registroCambio(Cambios $e){

        if(!($e instanceof Cambios)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Estadio";
            return 0;
        }
        $result= $this->Conexion_ID->query("insert into cambio values('".$e->getIdCambio()."','".$e->getTiempo()."','".$e->getJugadorA()."','".$e->getJugadorB()."','".$e->getIdPartido()."')");
        if(!$result){
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
            return 0;
        }else {
            return 1;
        }

    }

}
?>
