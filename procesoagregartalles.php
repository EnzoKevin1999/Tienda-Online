<?php
include './conexion.php';



$talles=$_POST['talles'];
$ultimo_id = mysqli_insert_id($conexion); 

$query2="SELECT * FROM talle WHERE numero='$talles' AND Id != '$ultimo_id '";



$ejecutarRepetido=mysqli_query($conexion,$query2);


if (mysqli_num_rows($ejecutarRepetido) > 0) {

    echo '<script>
        alert("El talle ya existe. Intenta con otro.");
        window.location="agregartalles.php";
    </script>';
    exit;
}

$query="INSERT INTO talle (Id,numero) VALUES('$ultimo_id','$talles')";
$ejecutar=mysqli_query($conexion,$query);

if($ejecutar)
{

    echo '<script>

    alert("Se ha guardado el talle correctamente");
    window.location="agregartalles.php";
    
    </script>';
}
else
{

    echo '<script>

    alert("Intentalo de nuevo talle no guardado");
    window.location="agregartalles.php";
    
    </script>';


}
mysqli_close($conexion);
?>
