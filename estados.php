<?php
session_start();
include "conexion.php";


$usuario=$_SESSION['username'];

$tipo_usuario=$_SESSION['tipo_usuario'];

$Id= $_GET['Id'];

$sql="SELECT Idestado FROM compras WHERE Id='$Id'";

$resultado=mysqli_query($conexion,$sql);

$f=mysqli_fetch_array($resultado);



?>






<!DOCTPYPE html>
<html lang= "es">
 <head> 
    <title>Panel de administracion</title>
    
    <meta charset="utf-8"/>

	<link rel="stylesheet" type="text/css" href="css/miestilo.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
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
               <a href="paginaprincipal.php"> <li >Inicio</li> </a>
           
               <a href="productos.php"> <li>Productos
                
       
                </li>
                </a>
                
                <a href="tablacompras.php" id="contacto"><li  style="background: rgba(0,0,0,0.5);">Ver compras</li></a>
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
	 
	 
	 
	 
	 
	 
    <form action="procesoestados.php?Id=<?php echo $Id;?>" method="post" class="formcontactoestados">











<div class="formulariocontacto">










  <div class="grupo">

    <p for="Nombre" class="formulario__label__contacto"> </p>

      Elija el estado


      
      <input type="radio" name="Estados" id="estado1" size="100px" value="7" class="custom-radio"
        <?php if($f["Idestado"]=="7") {echo "checked";} else {echo "";}?>>
        <label  for="estado1" class="radio-label pendiente">Pendiente</label>


       

        <input type="radio" name="Estados" id="estado2" size="100px"  value="8" class="custom-radio"
        <?php if($f["Idestado"]=="8") {echo "checked";} else {echo "";}?>>
        <label  for="estado2" class="radio-label entregado">Entregado</label>


        

        <input type="radio" name="Estados" id="estado3" size="100px"  value="9" class="custom-radio"
        <?php if($f["Idestado"]=="9") {echo "checked";} else {echo "";}?>
        >
        <label  for="estado3" class="radio-label cancelado">Cancelado</label>



  </div>


  <input type="submit" id="enviar" value="Modificar Estado" class="formulario__submit__estados">





</div>





</form>

	 
	 
	 
	 






</body>
</html>
	
   
   
   
   
   
   
   
   
   