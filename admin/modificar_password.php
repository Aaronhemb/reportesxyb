<?php include "head.php"; ?>
<?php include_once '../login/dbconnect.php';?>


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="new_usuarios.php" class="btn btn-success" style="
       margin-left: 8px;
           padding-left: 272px;
           padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>crear mas Usuarios</a>
    </div><br><br><br>

    </h3>
</center>
<?php
} else{
?>

<?php


$servidor= "localhost";
$usuario= "root";
$password = "1234";
$nombreBD= "control2";
$conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($conexion->connect_error) {
    die("la conexión ha fallado: " . $conexion->connect_error);
}
$conexion->set_charset('utf8');


$id = $_REQUEST['id'];

  $query = "SELECT * FROM usuarios WHERE id ='$id' ";
  $resultado = $conexion->query($query);
  $row = $resultado->fetch_assoc();

$conexion->close();

 ?>

<form id="manage_ticket" class="needs-validation" action="proceso_usuarios/cambiar_password.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" method="post">
  <div class="form-row">


    <div class="col-md-3 mb-2">
        <label for="perfil_user">Nuevo Password</label>
          <input type="password"  required class="form-control" id="validationCustom02" placeholder="Password" name="password" value="<?php echo $row['password']; ?>"  >
    </div>



  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Modificar Usuario</button>
</form>

<?php } ?>
