<?php
session_start();
include './Connet.php';
require_once "../../helpers/utils.php";
$restorePoint=SGBD::limpiarCadena($_POST['restorePoint']);
$sql=explode(";",file_get_contents($restorePoint));
$totalErrors=0;
set_time_limit (60);
$con=mysqli_connect(SERVER, USER, PASS, BD);
$con->query("SET FOREIGN_KEY_CHECKS=0");
for($i = 0; $i < (count($sql)-1); $i++){
    if($con->query($sql[$i].";")){  }else{ $totalErrors++; }
}
$con->query("SET FOREIGN_KEY_CHECKS=1");
$con->close();
if($totalErrors<=0){
	//echo "Restauración completada con éxito";
	$_SESSION['action_success'] = "sirestaurado";
    echo '<script>window.location="' . base_url . 'views/hacer_Backup.php"</script>';
}else{
	//echo "Ocurrio un error inesperado, no se pudo hacer la restauración completamente";
	$_SESSION['action_success'] = "sierror";
    echo '<script>window.location="' . base_url . 'views/hacer_Backup.php"</script>';
}
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
