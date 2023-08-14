<?php

 include_once '../control/conexion.php';

$id = $_REQUEST['id'];

$query = "DELETE FROM departamento WHERE id ='$id' ";

$resultado = $con->query($query);

if ($resultado) {
header("Location:../new_departamento.php?i=oki");
//echo "si se inserto";
}else {
  echo "no se inserto";
}

 ?>
