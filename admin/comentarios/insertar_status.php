
<?php

include("../control/conexion.php");
// Obtener los valores del formulario

$id = $_REQUEST['id'];
$status = $_POST['status'];
$user_id = $_POST['user_id'];
$user_type = $_POST['user_type'];
$ticket_id = $_POST['ticket_id'];
$id_perfil = $_POST['id_perfil'];
$fecha_fin = $_POST['fecha_fin'];

// Actualizar el estado en la tabla "tickets"
$query = "UPDATE tickets SET status = '$status' WHERE id_ticket = '$ticket_id'";
$resultado = $con->query($query);

// Insertar los datos en la otra tabla de PHPMyAdmin
$query_insert = "INSERT INTO status (user_id, user_type, ticket_id, id_perfil, fecha_fin, status) VALUES ('$user_id', '$user_type', '$ticket_id', '$id_perfil', '$fecha_fin', '$status')";
$resultado_insert = $con->query($query_insert);

// Verificar si la consulta se ejecutó correctamente
if ($resultado && $resultado_insert) {
  header("Location:../comentarios.php?id=$id");
  //echo "si se inserto";
  }else {
    echo "no se inserto";
  }
$con->close();

?>
