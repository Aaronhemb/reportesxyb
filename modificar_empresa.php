<?php include "head.php"; ?>
<?php include_once '../login/dbconnect.php';?>


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

<?php


include("control/conexion.php"); //conexion con el servidor

$id = $_REQUEST['id'];

  $query = "SELECT * FROM empresas WHERE id ='$id' ";
  $resultado = $con->query($query);
  $row = $resultado->fetch_assoc();

$con->close();

 ?>

<form id="manage_ticket" class="needs-validation" action="proceso_empresas/modificar_empresa.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" method="post">
  <div class="form-row">

    <div class="col-md-3 mb-2">
      <label id="form_name"  for="validationCustom02">  Nombre empresa  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Nombre empresa" name="nombre" value="<?php echo $row['nombre']; ?>"  >
    </div>
    <div class="col-md-3 mb-3">
      <label id="form_departamento" for="validationTooltip01">Razon Social</label>
      <input type="text" class="form-control" id="validationTooltip01" placeholder="Razon Social" name="razon_social" value="<?php echo $row['razon_social']; ?>"  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_ext"  for="validationCustom02"> Giro Empresa  </label>
      <input type="text"   class="form-control" id="validationCustom02" placeholder="Giro empresa" name="Giro" value="<?php echo $row['Giro']; ?>"  >
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




  </div> <!--Cierre-->
<br><br><br>
  <button class="btn btn-primary" type="submit">Modificar Usuario</button>
</form>

<?php } ?>
