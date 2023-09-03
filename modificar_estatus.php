


<?php
include("control/conexion.php"); //conexion con el servidor

$id = $_REQUEST['id'];
  $query = "SELECT * FROM tickets WHERE id_ticket = '$id' ";
  $resultado = $con->query($query);
  $row = $resultado->fetch_assoc();


$con->close();

 ?>


<div id="demo1" class="collapse"> <!--  ./comentarios/modificar_status.php?id=<?php echo $row['id_ticket'];?>  --->
  <form id="manage_ticket" class="needs-validation" action="./comentarios/trae_cambio_status.php?id=<?php echo $row['id_ticket'];?>"  enctype="multipart/form-data" method="post">
    <br><br>
    <p>Status Actual:</p>
    <?php if ($row['status'] == 0): ?>
    <td id="status"> <div id="status" data-toggle="popover" data-trigger="hover" data-content="Sin asignar"  ></div> </td>
    <?php elseif ($row['status'] == 1):?>
    <td id="status"> <div id="status2" data-toggle="popover" data-trigger="hover" data-content="Asignado"  ></div> </td>
    <?php elseif ($row['status'] == 2):?>
    <td id="status"> <div id="status3" data-toggle="popover" data-trigger="hover" data-content="Asignado y en proceso" ></div> </td>
    <?php elseif ($row['status'] == 3):?>
    <td id="status"> <div id="status4" data-toggle="popover" data-trigger="hover" data-content="Resuelto" ></div> </td>
    <?php elseif ($row['status'] == 4):?>
    <td id="status"> <div id="status5" data-toggle="popover" data-trigger="hover" data-content="Cancelado" ></div> </td>
    <?php elseif ($row['status'] == 5):?>
    <td id="status"> <div id="status6" data-toggle="popover" data-trigger="hover" data-content="Finalizado" ></div> </td>
    <?php elseif ($row['status'] == 6):?>
    <td id="status"> <div id="status7" data-toggle="popover" data-trigger="hover" data-content="Escalado a terceros" ></div> </td>
    <?php endif; ?>

  <select type="text"  name="status" value="<?php echo $row['status']; ?>">
    <option selected value="">seleccionar opcion</option>
    <option value="0">Sin asignar</option>
    <option value="1">Asignado</option>
    <option value="2">Asignado y en proceso</option>
    <option value="3">Resuelto</option>
    <option value="4">Cancelado</option>
    <option value="5">Finalizado</option>
    <option value="6">Escalado a terceros</option>
  </select>

  <input type="text" hidden name="user_id" value="<?php echo $_SESSION['usr_name'] ?>">
  <input type="text" hidden name="user_type" value="<?php echo 	$_SESSION['usr_departamento'] ?>">
  <input type="text" hidden name="ticket_id" value="<?php echo $row['id_ticket']; ?>">
  <input type="text" hidden name="id_perfil" value="<?php echo $_SESSION['usr_perfil'] ?>">
  
  <?php
  date_default_timezone_set('America/Mexico_City');
         $fechaActual = date('d-m-y H:i:s'); ?>
  <input type="text"  hidden  class="form-control" id="validationCustom02" placeholder="" name="fechaActual" value="<?php echo $fechaActual ?>" >
  
  <button name="cambio_estatus" class="btn btn-primary" type="submit" >Cambiar status</button>



<br><br><br>


<br><br><br>

  </form>
</div>
