<?php 
include("../conexion/conexion.php");
$conexion = conectar();
$id = $_GET['id'];

$query = $conexion->prepare("DELETE FROM autor where autor_id = ?");
$query->bind_param('s',$id);
$query->execute();

desconectar($conexion);
header('location:autores.php');
?>