<?php

include "conexion.php";

if(isset($_GET['Id'])){

$Id=$_GET['Id'];

$query="DELETE FROM marca WHERE Id = $Id";

$result=mysqli_query($conexion,$query);


if($result)
{

    echo "<script>
    window.location='modificarmarca.php';     
    </script>"; 

}


else{


    echo "<script>
    alert('Hubo un error al eliminar.');
    window.location='modificarmarca.php';     
    </script>"; 


}




}






?>