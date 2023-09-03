<?php include "head.php"; ?>


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="new_departamento.php" class="btn btn-success" style="
       margin-left: 8px;
           padding-left: 272px;
           padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>crear mas temas de proyecto</a>
    </div><br><br><br>

    </h3>
</center>
<?php
} else{
?>

<?php

include("control/conexion.php"); //conexion con el servidor


$id = $_REQUEST['id'];

  $query = "SELECT * FROM ayuda WHERE id ='$id' ";
  $resultado = $con->query($query);
  $row = $resultado->fetch_assoc();

$con->close();

 ?>

<form id="manage_ticket" class="needs-validation" action="proceso_tema_ayuda/modificar_tema_ayuda.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" method="post">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label id="form_departamento" for="validationTooltip01">Tema proyecto</label>
      <input type="text" class="form-control" id="validationTooltip01" placeholder="Departamento" name="tema_problema"  value="<?php echo $row['tema_problema']; ?>" >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Status :  <?php
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
      <label id="form_fecha"  for="validationCustom02">  Fecha de modificacion </label>
        <?php
  date_default_timezone_set('America/Mexico_City');
        $fechaActual = date('d/m/y H:i:s'); ?>
        <input type="text" readonly="readonly"   class="form-control" id="validationCustom02" placeholder="" name="fecha_crea" value="<?php echo $fechaActual ?>" >
    </div>
  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Modificar Tema de proyecto</button>
</form>

<?php } ?>
