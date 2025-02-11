<?php
include './conexion.php';

$codigo=$_POST['codigo'];

$nombre=$_POST['nombre'];

$descripcion=$_POST['descripcion'];

$precio=$_POST['precio'];

$marcas=$_POST['marca'];

$talles=$_POST['talles'];

$colores=$_POST['colores'];

$nombreimagen=$_FILES['archivo']['name'];

$archivo=$_FILES['archivo']['tmp_name'];

$ruta="productos";

$destino=$ruta."/".$nombreimagen;

move_uploaded_file($archivo,$destino);

$query="INSERT INTO producto (codigo,nombre,descripcion,imagen,precio,id_marca) VALUES('$codigo','$nombre','$descripcion','$nombreimagen','$precio','$marcas')";

$ejecutar=mysqli_query($conexion,$query);

$ultimo_id = mysqli_insert_id($conexion); 

//for para talles
foreach($_POST['talles'] as $selected)
{

    $query2="INSERT INTO prod_talle (Id_talle,Id_producto) VALUES($selected,$ultimo_id)";
     $ejecutar2=mysqli_query($conexion,$query2);
  
 
}
    

//hasta aca

//for para colores



foreach($_POST['colores'] as $selected2)
{

    $query3="INSERT INTO producto_color (Id_color,Id_producto) VALUES($selected2,$ultimo_id)";
    $ejecutar3=mysqli_query($conexion,$query3);
   
 
}



//$ejecutar3=mysqli_query($conexion,$query3);
//hasta aca


if($ejecutar && $ejecutar2 && $ejecutar3)
{

    echo '<script>

    alert("Se han guardado los datos correctamente");
    window.location="agregar.php";
    
    </script>';
}
else
{
/*
    echo '<script>

    alert("Intentalo de nuevo usuario no guardado");
    window.location="agregar.php";
    
    </script>';
*/

}
mysqli_close($conexion);
?>

