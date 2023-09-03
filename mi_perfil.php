
<?php include ("head.php"); 

?>

<h3>
    <title>Mi Perfil</title>
</h3>

<?php

include("control/conexion.php"); //conexion con el servidor
$id = $_REQUEST['id'];
  $query = "SELECT * FROM usuarios WHERE id ='$id' ";
  $resultado = $con->query($query);
  $row = $resultado->fetch_assoc();



$con->close();
    ?>

<style>


</style>

    <h1>Mi Perfil</h1>

<div>
    <p>Nombre: <?php echo $row['name']; ?></p>
    <p>Email: <?php echo $row['email']; ?></p>
    <p>Teléfono: <?php echo $row['telefono_cel']; ?></p>

    <a href="./perfil_usuarios/cambio_password.php?id=<?php echo $id ?>">Cambiar Contraseña</a>
    <a href="actualizar_info.php">Actualizar Información</a>
</div>


    
