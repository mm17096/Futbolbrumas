<?php
require_once("../clases/Partido.php");
require_once("../conexion/Conexion.php");

class DaoPartido
{
    var $Conexion_ID;
    var $Errno = 0;
    var $Error = "";


    function __construct()
    {
        $this->Conexion_ID = new Conexion();
        $this->Conexion_ID = $this->Conexion_ID->getConexion();
    }

    function registroPartido(Partido $j)
    {
        if (!($j instanceof Partido)) {
            $this->Error = "Error de instanciado,\n el objeto no es de tipo Clase Partido";
            return 0;
        }
        $result = $this->Conexion_ID->query("insert into partido values(null,'". $j->getFechapartido() ."','". $j->getEquipoa() ."','". $j->getEquipob() ."','". $j->getIdarbitroa() ."','". $j->getIdarbitrob() ."','". $j->getIdjornada() ."','". $j->getIdcancha() ."','". $j->getEstado() ."')");
        if (!$result) {
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
            return 0;
        } else {
            return 1;
        }
    }
    
    function listaPartidos()
    {
        $result = $this->Conexion_ID->query("SELECT * FROM	partido AS partido WHERE	partido.estado = 1");
        $listado = array(); // contendra todos nuestros datos de la base de datos
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $listado[] = new Partido($fila->idpartido, $fila->fecha_partido, $fila->equipoa, $fila->equipob, $fila->idarbitroa, $fila->idarbitrob, $fila->idjornada, $fila->idcancha,$fila->estado);
            }
        }
        if (!$result) {
            $this->error_log;
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
        }
        return $listado;
    }
    function listaPartidosInactivos()
    {
        $result = $this->Conexion_ID->query("SELECT 	* FROM 	partido AS partido 	INNER JOIN 	jornada 	ON 		partido.idjornada = jornada.idjornada
        INNER JOIN 	torneo 	ON 		jornada.torneo = torneo.idtorneo WHERE	partido.estado = 1 AND	torneo.estado = 1
    ");
        $listado = array(); // contendra todos nuestros datos de la base de datos
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $listado[] = new Partido($fila->idpartido, $fila->fecha_partido, $fila->equipoa, $fila->equipob, $fila->idarbitroa, $fila->idarbitrob, $fila->idjornada, $fila->idcancha,$fila->estado);
            }
        }
        if (!$result) {
            $this->error_log;
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
        }
        return $listado;
    }

       // Codigo Diego

       function DatosPartido($id)
       {
           $result = $this->Conexion_ID->query("SELECT * FROM	partido AS p WHERE	p.idpartido = '".$id."'");
           $listado = array(); // contendra todos nuestros datos de la base de datos
           if ($result) {
               while ($fila = $result->fetch_object()) {
                   $listado[] = new Partido($fila->idpartido, $fila->fecha_partido, $fila->equipoa, $fila->equipob, $fila->idarbitroa, $fila->idarbitrob, $fila->idjornada, $fila->idcancha,$fila->estado);
               }
           }
           if (!$result) {
   
           }
           return $listado;
       }
   

       function DatosPartidoJornada($id)
       {
           $result = $this->Conexion_ID->query("SELECT p.fecha_partido, p.idpartido, p.equipoa, p.equipob, p.idarbitroa, p.idarbitrob, p.idjornada, p.idcancha, p.estado FROM
                partido as p
                 INNER JOIN
                 jornada as j
                 ON p.idjornada = j.idjornada
                 INNER JOIN
                 torneo as t
                 ON
                   j.torneo = t.idtorneo   WHERE t.estado=1 and j.idjornada= '".$id."' ORDER BY p.fecha_partido asc");
           $listado = array(); // contendra todos nuestros datos de la base de datos
           if ($result) {
               while ($fila = $result->fetch_object()) {
                   $listado[] = new Partido($fila->idpartido, $fila->fecha_partido, $fila->equipoa, $fila->equipob, $fila->idarbitroa, $fila->idarbitrob, $fila->idjornada, $fila->idcancha,$fila->estado);
               }
           }
           if (!$result) {
   
           }
           return $listado;
       }
       function DatosPartidoJornadaInactivos($id)
       {
           $result = $this->Conexion_ID->query("SELECT
           p.fecha_partido, 
           p.idpartido, 
           p.equipoa, 
           p.equipob, 
           p.idarbitroa, 
           p.idarbitrob, 
           p.idjornada, 
           p.idcancha, 
           p.estado
       FROM
           partido AS p
           INNER JOIN
           jornada AS j
           ON 
               p.idjornada = j.idjornada
           INNER JOIN
           torneo AS t
           ON 
               j.torneo = t.idtorneo
       WHERE
           t.estado = 1 AND
           j.idjornada = '".$id."' AND
           p.estado = 1
       ORDER BY
           p.fecha_partido ASC");
           $listado = array(); // contendra todos nuestros datos de la base de datos
           if ($result) {
               while ($fila = $result->fetch_object()) {
                   $listado[] = new Partido($fila->idpartido, $fila->fecha_partido, $fila->equipoa, $fila->equipob, $fila->idarbitroa, $fila->idarbitrob, $fila->idjornada, $fila->idcancha,$fila->estado);
               }
           }
           if (!$result) {
   
           }
           return $listado;
       }
   
   
       function numeroPartidoJornada($id)
       {
           $result = $this->Conexion_ID->query("SELECT p.fecha_partido, p.idpartido, p.equipoa, p.equipob, p.idarbitroa, p.idarbitrob, p.idjornada, p.idcancha, p.estado FROM
              partido as p
               INNER JOIN
               jornada as j
               ON p.idjornada = j.idjornada
               INNER JOIN
               torneo as t
               ON
               j.torneo = t.idtorneo   WHERE t.estado=1 and j.idjornada= '".$id."' ORDER BY p.fecha_partido asc");
           $listado = 0; // contendra todos nuestros datos de la base de datos
           if ($result) {
               while ($fila = $result->fetch_object()) {
                   $listado =$listado+1;
               }
           }
           return $listado;
       }
   
   
       function FinalizarPartido($id){
   
           $result= $this->Conexion_ID->query("UPDATE partido SET estado = 0 WHERE idpartido='".$id."' ");
           if(!$result){
               return 0;
           }else {
               return 1;
           }
   
       }
  
}
