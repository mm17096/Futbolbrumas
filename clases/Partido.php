<?php

class Partido{
    private $Idpartido;
    private $Fechapartido;
    private $Equipoa;
    private $Equipob;
    private $Idarbitroa;
    private $Idarbitrob;
    private $Idjornada;
    private $Idcancha;
    private $Estado;

    function __construct($Idpartido,$Fechapartido,$Equipoa,$Equipob,$Idarbitroa,$Idarbitrob,$Idjornada,$Idcancha,$Estado){
        $this->Idpartido=$Idpartido;
        $this->Fechapartido=$Fechapartido;
        $this->Equipoa=$Equipoa;
        $this->Equipob=$Equipob;
        $this->Idarbitroa=$Idarbitroa;
        $this->Idarbitrob=$Idarbitrob;
        $this->Idjornada=$Idjornada;
        $this->Idcancha=$Idcancha;
        $this->Estado=$Estado;
    }
    function getIdPartido(){
        return $this->Idpartido;
    }
    
    function getFechapartido(){
        return $this->Fechapartido;
    }  
  
    function getEquipoa(){
        return $this->Equipoa;
    }
    
    function getEquipob(){
        return $this->Equipob;
    }
    
    function getIdarbitroa(){
        return $this->Idarbitroa;
    } 
    
    function getIdarbitrob(){
        return $this->Idarbitrob;
    }
    
    function getIdjornada(){
        return $this->Idjornada;
    }
    
    function getIdcancha(){
        return $this->Idcancha;
    }
    
    function getEstado(){
        return $this->Estado;
    }
    
    
    

}

?>