<?php
include './conexion.php';

$nombre = trim($_POST['nombre']);
$correo = trim($_POST['correo']);
$usuario = trim($_POST['usuario']);
$contraseña = $_POST['contraseña'];


if (is_numeric($nombre) || strlen($nombre) > 12 || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
    include("formularioregistrarse.php");
    echo "<h1 id='mensaje' class='mensaje' style='text-align:center; background:rgb(255, 62, 62); color:white; margin-top:-100px;'>Nombre inválido. No debe contener números ni símbolos, y debe ser corto.</h1>";
    exit();
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    include("formularioregistrarse.php");
    echo "<h1 id='mensaje' class='mensaje' style='text-align:center; background:rgb(255, 62, 62); color:white; margin-top:-100px;'>Correo inválido. Ingresá un correo válido.</h1>";
    exit();
}

if (is_numeric($usuario) || strlen($usuario) > 12 || !preg_match("/^[a-zA-Z0-9_]+$/", $usuario)) {
    include("formularioregistrarse.php");
    echo "<h1 id='mensaje' class='mensaje' style='text-align:center; background:rgb(255, 62, 62); color:white; margin-top:-100px;'>Usuario inválido. No debe ser solo números, ni tener símbolos extraños, y debe ser corto.</h1>";
    exit();
}

$verificarcorreo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
if (mysqli_num_rows($verificarcorreo) > 0) {
    include("formularioregistrarse.php");
    echo "<h1 id='mensaje' class='mensaje' style='text-align:center; background:rgb(255, 62, 62); color:white; margin-top:-100px;'>Ya existe este correo, intentá con otro.</h1>";
    exit();
}

$verificarusuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificarusuario) > 0) {
    include("formularioregistrarse.php");
    echo "<h1 id='mensaje' class='mensaje' style='text-align:center; background:rgb(255, 62, 62); color:white; margin-top:-100px;'>Ya existe este usuario, intentá con otro.</h1>";
    exit();
}

$query = "INSERT INTO usuarios(nombre, correo, usuario, clave) VALUES('$nombre', '$correo', '$usuario', '$contraseña')";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    include("formularioregistrarse.php");
    echo "<h1 id='mensaje' class='mensaje' style='text-align:center; background:rgb(0, 160, 13); color:white; margin-top:-100px;'>Usuario registrado correctamente</h1>";
} else {
    include("formularioregistrarse.php");
    echo "<h1 id='mensaje' class='mensaje' style='text-align:center; background:rgb(255, 62, 62); color:white; margin-top:-160px;'>Intentá de nuevo. Usuario no registrado.</h1>";
}

mysqli_close($conexion);
?>

