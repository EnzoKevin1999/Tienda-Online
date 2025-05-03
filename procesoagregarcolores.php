<?php
include './conexion.php';



$colores=$_POST['colores'];
$ultimo_id = mysqli_insert_id($conexion); 
$query2="SELECT * FROM color WHERE nombre='$colores' AND Id != '$ultimo_id '";


$ejecutarRepetido=mysqli_query($conexion,$query2);


if (mysqli_num_rows($ejecutarRepetido) > 0) {

    echo '<script>
        alert("El color ya existe. Intenta con otro.");
        window.location="agregarcolores.php";
    </script>';
    exit;
}

$query="INSERT INTO color (Id,nombre) VALUES('$ultimo_id','$colores')";
$ejecutar=mysqli_query($conexion,$query);

if($ejecutar)
{

    echo '<script>

    alert("Se ha guardado el color correctamente");
    window.location="agregarcolores.php";
    
    </script>';
}
else
{

    echo '<script>

    alert("Intentalo de nuevo color no guardado");
    window.location="agregarcolores.php";
    
    </script>';


}
mysqli_close($conexion);
?>

