<?php
include("../conexion/conexion.php");
$conexion = conectar();
$id = $_GET['id'];

$query = $conexion->prepare("SELECT libro_id, titulo, autor_id, anio, especialidad, editorial, url FROM libro where libro_id = ?");
$query->bind_param('s',$id);
$query->execute();
$resultado = $query->get_result();
$libro = $resultado->fetch_assoc();

$query2 = $conexion->prepare("SELECT autor_id, nombres, ape_paterno, ape_materno FROM autor");
$query2->execute();
$resultado2 = $query2->get_result();

desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Editar libro</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center pt-5 mt-5 mr-1 text-center">
            <h1>Editar un libro</h1>
            <form name="formulario2" method="post" action="libro_editado.php">
                <table style="position:relative; margin:auto; width:100%;">
                    <tr class="row mb-3">
                    <input type="hidden" name="libro_id" value="<?php echo $libro['libro_id'] ?>" required>
                        <td>Titulo</td>
                        <td>
                            <input type="text" name="titulo" value="<?php echo $libro['titulo'] ?>"maxlength="60" size="40" required>
                        </td>
                    </tr>
                    <tr class="row mb-3">
                        <td>Elije un autor</td>
                        <td>
                        <select name="autor_id" required>
                        <?php
                        while ($autor = $resultado2->fetch_assoc()) {
                        echo ' <option value="'.$autor['autor_id'].'">'.$autor['nombres']. ' ' .$autor['ape_paterno']. ' ' .$autor['ape_materno'].'</option>';
                        }
                        ?>
                        </select>
                        </td>
                    </tr>
                    <tr class="row mb-3">
                        <td>Año</td>
                        <td>
                            <input type="text" name="anio" value="<?php echo $libro['anio'] ?>" maxlength="20" size="20" required>
                        </td>
                    </tr>
                    <tr class="row mb-3">
                        <td>Especialidad</td>
                        <td>
                            <input type="text" name="especialidad" value="<?php echo $libro['especialidad'] ?>" maxlength="40" size="40" required>
                        </td>
                    </tr>
                    <tr class="row mb-3">
                        <td>Editorial</td>
                        <td>
                            <input type="text" name="editorial" value="<?php echo $libro['editorial'] ?>" maxlength="40" size="40" required>
                        </td>
                    </tr>
                    <tr class="row mb-3">
                        <td>URL</td>
                        <td>
                            <input type="text" name="url" value="<?php echo $libro['url'] ?>" maxlength="250" size="90" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="btn btn-secondary col-4" type="submit">Actualizar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>