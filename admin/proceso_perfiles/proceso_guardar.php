<?php

include("../control/conexion.php");

$id= ($_POST["id"]);
$perfil= ($_POST["perfil"]);
$status = ($_POST["status"]);
$fecha_crea = ($_POST["fecha_crea"]);
$fechaActual = date('d/m/y H:i:s');

//$password = hash_hmac("sha512", $data['clave'], "LLAVE");


$query = "INSERT INTO perfil (id,perfil,fecha_crea,status)VALUES
('$id','$perfil','$fecha_crea','$perfil')";

$resultado = $con->query($query);


if ($resultado) {
header("Location:../new_perfil.php?i=ok");
}else {
  echo "no se inserto";
}

 ?>
