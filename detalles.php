<?php
session_start();

$usuario=$_SESSION['username'];

$tipo_usuario=$_SESSION['tipo_usuario'];
?>






<!DOCTPYPE html>
<html lang= "es">
 <head> 
    <title>VENTA DE ZAPATILLAS>>></title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/miestilo.css">
    <link rel="stylesheet" href="fontawesome/fontawesome-free-6.1.2-web/css/all.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   

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
     <a href="index.html">
       <img src="imagenes/CALZADOURBANOLUNA.png" class="logo" alt="">
       
  
      </a>

      <?php  echo "<p style='color:white;font-size: 30px;font-weight: 600;width:25%;'>Bienvenido  $usuario </p>";           ?>

       </figure>
       
       
        <nav class="menu">
           
          <div class="prueba">
           
            <ul>
               <a href="paginaprincipal.php"> <li  >Inicio</li> </a>
           
               <a href="productos.php"> <li style="background: rgba(0,0,0,0.5);">Productos
                
       
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
              include 'conexion.php';


			  $resultado=mysqli_query($conexion,"SELECT * FROM producto WHERE Id=".$_GET['Id'])or die(mysqli_error());
               
			  while($f=mysqli_fetch_array($resultado))
			  {
               ?>
			


      <div class="container_detalles">


<div class="product">

<h1 style="padding:0px 40px;"><?php echo $f['nombre']; ?></h1>  
<img src="productos/<?php echo $f['imagen']; ?>" alt="" id="imagenesdetalles" style="padding:0px 20px;">


<p id="txtdescripcion" style="padding:50px;"><?php echo $f['descripcion']; ?></p>

</div>





<div class="detalle_producto">


<p id="txtprecio">$ <?php echo $f['precio']; ?></p>



<?php
        }
   ?>




<?php
              include 'conexion.php';


			  $resultado4=mysqli_query($conexion,"SELECT * FROM producto WHERE Id=".$_GET['Id'])or die(mysqli_error());
               
			  while($f4=mysqli_fetch_array($resultado4))
			  {
               ?>



<form action="carritodecompras.php?Id=<?php echo $f4['Id'];?>" method="post">


<?php
        }
?>



<label for="talle" style="font-size: 30px;">Talle</label>

<br>

<select class="selecttalle" name="talles">


<?php
              include 'conexion.php';


			  $resultado2=mysqli_query($conexion,"SELECT t.Id, t.numero FROM talle t INNER JOIN prod_talle pt ON pt.Id_talle =t.Id
                          WHERE pt.Id_producto=". $_GET['Id'])or die(mysqli_error());
            
              

             
			  while($f2=mysqli_fetch_array($resultado2))
			  {
            
               ?>



<option value="<?php echo $f2['Id']; ?>"><?php echo $f2['numero']; ?></option>
<!-- <option value="41">41</option>
<option value="42">42</option>
        -->



<?php
        }

?>



</select>




<br>
<label for="color" style="font-size: 30px;">Color</label>
<br>
<select class="selectcolor" name="colores">
<br>

<br>
<?php
              include 'conexion.php';


			   $resultado3=mysqli_query($conexion,"SELECT c.Id, c.nombre FROM color c INNER JOIN producto_color pc ON pc.Id_color=c.id
                          WHERE pc.Id_producto=".$_GET['Id'])or die(mysqli_error());
              
             

			  while($f3=mysqli_fetch_array($resultado3))
			  {
?>







 <option value="<?php echo $f3['Id']; ?>"><?php echo $f3['nombre']; ?></option>
 
  


<?php
        }
?>

</select>
<br>
<br>
<br>
<br>





<input type="submit" value="Añadir al carrito" class="formulario__submit__detalles">



      </form>


</div>











</div>




    

	 
	
	 
   
 









</article>
 


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
                  Enzokevin@gmail.com
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
	
   
   
   
   
   
   
   
   
   