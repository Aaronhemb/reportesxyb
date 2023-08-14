<?php
include_once '../control/conexion.php';

if (isset($_GET['id'])) {
    $ids = $_GET['id']; // Recibir los dos valores como una cadena
    list($id, $ticket_id) = explode(',', $ids); // Separar los dos valores y asignarlos a variables individuales

    $query = "DELETE FROM comentarios WHERE id = '$id' ";

    $resultado = $con->query($query);

    header("Location:../comentarios.php?id=$ticket_id");
} else {
    echo "No se ha proporcionado el parámetro 'id' en la URL.";
}
?>
