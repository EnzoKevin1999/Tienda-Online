<?php
include './conexion.php';



$marca=$_POST['marca'];
$ultimo_id = mysqli_insert_id($conexion); 
$query2="SELECT * FROM marca WHERE nombre='$marca' AND Id != '$ultimo_id '";


$ejecutarRepetido=mysqli_query($conexion,$query2);


if (mysqli_num_rows($ejecutarRepetido) > 0) {

    echo '<script>
        alert("La marca ya existe. Intenta con otro.");
        window.location="agregarmarca.php";
    </script>';
    exit;
}

$query="INSERT INTO marca (Id,nombre) VALUES('$ultimo_id','$marca')";
$ejecutar=mysqli_query($conexion,$query);

if($ejecutar)
{

    echo '<script>

    alert("Se ha guardado la marca correctamente");
    window.location="agregarmarca.php";
    
    </script>';
}
else
{

    echo '<script>

    alert("Intentalo de nuevo marca no guardada");
    window.location="agregarmarca.php";
    
    </script>';


}
mysqli_close($conexion);
?>