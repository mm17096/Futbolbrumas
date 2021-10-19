<?php

require_once "../clases/Jornadas.php";
require_once "../clases/Partidos.php";

require_once "../dao/DaoJornada.php";
require_once "../dao/DaoEquipo.php";
require_once "../dao/DaoPartido.php";

//variables de Guardar
$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";
$fecha = (isset($_REQUEST["fechainicio"])) ? $_REQUEST["fechainicio"] : "";
$fecha_actual=date('Y-m-d');

//Dao 
$daoE= new DaoEquipo();
$daoJornada= new DaoJornada();
$daoPartido= new DaoPartido();

//clases
$equipos =$daoE->listaEquipoJornada();

//variables

$PartidoA=array();                     //matriz A
$PartidoB=array();                     // MAtriz B
$numEquipos=count($equipos);
$total=0;
$numRondas=0;
$numPartidosPorRonda=0;


//validacion de asigancion de variables
if($numEquipos%2==0){
    $numRondas=count($equipos)-1;   //Numero de Jornadas
    $numPartidosPorRonda=count($equipos)/2; //numero de partidos por jornadas
}else{
    //PARTIDOS IMPAR 
    $numRondas = count($equipos);
    $numPartidosPorRonda = round(count($equipos) / 2)-1;
}
//Aleatoriedad de Partidos (LLENADO DE MATRIZ AYB)

if($numEquipos%2==0){
    $k=0;
        //PARTIDOS PAR
            //PARTIDOS DE IDA Y VUELTA
            for ($i = 0; $i < $numRondas; $i++)
            {
                for ($j = 0; $j < $numPartidosPorRonda; $j++)
                {   
                    $PartidoA[$i][$j]=$equipos[$k]->getId();
                    
                    $k++;
                    if ($k == $numRondas){
                        $k = 0;
                    }
                        
                }
            }
            
            for ($i = 0; $i < $numRondas; $i ++)
            {
                if ($i % 2 == 0)
                {
                    $PartidoB[$i][0] = $equipos[count($equipos)-1]->getId();
                }
                else
                {
                    $PartidoB[$i][0]  = $PartidoA[$i][0];
                    $PartidoA[$i][0]  = $equipos[count($equipos)-1]->getId();
                }
            }
            
            $equipoMasAlto = count($equipos) - 1;
            $equipoImparMasAlto = $equipoMasAlto-1; 
            
            for ($i = 0, $k = $equipoImparMasAlto; $i < $numRondas; $i++)
            {
                for ($j = 1; $j < $numPartidosPorRonda; $j++)
                {
                    $PartidoB[$i][$j] = $equipos[$k]->getId();
    
                    $k--;
    
                    if ($k ==-1)
                        $k = $equipoImparMasAlto;
                }
            }
            

}else{
    //PARTIDOS IMPAR 
    for ($i = 0, $k = 0; $i < $numRondas; $i ++)
    {
        for ($j = -1; $j < $numPartidosPorRonda; $j ++)
        {
            if ($j >= 0)
            {   
                $PartidoA[$i][$j] = $equipos[$k]->getId();
            }
            
            $k++;

            if ($k == $numRondas)
                $k = 0;
        }
    }
    
    $equipoMasAlto = $numEquipos - 1;
    
    for ($i = 0, $k = $equipoMasAlto; $i < $numRondas; $i ++)
    {
        for ($j = 0; $j < $numPartidosPorRonda; $j ++)
        {
            $PartidoB[$i][$j] = $equipos[$k]->getId();

            $k--;

            if ($k == -1)
                $k = $equipoMasAlto;
        }
    }
}



