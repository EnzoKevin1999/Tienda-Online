<?php

include "conexion.php";

if(isset($_GET['Id'])){

$Id=$_GET['Id'];

$query="DELETE FROM detalle_compra WHERE IdCompra = $Id";
$result=mysqli_query($conexion,$query);
$query2="DELETE FROM compras WHERE Id = $Id";

$result2=mysqli_query($conexion,$query2);







if($result && $result2)
{

    echo "<script>
            alert('Compra eliminada correctamente.');
            window.location='tablacompras.php';
        </script>";

}


else{

    echo "<script>
    alert('Hubo un error al eliminar.');
    window.location='tablacompras.php';
          </script>";


}




}






?>