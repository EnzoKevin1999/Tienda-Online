<?php

require "conexion.php";


session_start();

$usuario=$_POST["usuario"];

$contraseña=$_POST["contraseña"];

$query="SELECT COUNT(*) as contar from usuarios where usuario = '$usuario' and clave = '$contraseña'";

$consulta= mysqli_query($conexion,$query);

$array=mysqli_fetch_array($consulta);

if($array['contar']>0)
{
$_SESSION['username']=$usuario;
header("location:paginaprincipal.php");

}

else{
    ?>


<?php
include("index.php");
?>

<h1 class="error" style="text-align:center;
    background:rgb(255, 62, 62);
    color:white;
    margin-top:-80px;">Datos incorrectos</h1>
<?php
}

mysqli_free_result($consulta);

mysqli_close($conexion);