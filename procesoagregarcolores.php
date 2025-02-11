<?php
include './conexion.php';



$colores=$_POST['colores'];


$query="INSERT INTO color (Id,nombre) VALUES('$ultimo_id','$colores')";



$ultimo_id = mysqli_insert_id($conexion); 


$ejecutar=mysqli_query($conexion,$query);

if($ejecutar)
{

    echo '<script>

    alert("Se han guardado los datos correctamente");
    window.location="agregarcolores.php";
    
    </script>';
}
else
{

    echo '<script>

    alert("Intentalo de nuevo usuario no guardado");
    window.location="agregarcolores.php";
    
    </script>';


}
mysqli_close($conexion);
?>

