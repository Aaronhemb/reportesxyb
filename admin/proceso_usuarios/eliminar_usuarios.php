<?php

 include_once '../control/conexion.php';

$id = $_REQUEST['id'];

$query = "DELETE FROM usuarios WHERE id ='$id' ";

$resultado = $con->query($query);

if ($resultado) {
header("Location:../new_usuarios.php?i=oki");
//echo "si se inserto";
}else {
  echo "no se inserto";
}

 ?>
