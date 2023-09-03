<?php include "head.php"; ?>
<?php include_once '../login/dbconnect.php';?>


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="new_proveedor.php" class="btn btn-success" style="
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


include("control/conexion.php"); //conexion con el servidor

$id = $_REQUEST['id'];

  $query = "SELECT * FROM proveedor WHERE id ='$id' ";
  $resultado = $con->query($query);
  $row = $resultado->fetch_assoc();

$con->close();

 ?>

<form id="manage_ticket" class="needs-validation" action="proveedores/modificar_proveedor.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" method="post">
  <div class="form-row">

    <div class="col-md-3 mb-2">
      <label id="form_name"  for="validationCustom02">  Nombre empresa  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Nombre empresa" name="name_prov" value="<?php echo $row['name_prov']; ?>"  >
    </div>
    <div class="col-md-3  mb-3">
      <label id="form_email" for="validationTooltip01">Email</label>
      <input type="email" class="form-control" id="validationTooltip01" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_estado"  for="validationCustom02">  Estado  </label>
      <input type="text" readonly  style="border: none;"   value="<?php
      if ($row['estado'] == 1){
        echo ("Activo");
      }else {
        echo ("Inactivo");
      }
    ?>"  >
        <select type="text" required  class="form-control" id="validationCustom02" placeholder="Estado" name="estado" >
          <option value="">Seleccionar</option>
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

    <div class="col-md-3 mb-2">
      <label id="form_name"  for="validationCustom02">  Nombre contacto  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Nombre contacto" name="nombre_contacto" value="<?php echo $row['nombre_contacto']; ?>"  >
    </div>

    <div class="col-md-3 mb-2">
      <label id="form_name"  for="validationCustom02">  Numero de contacto  </label>
        <input type="numero"   class="form-control" id="validationCustom02" placeholder="numero" name="numero" value="<?php echo $row['numero']; ?>"  >
    </div>



  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Modificar Usuario</button>
</form>

<?php } ?>
