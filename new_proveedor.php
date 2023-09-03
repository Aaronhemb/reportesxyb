<?php include ("head.php") ?>


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="new_proveedor.php" class="btn btn-success" style="
       margin-left: 8px;
           padding-left: 272px;
           padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>crear mas Proveedores</a>
    </div><br><br><br>

    </h3>
</center>
<?php
} else{
?>
<form id="manage_ticket" class="needs-validation"   action="./proveedores/proceso_guardar.php" enctype="multipart/form-data" method="post">
  <div class="form-row">

    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Nombre empresa  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Nombre Completo" name="name_prov" value=""  >
    </div>
    <div class="col-md-3 mb-3">
      <label id="form_departamento" for="validationTooltip01">Email</label>
      <input type="email" class="form-control" id="validationTooltip01" placeholder="Email" name="email" value=""  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_ext"  for="validationCustom02"> Numero del proveedor  </label>
      <input type="text"   class="form-control" id="validationCustom02" placeholder="Numero del proveedor" name="numero" value=""  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_ext"  for="validationCustom02"> Nombre del contacto  </label>
      <input type="text"   class="form-control" id="validationCustom02" placeholder="Nombre del contacto" name="nombre_contacto" value=""  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_direccion"  for="validationCustom02">  Estado  </label>
        <select type="text"   class="form-control" id="validationCustom02" placeholder="Estado" name="estado" value=""  >
          <option value="">Seleccionar una opcion</option>
          <option value="0">Inactivo</option>
          <option value="1">Activo</option>
        </select>
    </div>

    <div class="col-md-3 mb-2">
      <label id="form_fecha"  for="validationCustom02">  Fecha de creacion </label>
        <?php
  date_default_timezone_set('America/Mexico_City');
         $fechaActual = date('d/m/y H:i:s'); ?>
        <input type="text" readonly="readonly"   class="form-control" id="validationCustom02" placeholder="" name="fecha_prov" value="<?php echo $fechaActual ?>" >
    </div>
 
  



  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Crear Usuario</button>
</form>

<?php } ?>

<br><br><br>
<?php include("./proveedores/filtro_proveedor.php"); ?>
