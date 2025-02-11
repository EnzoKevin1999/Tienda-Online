<?php

include "conexion.php";



$query="SELECT * FROM producto";

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



<div class="products-list">


<?php  



while($fila=mysqli_fetch_assoc($resultado))
{
    ?>



<a href="detalles.php?Id=<?php echo $fila['Id'];?>">

<div class="product-item" category="zapatillas">
        <img src="productos/<?php echo $fila['imagen'];?>" alt="" id="imagenesproductos">
        <p><?php echo $fila['nombre'];?></p>
        <p>$<?php echo $fila['precio'];?></p>
        <a href="detalles.php?Id=<?php echo $fila['Id'];?>" id="txtcomprar">Comprar</a>
    </div>



 
   
<!--<td>  <a href='modificarproductos.php?Id=<?php /*echo $row['Id']; */?>' id='accionesh'> 
<i class='fa-solid fa-pen' id='iconoeditar'></i>   </a>       
              <a href='eliminarproductostabla.php?Id=<?php/* echo $row['Id'];*/ ?>'' id='accionesh'> <i class='fa-solid fa-trash-can' id='iconoeliminar'></i>   </a> </td>
     
--> 

             


<?php
}

?>
 </div>

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

