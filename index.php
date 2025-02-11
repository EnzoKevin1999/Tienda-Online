<?php
session_start();

require "conexion.php";


if($_POST)
{

$usuarios=$_POST['usuario'];

$password=$_POST['contraseña'];




$consultausuarios="SELECT Id,nombre,correo,usuario,clave,tipo_usuario FROM usuarios WHERE usuario='$usuarios' AND clave='$password'" ;



$resultado = mysqli_query($conexion,$consultausuarios);


if(mysqli_num_rows($resultado)> 0)
{
   
$row=mysqli_fetch_assoc($resultado);

//$pass_bd=$row['clave'];

//$pass_c = sha1($password);

//if($pass_bd==$pass_c)
//{

    $_SESSION['id_usuario']=$row['Id'];

$_SESSION['username']=$row['usuario'];

$_SESSION['nombre']=$row['nombre'];

$_SESSION['tipo_usuario']=$row['tipo_usuario'];

header("Location:paginaprincipal.php");
//}

//else
//{

//echo "la contraseña no coincide";

//}






}

else 
{
    ?>
<h1 style="text-align:center;
    background:rgb(255, 62, 62);
    color:white;
    position:relative;
    top:625px;
    ">No existe el usuario </h1>
<?php
}








}


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/miestilo.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body class="img js-fullheight" style="background-image: url(imagenes/bg.jpg);">
    

<h2 style="text-align: center;" class="heading-section"> BIENVENIDO AL SISTEMA LOGIN</h2>



    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="formlogin">
 

    
 
 
 
        <div class="formulariologin">
        
        
        
        
        
        
        
        
        
        
         <div class="form-group">
         
          <label for="Nombre" class="formulario__label__login">
         
          Usuario:
           
          
          <input type="text" name="usuario" id="usuario" size="80px" class="form-control"   
          required >
          </label>
          
          
         </div>
         
         <div class="form-group">
         
         
         
          <label for="Correo" class="formulario__label__login">
          
          Contraseña:
       
          <input type="password" name="contraseña" id="contraseña" size="80px" class="form-control" 
          required >
          </label>
         
         
         
         
         </div>
       
        
<div class="botonessesion">
    
        <input type="submit" id="enviar" value="Iniciar Sesión" class="formulario__submit__login">
        
    <a href="formularioregistrarse.php" id="btnregistrarse">Registrarse</a>


    </div>
    



        </div>
        
        

        
       </form>


       



</body>
</html>