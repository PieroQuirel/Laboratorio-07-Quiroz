<?php
include("../conexion/conexion.php");

//Abrimos conexion a la base de datos
$conexion = conectar();

//Consultamos a la base de datos
$query = $conexion->prepare("SELECT li.libro_id, li.titulo, au.autor_id, au.ape_paterno, li.anio, 
li.especialidad, li.editorial, li.url 
FROM libro AS li INNER JOIN autor AS au ON li.autor_id = au.autor_id");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <title>Libros</title>
</head>
<body>
    <div class="container">
    <h1>LIBROS</h1>
    <a href="agregar_libro.php">
    <button type="button" class="btn btn-success mb-3">Agregar un nuevo libro</button>
    </a>
    <table class="table table-striped">
        <thead>
            <tr class="table-primary">
                <th>Id</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Año</th>
                <th>Especialidad</th>
                <th>Editorial</th>
                <th>URL</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($libro = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $libro['libro_id'] . '</td>';
                echo '<td>' . $libro['titulo'] . '</td>';
                echo '<td>' . $libro['autor_id'] . ' (' . $libro['ape_paterno'] . ')</td>';
                echo '<td>' . $libro['anio'] . '</td>';
                echo '<td>' . $libro['especialidad'] . '</td>';
                echo '<td>' . $libro['editorial'] . '</td>';
                echo '<td> <a href="'. $libro['url'] .'" target="_blank"><button class="btn btn-outline-dark">Ir al libro</button></a></td>';
                echo '<td> <a href="editar_libro.php?id=' . $libro['libro_id'] . '"><button type="button" class="btn btn-secondary">Editar</button></a>
                 | <a href="eliminar_libro.php?id=' . $libro['libro_id'] . '"><button type="button" class="btn btn-danger">Eliminar</button></a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
</body>
</html>