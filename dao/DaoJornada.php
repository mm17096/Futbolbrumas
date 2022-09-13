<?php
require_once("../clases/jornada.php");
require_once("../conexion/Conexion.php");

class DaoJornada
{
    var $Conexion_ID;
    var $Errno = 0;
    var $Error = "";


    function __construct()
    {
        $this->Conexion_ID = new Conexion();
        $this->Conexion_ID = $this->Conexion_ID->getConexion();
    }

    function registroJornada(Jornada $j)
    {
        if (!($j instanceof Jornada)) {
            $this->Error = "Error de instanciado,\n el objeto no es de tipo Clase Jugador";
            return 0;
        }
        $result = $this->Conexion_ID->query("insert into jornada values('" . $j->getIdjornada() . "','" . $j->getFechainicio() . "','" . $j->getFechafin() . "','" . $j->getClasificacion() . "' ,'" . $j->getTorneo() . "' )");
        if (!$result) {
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
            return 0;
        } else {
            return 1;
        }
    }
    function listaJornadas()
    {
        $result = $this->Conexion_ID->query("SELECT	* FROM 	jornada	INNER JOIN	torneo ON		jornada.torneo = torneo.idtorneo WHERE
        torneo.estado = 1 ORDER BY 	idjornada ASC");
        $listado = array(); // contendra todos nuestros datos de la base de datos
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $listado[] = new Jornada($fila->idjornada, $fila->fecha_inicio, $fila->fecha_fin,$fila->clasificacion,$fila->torneo);
            }
        }
        if (!$result) {
            $this->error_log;
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
        }
        return $listado;
    }
    function UltmimaJornada()
    {
        $jornada = null;
        $result = $this->Conexion_ID->query("SELECT* FROM jornada ORDER BY jornada.idjornada DESC  LIMIT 1");
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $jornada = new Jornada($fila->idjornada, $fila->fecha_inicio, $fila->fecha_fin,$fila->clasificacion,$fila->torneo);
            }
        }
        if (!$result) {
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
        }
        return $jornada;
    }

    //Codigo Diego
    function listaJornadasClasificatoria($clasificacion)
    {
        $result = $this->Conexion_ID->query("SELECT j.idjornada, j.fecha_inicio,j.fecha_fin,j.clasificacion,j.torneo FROM partido as p
  INNER JOIN
  jornada as j
  ON
    p.idjornada = j.idjornada
  INNER JOIN
  torneo as t
  ON
    j.torneo = t.idtorneo WHERE p.estado=1 and t.estado=1 and j.clasificacion= '".$clasificacion."' GROUP BY j.idjornada");
        $listado = array(); // contendra todos nuestros datos de la base de datos
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $listado[] = new Jornada($fila->idjornada, $fila->fecha_inicio, $fila->fecha_fin,$fila->clasificacion,$fila->torneo);
            }
        }
        if (!$result) {
            $this->error_log;
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
        }
        return $listado;
    }

}
