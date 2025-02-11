<?php
include './conexion.php';

$Id=$_GET['Id'];

$codigo=$_POST['codigo'];

$nombre=$_POST['nombre'];

$descripcion=$_POST['descripcion'];

$precio=$_POST['precio'];

$marcas=$_POST['marca'];

$talles=$_POST['talles'];

$colores=$_POST['colores'];

$nombreimagen=$_FILES['archivo']['name'];

$archivo=file_get_contents($_FILES['archivo']['tmp_name']);

$ruta="productos";

$destino=$ruta."/".$nombreimagen;

move_uploaded_file($archivo,$destino);




$sql="UPDATE producto SET codigo='$codigo',nombre='$nombre',descripcion='$descripcion',imagen='$nombreimagen',precio='$precio' WHERE Id=$Id";



$deleteNNTalles = "DELETE FROM prod_talle WHERE id_producto=".$_GET['Id'];




$ultimo_id = mysqli_insert_id($conexion); 



$ejecutar=mysqli_query($conexion,$sql);




if($ejecutar)
{


$ejecutarDeleteNNTalles=mysqli_query($conexion,$deleteNNTalles);




if($ejecutarDeleteNNTalles)
{


   



foreach($_POST['talles'] as $selected)
{

    $sql2="INSERT INTO prod_talle (Id_talle,Id_producto) VALUES($selected,".$_GET['Id'].");";
    var_dump($sql2);
    $ejecutar2=mysqli_query($conexion,$sql2);

}






}


$deleteNNcolores = "DELETE FROM producto_color WHERE Id_producto=".$_GET['Id'];

$ejecutarDeleteNNcolores=mysqli_query($conexion,$deleteNNcolores);




if($ejecutarDeleteNNcolores)
{




foreach($_POST['colores'] as $selected2)
{

$sql3="INSERT INTO producto_color (id_color,Id_producto) VALUES($selected2,".$_GET['Id'].");";

$ejecutar3=mysqli_query($conexion,$sql3);

}
}





}











/* if($ejecutar && $ejecutar2 && $ejecutar3)
{

    echo '<script>

    alert("Se han Actualizado correctamente");
    window.location="modificarproductos.php";
    
    </script>';
}
else
{

    echo '<script>

    alert("Intentalo de nuevo usuario no Actualizado");
    window.location="modificarproductos.php";
    
    </script>';


}
*/
mysqli_close($conexion);
?>
