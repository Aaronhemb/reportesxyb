<?php

include("../control/conexion.php");

$id= ($_POST["id"]);
$email= ($_POST["email"]);
$name= ($_POST["name"]);
$password = mysqli_real_escape_string($con, $_POST['password']);
$estado = ($_POST["estado"]);
$roll = ($_POST["roll"]);
$fecha_crea = ($_POST["fecha_crea"]);
$fechaActual = date('d/m/y H:i:s');
$telefono_cel = ($_POST["telefono_cel"]);
$telefono_of = ($_POST["telefono_of"]);
$ext = ($_POST["ext"]);
$departamento = ($_POST["departamento"]);
$perfil = ($_POST["perfil"]);

//$password = hash_hmac("sha512", $data['clave'], "LLAVE");


$query = "INSERT INTO usuarios (id,email,name,password,estado,roll,fecha_crea,telefono_cel,telefono_of,ext,departamento,perfil)VALUES
('$id','$email','$name','" . md5($password) . "','$estado','$roll','$fecha_crea','$telefono_cel','$telefono_of','$ext','$departamento','$perfil')";

$resultado = $con->query($query);


if ($resultado) {
header("Location:../new_usuarios.php?i=ok");
}else {
  echo "no se inserto";
}

 ?>
