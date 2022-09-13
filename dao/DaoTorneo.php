<?php
require_once("../clases/Torneo.php");
require_once("../conexion/Conexion.php");

class DaoTorneo
{
    var $Conexion_ID;
    var $Errno = 0;
    var $Error = "";


    function __construct()
    {
        $this->Conexion_ID = new Conexion();
        $this->Conexion_ID = $this->Conexion_ID->getConexion();
    }

    function registroTorneo(Torneo $t)
    {
        if (!($t instanceof Torneo)) {
            $this->Error = "Error de instanciado,\n el objeto no es de tipo Clase Jugador";
            return 0;
        }
        $result = $this->Conexion_ID->query("insert into torneo values(null,'" . $t->getEstado()."')");
        if (!$result) {
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
            return 0;
        } else {
            return 1;
        }
    }
    
    function TorneoActivo()
    {
        $torneo = null;
        $result = $this->Conexion_ID->query("SELECT 	* FROM 	torneo WHERE 	torneo.estado = 1");
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $torneo = new Torneo($fila->idtorneo, $fila->estado);
            }
        }
        if (!$result) {
            $this->Errno = mysqli_connect_errno();
            $this->Errror = mysqli_connect_error();
        }
        return $torneo;
    }
}
