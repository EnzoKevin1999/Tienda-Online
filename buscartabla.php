<?php

include "conexion.php";



$query="SELECT p.Id, p.codigo, p.nombre, p.descripcion, p.imagen, m.nombre 'Marca', p.precio, p.id_marca  FROM producto p INNER JOIN marca m ON p.Id_marca= m.Id";

if(isset($_POST['consulta']))
{


    $q=$_POST['consulta'];

    $query="SELECT p.Id, p.codigo, p.nombre, p.descripcion, p.imagen, m.nombre 'Marca', p.precio, p.id_marca
      FROM producto p
    INNER JOIN Marca m ON p.Id_marca= m.Id
     WHERE p.codigo 
    LIKE '%$q%' OR p.nombre LIKE '%$q%' OR p.descripcion LIKE '%$q%' 
    OR p.precio LIKE '%$q%' OR m.nombre LIKE '%$q%'";



}


$resultado = mysqli_query($conexion,$query);


if(mysqli_num_rows($resultado)>0)
{
 ?>   

<table class='tablamodificar'>

<th>Id</th>

<th>Codigo</th>

<th>Nombre</th>

<th>Descripcion</th>
    
<th>Imagen</th>

<th>Marca</th>

<th>Precio</th>

<th>Acciones</th>




<?php  



while($fila=mysqli_fetch_assoc($resultado))
{
    ?>
    <tr>
    
        <td> <?php echo $fila['Id'];?></td>
       <td><?php echo $fila['codigo'];?></td>
       <td><?php echo $fila['nombre']?></td>
       
       <td><?php echo $fila['descripcion'];?></td>
       <td><?php echo $fila['imagen']; ?></td>

       
       <td><?php echo $fila['Marca'];?></td>
              <td>$<?php echo $fila['precio'];?></td>
        
              <td>  <a href="modificarproductos.php?Id=<?php echo $fila['Id']; ?>" id="accionesh"> 
              <i class='fa-solid fa-pen' id='iconoeditar'></i>   </a>       
                            <a href="eliminarproductostabla.php?Id=<?php echo $fila['Id']; ?>" id="accionesh"> <i class='fa-solid fa-trash-can' id='iconoeliminar'></i>   </a> </td>
                           
                    
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

