<?php
include './conexion.php';

if (!isset($_GET["Id"])) {
    echo "ID no proporcionado.";
    exit;
}

$Id = intval($_GET["Id"]);
$talle = mysqli_real_escape_string($conexion, $_POST["talle"]);


$verificarRepetido = "SELECT * FROM talle WHERE numero = '$talle' AND Id != $Id";
$resultadoVerificacion = mysqli_query($conexion, $verificarRepetido);

if (mysqli_num_rows($resultadoVerificacion) > 0) {

    echo '<script>
        alert("El talle ya existe. Intenta con otro.");
        window.location="modificartalle.php";
    </script>';
    exit;
}


$sqlActualizar = "UPDATE talle SET numero = '$talle' WHERE Id = $Id";
$ejecutar = mysqli_query($conexion, $sqlActualizar);

if ($ejecutar) {
    echo '<script>
        alert("Talle actualizado correctamente.");
        window.location="modificartalle.php";
    </script>';
} else {
    echo '<script>
        alert("Error al actualizar el talle.");
        window.location="modificartalle.php";
    </script>';
}

mysqli_close($conexion);
?>
