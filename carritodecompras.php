<?php


session_start();
include './conexion.php';

$usuario=$_SESSION['username'];

$tipo_usuario=$_SESSION['tipo_usuario'];


if(isset($_SESSION['carrito']))
{
	if(isset($_GET['Id']))
	{
				$arreglo=$_SESSION['carrito'];
				$encontro=false;
				$numero=0;
				for($i=0;$i<count($arreglo);$i++)
				{
					if($arreglo[$i]['Id']==$_GET['Id'])
					{
						$encontro=true;
						$numero=$i;
					}
				}
				if($encontro==true){
					$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
					$_SESSION['carrito']=$arreglo;
				}else{
					$nombre="";
					$precio=0;
					$imagen="";
					$re=mysqli_query($conexion,"SELECT * FROM producto WHERE Id=".$_GET['Id']);
					while ($f=mysqli_fetch_array($re)) {
						$nombre=$f['nombre'];
						$precio=$f['precio'];
						$imagen=$f['imagen'];
                        $idcolor=$_POST['colores'];
                        $idtalle=$_POST['talles'];

					}
                   
					$datosNuevos=array('Id'=>$_GET['Id'],
									'Nombre'=>$nombre,
									'Precio'=>$precio,
									'Imagen'=>$imagen,
                                    'IdColor'=>$idcolor,
									'IdTalle'=>$idtalle,
									'Cantidad'=>1);

					array_push($arreglo, $datosNuevos);
					$_SESSION['carrito']=$arreglo;

				}
	}




}else{
	if(isset($_GET['Id'])){
		$nombre="";
		$precio=0;
		$imagen="";
		$re=mysqli_query($conexion,"SELECT * FROM producto WHERE Id=".$_GET['Id']);
		while ($f=mysqli_fetch_array($re)) {
			$nombre=$f['nombre'];
			$precio=$f['precio'];
			$imagen=$f['imagen'];
            $idcolor=$_POST['colores'];
            $idtalle=$_POST['talles'];
		}
		$arreglo[]=array('Id'=>$_GET['Id'],
						'Nombre'=>$nombre,
						'Precio'=>$precio,
						'Imagen'=>$imagen,
                        'IdColor'=>$idcolor,
						'IdTalle'=>$idtalle,
						'Cantidad'=>1);
		$_SESSION['carrito']=$arreglo;
	}
}
	



?>






<!DOCTPYPE html>
<html lang= "es">
 <head> 
    <title>VENTA DE ZAPATILLAS>>></title>
    
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="css/miestilo.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 

    <link rel="stylesheet" href="fontawesome/fontawesome-free-6.1.2-web/css/all.css"> 

  

</head>

<body bgcolor="white">              
   <!--   <header>
          <div class= "header">
		      <img src="CALZADO URBANO LUNA.jpg" width="200" heigth="100">
		      <br>
		     
		
				 <ul class="navbar">
					 <li><a href="Quienes somos.html">Quienes somos</a></li>
                     <li><a href="Entregas.html">Entregas</a></li>
                     <li><a href="Medios de pago.html">Medios de pago</a></li>
	     		     <li><a href="Contacto (deja tu comentario).html">Contacto (deja tu comentario)</a></li>
					 <center><h1> CALZADO URBANO LUNA </h1></center>
		             <center><p> "SIEMPRE EN MOVIMIENTO" </p></center>
				  </ul>
			  </nav>  
		 </div>	
	 </header>		  -->
	 
	 
	 
	 
	 
	 
	 
     <header>
    
 
    
    
       
       
       <figure>
     <a href="paginaprincipal.php">
       <img src="imagenes/CALZADOURBANOLUNA.png" class="logo" alt="">
       
  
      </a>
 
      <?php  echo "<p style='color:white;font-size: 30px;font-weight: 600;width:25%;'>Bienvenido  $usuario </p>";           ?>

       </figure>
       
       
        <nav class="menu">
           
          <div class="prueba">
           
            <ul>
               <a href="paginaprincipal.php"> <li>Inicio</li> </a>
           
               <a href="productos.php" style="background: rgba(0,0,0,0.5);" > <li>Productos
                
       
                </li>
                </a>
                
                <a href="tablacompras.php" id="contacto"><li>Ver compras</li></a>
                <a href="contacto.php" id="contacto"><li>Contactos</li></a>
               
                <?php  if($tipo_usuario==1){
                    ?>
                <a href="agregar.php">     <li>Agregar</li></a> 
                <a href="modificar.php">     <li >Modificar</li></a>
                <?php   } ?>
            </ul>
    
           
     
           </div>
           
           <div class="iconocarrito">  
            
       



        <a href="carritodecompras.php">  <i class="fa-solid fa-cart-shopping" id="iconocarrito"></i></a>  
        
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
	 
	 
	 


   

 
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				   <div class="producto">
					<center>
						<img src="./productos/<?php echo $datos[$i]['Imagen'];?>" id="imagenescarrito"><br>
						<span id="txtnombrecarrito"><?php echo $datos[$i]['Nombre'];?></span><br>
						<span id="txtpreciocarrito">Precio: $<?php echo $datos[$i]['Precio'];?></span><br>
						<span id="txtcantidadcarrito">Cantidad: 
							<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
							data-precio="<?php echo $datos[$i]['Precio'];?>"
							data-id="<?php echo $datos[$i]['Id'];?>"
							class="cantidad">
						</span><br>
						<span class="subtotal">Subtotal: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
                        
                         <form action="compras.php" method="POST">


         

					</center>

                    <div class="containereliminar"><a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id'];?>">Eliminar</a></div>
                    </div>
                   
                   

			<?php
				$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
                
			}
			?>	
                   <center> <label for="mensaje" class="formulario__label">Observaciones:

