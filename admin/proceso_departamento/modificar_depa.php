<?php

 include '../control/conexion.php';

 $id = $_REQUEST['id'];
 $sede= ($_POST["sede"]);
 $telefono = ($_POST["telefono"]);
 $ext = ($_POST["ext"]);
 $direccion = ($_POST["direccion"]);
 $fecha_crea = ($_POST["fecha_crea"]);
 $fechaActual = date('d/m/y H:i:s');

 $query = "UPDATE departamento SET  sede='$sede', telefono='$telefono', ext='$ext', direccion='$direccion', fecha_crea='$fechaActual' WHERE id ='$id' ";

 $resultado = $con->query($query);

 if ($resultado) {
header("Location:../new_departamento.php?i=ok");
 //echo "si se inserto";
 }else {
   echo "no se inserto";
 }

 ?>
