<?php
session_start();

$usuario=$_SESSION['username'];

$tipo_usuario=$_SESSION['tipo_usuario'];
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/miestilo.css">
    <link rel="stylesheet" href="fontawesome/fontawesome-free-6.1.2-web/css/all.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Productos</title>
</head>
<body>
    

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
           
               <a href="productos.php"> <li>Productos
                
       
                </li>
                </a>
                
                <a href="tablacompras.php" id="contacto"><li>Ver compras</li></a>
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









    <h1 id="txtagregueproducto" style="margin-top:50px;">Agregue un producto</h1>


<section>






<form action="procesoagregar.php" method="post" class="formagregar" enctype="multipart/form-data">











<div class="formulariocontacto">














<div class="form-group">

<label for="Nombre" class="formulario__label__agregar">

  Codigo:


  <input type="text" name="codigo" id="codigo" size="100px" class="form-control" 
   >
</label>


</div>



  <div class="form-group">

    <label for="Nombre" class="formulario__label__agregar">

      Nombre:


      <input type="text" name="nombre" id="nombre" size="100px" class="form-control" 
        >
    </label>


  </div>





  <div class="form-group">


<label for="mensaje" class="formulario__label__agregar">Descripcion:

  <textarea type="text" maxlenght="400" name="descripcion" id="descripcion" class="form-control"
   > </textarea>
</label>

</div>








  <div class="form-group">

    <label for="Correo" class="formulario__label__agregar">

      Imagen:

      <input type="file" name="archivo" id="archivo" size="100px" class="form-control" >
    </label>


  </div>



  <div class="form-group">


  <label for="Correo" class="formulario__label__agregar">


 Marca:

 <select name="marca" class="selectmarca">



 <?php
              include 'conexion.php';


			  $resultado3=mysqli_query($conexion,"SELECT * FROM marca")or die(mysqli_error());
               
			  while($f3=mysqli_fetch_array($resultado3))
			  {
               ?>




<option value="<?php echo $f3['Id']; ?>" ><?php echo $f3['nombre']; ?></option>



<?php
        }

?>





 </select>



</label>




</div>










  <div class="form-group">



    <label for="Correo" class="formulario__label__agregar">

      Precio:

      <input type="number" name="precio" id="precio" size="100px" class="form-control"
        >
    </label>




  </div>

<label for="talle" class="formulario__label__agregar">Talle:</label>

<br>
  <?php
              include 'conexion.php';


			  $resultado=mysqli_query($conexion,"SELECT * FROM talle")or die(mysqli_error());
               
			  while($f=mysqli_fetch_array($resultado))
			  {
               ?>

<div class="contenido__checkbox">


<input type="checkbox" name="talles[]" id="checkbox" value="<?php echo $f['Id'];?>"> <label for="talles"><?php echo $f['numero'];?> </label>


</div>


<?php
        }

?>
<br>
<label for="color" class="formulario__label__agregar">Color:</label>

<?php
              include 'conexion.php';


			  $resultado2=mysqli_query($conexion,"SELECT * FROM color")or die(mysqli_error());
               
			  while($f2=mysqli_fetch_array($resultado2))
			  {
               ?>

<br>


<input type="checkbox" name="colores[]" id="checkbox"  value="<?php echo $f2['Id']; ?>" ><label for="color"><?php echo $f2['nombre'] ?> </label>



<?php
        }

?>


  <input type="submit" id="enviar" value="Agregar" name="submit" class="formulario__submit__agregar">





</div>





</form>














</section>









			<footer>
   
   
   <div class="container-footer-all">
   
   <div class="container-mapa">
  
  
  
  
   
   
   
  <h1 id="txtubicacion">Ubicación:</h1>
   
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3280.9894117849844!2d-58.7709167!3d-34.6802167!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bc9530470240cb%3A0xdeed0902f394748f!2sGaboto%20645%2C%20B1722%20HPK%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1601437151213!5m2!1ses-419!2sar" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" id="mapa"></iframe>
   
    </div>
   
   
   
   
    <div class="container-body">
        <div class="colum1">
            
            <h1>Más informacíon de la compañia</h1>
            
            <p>Esta compañia se dedica a la venta de zapatillas</p>
            
            
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