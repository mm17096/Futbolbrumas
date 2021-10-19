<?php
require_once ("../clases/Goles.php");
require_once ("../conexion/Conexion.php");



class DaoGoles{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

    function __construct(){
        $this->Conexion_ID=new Conexion();
        $this->Conexion_ID=$this->Conexion_ID->getConexion();
    }


    function registroGol(Goles $e){

        if(!($e instanceof Goles)){
            $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Estadio";
            return 0;
        }
        $result= $this->Conexion_ID->query("insert into goles values('".$e->getIdGol()."','".$e->getTipo()."','".$e->getJugador()."','".$e->getIdPartido()."')");
        if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }

    function listaGoles($partido,$equipo){
        $result=$this->Conexion_ID->query("SELECT g.idgoles, g.tipo, g.idjugador, g.idpartidos FROM goles g INNER JOIN jugador j ON  g.idjugador = j.idjugador INNER JOIN equipo e ON j.equipo = e.idequipo WHERE e.idequipo='".$equipo."' and g.idpartidos='".$partido."'");
        $listado= 0;
        if($result){
            while($fila=$result->fetch_object()){
                $listado=$listado+1;

            }
        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_connect_error();
        }
        return $listado;
    }





}
?>
