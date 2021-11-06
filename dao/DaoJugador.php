<?php
require_once ("../clases/Jugador.php");
require_once ("../conexion/Conexion.php");

class DaoJugador{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";

   function __construct(){
    $this->Conexion_ID= new Conexion();
    $this->Conexion_ID=$this->Conexion_ID->getConexion();
}

function listaDejugadores(){
    $result=$this->Conexion_ID->query("SELECT * FROM jugador ORDER BY idjugador DESC");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Jugador($fila->idjugador,$fila->nombre,$fila->apellido,$fila->fechanacimiento,$fila->numero_camisa,$fila->posicion,$fila->idequipo,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}
function listaDejugadoresEquipo($id){
    $result=$this->Conexion_ID->query("SELECT jugador.idjugador, jugador.nombre, jugador.apellido, jugador.fechanacimiento, jugador.numero_camisa,jugador.posicion,
    jugador.idequipo,jugador.estado FROM jugador INNER JOIN equipo ON jugador.idequipo = equipo.idequipo WHERE equipo.idequipo ='".$id."'");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Jugador($fila->idjugador,$fila->nombre,$fila->apellido,$fila->fechanacimiento,$fila->numero_camisa,$fila->posicion,$fila->idequipo,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}
function registroJugador(Jugador $j){
   /* $comprobar_camisa= mysqli_query($Conexion_ID,"SELECT * FROM jugador where numero_camisa='".$j->getNumerocamisa()."'");
    if(mysqli_num_rows($comprobar_camisa) > 0){
        echo '<script>alert("este numero de camisa ya ha sido elegido por un jugador");
        window.location="../views/vis_jugadores.php";
        </script>';
        exit();
    }*/
    if(!($j instanceof Jugador)){
        $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Jugador";
                return 0;
    }
    $result= $this->Conexion_ID->query("INSERT INTO jugador VALUES('".$j->getIdjugador()."','".$j->getNombre()."','".$j->getApellido()."','".$j->getFechaNacimiento()."','".$j->getNumerocamisa()."','".$j->getPosicion()."','".$j->getIdequipo()."','".$j->getEstado()."')");
    if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_conecct_error();
        return 0;
    }else {
        return 1;
    }
}

function actualizarJugador(Jugador $j){

    if(!($j instanceof Jugador)){
        $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Equipo";
        return 0;
    }
    $result= $this->Conexion_ID->query("UPDATE jugador SET nombre='".$j->getNombre()."',apellido='".$j->getApellido()."',fechanacimiento='".$j->getFechaNacimiento()."',numero_camisa='".$j->getNumerocamisa()."',posicion='".$j->getPosicion()."',idequipo='".$j->getIdequipo()."',estado='".$j->getEstado()."'  WHERE idjugador='".$j->getIdjugador()."'");
    if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_conecct_error();
        return 0;
    }else {
        return 1;
    }

}
function eliminarJugador(Jugador $j){
    if(!($j instanceof Jugador)){
        $this->Error="Error de instanciado, \n el objeto no es de tipo clase Jugador";
        return 0;
    }
    $result= $this->Conexion_ID->query("DELETE from jugador WHERE idjugador='".$j->getIdjugador()."' ");
    if(!$result){
        return 0;
    }else{
        return 1;
    }
}

/*function JugadoresActivos($id){
    $estado="Activo";
    $result=$this->Conexion_ID->query("SELECT j.idjugador,j.nombre FROM jugador j INNER JOIN equipo e ON j.equipo = e.idequipo WHERE  e.idequipo='".$id."' AND j.estado='".$estado."'");
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
}*/




// codigo de trader_cdlupsidegap2crows
//metodo para mostrar jugadores por equipo
/*function listaJugadorEquipo($ID){


    $result=$this->Conexion_ID->query("SELECT j.idjugador, j.nombre, j.apellido, j.fecha_nacimiento, j.numero_camisa, j.posicion, j.nacionalidad,j.estado,j.equipo,j.cancha  FROM jugador j INNER JOIN equipo e ON e.idequipo = j.equipo  WHERE e.idequipo ='".$ID."'");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Jugador($fila->idjugador,$fila->nombre,$fila->apellido,$fila->fecha_nacimiento,$fila->numero_camisa,$fila->posicion,$fila->nacionalidad,$fila->estado,$fila->equipo,$fila->cancha);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}*/






function DesactivarJugador($id){
    if(!($id instanceof Jugador)){
        $this->Error="Error de instanciado, \n el objeto no es de tipo clase Jugador";
        return 0;
    }
    $result= $this->Conexion_ID->query("UPDATE jugador SET estado='".$id->getEstado()."'  WHERE idjugador='".$id->getIdjugador()."'");
    if(!$result){
        return 0;
    }else{
        return 1;
    }

}

function ActivarJugador($id){
    if(!($id instanceof Jugador)){
        $this->Error="Error de instanciado, \n el objeto no es de tipo clase Jugador";
        return 0;
    }
    $result= $this->Conexion_ID->query("UPDATE jugador SET estado='".$id->getEstado()."'  WHERE idjugador='".$id->getIdjugador()."'");
    if(!$result){
        return 0;
    }else{
        return 1;
    }

}


function verificarcamisa($id, $numero){

    $result= $this->Conexion_ID->query("SELECT j.numero_camisa FROM `jugador`as j, equipo as e WHERE e.idequipo = j.idequipo AND j.numero_camisa = '$numero' AND e.idequipo = '$id'");
    
    if($result && $result->num_rows == 1){
        return 1;
    }else{
        return 0;
    }
}

function verificarcamisaEdit($id, $numero){

    $result= $this->Conexion_ID->query("SELECT j.numero_camisa FROM `jugador`as j, equipo as e WHERE e.idequipo = j.idequipo AND j.numero_camisa = '$numero' AND e.idequipo = '$id'");
    
    if($result && $result->num_rows == 1){
        return 1;
    }else{
        return 0;
    }
}

    //hace el cambio de jugador
    /*function CambioJugador($id,$estado){


        $result= $this->Conexion_ID->query("UPDATE jugador SET cancha='".$estado."'  WHERE idjugador='".$id."' ");
        if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }*/

    //habilita al jugador para que entre a la cancha
   /* function CanchaJugador($id,$estado){
        $result= $this->Conexion_ID->query("UPDATE jugador SET cancha='".$estado."'  WHERE idjugador='".$id."' ");
        if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }*/


    //metodo para contar cuando jugadores estan en cancha
   /* function cantJugadoresCancha($ID){

        $cancha=true;
        $result=$this->Conexion_ID->query("SELECT * FROM jugador j INNER JOIN equipo e ON e.idequipo = j.equipo  WHERE e.idequipo ='".$ID."' AND j.cancha='".$cancha."'");
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
    }*/

}
?>
