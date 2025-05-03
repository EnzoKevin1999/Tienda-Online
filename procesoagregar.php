<?php
include './conexion.php';


$codigo = isset($_POST['codigo']) ? mysqli_real_escape_string($conexion, $_POST['codigo']) : '';
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, $_POST['descripcion']) : '';
$precio = isset($_POST['precio']) ? mysqli_real_escape_string($conexion, $_POST['precio']) : '';
$marcas = isset($_POST['marca']) ? mysqli_real_escape_string($conexion, $_POST['marca']) : '';
$talles = isset($_POST['talles']) ? $_POST['talles'] : [];
$colores = isset($_POST['colores']) ? $_POST['colores'] : [];


if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === 0) {
    $nombreOriginal = basename($_FILES['archivo']['name']);
    $nombreimagen = uniqid() . "_" . $nombreOriginal;
    $archivo = $_FILES['archivo']['tmp_name'];
    $ruta = "productos";
    $destino = $ruta . "/" . $nombreimagen;

    if (!move_uploaded_file($archivo, $destino)) {
        die("Error al subir la imagen.");
    }
} else {
    die("No se subió la imagen correctamente.");

}


$query = "INSERT INTO producto (codigo, nombre, descripcion, imagen, precio, id_marca) 
          VALUES ('$codigo', '$nombre', '$descripcion', '$nombreimagen', '$precio', '$marcas')";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar) {
    die("Error al insertar el producto: " . mysqli_error($conexion));
}

$ultimo_id = mysqli_insert_id($conexion);


$ejecutar2 = true;
foreach ($talles as $talle) {
    $talle = mysqli_real_escape_string($conexion, $talle);
    $query2 = "INSERT INTO prod_talle (Id_talle, Id_producto) VALUES ('$talle', '$ultimo_id')";
    if (!mysqli_query($conexion, $query2)) {
        $ejecutar2 = false;
    }
}


$ejecutar3 = true;
foreach ($colores as $color) {
    $color = mysqli_real_escape_string($conexion, $color);
    $query3 = "INSERT INTO producto_color (Id_color, Id_producto) VALUES ('$color', '$ultimo_id')";
    if (!mysqli_query($conexion, $query3)) {
        $ejecutar3 = false;
    }
}


if ($ejecutar && $ejecutar2 && $ejecutar3) {
    echo '<script>
        alert("Se han guardado los datos correctamente");
        window.location="agregar.php";
    </script>';
} else {
    echo '<script>
        alert("Ocurrió un error al guardar los datos");
        window.location="agregar.php";
    </script>';
}

mysqli_close($conexion);
?>
