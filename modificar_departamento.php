<?php include "head.php"; ?>


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="new_departamento.php" class="btn btn-success" style="
       margin-left: 8px;
           padding-left: 272px;
           padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>crear mas departamento</a>
    </div><br><br><br>

    </h3>
</center>
<?php
} else{
?>

<?php


include("control/conexion.php"); //conexion con el servidor


$id = $_REQUEST['id'];

  $query = "SELECT * FROM departamento WHERE id ='$id' ";
  $resultado = $con->query($query);
  $row = $resultado->fetch_assoc();

$con->close();

 ?>

<form id="manage_ticket" class="needs-validation" action="proceso_departamento/modificar_depa.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" method="post">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label id="form_departamento" for="validationTooltip01">Area</label>
      <input type="text" class="form-control" id="validationTooltip01" placeholder="Departamento" name="sede"  value="<?php echo $row['sede']; ?>" >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Telefono  </label>
        <input type="number"   class="form-control" id="validationCustom02" placeholder="Telefono" name="telefono"  value="<?php echo $row['telefono']; ?>"  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_ext"  for="validationCustom02">  Extencion  </label>
        <input type="number"   class="form-control" id="validationCustom02" placeholder="Extencion" name="ext"  value="<?php echo $row['ext']; ?>"  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_direccion"  for="validationCustom02">  Direccion  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Direccion" name="direccion"  value="<?php echo $row['direccion']; ?>"  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_fecha"  for="validationCustom02">  Fecha de modificacion </label>
        <?php
  date_default_timezone_set('America/Mexico_City');
        $fechaActual = date('d/m/y H:i:s'); ?>
        <input type="text" readonly="readonly"   class="form-control" id="validationCustom02" placeholder="" name="fecha_crea" value="<?php echo $fechaActual ?>" >
    </div>
  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Modificar departamento</button>
</form>

<?php } ?>
