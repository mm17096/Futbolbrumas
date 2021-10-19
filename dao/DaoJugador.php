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
    $result=$this->Conexion_ID->query("SELECT * FROM jugador ORDER BY idjugador ASC");
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
}
function listaDejugadoresEquipo($id){
    $result=$this->Conexion_ID->query("SELECT jugador.idjugador, jugador.nombre, jugador.apellido, jugador.fecha_nacimiento, jugador.numero_camisa,jugador.posicion,
    jugador.nacionalidad,jugador.estado,jugador.equipo,jugador.cancha FROM jugador INNER JOIN equipo ON jugador.equipo = equipo.idequipo WHERE equipo.idequipo ='".$id."'");
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
}
function registroJugador(Jugador $j){
    if(!($j instanceof Jugador)){
        $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Jugador";
                return 0;
    }
    $result= $this->Conexion_ID->query("insert into jugador values('".$j->getIdjugador()."','".$j->getNombre()."','".$j->getApellido()."','".$j->getFechanacimiento()."','".$j->getNumerocamisa()."','".$j->getPosicion()."','".$j->getNacionalidad()."','".$j->getEstado()."','".$j->getEquipo()."','".$j->getCancha()."')");
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
    $result= $this->Conexion_ID->query("UPDATE jugador SET nombre='".$j->getNombre()."',apellido='".$j->getApellido()."',fecha_nacimiento='".$j->getFechanacimiento()."',numero_camisa='".$j->getNumerocamisa()."',posicion='".$j->getPosicion()."',nacionalidad='".$j->getNacionalidad()."',estado='".$j->getEstado()."',equipo='".$j->getEquipo()."' WHERE idjugador='".$j->getIdjugador()."' ");
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

function JugadoresActivos($id){
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
}




// codigo de trader_cdlupsidegap2crows
//metodo para mostrar jugadores por equipo
function listaJugadorEquipo($ID){


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
}





//desactiva jugador si comete tarjeta roja
function DesactivarJugador($id){

    $activo="Inactivo";
    $result= $this->Conexion_ID->query("UPDATE jugador SET estado='".$activo."'  WHERE idjugador='".$id."' ");
    if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_conecct_error();
        return 0;
    }else {
        return 1;
    }

}

    //hace el cambio de jugador
    function CambioJugador($id,$estado){


        $result= $this->Conexion_ID->query("UPDATE jugador SET cancha='".$estado."'  WHERE idjugador='".$id."' ");
        if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }

    //habilita al jugador para que entre a la cancha
    function CanchaJugador($id,$estado){
        $result= $this->Conexion_ID->query("UPDATE jugador SET cancha='".$estado."'  WHERE idjugador='".$id."' ");
        if(!$result){
            $this->Errno=mysqli_conecct_errno();
            $this->Errror=mysqli_conecct_error();
            return 0;
        }else {
            return 1;
        }

    }


    //metodo para contar cuando jugadores estan en cancha
    function cantJugadoresCancha($ID){

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
    }

}


?>
