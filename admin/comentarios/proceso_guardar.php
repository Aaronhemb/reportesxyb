<?php

include("../control/conexion.php");

$id= ($_POST["id"]);
$user_id= ($_POST["user_id"]);
$user_type= ($_POST["user_type"]);
$ticket_id = ($_POST["ticket_id"]);
$id_perfil = ($_POST["id_perfil"]);
$comentario = htmlentities(str_replace("'","&#x2019;",$_POST["comentario"]));
$fecha_crea = ($_POST["fecha_crea"]);
//$password = hash_hmac("sha512", $data['clave'], "LLAVE");
$query = "INSERT INTO comentarios(id,user_id,user_type,ticket_id,id_perfil,comentario,fecha_crea)VALUES ('$id','$user_id','$user_type','$ticket_id','$id_perfil','$comentario','$fecha_crea')";

$resultado = $con->query($query);


if ($resultado) {
header("Location:../comentarios.php?id=$ticket_id");
}else {
  echo "no se inserto";
}

 ?>
