<?php
require_once ("../clases/Partidos.php");
require_once ("../conexion/Conexion.php");

class DaoPartido{
    var $Conexion_ID;
    var $Errno=0;
    var $Error="";


   function __construct(){
    $this->Conexion_ID= new Conexion();
    $this->Conexion_ID=$this->Conexion_ID->getConexion();
}

function registroPartido(Partidos $j){
    if(!($j instanceof Partidos)){
        $this->Error="Error de instanciado,\n el objeto no es de tipo Clase Jugador";
                return 0;
    }
    $result= $this->Conexion_ID->query("insert into partidos values('".$j-> getIdpartidos()."','".$j->getFecha()."','".$j->getHorario()."','".$j-> getEquipoA()."','".$j->getEquipoB()."','".$j->getJornada()."','".$j->getEstado()."')");
    if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_conecct_error();
        return 0;
    }else {
        return 1;
    }
}

function listaDePartidoTotal(){
    $result=$this->Conexion_ID->query("SELECT * FROM partidos");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Partidos($fila->idpartidos,$fila->fecha,$fila->horario,$fila->equipoa,$fila->equipob,$fila->jornada,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}
function listaDePartidoTerminado($id){
    $result=$this->Conexion_ID->query("SELECT partidos.idpartidos, partidos.fecha, partidos.horario, partidos.equipoa, partidos.equipob, partidos.jornada,partidos.estado FROM partidos INNER JOIN equipo ON partidos.equipoa = equipo.idequipo OR partidos.equipob = equipo.idequipo
    WHERE partidos.estado = 1 AND equipo.idequipo = '".$id."'");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Partidos($fila->idpartidos,$fila->fecha,$fila->horario,$fila->equipoa,$fila->equipob,$fila->jornada,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}


function listaDePartido(){
    $result=$this->Conexion_ID->query("SELECT * FROM partidos WHERE estado=0");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Partidos($fila->idpartidos,$fila->fecha,$fila->horario,$fila->equipoa,$fila->equipob,$fila->jornada,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}

function listaDePartidoJugados($id){
    $result=$this->Conexion_ID->query("SELECT Count(partidos.idpartidos) AS jugados FROM partidos INNER JOIN equipo ON partidos.equipoa = equipo.idequipo OR partidos.equipob = equipo.idequipo WHERE equipo.idequipo = '".$id."' AND partidos.estado = 1
    ");
    $jugados=0;
    if($result){
        while($fila=$result->fetch_object()){
           $jugados=$fila->jugados;

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $jugados;
}
function GolesPartidosEspecificosEquipos($idEquipo,$idPartido){
    $result=$this->Conexion_ID->query("SELECT Count(goles.idgoles) AS goles FROM goles INNER JOIN partidos ON goles.idpartidos = partidos.idpartidos INNER JOIN equipo ON partidos.equipoa = equipo.idequipo OR partidos.equipob = equipo.idequipo INNER JOIN jugador ON jugador.equipo = equipo.idequipo AND goles.idjugador = jugador.idjugador WHERE partidos.idpartidos = '".$idPartido."' AND equipo.idequipo = '".$idEquipo."'");
    $golesEspecificos=0;
    if($result){
        while($fila=$result->fetch_object()){
           $golesEspecificos=$fila->goles;

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $golesEspecificos;
}
function PG($id){
    $partidos=$this->listaDePartidoTerminado($id);
    $contadorGanados=0;
        foreach ($partidos as $key => $fila) {


            $equipo1= $this->GolesPartidosEspecificosEquipos($fila->getEquipoA(),$fila->getIdpartidos());
            $equipo2=$this->GolesPartidosEspecificosEquipos($fila->getEquipoB(),$fila->getIdpartidos());
            if($id==$fila->getEquipoA()){
                if($equipo1>$equipo2){
                    $contadorGanados++;
                }
            }else {
                if($equipo2>$equipo1){
                    $contadorGanados++;
                }
            }
        }


    return $contadorGanados;
}
function PE($id){
    $partidos=$this->listaDePartidoTerminado($id);
    $contadorGanados=0;
        foreach ($partidos as $key => $fila) {


            $equipo1= $this->GolesPartidosEspecificosEquipos($fila->getEquipoA(),$fila->getIdpartidos());
            $equipo2=$this->GolesPartidosEspecificosEquipos($fila->getEquipoB(),$fila->getIdpartidos());
            if($id==$fila->getEquipoA()){
                if($equipo1==$equipo2){
                    $contadorGanados++;
                }
            }else {
                if($equipo2==$equipo1){
                    $contadorGanados++;
                }
            }
        }


    return $contadorGanados;
}
function PP($id){
    $partidos=$this->listaDePartidoTerminado($id);
    $contadorGanados=0;
        foreach ($partidos as $key => $fila) {


            $equipo1= $this->GolesPartidosEspecificosEquipos($fila->getEquipoA(),$fila->getIdpartidos());
            $equipo2=$this->GolesPartidosEspecificosEquipos($fila->getEquipoB(),$fila->getIdpartidos());
            if($id==$fila->getEquipoA()){
                if($equipo1<$equipo2){
                    $contadorGanados++;
                }
            }else {
                if($equipo2<$equipo1){
                    $contadorGanados++;
                }
            }
        }


    return $contadorGanados;
}
function GF($id){
    $result=$this->Conexion_ID->query("SELECT Count(goles.idgoles) AS goles FROM goles INNER JOIN partidos ON goles.idpartidos = partidos.idpartidos INNER JOIN equipo ON partidos.equipoa = equipo.idequipo OR partidos.equipob = equipo.idequipo INNER JOIN jugador ON jugador.equipo = equipo.idequipo AND goles.idjugador = jugador.idjugador  WHERE equipo.idequipo = '".$id."' AND partidos.estado = 1 ");
    $gf=0;
    if($result){
        while($fila=$result->fetch_object()){
           $gf=$fila->goles;

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $gf;
}
function GC($id){
    $result=$this->Conexion_ID->query("SELECT
    Count(goles.idgoles) as goles
    FROM
    goles
    INNER JOIN partidos ON goles.idpartidos = partidos.idpartidos
    INNER JOIN equipo ON partidos.equipoa = equipo.idequipo OR partidos.equipob = equipo.idequipo
    INNER JOIN jugador ON jugador.equipo = equipo.idequipo AND goles.idjugador != jugador.idjugador
    WHERE
    equipo.idequipo = '".$id."' AND
    partidos.estado = 1");
    $gf=0;
    if($result){
        while($fila=$result->fetch_object()){
           $gf=$fila->goles;

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $gf;
}


//Codigo de Diego
function listaPartidos(){
    $result=$this->Conexion_ID->query("SELECT * FROM partido as p ORDER BY p.idpartido ASC");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Partidos($fila->idpartidos,$fila->fecha,$fila->horario,$fila->equipoa,$fila->equipob,$fila->jornada,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}


function listaFechas(){
    $estado=false;
    $result=$this->Conexion_ID->query("SELECT p.fecha_partido FROM partido as p WHERE p.estado='".$estado."' GROUP BY p.fecha ASC");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Partidos(null,$fila->fecha,null,null,null,null,null);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}



function listaGoles($id,$par){
    $result=$this->Conexion_ID->query("SELECT g.idgoles  FROM goles g INNER JOIN jugador j ON g.idjugador = j.idjugador INNER JOIN partidos p ON g.idpartidos = p.idpartidos  WHERE p.idpartidos= '".$par."'  AND j.idjugador='".$id."' ");
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



function listaFaltas($id,$par){
  $result=$this->Conexion_ID->query("SELECT f.idfalta FROM faltas f INNER JOIN jugador j ON f.jugador = j.idjugador INNER JOIN partidos p ON  f.idpartidos = p.idpartidos  WHERE p.idpartidos= '".$par."'  AND j.idjugador='".$id."'");
    $falta= 0;
    if($result){
      while($fila=$result->fetch_object()){
          $falta=$falta+1;

      }

    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }

    return $falta;
}

function FinalizarPartido($id){
    $estado=true;
    $result= $this->Conexion_ID->query("UPDATE partidos SET estado='".$estado."' WHERE idpartidos='".$id."' ");
    if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_conecct_error();
        return 0;
    }else {
        return 1;
    }

}


function listaPartidosOrden($fecha){
    $result=$this->Conexion_ID->query("SELECT * from partidos as p WHERE p.fecha='".$fecha."' ORDER BY p.horario asc");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Partidos($fila->idpartidos,$fila->fecha,$fila->horario,$fila->equipoa,$fila->equipob,$fila->jornada,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}


function listaFechasDESC(){
    $estado=true;
    $result=$this->Conexion_ID->query("SELECT p.fecha FROM partidos as p WHERE p.estado='".$estado."' GROUP BY p.fecha DESC");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Partidos(null,$fila->fecha,null,null,null,null,null);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}

function listaPartidosOrdenDESC($fecha){
    $result=$this->Conexion_ID->query("SELECT * from partidos as p WHERE p.fecha='".$fecha."' ORDER BY p.horario DESC");
    $listado= array();
    if($result){
        while($fila=$result->fetch_object()){
            $listado[]= new Partidos($fila->idpartidos,$fila->fecha,$fila->horario,$fila->equipoa,$fila->equipob,$fila->jornada,$fila->estado);

        }
    }if(!$result){
        $this->Errno=mysqli_conecct_errno();
        $this->Errror=mysqli_connect_error();
    }
    return $listado;
}

}

?>
