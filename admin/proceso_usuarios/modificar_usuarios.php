<?php

 include '../control/conexion.php';

 $id = $_REQUEST['id'];
 $email= ($_POST["email"]);
 $name= ($_POST["name"]);
/* $password = mysqli_real_escape_string($con, $_POST['password']);*/
 $estado = ($_POST["estado"]);
 $roll = ($_POST["roll"]);
 $fecha_crea = ($_POST["fecha_crea"]);
 $fechaActual = date('d/m/y H:i:s');
 $telefono_cel = ($_POST["telefono_cel"]);
 $telefono_of = ($_POST["telefono_of"]);
 $ext = ($_POST["ext"]);
 $departamento = ($_POST["departamento"]);
 $perfil = ($_POST["perfil"]);


 $query = "UPDATE usuarios SET  email='$email', name='$name',  estado='$estado',  roll='$roll',
 fecha_crea='$fechaActual', telefono_cel='$telefono_cel',  telefono_of='$telefono_of',   ext='$ext',  departamento='$departamento',
 perfil='$perfil'  WHERE id ='$id' ";

 $resultado = $con->query($query);

 if ($resultado) {
header("Location:../new_usuarios.php?i=ok");
 //echo "si se inserto";
 }else {
   echo "no se inserto";
 }

 ?>
