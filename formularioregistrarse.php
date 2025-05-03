<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/miestilo.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Registrarse</title>

</head>


<body class="img js-fullheight" style="background-image: url(imagenes/bg.jpg);">


  <a href="index.php" id="txtvolver">Volver </a>

  
<h2 style="text-align: center;color:white;" class="heading-section"> Registrar usuario</h2>




<form action="registrarse.php" method="post" class="formregistrarse">










    <div class="formularioregistrarse">












      <div class="grupo">

        <label for="Nombre" class="formulario__label__contacto">

          Nombre:


          <input type="text" name="nombre" id="nombre" size="80px" class="form-control" placeholder="Ej:Pedro" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>"
            required>
        </label>


      </div>

      <div class="grupo">



        <label for="Correo" class="formulario__label__login">

          Correo:

          <input type="email" name="correo" id="correo" size="80px" class="form-control"
            placeholder="Ej:Pedro1980@gmail.com"  value="<?php echo isset($_POST['correo']) ? $_POST['correo'] : ''; ?>" required>
        </label>




      </div>



      <div class="grupo">

        <label for="Correo" class="formulario__label__login"">

          Usuario:

          <input type="text" name="usuario" id="usuario" size="80px" class="form-control"
            placeholder="Pedro1234" value="<?php echo isset($_POST['usuario']) ? $_POST['usuario'] : ''; ?>" required>
        </label>


      </div>



      <div class="grupo">


        <label for="Nombre" class="formulario__label__login">

          Contraseña:


          <input type="password" name="contraseña" id="contraseña" size="80px" class="form-control" value="<?php echo isset($_POST['contraseña']) ? $_POST['contraseña'] : ''; ?>"
            required>

        </label>


      </div>





      <input type="submit" id="enviar" value="Registrarse" name="submit" class="formulario__submit__registrarse">





    </div>





  </form>





  <script>
    setTimeout(function() {
        const mensaje = document.getElementById('mensaje');
        if (mensaje) {
            mensaje.classList.add('fade-out');
        }
    }, 3000); 


    setTimeout(function() {
        const mensaje = document.getElementById('mensaje');
        if (mensaje) {
            mensaje.style.display = 'none';
        }
    }, 5500); 
</script>
    
</body>
</html>