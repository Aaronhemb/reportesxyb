<?php
include 'control/conexion.php';

$id = $_GET['id'];
$calificacion = $_GET["calificacion"];

$query = "UPDATE tickets SET calificacion='$calificacion', fecha_calificacion=now() WHERE `id_ticket` ='$id' ";

$resultado = $con->query($query);

if ($resultado) {
    // Esto solo envía una respuesta exitosa al cliente (puede ser JSON u otro formato según tu necesidad)
    header("Location:ticket.php");
} else {
    // Esto envía una respuesta de error al cliente
    echo json_encode(array('status' => 'error'));
}
?>