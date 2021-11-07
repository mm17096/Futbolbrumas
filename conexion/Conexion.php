<?php
    class Conexion{
        var $BaseDatos;
        var $Servidor;
        var $Usuario;
        var $Clave;

        var $Conexion_ID;
        var $Consulta_ID;
        var $Errno=0;
        var $Error="";

        function __construct(){
            $this->BaseDatos="salakevin";
            $this->Servidor="localhost";
            $this->Usuario="root";
            $this->Clave="";

            /*$this->BaseDatos="bdfutbol";
            $this->Servidor="localhost";
            $this->Usuario="mm17096";
            $this->Clave="rootmm17096";*/
            $this->conectar($this->Servidor,$this->Usuario,$this->Clave,$this->BaseDatos);
        }

        function conectar($host,$user,$pass,$bd){
            if($host!="")$this->Servidor=$host;
            if($user!="")$this->Usuario=$user;
            if($pass!="")$this->Clave=$pass;
            if($bd!="")$this->BaseDatos=$bd;

            $this->Conexion_ID=mysqli_connect($this->Servidor,$this->Usuario,$this->Clave,$this->BaseDatos);
            if(!$this->Conexion_ID){
                $this->Error="La conexion ha fallado";
                return 0;
            }

        }

        function getConexion(){
            return $this->Conexion_ID;
        }

    }
?>
