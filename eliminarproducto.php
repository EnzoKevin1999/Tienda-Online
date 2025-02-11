<?php

include "conexion.php";

if(isset($_GET['Id'])){

$Id=$_GET['Id'];

$query2="DELETE FROM prod_talle WHERE Id_producto = $Id";

$query3="DELETE FROM producto_color WHERE Id_producto = $Id";

$query="DELETE FROM producto WHERE Id = $Id";


$result2=mysqli_query($conexion,$query2);

$result3=mysqli_query($conexion,$query3);

$result=mysqli_query($conexion,$query);


if($result && $result2 && $result3)
{

    echo "<script>
    window.location='productos.php';     
    </script>"; 

}


else{


    echo "Hubo un error";


}




}






?>