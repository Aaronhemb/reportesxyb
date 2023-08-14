<?php

include("../control/conexion.php");

$id= ($_POST["id"]);
$sede= ($_POST["sede"]);
$telefono = ($_POST["telefono"]);
$ext = ($_POST["ext"]);
$direccion = ($_POST["direccion"]);
$fecha_crea = ($_POST["fecha_crea"]);


//$password = hash_hmac("sha512", $data['clave'], "LLAVE");


$query = "INSERT INTO departamento(id,sede,telefono,ext,direccion,fecha_crea)VALUES ('$id','$sede','$telefono','$ext','$direccion','$fecha_crea')";

$resultado = $con->query($query);


if ($resultado) {
header("Location:../new_departamento.php?i=ok");
}else {
  echo "no se inserto";
}

 ?>
