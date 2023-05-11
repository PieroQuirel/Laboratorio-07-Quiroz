<?php 

include("../conexion/conexion.php");

$titulo = $_POST['titulo'];
$autor_id = $_POST['autor_id'];
$anio = $_POST['anio'];
$especialidad = $_POST['especialidad'];
$editorial = $_POST['editorial'];
$url = $_POST['url'];

$conexion = conectar();

$query = $conexion->prepare("INSERT INTO libro (titulo, autor_id, anio, especialidad, editorial, url) VALUES (?,?,?,?,?,?)"); 
$query->bind_param('ssssss',$titulo, $autor_id, $anio, $especialidad, $editorial, $url);
$msj = '';
if ($query->execute()) {
    $msj = 'Autor registrado';
    //$vuelta = header('location:autores.php');
}
else {
    $msj = 'No se pudo registrar al autor';
    $vuelta = 'Problema con el ingreso de datos';
}

//Cerramos la conexion a la base de datos
desconectar($conexion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar autor</title>
</head>
<body>
    <h1>Editar autor</h1>
    <h3>
        <?php $msj;?>
        <p>&nbsp;</p>
        <?php $vuelta;?>
        <a href="libros.php">Regresar</a>
    </h3>
</body>
</html>