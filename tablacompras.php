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
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="fontawesome/fontawesome-free-6.1.2-web/css/all.css"> 
</head>
<body>


<header>
    
 
    
    
       
       
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
           
               <a href="productos.php"> <li >Productos
                
       
                </li>
                </a>
                
				<a href="tablacompras.php" id="contacto" style="background: rgba(0,0,0,0.5);"><li>Ver compras</li></a>
                <a href="contacto.php" id="contacto"><li>Contactos</li></a>

                     <?php  if($tipo_usuario==1){
                    ?>
                
                <li>Acciones
                    
                 <ul>
                
             
                <a href="agregar.php">     <li>Agregar</li></a> 
                <a href="modificar.php">     <li >Modificar</li></a>
                <a href="agregarcolores.php">     <li >Agregar Colores</li></a>
                <a href="agregartalles.php">     <li >Agregar Talles</li></a>
                <?php   } ?>

                    </ul>

                
         
                
                </li>



            </ul>
    
         
     
           </div>
           
		   <div class="iconocarrito">  
            

            <i class="fa-solid fa-cart-shopping" id="iconocarrito"></i>
        


			<?php
           if(isset($_SESSION['carrito']))
           {
        
           echo "<div class='containernumerocompra'><div id='numerocompra'>". count($_SESSION['carrito']) ."</div> </div>";

           }
           
           else{

            echo "";
           }

           
           ?>





            </div>
            
        </nav>
        
       
  
        
    </header>






	<section>

	<center><h1>Últimas Compras</h1></center>
	<table border="0px" width="100%" class="tablamodificar">	
		<tr>
		<td>Cliente</td>	
		<td>Id Compra</td>
			<td>Numero Venta</td>
			<td>Fecha</td>
			<td>Observaciones</td>
			<td>Total</td>
			<td>Estado</td>
			<td>Acciones</td>
		</tr>	

		<?php
        //   session_start();



		$idusuario=$_SESSION['id_usuario'];
		   
		//$idcompra=$_SESSION['id_compra'];
		$consulta = "SELECT c.Id 'idCompra', c.numeroventa 'Num Venta', c.fecha 'Fecha', c.total 'Total' , u.nombre, c.observaciones 'Observaciones', e.Estado 'Estado'
		FROM compras c
		INNER JOIN estado e ON c.Idestado = e.Id
		INNER JOIN usuarios u ON u.Id = c.Idcliente
		WHERE u.id =$idusuario
		 order by c.fecha desc";

		if($tipo_usuario== 1) {
			$consulta = "SELECT c.Id 'idCompra', c.numeroventa 'Num Venta', c.fecha 'Fecha', c.total 'Total' , u.nombre, c.observaciones 'Observaciones', e.Estado 'Estado'
			FROM compras c
			INNER JOIN estado e ON c.Idestado = e.Id
			INNER JOIN usuarios u ON u.Id=c.Idcliente
			 order by c.fecha desc";
		}
		
	
		$re=mysqli_query($conexion,$consulta);

			while ($f=mysqli_fetch_array($re)) {

				?>
                

			
					<tr>
						<td><?php echo $f['nombre'];?></td>						
						<td><?php echo $f['idCompra'];?></td>
						<td><?php echo $f['Num Venta'];?></td>
						<td><?php echo $f['Fecha'];?></td>
						<td><?php echo $f['Observaciones'];?></td>
						<td><?php echo $f['Total'];?></td>
						<td><?php
						if($f['Estado']=='Pendiente')
						{
                              echo "<p style='color:green;'>Pendiente</p>";

						}

						if($f['Estado']=='Cancelado')
						{
                              echo "<p style='color:red;'>Cancelado</p>";

						}

						if($f['Estado']=='Entregado')
						{
                              echo "<p style='color:blue;'>Entregado</p>";

						}
						
						?>
					
					</td>
                        <td>
							<a href="detallescompras.php?Id=<?php echo $f['idCompra'];?>">Ver Detalles</a>
							<?php if($tipo_usuario== 1) { 
                       ?>
							<a href="estados.php?Id=<?php echo $f['idCompra'];?>">Ver Estados</a>

							<?php    }      ?>
					</td>

					</tr>
			<?php		
			}
		?>
	</table>
	</section>

	
</body>
</html>