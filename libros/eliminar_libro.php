<?php 
include("../conexion/conexion.php");
$conexion = conectar();
$id = $_GET['id'];

$query = $conexion->prepare("DELETE FROM libro where libro_id = ?");
$query->bind_param('s',$id);
$query->execute();

desconectar($conexion);
header('location:libros.php');
?>