<?php include "head.php"; ?>
<?php include_once '../login/dbconnect.php';?>


<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br> 
  
  
  
  
  
  
  
  
  <div class="Reportes"> <a href="new_usuarios.php" class="btn btn-success" style=" margin-left: 8px;  padding-left: 272px; padding-right: 255px;

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

  $query = "SELECT * FROM usuarios WHERE id ='$id' ";
  $resultado = $con->query($query);
  $row = $resultado->fetch_assoc();

$con->close();

 ?>

<form id="manage_ticket" class="needs-validation" action="proceso_usuarios/modificar_usuarios.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" method="post">
  <div class="form-row">
    <div class="col-md-3  mb-3">
      <label id="form_email" for="validationTooltip01">Email</label>
      <input type="email" class="form-control" id="validationTooltip01" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_name"  for="validationCustom02">  Nombre Completo  </label>
        <input type="text"   class="form-control" id="validationCustom02" placeholder="Nombre Completo" name="name" value="<?php echo $row['name']; ?>"  >
    </div>
    <div class="col-md-3 mb-2">
      <label id="form_tel1"  for="validationCustom02">  Telefono Celular  </label>
        <input type="number"   class="form-control" id="validationCustom02" placeholder="Telefono" name="telefono_cel" value="<?php echo $row['telefono_cel']; ?>"  >
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
      <label id="form_roll"  for="validationCustom02">Roll</label>
      <input type="text" readonly style="border: none;"  value="<?php
      if ($row['roll'] == 1){
        echo ("Usuario");
      }else {
        echo ("Administrador");
      }
  ?>"  >
      <select type="text" required  class="form-control" id="validationCustom02" placeholder="Roll" name="roll" >
        <option value="">Seleccionar</option>
        <option value="1">usuario</option>
        <option value="2">Administrador</option>
        <option value="3">Ingeniero</option>
        <option value="4">Supervidor</option>
      </select>
    </div>



    <div class="col-md-3 mb-2">
        <label id="depa_user"  >Anterior </label>  <input id="empresa" style="border:none;" value="<?php echo $row['empresa']; ?>"  >
        <select type="text" class="form-control" id="validationCustom03" placeholder="empresa" name="empresa" required>

          <option value="">Todos</option>
          <?php
          include("control/conexion.php"); //conexion con el servidor
            $query ="SELECT * FROM empresas ";
            $sql = $con->query($query);
            $con->close();
           ?>
            <?php While($rowSql = $sql->fetch_assoc()) {   ?>
          <option required value="<?php echo $rowSql["nombre"]; ?>"> <?php echo $rowSql["nombre"]; ?></option>
          <?php } ?>

        </select>
    </div>

    <div class="col-md-3 mb-2">
        <label id="depa _user"  >Anterior </label>  <input id="depa_user" style="border:none;" value="<?php echo $row['departamento']; ?>"  >
        <select type="text" class="form-control" id="validationCustom03" placeholder="departamento" name="departamento" required>

          <option value="">Todos</option>
          <?php
          include("control/conexion.php"); //conexion con el servidor
            $query ="SELECT * FROM departamento ";
            $sql = $con->query($query);
            $con->close();
           ?>
            <?php While($rowSql = $sql->fetch_assoc()) {   ?>
          <option required value="<?php echo $rowSql["sede"]; ?>"> <?php echo $rowSql["sede"]; ?></option>
          <?php } ?>

        </select>
    </div>
    <div class="col-md-3 mb-2">
        <label for="perfil_user">Anterior </label> <input id="perfil_user" style="border:none;" value="<?php echo $row['perfil']; ?>"  >
        <select type="text" class="form-control" id="validationCustom03" placeholder="Perfil" name="perfil" required>

          <option required value="">Todos</option>
          <?php
          include("control/conexion.php"); //conexion con el servidor
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
  <button class="btn btn-primary" type="submit">Modificar Usuario</button>
</form>

<?php } ?>
