<?php
session_start();
if(!isset($_SESSION['admin_logueado'])){
    header('Location: login.php');
    exit;
}
include('conexion.php');

$id = intval($_GET['id']);
$conexion->query("DELETE FROM herramientas WHERE id = $id");
header('Location: admin.php');
exit;
?>
