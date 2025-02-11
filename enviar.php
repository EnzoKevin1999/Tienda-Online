<?php

$destino= "Enzokevinscognetti@gmail.com";

$nombre= $_POST["nombre"];

$email= $_POST["correo"]; 

$telefono= $_POST["telefono"];

$asunto= $_POST["asunto"];
    
$mensaje= $_POST["mensaje"]; 
    
$contenido= "Nombre: " . $nombre . "\nCorreo: " . $email . "\nTeléfono: " . $telefono . "\nAsunto: " . $asunto . "\nMensaje:" . $mensaje;

mail($destino,"Contacto",$contenido);

header("Location:Gracias.php");

?>