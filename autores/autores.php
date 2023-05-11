<?php
include("../conexion/conexion.php");

//Abrimos conexion a la base de datos
$conexion = conectar();

//Consultamos a la base de datos
$query = $conexion->prepare("SELECT autor_id, nombres, ape_paterno, ape_materno FROM autor");
$query->execute();
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
    <title>Autores</title>
</head>

<body>
    <div class="container">
        <h1>AUTORES</h1>
        <a href="agregar_autor.html">
            <button type="button" class="btn btn-success mb-3">Agregar un nuevo autor</button>
        </a>
        <table class="table table-striped">
            <thead>
                <tr class="table-primary">
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos Paternos</th>
                    <th>Apellidos Maternos</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($autor = $resultado->fetch_assoc()) {

                    echo '<tr>';
                    echo '<td>' . $autor['autor_id'] . '</td>';
                    echo '<td>' . $autor['nombres'] . '</td>';
                    echo '<td>' . $autor['ape_paterno'] . '</td>';
                    echo '<td>' . $autor['ape_materno'] . '</td>';
                    echo '<td><a href="editar_autor.php?id=' . $autor['autor_id'] . '"><button type="button" class="btn btn-secondary">Editar</button></a>
                            <a href="eliminar_autor.php?id=' . $autor['autor_id'] . '"><button type="button" class="btn btn-danger">Eliminar</button></a></td>';
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