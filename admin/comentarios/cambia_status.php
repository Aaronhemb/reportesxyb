
<div class="input-group mb-3" style="
display: inline-flex;
width: 25%;">

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

$query ="SELECT * FROM tickets";
$sql = $conexion->query($query);
$row = $resultado->fetch_assoc();

 ?>
<form id="manage_ticket" class="needs-validation"  enctype="multipart/form-data" method="post">
    <input type="text"  readonly id="c_ticket"   value="No.<?php echo $row['id_ticket']; ?>">
    <select class="custom-select" id="inputGroupSelect04" name="status" style="height: 34px; font-size:15px;">
    <option selected>Cambiar status...</option>
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
  <label class="control-label">Responder ticket:</label>
  <textarea name="comentario"   cols="30" rows="10" class="summernote" placeholder="comentario real"><?php echo isset($comentario) ? $comentario : '' ?></textarea>
  
  <div class="input-group-append">

  <button name="cambio_status" onclick="funcionAlerta()" class="btn btn-info" type="submit">Aceptar</button>


  </div>
    </form>

</div>
