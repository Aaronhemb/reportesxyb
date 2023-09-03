

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carga las clases de PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// Crea una nueva instancia de PHPMailer
$mail = new PHPMailer(true);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtén el valor seleccionado del select
    $selectedEmail = $_POST['nombreR'];

    try {


        // Configura el servidor SMTP y las credenciales
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'aaron.hernandez@xybooster.com';
        $mail->Password = 'Operaciones*123';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Agrega la dirección de correo electrónico seleccionada como destinatario
        $mail->setFrom('aaron.hernandez@xybooster.com', 'Aaron Hernandez');
        $mail->addAddress($_POST['nombreR']);

        // Configura el contenido del correo
        // Configura el contenido del correo con la información de los demás campos
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo ticket creado';
        $mail->Body = 'Detalles del ticket:'
        . '<br>Creador: ' . $_POST['nombreR'] // The missing semicolon here
        . '<br>Tema: ' . $_POST['tema']
        . '<br>Titulo: ' . $_POST['titulo']
        .'<br><br>'
        . '<br>Descripcion: ' . $_POST['descripcion']
        . '<br>fecha de creacion: ' . $_POST['fecha_crea']
        .'<br><br>'
        .'<br>Ingresar al ticket: http://192.168.56.1:81/reportes/index.php';
        // Envía el correo
        $mail->send();
        echo 'Correo enviado correctamente';
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ', $mail->ErrorInfo;
    }
}
?>