<?php

include "config.php";

$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
//$conexion = new mysqli('localhost', 'eliseowe_funeraria', 'funeraria_eliseowe', 'eliseowe_funeraria');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
