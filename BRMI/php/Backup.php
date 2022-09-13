<?php
session_start();
include './Connet.php';

require_once "../../helpers/utils.php";

$day=date("d");
$mont=date("m");
$year=date("Y");
$hora=date("H-i-s");
$fecha=$day.'_'.$mont.'_'.$year;
$DataBASE=$fecha."_(".$hora."_hrs).sql";
$tables=array();
$result=SGBD::sql('SHOW TABLES');
if($result){
    while($row=mysqli_fetch_row($result)){
       $tables[] = $row[0];
    }
    $sql='SET FOREIGN_KEY_CHECKS=0;'."\n\n";
    $sql.='CREATE DATABASE IF NOT EXISTS '.BD.";\n\n";
    $sql.='USE '.BD.";\n\n";;
    foreach($tables as $table){
        $result=SGBD::sql('SELECT * FROM '.$table);
        if($result){
            $numFields=mysqli_num_fields($result);
            $sql.='DROP TABLE IF EXISTS '.$table.';';
            $row2=mysqli_fetch_row(SGBD::sql('SHOW CREATE TABLE '.$table));
            $sql.="\n\n".$row2[1].";\n\n";
            for ($i=0; $i < $numFields; $i++){
                while($row=mysqli_fetch_row($result)){
                    $sql.='INSERT INTO '.$table.' VALUES(';
                    for($j=0; $j<$numFields; $j++){
                        $row[$j]=addslashes($row[$j]);
                        $row[$j]=str_replace("\n","\\n",$row[$j]);
                        if (isset($row[$j])){
                            $sql .= '"'.$row[$j].'"' ;
                        }
                        else{
                            $sql.= '""';
                        }
                        if ($j < ($numFields-1)){
                            $sql .= ',';
                        }
                    }
                    $sql.= ");\n";
                }
            }
            $sql.="\n\n\n";
        }else{
            $error=1;
        }
    }
    if($error==1){
        $_SESSION['action_success'] = "error";
            echo '<script>window.location="' . base_url . 'views/hacer_Backup.php"</script>';
    }else{
        chmod(BACKUP_PATH, 0777);
        $sql.='SET FOREIGN_KEY_CHECKS=1;';
        $handle=fopen(BACKUP_PATH.$DataBASE,'w+');
        if(fwrite($handle, $sql)){
            fclose($handle);
            //echo 'Copia de seguridad realizada con éxito';
            $_SESSION['action_success'] = "realizado";
                        echo '<script>window.location="' . base_url . 'views/hacer_Backup.php"</script>';
                    
        }else{
            $_SESSION['action_success'] = "error";
            echo '<script>window.location="' . base_url . 'views/hacer_Backup.php"</script>';
        }
    }
}else{
    //echo 'Ocurrio un error inesperado';
    $_SESSION['action_success'] = "error";
    echo '<script>window.location="' . base_url . 'views/hacer_Backup.php"</script>';
}
mysqli_free_result($result);

?>
<script type="text/javascript">
    msj();

    function msj() {

        setTimeout(function() {
            document.getElementById("msjsuccess").style.display = 'none';
        }, 3500);

        setTimeout(function() {
            document.getElementById("msjerror").style.display = 'none';
        }, 3500);

    };
</script>