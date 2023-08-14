<?php

include("../control/conexion.php");

$id= ($_POST["id"]);
$tema_problema= ($_POST["tema_problema"]);
$status = ($_POST["status"]);
$fecha_crea = ($_POST["fecha_crea"]);
$fechaActual = date('d/m/y H:i:s');

//$password = hash_hmac("sha512", $data['clave'], "LLAVE");


$query = "INSERT INTO ayuda(id,tema_problema,status,fecha_crea)VALUES ('$id','$tema_problema','$status','$fecha_crea')";

$resultado = $con->query($query);


if ($resultado) {
header("Location:../new_tema_ayuda.php?i=ok");
}else {
  echo "no se inserto";
}

 ?>
