

<div class="respuestas">
  <div class="container">
    <a href="#demo" class="btn btn-info" data-toggle="collapse" style="
      margin-left: 20px!important;">Responder</a>

      <?php if ($_SESSION['usr_roll'] ==2): ?>
    <?php echo  "<a href='#demo1' class='btn btn-success' data-toggle='collapse' style=''
          margin-left: 30px!important;  display: inline-block!important; '>Cambiar status</a>" ?>
      <?php endif; ?>

    <div id="demo" class="collapse">
      <form id="manage_ticket" class="needs-validation"   action="./comentarios/proceso_guardar.php" enctype="multipart/form-data" method="post">
      <input type="text" hidden name="user_id" value="<?php echo $_SESSION['usr_name'] ?>">
      <input type="text" hidden name="user_type" value="<?php echo 	$_SESSION['usr_departamento'] ?>">
      <input type="text" hidden name="ticket_id" value="<?php echo $row['id_ticket']; ?>">
      <input type="text" hidden name="id_perfil" value="<?php echo $_SESSION['usr_perfil'] ?>">
      <label class="control-label">Responder ticket:</label>
      <textarea name="comentario"   cols="30" rows="10" class="summernote" placeholder="comentario real"><?php echo isset($comentario) ? $comentario : '' ?></textarea>
           <!---Trae el horario de las -->
    <?php
     date_default_timezone_set('America/Mazatlan');
     $newDate = date("d-m-y h:i:s", strtotime($row["fecha_crea"])); ?>
    <input type="text" hidden readonly id="c_nombre" name="fecha_crea"  value="<?php echo $newDate; ?>"> 
   
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <button class="btn btn-primary" id="save" class="btn btn-primary" onclick="save()" type="submit">Responder Ticket</button>
      </form>
    </div>
    <?php if ($_SESSION['usr_roll'] ==2): ?>
      <?php include("modificar_estatus.php"); ?>
    <?php endif; ?>




  </div>
</div>
