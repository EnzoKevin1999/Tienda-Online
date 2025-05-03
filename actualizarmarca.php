<?php
include './conexion.php';

if (!isset($_GET["Id"])) {
    echo "ID no proporcionado.";
    exit;
}

$Id = intval($_GET["Id"]);
$marca = mysqli_real_escape_string($conexion, $_POST["marca"]);


$verificarRepetido = "SELECT * FROM marca WHERE nombre = '$marca' AND Id != $Id";
$resultadoVerificacion = mysqli_query($conexion, $verificarRepetido);

if (mysqli_num_rows($resultadoVerificacion) > 0) {

    echo '<script>
        alert("La marca ya existe. Intenta con otro.");
        window.location="modificarmarca.php";
    </script>';
    exit;
}


$sqlActualizar = "UPDATE marca SET nombre = '$marca' WHERE Id = $Id";
$ejecutar = mysqli_query($conexion, $sqlActualizar);

if ($ejecutar) {
    echo '<script>
        alert("Marca actualizada correctamente.");
        window.location="modificarmarca.php";
    </script>';
} else {
    echo '<script>
        alert("Error al actualizar la marca.");
        window.location="modificarmarca.php";
    </script>';
}

mysqli_close($conexion);
?>
