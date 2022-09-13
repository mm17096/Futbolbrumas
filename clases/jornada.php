<?php

    class Jornada
    {
    private $Idjornada;
    private $Fechainicio;
    private $Fechafin;
    private $Clasificacion;
    private $Torneo;


        function __construct($Idjornada,$Fechainicio,$Fechafin,$Clasificacion,$Torneo)
        {
            $this->Idjornada=$Idjornada;
            $this->Fechainicio=$Fechainicio;
            $this->Fechafin=$Fechafin;
            $this->Clasificacion=$Clasificacion;
            $this->Torneo=$Torneo;
        }

        function getIdjornada(){
            return $this->Idjornada;
        }
        function getFechainicio(){
            return $this->Fechainicio;
        }
        function getFechafin(){
            return $this->Fechafin;
        }
        function getClasificacion(){
            return $this->Clasificacion;
        }
        function getTorneo(){
            return $this->Torneo;
        }
    }
?>
