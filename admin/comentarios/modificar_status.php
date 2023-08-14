<?php

 include '../control/conexion.php';

 $id = $_REQUEST['id'];
 $status = ($_POST["status"]);


 $query = "UPDATE tickets SET   status='$status'    WHERE id_ticket ='$id' ";

 $resultado = $con->query($query);

 if ($resultado) {
header("Location:./comentarios.php?id=$id");
 //echo "si se inserto";
 }else {
   echo "no se inserto";
 }

 ?>
