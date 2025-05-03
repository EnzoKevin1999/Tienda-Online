<?php
include './conexion.php';

$Id = $_GET['Id'];


$codigo = mysqli_real_escape_string($conexion, $_POST['codigo']);
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
$precio = mysqli_real_escape_string($conexion, $_POST['precio']);
$marcas = $_POST['marca'];  
$talles = $_POST['talles'];
$colores = $_POST['colores'];


if ($_FILES['imagen']['error'] == 0) {
   
    $nombreImagen = $_FILES['imagen']['name'];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $rutaDestino = "productos/" . $nombreImagen;
    move_uploaded_file($rutaTemporal, $rutaDestino);
} else {
  
    $nombreImagen = $_POST['imagen_actual'];
}

$sql = "UPDATE producto SET codigo='$codigo', nombre='$nombre', descripcion='$descripcion', imagen='$nombreImagen', precio='$precio' WHERE Id=$Id";

$deleteNNTalles = "DELETE FROM prod_talle WHERE id_producto=".$_GET['Id'];
$ejecutar = mysqli_query($conexion, $sql);

if ($ejecutar) {
    $ejecutarDeleteNNTalles = mysqli_query($conexion, $deleteNNTalles);

    if ($ejecutarDeleteNNTalles) {
       
        foreach ($talles as $selected) {
            $sql2 = "INSERT INTO prod_talle (Id_talle, Id_producto) VALUES($selected, ".$_GET['Id'].");";
            $ejecutar2 = mysqli_query($conexion, $sql2);
        }
    }

    $deleteNNcolores = "DELETE FROM producto_color WHERE Id_producto=".$_GET['Id'];
    $ejecutarDeleteNNcolores = mysqli_query($conexion, $deleteNNcolores);

    if ($ejecutarDeleteNNcolores) {
        
        foreach ($colores as $selected2) {
            $sql3 = "INSERT INTO producto_color (id_color, Id_producto) VALUES($selected2, ".$_GET['Id'].");";
            $ejecutar3 = mysqli_query($conexion, $sql3);
        }
    }

    
    if ($ejecutar && $ejecutar2 && $ejecutar3) {
        echo '<script>
        alert("Se han guardado correctamente los datos.");
        window.location = "modificar.php";
    </script>';
    }
} else {
    echo '<script>
        alert("Intentalo de nuevo, producto no actualizado.");
        window.location = "modificar.php";
    </script>';
}

mysqli_close($conexion);
?>
