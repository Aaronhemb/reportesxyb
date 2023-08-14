<?php

 include '../control/conexion.php';

 $id = $_REQUEST['id'];
 $perfil= ($_POST["perfil"]);
 $status = ($_POST["status"]);
 $fecha_crea = ($_POST["fecha_crea"]);
 $fechaActual = date('d/m/y H:i:s');



 $query = "UPDATE perfil SET  perfil='$perfil', status='$status',  fecha_crea='$fechaActual'  WHERE id ='$id' ";

 $resultado = $con->query($query);

 if ($resultado) {
header("Location:../new_perfil.php?i=ok");
 //echo "si se inserto";
 }else {
   echo "no se inserto";
 }

 ?>
