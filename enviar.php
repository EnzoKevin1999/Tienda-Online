<?php
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
require './phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de SendGrid
    $mail->isSMTP();
    $mail->Host = 'smtp.sendgrid.net';  
    $mail->SMTPAuth = true;
    $mail->Username = 'apikey'; // Deja como 'apikey' para usar la API Key de SendGrid
    $mail->Password = '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';  // Reemplaza con tu clave API de SendGrid
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Destinatario
    $mail->setFrom('enzokevinscognetti@gmail.com', 'Enzo');
    $mail->addAddress('enzokevinscognetti@gmail.com');  // Correo del destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Prueba de envío con SendGrid';
    $mail->Body    = 'Este es un correo de prueba utilizando SendGrid como servidor SMTP.';

    // Enviar correo
    $mail->send();
    header("Location:gracias.php");
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>