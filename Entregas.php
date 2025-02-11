<?php
session_start();

$usuario=$_SESSION['username'];


?>







<html lang="es">

<head>
  <title>VENTA DE ZAPATILLAS>>>>/Entregas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <link rel="stylesheet" href="css/miestilo.css">
  <meta charset="utf-8">
  <script src="https://kit.fontawesome.com/96e6e462af.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="yellow">






<header>
    
 
    <?php  echo "<p style='color:white;font-size: 20px;font-weight: 600;'>Bienvenido  $usuario </p>";           ?>
    
       
       
       <figure>
     <a href="index.html">
       <img src="imagenes/CALZADOURBANOLUNA.png" class="logo" alt="">
       
  
      </a>
       </figure>
       
       
        <nav class="menu">
           
          <div class="prueba">
           
            <ul>
               <a href="paginaprincipal.php"> <li>Inicio</li> </a>
           
               <a href="productos.php"> <li style="background: rgba(0,0,0,0.5);">Productos
                
       
                </li>
                </a>
                
        <a href="nosotros.php">       <li>Nosotros</li></a> 
                <a href="contacto.php" id="contacto"><li>Contactos</li></a>
            </ul>
    
           
     
           </div>
           
           
            <div class="buscar">
         
          <input type="search" id="buscartexto"> 
          
          
          <a href="" id="boton">
          
          <i class="fas fa-search"></i>
          </a>
          
          
       
          </div>
        </nav>
        
       
  
        
    </header>



  <article>
    <div class="contenedor ">
      <div class="contenido">

        <center>
          <h1> ENTREGAS Y LUGARES CON PRECIOS DE ENVIO<br>
        </center>
        <div class="row">

          <div class="col-12 col-md-6">
            
              <h2>- Rafael Castillo $200<h2>

                  <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                    class="img-fluid">
          </div>

          <div class="col-12 col-md-6">
            <h2>- Isidro Casanova $250<h2>

                <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                  class="img-fluid">
          </div>

          <div class="col-12 col-md-6">
            <h2>- San Justo $300<h2>

                <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                  class="img-fluid">
          </div>

          <div class="col-12 col-md-6">
            <h2>- Laferrere $400<h2>

                <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                  class="img-fluid">
          </div>

          <div class="col-12 col-md-6">

            <h2>- La Tablada $350<h2>

                <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                  class="img-fluid">
          </div>

          <div class="col-12 col-md-6">
            <h2>- Ciudad Evita $400<h2>

                <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                  class="img-fluid">
          </div>

          <div class="col-12 col-md-6">
            <h2>- Villa Luzuriaga $450<h2>

                <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                  class="img-fluid">
          </div>

          <div class="col-12 col-md-6">
            <h2>- Lomas del Mirador $500<h2>

                <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                  class="img-fluid">
          </div> <div class="col-12 col-md-6">
          <h2>- Morón $300<h2>

              <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                class="img-fluid">
        </div>

        <div class="col-12 col-md-6">
          <h2>- Ramos Mejia $300<h2>

              <img src="imagenes/lugares%20y%20envios.jpeg" alt="" height="200px" id="imagenesentregas"
                class="img-fluid">
        </div>
      </div>

      <h2>- Capital Federal(consultar zona)<h2>


          <br />
    </div>
    </div>
  </article>
  <footer>
    <center>
      <p>&copy;2021 <a href=index.html>Enriquez Griselda</a></p>
    </center>
  </footer>
</body>

</html>