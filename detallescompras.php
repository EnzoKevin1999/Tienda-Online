<?php
   session_start();

   include "conexion.php";

   $tipo_usuario=$_SESSION['tipo_usuario'];

   $usuario=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="css/miestilo.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
	<link rel="stylesheet" href="fontawesome/fontawesome-free-6.1.2-web/css/all.css"> 
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<header>
    
<div style="float:right"><a href="cerrarsesion.php">Cerrar Sesion</a></div>
  
    
       
       
       <figure>
     <a href="index.html">
       <img src="imagenes/CALZADOURBANOLUNA.png" class="logo" alt="">
       
  
      </a>

	  <?php  echo "<p style='color:white;font-size: 30px;font-weight: 600;width:25%;'>Bienvenido  $usuario </p>";           ?>
       </figure>
       
       
      
    
        <nav class="menu">
           
          <div class="prueba">
           
            <ul>
               <a href="paginaprincipal.php"> <li>Inicio</li> </a>
           
               <a href="productos.php"> <li>Productos
                
       
                </li>
                </a>
                
                <a href="tablacompras.php" id="contacto"><li style="background: rgba(0,0,0,0.5);" >Ver compras</li></a>
                <a href="contacto.php" id="contacto"><li>Contactos</li></a>

				<?php  if($tipo_usuario==1){
                    ?>
                
                <li>Acciones
                    
                 <ul>
                
             
                <a href="agregar.php">     <li>Agregar</li></a> 
                <a href="modificar.php">     <li >Modificar</li></a>
                <a href="agregarcolores.php">     <li >Agregar Colores</li></a>
                <a href="agregartalles.php">     <li >Agregar Talles</li></a>
				<a href="agregarmarca.php">     <li >Agregar Marca</li></a>
                <?php   } ?>

                    </ul>

                
         
                
                </li>



            </ul>
    
         
     
           </div>
           
		   <div class="iconocarrito">  


		   <a href="carritodecompras.php">  <i class="fa-solid fa-cart-shopping" id="iconocarrito"></i></a>
        
            </div>
            
        </nav>
        
       
  
        
    </header>






	<section>

	<center><h1>Últimas Compras</h1></center>
	<table border="0px" width="100%" class="tablamodificar">	
		<tr>
		<th>Nombre del producto</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Numero del talle</th>
        <th>Cantidad</th>
		<th>Precio Unitario</th>
		<th>Subtotal</th>
		</tr>	

		<?php
      

          

		$idusuario=$_SESSION['id_usuario'];
		   
	

			$re=mysqli_query($conexion,"SELECT 
		p.nombre AS 'Producto',
		m.nombre AS 'Marca',
		c.nombre AS 'Color',
		t.numero AS 'Talle',
		det.cantidad AS 'Cantidad',
		det.precio_unitario AS 'Precio Unit',
		det.subtotal AS 'Subtotal'
	FROM detalle_compra det 
	INNER JOIN producto p ON det.Idproducto = p.id
	INNER JOIN marca m ON p.Id_marca = m.Id
	INNER JOIN color c ON c.Id = det.Idcolor
	INNER JOIN talle t ON t.id = det.Idtalle
	WHERE det.Idcompra = " . intval($_GET['Id']) . "");

			$numeroventa=0;

			while ($f=mysqli_fetch_array($re)) {
                
				?>
            
					<tr>						
						<td><?php echo $f['Producto'];?></td>
						<td><?php echo $f['Marca'];?></td>
						<td><?php echo $f['Color'];?></td>
						<td><?php echo $f['Talle'];?></td>
						<td><?php echo $f['Cantidad'];?></td>
						<td><?php echo $f['Precio Unit'];?></td>
                        <td><?php echo $f['Subtotal'];?></td>

					</tr>
			<?php		
			}
		?>
	</table>
	</section>

	
</body>
</html>