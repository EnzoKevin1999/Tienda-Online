<?php
include './conexion.php';

$nombre=$_POST['nombre'];

$correo=$_POST['correo'];

$usuario=$_POST['usuario'];

$contraseña=$_POST['contraseña'];


$query="INSERT INTO usuarios(nombre,correo,usuario,clave) VALUES('$nombre','$correo','$usuario','$contraseña')";



$verificarcorreo="SELECT * FROM usuarios WHERE correo = '$correo'";

$verificarcorreo=mysqli_query($conexion,$verificarcorreo);


if(mysqli_num_rows($verificarcorreo) > 0)
{
    include("formularioregistrarse.php");
echo "<h1 style='text-align:center;
background:rgb(255, 62, 62);
color:white;
margin-top:-100px;'> Ya existe este correo intentá con otro </h1>";

exit();
}

$verificarusuario="SELECT * FROM usuarios WHERE usuario = '$usuario'";

$verificarusuario=mysqli_query($conexion,$verificarusuario);




if(mysqli_num_rows($verificarusuario) > 0)
{
    include("formularioregistrarse.php");
echo "<h1 style='text-align:center;
background:rgb(255, 62, 62);
color:white;
margin-top:-160px;'> Ya existe este usuario intentá con otro </h1>";

exit();
}






$resultado=mysqli_query($conexion,$query);





if($resultado)
{


    include("formularioregistrarse.php");
echo "<h1 style='text-align:center;
background:rgb(0, 160, 13);
color:white;
margin-top:-100px;'>Usuario registrado correctamente </h1>";






}

else
{
?>
    <?php
    include("formularioregistrarse.php");
    ?>


    <h1 style='text-align:center;
    background:rgb(0, 160, 13);
    color:white;
    margin-top:-160px;'>Intentalo de nuevo usuario no registrado </h1>
    
 



<?php

}



//Validaciones de datos






/*
if(isset($_POST["submit"]))
{

if(empty($nombre)){

echo "<p> Agrega tu nombre </p>";
//exit();
}

else{

if(strlen($nombre)> 12 && is_numeric($nombre))
{


    echo "<p> El nombre es muy largo y no debe ser un numero</p>";
    //exit();


}

}


if(empty($correo)){

    echo "<p> Agrega tu correo </p>";
    //exit();
    }
    
    else{
    
    if(!filter_var($correo, FILTER_VALIDATE_EMAIL))
    {
    
    
        echo "<p> El correo no es correcto</p>";
        //exit();
    
    
    }

    }

    if(empty($usuario)){

        echo "<p> Agrega tu usuario </p>";
       // exit();
        }
        
        else{
        
        if(strlen($usuario)> 12 && is_numeric($usuario))
        {
        
        
            echo "<p> El usuario es muy largo y no debe ser un numero</p>";
        
           // exit();
        
        }

    }



        if(empty($contraseña)){

            echo "<p> Agrega una contraseña </p>";
           // exit();
            }
            
            else{
            
            if(strlen($contraseña)< 8)
            {
            
            
                echo "<p> Debe tener al menos 8 caracteres </p>";
            
               // exit();
            
            }



}







}

*/






mysqli_close($conexion);

