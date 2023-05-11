<?php 
include("../conexion/conexion.php");
$conexion = conectar();

$libro_id = $_POST['libro_id'];
$titulo = $_POST['titulo'];
$autor_id = $_POST['autor_id'];
$anio = $_POST['anio'];
$especialidad = $_POST['especialidad'];
$editorial = $_POST['editorial'];
$url = $_POST['url'];


$query = $conexion->prepare("UPDATE libro SET titulo = ?, autor_id = ?, anio = ?, especialidad = ?, editorial = ?, url = ? WHERE libro_id = ?");
$query->bind_param('sssssss',$titulo, $autor_id, $anio, $especialidad, $editorial, $url, $libro_id);
$query->execute();

desconectar($conexion);
header('location:libros.php');
?>