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
        $result= $this->Conexion_ID->query("insert into goles values('".$e->getIdGol()."','".$e->getTipo()."','".$e->getTiempo()."','".$e->getJugador()."','".$e->getIdPartido()."')");
        if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }

    function listaGoles($partido,$equipo){
        $result=$this->Conexion_ID->query("SELECT g.idgoles, g.tipo, g.idjugador, g.idpartido FROM goles g INNER JOIN jugador j ON  g.idjugador = j.idjugador INNER JOIN equipo e ON j.idequipo = e.idequipo WHERE e.idequipo='".$equipo."' and g.idpartido='".$partido."'");
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

    function listaGolesJugador($jugador,$partido){
        $result=$this->Conexion_ID->query("SELECT g.idgoles  FROM goles g INNER JOIN jugador j ON g.idjugador = j.idjugador INNER JOIN partido p ON g.idpartido = p.idpartido  WHERE p.idpartido= '".$partido."'  AND j.idjugador='".$jugador."' ");
        $gol= 0;
        if($result){
          while($fila=$result->fetch_object()){
              $gol=$gol+1;

          }

        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_connect_error();
        }
        return $gol;
    }



    function ListaGolesBorrar($jugador,$partido){
        $result=$this->Conexion_ID->query("SELECT g.idgoles,g.tipo,g.tiempo,g.idjugador,g.idpartido  FROM goles g INNER JOIN jugador j ON g.idjugador = j.idjugador INNER JOIN partido p ON g.idpartido = p.idpartido  WHERE p.idpartido= '".$partido."'  AND j.idjugador='".$jugador."' ");
        $listado = array();
        if($result){
          while($fila=$result->fetch_object()){
              $listado[]=new Goles($fila->idgoles,$fila->tipo,$fila->tiempo,$fila->idjugador,$fila->idpartido);

          }

        }if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_connect_error();
        }
        return $listado;
    }

    function eliminarGol($id){

        $result= $this->Conexion_ID->query("DELETE FROM goles  WHERE idgoles ='".$id."' ");
        if(!$result){
            return 0;
        }else {
            return 1;
        }

    }



}
?>
