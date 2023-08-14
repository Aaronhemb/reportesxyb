<?php

include("../control/conexion.php");

$id_ticket= ($_POST["id_ticket"]);
$nombreR= ($_POST["nombreR"]);
$titulo = ($_POST["titulo"]);
$descripcion = htmlentities(str_replace("'","&#x2019;",$_POST["descripcion"]));
$tema = ($_POST["tema"]);
$fecha_crea = ($_POST["fecha_crea"]);
$status = ($_POST["status"]);
$departamento = ($_POST["departamento"]);
$type_user = $_POST['type_user'];
$leido = $_POST['leido'];
$fecha_mod = $_POST['fecha_mod'];
$fecha_fin = $_POST['fecha_fin'];
$perfil = $_POST['perfil'];



//$password = hash_hmac("sha512", $data['clave'], "LLAVE");


$query = "INSERT INTO tickets(id_ticket,nombreR,titulo,descripcion,tema,fecha_crea,status,departamento,type_user,leido,fecha_mod,fecha_fin,perfil)VALUES ('$id_ticket','$nombreR','$titulo','$descripcion','$tema','$fecha_crea','0','$departamento','$type_user','1','$fecha_mod','$fecha_fin','$perfil')";

$resultado = $con->query($query);


if ($resultado) {
header("Location:../new_ticket.php?i=ok");
}else {
  echo "no se inserto";
}

 ?>
