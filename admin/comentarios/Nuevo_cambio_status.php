
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
              $query = "SELECT * FROM status WHERE ticket_id = '$id'";
              $resultado = $conexion->query($query);
                $conexion->close();
               ?>

<?php while($row = $resultado->fetch_assoc()) { ?>


<div class="card" style="
  width: 85%;
  margin-left: 119px!important;
    /*  -webkit-box-shadow: -4px 4px 19px #000 !important;*/

  ">
  <div class="card-header" style="

    /*  background:linear-gradient(40deg,#ffd86f,#fc6262) !important;*/
    /*background: linear-gradient(40deg,#45cafc,#303f9f) !important;*/" >
      <input type="text"  readonly id="c_ticket"   value="No.<?php echo $row['ticket_id']; ?>">
      <input type="text" readonly id="c_nombre"   value="<?php echo $row['user_id']; ?>">
      <input type="text" readonly id="c_nombre"   value="<?php echo $row['user_type']; ?>">
      <input type="text" readonly id="c_nombre"   value="<?php echo $row['id_perfil']; ?>">
    <!---Trae el horario de las -->
    <?php
     date_default_timezone_set('America/Mazatlan');
     $newDate = date("d-m-y h:i:s", strtotime($row["fecha_fin"])); ?>
    <input type="text" readonly id="c_nombre"   value="<?php echo $newDate; ?>">

  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
        <div class="datos_reporte">
          <h2 id="title"><i class="bi bi-ticket-perforated-fill"></i> Cambio de estatus</h2>
          <h4 id="tema" style="margin-left: 672px!important; margin-top: -37px !important;">
            <?php if ($row['status'] == 0): ?>
        <td id="status">Cambio status:  <div id="status" data-toggle="popover" data-trigger="hover" data-content="Activo"  ></div> </td>
      <?php elseif ($row['status'] == 1):?>
          <td id="status">Cambio status:   <div id="status2" data-toggle="popover" data-trigger="hover" data-content="Pause"  ></div> </td>
        <?php elseif ($row['status'] == 2):?>
          <td id="status">Cambio status:  <div id="status3" data-toggle="popover" data-trigger="hover" data-content="Revision" ></div> </td>
        <?php elseif ($row['status'] == 3):?>
          <td id="status">Cambio status:   <div id="status4" data-toggle="popover" data-trigger="hover" data-content="Cancelado" ></div> </td>
        <?php elseif ($row['status'] == 4):?>
          <td id="status">Cambio status: <div id="status5" data-toggle="popover" data-trigger="hover" data-content="Actividades por iniciar" ></div> </td>
          </td>
        <?php elseif ($row['status'] == 5):?>
          <td id="status">Cambio status: <div id="status6" data-toggle="popover" data-trigger="hover" data-content="Finalizado" ></div> </td>
        <?php endif; ?>
        </div><br><br>

    </blockquote>
  </div>
</div>

<?php } ?>
