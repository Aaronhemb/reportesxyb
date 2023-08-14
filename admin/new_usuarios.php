<?php include ("head.php") ?>


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
<form id="manage_ticket" class="needs-validation"   action="./proceso_usuarios/proceso_guardar.php" enctype="multipart/form-data" method="post">
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label id="form_departamento" for="validationTooltip01">Email</label>
      <input type="email" class="form-control" id="validationTooltip01" placeholder="Email" name="email" value=""  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Nombre Completo  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Nombre Completo" name="name" value=""  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_ext"  for="validationCustom02"> Password  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Password" name="password" value=""  >

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
      <label id="form_direccion"  for="validationCustom02">  Roll  </label>
        <select type="text"   class="form-control" id="validationCustom02" placeholder="Roll" name="roll" value=""  >
          <option value="">Seleccionar una opcion</option>
          <option value="1">Usuario</option>
          <option value="2">Admin</option>
        </select>
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_fecha"  for="validationCustom02">  Fecha de creacion </label>
        <?php
  date_default_timezone_set('America/Mexico_City');
         $fechaActual = date('d/m/y H:i:s'); ?>
        <input type="text" readonly="readonly"   class="form-control" id="validationCustom02" placeholder="" name="fecha_crea" value="<?php echo $fechaActual ?>" >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Telefono Celular  </label>
        <input type="number"   class="form-control" id="validationCustom02" placeholder="Telefono" name="telefono_cel" value=""  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Telefono oficina  </label>
        <input type="number"   class="form-control" id="validationCustom02" placeholder="Telefono" name="telefono_of" value=""  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Ext Telefono oficina  </label>
        <input type="number"   class="form-control" id="validationCustom02" placeholder="Ext" name="ext" value=""  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Departamento  </label>
      <select type="text" class="form-control" id="validationCustom03" placeholder="departamento" name="departamento" required>

        <option value="">Todos</option>
        <?php
        $con = new mysqli('localhost','root','1234','control2');
          $query ="SELECT * FROM departamento ";
          $sql = $con->query($query);
          $con->close();
         ?>
          <?php While($rowSql = $sql->fetch_assoc()) {   ?>
        <option value="<?php echo $rowSql["sede"]; ?>"> <?php echo $rowSql["sede"]; ?></option>
        <?php } ?>

      </select>
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_telefono"  for="validationCustom02">  Perfil  </label>
      <select type="text" class="form-control" id="validationCustom03" placeholder="Perfil" name="perfil" required>

        <option value="">Todos</option>
        <?php
        $con = new mysqli('localhost','root','1234','control2');
          $query ="SELECT * FROM perfil ";
          $sql = $con->query($query);
          $con->close();
         ?>
          <?php While($rowSql = $sql->fetch_assoc()) {   ?>
        <option value="<?php echo $rowSql["perfil"]; ?>"> <?php echo $rowSql["perfil"]; ?></option>
        <?php } ?>

      </select>
    </div>



  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Crear Usuario</button>
</form>

<?php } ?>

<br><br><br>
<?php include("./proceso_usuarios/filtro_usuarios.php"); ?>
