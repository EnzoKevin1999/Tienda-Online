<?php
include './conexion.php';

if (!isset($_GET["Id"])) {
    echo "ID no proporcionado.";
    exit;
}

$Id = intval($_GET["Id"]);
$color = mysqli_real_escape_string($conexion, $_POST["colores"]);


$verificarRepetido = "SELECT * FROM color WHERE nombre = '$color' AND Id != $Id";
$resultadoVerificacion = mysqli_query($conexion, $verificarRepetido);

if (mysqli_num_rows($resultadoVerificacion) > 0) {

    echo '<script>
        alert("El color ya existe. Intenta con otro.");
        window.location="modificarcolores.php";
    </script>';
    exit;
}


$sqlActualizar = "UPDATE color SET nombre = '$color' WHERE Id = $Id";
$ejecutar = mysqli_query($conexion, $sqlActualizar);

if ($ejecutar) {
    echo '<script>
        alert("Color actualizado correctamente.");
        window.location="modificarcolores.php";
    </script>';
} else {
    echo '<script>
        alert("Error al actualizar el color.");
        window.location="modificarcolores.php";
    </script>';
}

mysqli_close($conexion);
?>
