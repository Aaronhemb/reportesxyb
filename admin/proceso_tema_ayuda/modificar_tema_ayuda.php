<?php

 include '../control/conexion.php';

 $id = $_REQUEST['id'];
 $tema_problema= ($_POST["tema_problema"]);
 $status = ($_POST["status"]);
 $fecha_crea = ($_POST["fecha_crea"]);
 $fechaActual = date('d/m/y H:i:s');

 $query = "UPDATE ayuda SET  tema_problema='$tema_problema',status = '$status', fecha_crea='$fechaActual' WHERE id ='$id' ";

 $resultado = $con->query($query);

 if ($resultado) {
header("Location:../new_tema_ayuda.php?i=ok");
 //echo "si se inserto";
 }else {
   echo "no se inserto";
 }

 ?>
