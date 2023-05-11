<?php 

include("../conexion/conexion.php");

//Obtenemos los valores del formulario
$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

//Abrimos la conexion a la base de datos
$conexion = conectar();

//Consulta a la base de datos
$query = $conexion->prepare("INSERT INTO alumno (nombres, ape_paterno, ape_materno) VALUES (?,?,?)"); 
$query->bind_param('sss',$nombres, $ape_paterno, $ape_materno);
$msj = '';
if ($query->execute()) {
    $msj = 'Alumno registrado';
}
else {
    $msj = 'No se pudo registrar al alumno';
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
    <title>Editar Alumno</title>
</head>
<body>
    <h1>Editar Alumno</h1>
    <h3>
        <?php echo $mjs ?>
        <a href="alumnos.php">Regresar</a>
    </h3>
</body>
</html>