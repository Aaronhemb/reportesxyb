<?php include ("head.php"); ?>


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="new_departamento.php" class="btn btn-success" style="
         margin-left: 8px;
         padding-left: 272px;
         padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>crear mas departamentos</a>
    </div><br><br><br>

    </h3>
</center>
<?php
} else{
?>
<form id="manage_ticket" class="needs-validation"   action="./proceso_departamento/proceso_guardar.php" enctype="multipart/form-data" method="post">
  <div class="form-row">
    <div class="col-md-4 mb-2">
      <label id="form_sede"  for="validationCustom02"> Area  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Departamento" name="sede" value=""  >
    </div>
    <div class="col-md-4 mb-2">
      <label id="form_telefono"  for="validationCustom02"> Telefono  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Telefono" name="telefono" value=""  >
    </div>
    <div class="col-md-4 mb-2">
      <label id="form_extencion"  for="validationCustom02">  Extencion  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="ext" name="ext" value=""  >

    </div>
    <div class="col-md-4 mb-2">
      <label id="form_direccion"  for="validationCustom02">  Direccion  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Direccion" name="direccion" value=""  >

    </div>
    <div class="col-md-4 mb-2">
      <label id="form_fecha"  for="validationCustom02">  Fecha de creacion </label>
      <?php
        date_default_timezone_set('America/Mexico_City');
          $fechaActual = date('d/m/y H:i:s'); ?>
        <input type="text" readonly="readonly"   class="form-control" id="validationCustom02" placeholder="" name="fecha_crea" value="<?php echo $fechaActual ?>" >
    </div>


  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Crear departamento</button>
</form>

<?php } ?>

<br><br><br>
<?php include("./proceso_departamento/filtro_departamento.php"); ?>