//Hacer registro de partidos y jornadas
if($action=="guardar"){
    if($fecha_actual<$fecha){
             
        //ASIGNACION DE FECHAS DE JORNADAS PARA PARTIDOS
        $anio = date("Y", strtotime($fecha));
        $mes = date("m", strtotime($fecha));
        $dia = date("d", strtotime($fecha));
        
        $horas= array();
        $horas[0]="8:00:00";
        $horas[1]="11:00:00";
        $horas[2]="14:00:00";
        $horas[3]="17:00:00";
        
        
    
    
            $contador=0;
            $cont_fecha=0;
            $fechainicio="";
            $fechafin="";
            $contador_mensaje=0;
            //variables para controlar las matriz A y B
            $fila=0;
            $columna=0;
            $controlador_media=0;            
               
                while($contador<(2*$numRondas)) {// dos dias por las 2 matrices
                    if(!checkdate($mes, $dia, $anio)) { //validando si existe la fecha
                        $mes++;
                        $dia = 1;
                    }
                        $d=date("w", strtotime($anio."-".$mes."-".$dia));
                        
                        if($d=="6"){
                            $cont_fecha+=1;//contara 2 fin de semana 
                            //guardar fechas para jornadas
                            $fechainicio=$anio."-".$mes."-".$dia;
                            $contador=$contador+1;  
                            
                                     
                        }else if($d=="0"){
                            $cont_fecha+=1;//contara 2 fin de semana 
                            $fechafin=$anio."-".$mes."-".$dia;
                            $contador=$contador+1;   
                        }
                    
                        if($cont_fecha==2 && $fechainicio!="" && $fechafin!=""){
                            $daoJornada->registroJornada(new Jornadas(null,$fechainicio,$fechafin));
                            
                            $id_ultima_jornada=1;
                            if(count($daoJornada->listaJornadas())!=0){
                                $id_ultima_jornada= $daoJornada->UltmimaJornada()->getIdjornada();//id de ultimo jornada ingresada (ingreso arriba} 
                            }
                            
                            //partidos por dias 1,2,3,4 
                            //partidos por jornada/2
                            //-------------------------PARTIDOS DE IDA--------------------------
                            if($numPartidosPorRonda==1){//1 partidos por dia
                                     $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[0] ,$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                                         
                            }else if($numPartidosPorRonda==2){// registro de 1 partido por dia Sabado o Domingo
                               
                                    for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                    {   
                                        if($fila<$numRondas){
                                            if($columna<=0){
                                                    $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                    $columna+=1;
                                            }elseif ($columna>=1) {
                                                    $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-1],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                    $columna++;
                                                   
                                            }
                                            if($columna==$numPartidosPorRonda){
                                                $fila++;
                                            }
                                            
                                        }
                                    }
                                
                            }else if ($numPartidosPorRonda==3) {// 2 partidos domingo y 1 sabado
                                
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=1){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=2) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-2],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==4) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=1){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=2) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-2],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==5) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=2){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=3) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-3],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==6) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=2){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=3) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-3],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==7) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=3){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=4) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-4],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==8) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=3){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$hora[$j],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=4) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-4],$PartidoA[$fila][$columna],$PartidoB[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }     
                           
                            $contador_mensaje+=1;
                            $cont_fecha=0;                              
                            $columna=0;
                        }
                        
                        $dia=$dia+1;
                
                }
                $fecha=$fechafin;
                


                //ASIGNACION DE FECHAS DE JORNADAS PARA PARTIDOS
        $anio = date("Y", strtotime($fecha));
        $mes = date("m", strtotime($fecha));
        $dia = date("d", strtotime($fecha));
        
     
            $contador=0;
            $cont_fecha=0;
            $fechainicio="";
            $fechafin="";
            //variables para controlar las matriz A y B
            $fila=0;
            $columna=0;
            $controlador_media=0;            
               
                while($contador<(2*$numRondas)) {// dos dias por las 2 matrices
                    if(!checkdate($mes, $dia, $anio)) { //validando si existe la fecha
                        $mes++;
                        $dia = 1;
                    }
                        $d=date("w", strtotime($anio."-".$mes."-".$dia));
                        
                        if($d=="6"){
                            $cont_fecha+=1;//contara 2 fin de semana 
                            //guardar fechas para jornadas
                            $fechainicio=$anio."-".$mes."-".$dia;
                            $contador=$contador+1;  
                            
                                     
                        }else if($d=="0"){
                            $cont_fecha+=1;//contara 2 fin de semana 
                            $fechafin=$anio."-".$mes."-".$dia;
                            $contador=$contador+1;   
                        }
                    
                        if($cont_fecha==2 && $fechainicio!="" && $fechafin!=""){
                            $daoJornada->registroJornada(new Jornadas(null,$fechainicio,$fechafin));
                            
                            $id_ultima_jornada=1;
                            if(count($daoJornada->listaJornadas())!=0){
                                $id_ultima_jornada= $daoJornada->UltmimaJornada()->getIdjornada();//id de ultimo jornada ingresada (ingreso arriba} 
                            }
                            
                            //partidos por dias 1,2,3,4 
                            //partidos por jornada/2
                            
                            //-------------------------PARTIDOS DE VUELTA--------------------------
                            if($numPartidosPorRonda==1){//1 partidos por dia
                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[0] ,$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                                    
                            }elseif($numPartidosPorRonda==2){// registro de 1 partido por dia Sabado o Domingo
                        
                            for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                            {   
                                if($fila<$numRondas){
                                    if($columna<=0){
                                            $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                            $columna+=1;
                                    }elseif ($columna>=1) {
                                            $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-1],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                            $columna++;
                                            
                                    }
                                    if($columna==$numPartidosPorRonda){
                                        $fila++;
                                    }
                                    
                                }
                            }
                        
                            }else if ($numPartidosPorRonda==3) {// 2 partidos domingo y 1 sabado
                                
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=1){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=2) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-2],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==4) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=1){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=2) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-2],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==5) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=2){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=3) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-3],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==6) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=2){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=3) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-3],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==7) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=3){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$horas[$j],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=4) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-4],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }elseif ($numPartidosPorRonda==8) {
                                for ($j = $columna; $j < $numPartidosPorRonda; $j++)//columnas
                                {   
                                    if($fila<$numRondas){
                                        if($columna<=3){
                                                $daoPartido->registroPartido(new Partidos(null,$fechainicio,$hora[$j],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna+=1;
                                        }elseif ($columna>=4) {
                                                $daoPartido->registroPartido(new Partidos(null,$fechafin,$horas[$j-4],$PartidoB[$fila][$columna],$PartidoA[$fila][$columna],$id_ultima_jornada,0));
                                                $columna++;
                                                if($columna==$numPartidosPorRonda ){
                                                    $fila++;
                                                }
                                        }
                                        
                                    }
                                }
                            }   
                           
                            $contador_mensaje+=1;
                            $cont_fecha=0;                              
                            $columna=0;
                        }
                        
                        $dia=$dia+1;
                
                }
   
                //MOSTRAR MENSAJES DE REGISTROS
                if($contador_mensaje==$numRondas*2){
                    $messages[] = "Registro de Jornada Y Equipos con éxito.";
                       ?>
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>¡Bien hecho!</strong>
                                            <?php
                                                                                                                                                foreach ($messages as $message) {
                                                                                                                                                        echo $message;
                                                                                                                                                    }
                                                                                                                                                ?>
                                        </div>
                                        <?php
                       
                }else{
                    $errors[] = "Error en el proceso de Registro de Jornadas";
                    ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Error!</strong>
                                                    <?php
                                                                                                                                                    foreach ($errors as $error) {
                                                                                                                                                            echo $error;
                                                                                                                                                        }
                                                                                                                                                    ?>
                                                </div>
                                                <?php
                }
                
    }else{
        $errors[] = "Fecha Inicio Tiene que ser Mayor a la Actual";
        ?>
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong>
    <?php
                                                                                        foreach ($errors as $error) {
                                                                                                echo $error;
                                                                                            }
                                                                                        ?>
</div>
<?php
    }
 
 }
 


        
   ?>