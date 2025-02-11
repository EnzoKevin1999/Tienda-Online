<?php

include "conexion.php";

$Id=$_GET['Id'];

$tiposdeestados=$_POST['Estados'];



$sql="UPDATE compras SET Idestado=$tiposdeestados WHERE Id=$Id";


$ejecutar=mysqli_query($conexion,$sql);




if($ejecutar)
{
    echo '<script>

    alert("Se han Actualizado correctamente");
    window.location="tablacompras.php";
    
    </script>';


}

{


    echo '<script>

    alert("Intentalo de nuevo no se puedo modificar");
    window.location="tablacompras.php";
    </script>';



}


?>