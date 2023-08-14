<?php

 include_once '../control/conexion.php';

$id = $_REQUEST['id'];

$query = "DELETE FROM perfil WHERE id ='$id' ";

$resultado = $con->query($query);

if ($resultado) {
header("Location:../new_perfil.php?i=oki");
//echo "si se inserto";
}else {
  echo "no se inserto";
}

 ?>
