<?php
require_once ("../clases/Juez.php");
require_once ("../conexion/Conexion.php");

class DaoJuez{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";


   function __construct(){
    $this->Conexion_ID= new Conexion();
    $this->Conexion_ID=$this->Conexion_ID->getConexion();
}

function listaJueces(){
    $result=$this->Conexion_ID->query("SELECT * FROM jueces as j ORDER BY j.idjuez asc");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Juez($fila->idjuez,$fila->nombrejuez);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}




function registroJuez(Juez $j){
    if(!($j instanceof Juez)){
        $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Jugador";
                return 0;
    }
    $result= $this->Conexion_ID->query("insert into jueces values('".$j->getIdJuez()."','".$j->getNombre()."')");
    if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_conecct_error();
        return 0;
    }else {
        return 1;
    }
}

function ActualizarJuez(Juez $j){

    if(!($j instanceof Juez)){
        $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Equipo";
        return 0;
    }
    $result= $this->Conexion_ID->query("UPDATE jueces SET nombrejuez='".$j->getNombre()."' WHERE idjuez='".$j->getIdJuez()."' ");
    if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_conecct_error();
        return 0;
    }else {
        return 1;
    }

}



function eliminarJuez(Juez $j){
    if(!($j instanceof Juez)){
        $this->Error="Error de instanciado, \n el objeto no es de tipo clase Jugador";
        return 0;
    }
    $result= $this->Conexion_ID->query("DELETE from jueces WHERE idjuez='".$j->getIdJuez()."' ");
    if(!$result){
        return 0;
    }else{
        return 1;
    }
}

}


?>
