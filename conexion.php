<?php

$host = 'localhost';
$dbname = 'trupercatorce';
$username = 'dev_user';
$password = 'User*2026';

$conexion = new mysqli($host, $username, $password, $dbname);


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$conexion->set_charset("utf8");


?>
