<?php

 include '../control/conexion.php';


 $id = $_REQUEST['id'];

$password = mysqli_real_escape_string($con, $_POST['password']);



$query = "UPDATE usuarios SET  password ='".md5($password)."'  WHERE id ='$id' ";


 $resultado = $con->query($query);

 if ($resultado) {
header("Location:../new_usuarios.php?i=ok");
 //echo "si se inserto";
 }else {
   echo "no se inserto";
 }

 ?>
