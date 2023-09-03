

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

    // Obtén los valores de los campos enviados por POST
    // Obtén los valores de los campos enviados por POST
    $selectedUser = $_POST['selectedUser'];
    $nombreR = $_POST['nombreR'];
    $tema = $_POST['tema'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fechaCrea = $_POST['fecha_crea'];


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
        $mail->addAddress($selectedUser);

        
        // Configura el contenido del correo con la información de los campos
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo ticket asignado';
        $mail->Body = 'Detalles del ticket:'
            . '<br>Asignado a : ' . $selectedUser
            . '<br>Ticket creado por : ' . $tema 
                .'<br><br>'
                . '<br>Tema del ticket : ' . $titulo
                . '<br>Titulo del ticket : ' . $descripcion
                . '<br>descripcion del ticket : ' . $fechaCrea

            . '<br><br>'
            . '<br>Ingresar al ticket: http://192.168.56.1:81/reportes/index.php';

        // Envía el correo
        $mail->send();
        echo 'Correo enviado correctamente';
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ', $mail->ErrorInfo;
    }
}
?>
