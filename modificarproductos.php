<?php

include 'conexion.php';

$Id= $_GET['Id'];

$sql="SELECT * FROM producto WHERE Id='$Id'";

$sql2="SELECT * FROM prod_talle WHERE Id_producto='$Id'";

$sql3="SELECT * FROM producto WHERE Id_producto='$Id'";

$resultado=mysqli_query($conexion,$sql);

$f=mysqli_fetch_assoc($resultado);



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





<section>







<form action="actualizar.php?Id=<?php echo $Id;?>" method="post" class="formagregar" enctype="multipart/form-data">











<div class="formulariocontacto">







<!-- <div class="grupo">

<label for="Nombre" class="formulario__label__contacto">

  Id:


  <input type="text" name="id" id="id" size="100px" class="formulario__input" placeholder="Ej:Pedro" value="<?php echo $f['Id']; ?>" readonly
    required>
</label>


</div>

-->




<div class="form-group">

<label for="Nombre" class="formulario__label__agregar">

  Codigo:


  <input type="text" name="codigo" id="codigo" size="100px" class="form-control" placeholder="Ej:Pedro" value="<?php echo $f['codigo']; ?>"
    >
</label>


</div>



  <div class="form-group">

    <label for="Nombre" class="formulario__label__agregar">

      Nombre:


      <input type="text" name="nombre" id="nombre" size="100px" class="form-control" placeholder="Ej:Pedro" value="<?php echo $f['nombre']; ?>"
        >
    </label>


  </div>





  <div class="form-group">


<label for="mensaje" class="formulario__label__agregar">Descripcion:

  <textarea type="text" maxlenght="400" name="descripcion" id="descripcion" class="form-control" 
   ><?php echo $f['descripcion']; ?> </textarea>
</label>

</div>








  <div class="form-group">

    <label for="Correo" class="formulario__label__agregar">

      Imagen:

<div class="div__file">

        

      <input type="file" name="archivo" id="archivo" size="100px" class="form-control" id="inputfile" value="<?php echo $f['imagen']; ?>">

      </div>
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




<option value="<?php echo $f3['Id']; ?>"   ><?php echo $f3['nombre']; ?></option>



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
        placeholder="Ej:Juan1980@gmail.com"  value="<?php echo $f['precio']; ?>"    >
    </label>




  </div>

<label for="talle" >Talle:</label>

<br>
  <?php
              include 'conexion.php';


			  $resultado=mysqli_query($conexion,"SELECT * FROM (SELECT t.Id, t.numero, p.Id_producto FROM talle t
        inner JOIN prod_talle p ON t.Id=p.Id_talle
        WHERE p.Id_producto=".$_GET['Id']." union
         SELECT t.Id, t.numero, 0 FROM talle t WHERE t.Id NOT IN (SELECT t2.Id FROM talle t2 inner JOIN prod_talle p2 ON t2.Id=p2.Id_talle
        WHERE p2.Id_producto=".$_GET['Id'].")) as ttt ORDER by 2;")or die(mysqli_error());
               
        
			  while($f=mysqli_fetch_array($resultado))
			  {
        
               ?>


<label for="talles" >

<input type="checkbox" name="talles[]" id="checkbox" value="<?php echo $f['Id'];?>"  <?php if ($f['Id_producto']!=="0") echo 'checked';?>    > <?php echo $f['numero'];?> </label>



<?php
        }

?>
<br>
<label for="color">Color:</label>

<?php
              include 'conexion.php';


			  $resultado2=mysqli_query($conexion,"SELECT * FROM 
        (SELECT c.Id, c.nombre, p.Id_producto 
        FROM color c
        inner JOIN producto_color p ON c.Id=p.Id_color
        WHERE p.Id_producto=".$_GET['Id']." union
         SELECT c.Id, c.nombre, 0 FROM color c WHERE c.Id NOT IN (SELECT c2.Id FROM color c2 inner JOIN producto_color p2 ON c2.Id=p2.Id_color
        WHERE p2.Id_producto=".$_GET['Id'].")) as ccc ORDER by 2")or die(mysqli_error());
               
			  while($f2=mysqli_fetch_array($resultado2))
			  {  
               ?>

<br>


<input type="checkbox" name="colores[]" id="checkbox" value="<?php echo $f2['Id']; ?>"        <?php if ($f2['Id_producto']!=="0") echo 'checked';?>          ><label for="color"><?php echo $f2['nombre'] ?> </label>



<?php
        }

?>


  <input type="submit" id="enviar" value="Actualizar" name="submit" class="formulario__submit__modificar">





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