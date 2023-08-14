<?php include "head.php"; ?>
<?php include_once '../login/dbconnect.php';?>


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="new_perfil.php" class="btn btn-success" style="
       margin-left: 8px;
           padding-left: 272px;
           padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>crear mas perfiles</a>
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

  $query = "SELECT * FROM perfil WHERE id ='$id' ";
  $resultado = $conexion->query($query);
  $row = $resultado->fetch_assoc();

$conexion->close();

 ?>

<form id="manage_ticket" class="needs-validation" action="proceso_perfiles/modificar_perfil.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" method="post">
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label id="form_departamento" for="validationTooltip01">Perfil</label>
      <input type="text" class="form-control" id="validationTooltip01" placeholder="Perfil" name="perfil" value="<?php echo $row['perfil']; ?>"  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Status <?php
      if ($row['status'] == 0) {
        echo ("Desactivado");
      }else {
        echo("Activado");
      }

       ?>  </label>
        <select type="text" required  class="form-control" id="validationCustom02" placeholder="Status" name="status" value=""  >
            <option value="">Seleccinar</option>
            <option value="0">Desactivado</option>
            <option value="1">Activado</option>
        </select>
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_fecha"  for="validationCustom02">  Fecha de creacion </label>
        <?php
          date_default_timezone_set('America/Mexico_City');
         $fechaActual = date('d/m/y H:i:s'); ?>
        <input type="text" readonly="readonly"   class="form-control" id="validationCustom02" placeholder="" name="fecha_crea" value="<?php echo $fechaActual ?>" >
    </div>




  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Modificar Perfil</button>
</form>

<?php } ?>
