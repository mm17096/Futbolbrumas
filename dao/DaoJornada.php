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
        $result = $this->Conexion_ID->query("insert into jornadas values('" . $j->getIdjornada() . "','" . $j->getFechainicio() . "','" . $j->getFechafin() . "' )");
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
        $result = $this->Conexion_ID->query("SELECT * FROM jornada ORDER BY idjornada asc");
        $listado = array(); // contendra todos nuestros datos de la base de datos
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $listado[] = new Jornada($fila->idjornada, $fila->fecha_inicio, $fila->fecha_fin);
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
        $result = $this->Conexion_ID->query("SELECT* FROM jornada ORDER BY jornadas.idjornada DESC  LIMIT 1");
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $jornada = new Jornada($fila->idjornada, $fila->fechainicio, $fila->fechafin);
            }
        }
        if (!$result) {
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
        }
        return $jornada;
    }
}
