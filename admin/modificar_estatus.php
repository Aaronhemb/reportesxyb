<?php
$servidor= "localhost";
$usuario= "root";
$password = "1234";
$nombreBD= "control2";
$conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($conexion->connect_error) {
    die("la conexión ha fallado: " . $conexion->connect_error);
}
$conexion->set_charset('utf8');



$id = $_REQUEST['id'];
  $query = "SELECT * FROM tickets WHERE id_ticket = '$id' ";
  $resultado = $conexion->query($query);
  $row = $resultado->fetch_assoc();


$conexion->close();

 ?>


<div id="demo1" class="collapse"> <!--  ./comentarios/modificar_status.php?id=<?php echo $row['id_ticket'];?>  --->
  <form id="manage_ticket" class="needs-validation" action="./comentarios/trae_cambio_status.php?id=<?php echo $row['id_ticket'];?>"  enctype="multipart/form-data" method="post">
    <br><br>
    <?php if ($row['status'] == 0): ?>
        <td id="status">Status actual : <div id="status" data-toggle="popover" data-trigger="hover" data-content="Activo"  ></div> </td>
      <?php elseif ($row['status'] == 1):?>
          <td id="status">Status actual   <div id="status2" data-toggle="popover" data-trigger="hover" data-content="Pause"  ></div> </td>
        <?php elseif ($row['status'] == 2):?>
          <td id="status">Status actual  <div id="status3" data-toggle="popover" data-trigger="hover" data-content="Revision" ></div> </td>
        <?php elseif ($row['status'] == 3):?>
          <td id="status">Status actual   <div id="status4" data-toggle="popover" data-trigger="hover" data-content="Cancelado" ></div> </td>
        <?php elseif ($row['status'] == 4):?>
          <td id="status">Status actual <div id="status5" data-toggle="popover" data-trigger="hover" data-content="Actividades por iniciar" ></div> </td>
          </td>
        <?php elseif ($row['status'] == 5):?>
          <td id="status">Status actual <div id="status6" data-toggle="popover" data-trigger="hover" data-content="Finalizado" ></div> </td>
        <?php endif; ?>

  <select type="text"  name="status" value="<?php echo $row['status']; ?>">
    <option selected value="">seleccionar opcion</option>
    <option value="0">Activo</option>
    <option value="1">Pause</option>
    <option value="2">Revision</option>
    <option value="3">Cancelado</option>
    <option value="4">Actividades por iniciar</option>
    <option value="5">Finalizado</option>
    
  </select>
  <input type="text" hidden name="user_id" value="<?php echo $_SESSION['usr_name'] ?>">
  <input type="text" hidden name="user_type" value="<?php echo 	$_SESSION['usr_departamento'] ?>">
  <input type="text" hidden name="ticket_id" value="<?php echo $row['id_ticket']; ?>">
  <input type="text" hidden name="id_perfil" value="<?php echo $_SESSION['usr_perfil'] ?>">
  
  <?php
  date_default_timezone_set('America/Mazatlan');
  $fechaActual = date('d-m-y H:i:s'); ?>
  <input type="text"  hidden  class="form-control" id="validationCustom02" placeholder="" name="fecha_fin" value="<?php echo $fechaActual ?>" >
  
  <button name="cambio_estatus" class="btn btn-primary" type="submit" >Cambiar status</button>



<br><br><br>




  </form>
</div>
