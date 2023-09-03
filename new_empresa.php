<?php include ("head.php") ?>


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="new_empresa.php" class="btn btn-success" style="
       margin-left: 8px;
           padding-left: 272px;
           padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>crear mas empresas</a>
    </div><br><br><br>

    </h3>
</center>
<?php
} else{
?>
<form id="manage_ticket" class="needs-validation"   action="./proceso_empresas/proceso_guardar.php" enctype="multipart/form-data" method="post">
  <div class="form-row">

    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Nombre empresa  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Nombre Empresa" name="nombre" value=""  >
    </div>
    <div class="col-md-3 mb-3">
      <label id="form_departamento" for="validationTooltip01">Razon Social</label>
      <input type="text" class="form-control" id="validationTooltip01" placeholder="Razon Social" name="razon_social" value=""  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_ext"  for="validationCustom02"> Giro Empresa  </label>
      <input type="text"   class="form-control" id="validationCustom02" placeholder="Giro empresa" name="Giro" value=""  >
    </div>

    <div class="col-md-3 mb-2">
      <label id="form_direccion"  for="validationCustom02">  Estado  </label>
        <select type="text"   class="form-control" id="validationCustom02" placeholder="Estado" name="estado" value=""  >
          <option value="">Seleccionar una opcion</option>
          <option value="0">Inactivo</option>
          <option value="1">Activo</option>
        </select>
    </div>


  



  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Crear Usuario</button>
</form>

<br><br><br>
<?php include("./proceso_empresas/filtro_empresa.php"); ?>
<?php } ?>