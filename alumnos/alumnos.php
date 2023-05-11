<?php
include("../conexion/conexion.php");

//Abrimos conexion a la base de datos
$conexion = conectar();

//Consultamos a la base de datos
$query = $conexion->prepare("SELECT alumno_id, nombres, ape_paterno, ape_materno FROM alumno");
$query ->execute();
$resultado = $query->get_result();

//Cerramos la conexion a la base de datos
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
</head>
<body>
    <h1>Alumnos</h1>
    <a href="agregar.html">Agregar Alumno</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellidos Paternos</th>
                <th>Apellidos Maternos</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($alumno = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $alumno['alumno_id'] . '</td>';
                echo '<td>' . $alumno['nombres'] . '</td>';
                echo '<td>' . $alumno['ape_paterno'] . '</td>';
                echo '<td>' . $alumno['ape_materno'] . '</td>';
                echo '<td> <a href="#">Editar</a> | <a href="#">Eliminar</a> </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>