<textarea type="text" maxlenght="800" size="300px" name="observaciones" id="mensaje" class="textarea__carrito"
required> </textarea>
</label>
</center>
            <?php
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total: $'.$total.'</h2></center>';
			
            if($total!=0)
            {
                echo '<br>';
                echo "<center><input type='submit' value='Comprar' class='formulario__submit__carrito'></center>";

            }



		?>

        

           </form>


			<br>
            <br>
            <br>
		<center><a href="productos.php" id="vercatalogo">Ver catalogo</a></center>
		
            <br>
            <br>
            <br>
     
		
















	 
	 
	<footer>
   
   
   <div class="container-footer-all">
   
   <div class="container-mapa">
  
  
  
  
   
   
   
  <h1 id="txtubicacion">Ubicación:</h1>
   
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3280.9894117849844!2d-58.7709167!3d-34.6802167!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bc9530470240cb%3A0xdeed0902f394748f!2sGaboto%20645%2C%20B1722%20HPK%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1601437151213!5m2!1ses-419!2sar" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" id="mapa"></iframe>
   
    </div>
   
   
   
   
    <div class="container-body">
        <div class="colum1">
            
            <h1>Más informacíon de la compañia</h1>
            
            <p>Esta compañia se dedica a la venta de insumos para celulares y servicio técnico de computación y celulares</p>
            
            
        </div>
        <div class="colum2">
            
            <h1>Redes Sociales</h1>
            
            
            <div class="row">
                
                <a href="https://www.facebook.com/dan.cell.79">
                <img src="imagenes/facebook.png" alt="">
                </a>
                
                <label>Siguenos en Facebook</label>
                
            </div>
            
            
            <div class="row">
                
                <a href="https://www.instagram.com/merlodancell/?hl=es-la">
                
                <img src="imagenes/instagram.png" alt="">
                
                </a>
                
                <label>Siguenos en Instagram</label>
                
            </div>
            
            
            
            
        </div>
        <div class="colum3">
            
            
            <h1>Información de Contactos</h1>
            
            
             <div class="row2">
                
                <img src="imagenes/house.png" alt="">
                
                
                <label>
                   
                    Gaboto 645 - Merlo
            
                </label>
            
            
        </div>
        
        
        <div class="row2">
                
                <img src="imagenes/smartphone.png" alt="">
                
                
                <label>
                 
                 <a href="https://api.whatsapp.com/send?phone=5491134402634&text=%C2%BFSigue%20disponible?"
                   id="afooter">
                  +54 9 11 34402634
                    </a>
                </label>
                
                
                
                
            </div>
            
            
            <div class="row2">
                
                <img src="imagenes/contact.png" alt="">
                
                
                <label>
                 
                 <a href="contacto.html" id="afooter">
                  EnzoKevin@gmail.com
                    </a>
                </label>
                
                
                
                
            </div>
            
            
             <div class="row2">
                
                 <i class="far fa-clock" id="iconohorario"></i>
                
                
                <label>
                 
                 <a href="horarios.html" id="afooter">
                  9:30hs a 13:30 &amp;&amp; 16:30hs a 19:30hs
                    </a>
                </label>
                
                
                
                
            </div>
            
            
            
         
            
            
            
        
        </div>
        
     
    
    
    
    
    </div>
    
    
    
       
   
   </div>
   
    
    <div class="container-footer">
        
        <div class="footer">
        <div class="copyright">
            
            
            @ 2020 Todos los Derechos Reservados
            
            
            <a href="" id="txtdancellfooter">Calzado Urbano</a>
            
            
            
  
            
        </div>
        
          <div class="information">
              
             
            
             <a href=""> Información Compañia</a> | <a href=""> Privación y Politica</a> | <a href="">Terminos y Condiciones</a>
              
              
          </div>
        
        
    </div>
   
   </div>
   
</footer> 
	 
	 
	 
</body>
</html>
	
   
   