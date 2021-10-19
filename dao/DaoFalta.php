<?php
require_once ("../clases/Faltas.php");
require_once ("../conexion/Conexion.php");



class DaoFalta{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }


    function registroFaltas(Faltas $e){

        if(!($e instanceof Faltas)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Estadio";
            return 0;
        }
        $result= $this->Conexion_ID->query("insert into faltas values('".$e->getIdFalta()."','".$e->getTipo()."','".$e->getJugador()."','".$e->getIdPartido()."')");
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
