<?php

include "conexion.php";



$query="SELECT * FROM color";

if(isset($_POST['consulta']))
{


    $q=$_POST['consulta'];

    $query="SELECT Id ,nombre
      FROM color
     WHERE Id
    LIKE '%$q%' OR nombre LIKE '%$q%'";



}


$resultado = mysqli_query($conexion,$query);


if(mysqli_num_rows($resultado)>0)
{
 ?>   

<table class='tablamodificar'>

<th>Id</th>

<th>Nombre</th>

<th>Acciones</th>




<?php  



while($fila=mysqli_fetch_assoc($resultado))
{
    ?>
    <tr>
    
        <td> <?php echo $fila['Id'];?></td>
       <td><?php echo $fila['nombre'];?></td>
     
        
              <td>  <a href="modificarcolores.php?Id=<?php echo $fila['Id']; ?>" id="accionesh"> 
              <i class='fa-solid fa-pen' id='iconoeditar'></i>   </a>       
                            <a href="eliminarcolores.php?Id=<?php echo $fila['Id']; ?>" id="accionesh"> <i class='fa-solid fa-trash-can' id='iconoeliminar'></i>   </a> </td>
                           
                    
    </tr>
    
 
   
<!--<td>  <a href='modificarproductos.php?Id=<?php /*echo $row['Id']; */?>' id='accionesh'> 
<i class='fa-solid fa-pen' id='iconoeditar'></i>   </a>       
              <a href='eliminarproductostabla.php?Id=<?php/* echo $row['Id'];*/ ?>'' id='accionesh'> <i class='fa-solid fa-trash-can' id='iconoeliminar'></i>   </a> </td>
     
--> 

             


<?php
}

?>


</table>

<?php
}

else{
    ?>
<h1 style='padding:10px;
border-radius:12px;
background:rgb(255, 66, 66);
color:white;
font-weight: 600;
cursor: pointer;
text-decoration: none;
margin-left: 625px;
margin-right: 550px;
margin-top:150px;'>No hay datos</h1>";
<?php
}



?>

