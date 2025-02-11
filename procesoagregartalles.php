<?php
include './conexion.php';



$talles=$_POST['talles'];


$query="INSERT INTO talle (Id,numero) VALUES('$ultimo_id','$talles')";



$ultimo_id = mysqli_insert_id($conexion); 


$ejecutar=mysqli_query($conexion,$query);

if($ejecutar)
{

    echo '<script>

    alert("Se han guardado los datos correctamente");
    window.location="agregartalles.php";
    
    </script>';
}
else
{

    echo '<script>

    alert("Intentalo de nuevo usuario no guardado");
    window.location="agregartalles.php";
    
    </script>';


}
mysqli_close($conexion);
?>
