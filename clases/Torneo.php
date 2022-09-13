<?php

    class Torneo
    {
    private $Idtorneo;
    private $Estado;


        function __construct($IdTorneo,$Estado)
        {
            $this->Idtorneo=$IdTorneo;
            $this->Estado=$Estado;
        }

        function getIdTorneo(){
            return $this->Idtorneo;
        }
        function getEstado(){
            return $this->Estado;
        }

    }
?>
