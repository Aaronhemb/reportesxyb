<?php include("head_newticket.php"); ?>

<?php if (@$_GET["i"] == 'ok') { // Quiere decir que el fundamento se envio correctamente?>
  <center>
    <h3> La informacion se genero correctamente , gracias!
      <br><br>
      <div class="Reportes">
        <a href="new_ticket.php" class="btn btn-success"
          style=" padding-left: 272px; padding-right: 255px; float: none;"><span
            class="glyphicon glyphicon-export"></span>crear mas tickets</a>
      </div><br><br><br>
      <div class="Reportes">
        <a href="ticket.php" class="btn btn-info "
          style=" margin-left: 8px; padding-left: 272px; padding-right: 255px; "><span
            class="glyphicon glyphicon-export"></span>Ver mis tickets</a>
      </div>
    </h3>
  </center>
  <?php
} else {
  ?>

  <style>
    .form-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .form-group {
      margin-bottom: 0;
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    @media screen and (max-width: 768px) {
      .form-control {
        width: 100%;
      }
    }
  </style>

  <form id="manage_ticket" class="needs-validation" action="./proceso_ticket/proceso_guardar.php"
    enctype="multipart/form-data" method="post">
    <div class="form-row">
      <?php
      $readonlyValue = ucwords($_SESSION['usr_mail']);
      $userType = '';
      if ($_SESSION['usr_roll'] == 1) {
        $userType = "Usuario";
      } elseif ($_SESSION['usr_roll'] == 2) {
        $userType = "Administrador";
      } elseif ($_SESSION['usr_roll'] == 3) {
        $userType = "Ingeniero";
      }
      ?>
      <div class="col-md-4 mb-2">
        <div class="form-group">
          <label for="perfil">
            <i class="bi bi-person-bounding-box" style="width: 30px; font-size: 24px;"></i>
            <input type="text" readonly class="form-control" id="perfil" placeholder="Perfil de usuario" name="perfil"
              value="<?php echo ucwords($_SESSION['usr_perfil']) ?>" required>
          </label>
        </div>
      </div>

      <div class="col-md-4 mb-2">
        <div class="form-group">
          <label for="departamento">
            <i class="bi bi-person-lines-fill" style="width: 30px; font-size: 24px;"></i>
            <input type="text" readonly class="form-control" id="departamento" placeholder="Departamento"
              name="departamento" value="<?php echo ucwords($_SESSION['usr_departamento']) ?>" required>
          </label>
        </div>
      </div>

      <div class="col-md-4 mb-2">
        <div class="form-group">
          <label for="type_user">
            <i class="bi bi-person-rolodex" style="width: 30px; font-size: 24px;"></i>
            <input type="text" readonly class="form-control" id="type_user" placeholder="Tipo de usuario" name="type_user"
              value="<?php echo $userType; ?>" required>
          </label>
        </div>
      </div>
    </div> <!--Fin de form arrow (1)-->

    <div class="form-row">
      <div class="col-md-4 mb-2">
        <div class="form-group">
          <label for="fecha_crea">
            <i class="bi bi-calendar-date" style="width: 30px; font-size: 24px;"></i>
            <?php
            date_default_timezone_set('America/Mexico_City');
            $fechaActual = date('y-m-d H:i:s'); ?>
            <input type="text" readonly class="form-control" id="fecha_crea" placeholder="Fecha de creación"
              name="fecha_crea" value="<?php echo $fechaActual ?>" required>
          </label>
        </div>
      </div>




      <?php if ($_SESSION['usr_roll'] == 2): ?>
        <div class="col-md-4 mb-2">
          <div class="form-group">
            <label for="nombreR">
              <i class="bi bi-file-person-fill" style="width: 30px; font-size: 24px;"></i>
              <select type="text" class="form-control" id="nombreR" name="nombreR" required>
                <option value="">Selecciona un usuario </option>
                <?php
                include("control/conexion.php"); //conexion con el servidor
                $query = "SELECT * FROM usuarios";
                $sql = $con->query($query);
                $con->close();
                ?>
                <?php while ($rowSql = $sql->fetch_assoc()) { ?>
                  <option value="<?php echo $rowSql["email"]; ?>"> <?php echo $rowSql["email"]; ?></option>
                <?php } ?>
              </select>
            </label>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($_SESSION['usr_roll'] == 1): ?>
        <div class="col-md-4 mb-2">
          <div class="form-group">
            <label for="nombreR" style="inline-flex!important">
              <i class="bi bi-file-person-fill" style="width: 30px;font-size: 24px;"></i>
              <input type="text" readonly="readonly" class="form-control" id="validationCustom01"
                placeholder="Nombre de quien reporta" name="nombreR" value="<?php echo ucwords($_SESSION['usr_mail']) ?>"
                required>
            </label>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($_SESSION['usr_roll'] == 3): ?>
        <div class="col-md-4 mb-2">
          <div class="form-group">
            <label for="nombreR">
              <i class="bi bi-file-person-fill" style="width: 30px;font-size: 24px;"></i>
              <input type="text" readonly="readonly" class="form-control" id="validationCustom01"
                placeholder="Nombre de quien reporta" name="nombreR" value="<?php echo ucwords($_SESSION['usr_mail']) ?>"
                required>
            </label>
          </div>
        </div>
      <?php endif; ?>


      <div class="col-md-4 mb-2">
        <div class="form-group">
          <label for="tipo_tickets" class="d-flex align-items-center">
            <i class="bi bi-exclamation-lg mr-2" style="font-size: 24px;"></i>
            <select class="form-control" id="tipo_tickets" name="tipo_tickets" required>
              <option value="">Selecciona tipo de incidencia</option>
              <option value="Incidencia">Incidencia</option>
              <option value="Solicitud">Solicitud</option>
              <option value="Requerimiento">Requerimiento</option>
            </select>
          </label>
        </div>
      </div>
    </div>

    </div> <!--fin del form arrow (2)-->

    <div class="form-row">
      <div class="col-md-5 mb-4">
        <div class="form-group">
          <label for="tema" class="d-flex align-items-center">Tema</label>
          <select class="form-control" id="tema" placeholder="Tema de ayuda" name="tema" required>
            <option value="">Selecciona tema de ayuda</option>
            <?php
           include("control/conexion.php"); //conexion con el servidor
            $query = "SELECT * FROM ayuda ";
            $sql = $con->query($query);
            $con->close();
            ?>
            <?php while ($rowSql = $sql->fetch_assoc()) { ?>
              <option value="<?php echo $rowSql["tema_problema"]; ?>"> <?php echo $rowSql["tema_problema"]; ?></option>
            <?php } ?>
          </select>
          <div class="invalid-feedback">
            Por favor agregue un tema de ayuda.
          </div>
        </div>
      </div>

      <div class="col-md-7 mb-4">
        <div class="form-group">
          <label class="control-label">Título</label>
          <input type="text" class="form-control" id="titulo" onkeyup="javascript:this.value=this.value.toUpperCase();"
            placeholder="Ej. Olvidé mi contraseña" name="titulo" required>
          <div class="invalid-feedback">
            Por favor, agregue el título a su reporte.
          </div>
        </div>
      </div>
    </div>


    <div class="form-row">
      <div class="col-md-12 mb-3">
        <label class="control-label">Descripción</label>
        <textarea name="descripcion" id="hint2basic" cols="30" rows="10"
          class="form-control summernote"><?php echo isset($description) ? $description : ''; ?></textarea>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-3 mb-3">
      <button class="btn btn-primary" value="Send Email" id="save" class="btn btn-primary" onclick="enviarCorreo()" type="submit">Crear ticket</button>
      </div>
    </div>
  </form>


<?php } ?>

</body>


<script>
  $(document).ready(function () {
    $('.summernote').summernote(

      //  $('.summernote').eq(0).html('{{$texto[0]->hechos}}'),
      //  $('.summernote').eq(1).html('{{$texto[0]->pruebas}}'),
      //    $('.summernote').eq(2).html('{{$texto[0]->anexos}}'),
      {
        //  disableDragAndDrop: true,
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        lang: 'es-CO',
        toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['picture', ['picture']],
          ['undo', ['undo']],
          ['redo', ['redo']]
        ],
      }
    );

  });
  $(".hint2mention").summernote({
    height: 100,
    toolbar: false,
    hint: {
      mentions: ['jayden', 'sam', 'alvin', 'david'],
      match: /\B@(\w*)$/,
      search: function (keyword, callback) {
        callback($.grep(this.mentions, function (item) {
          return item.indexOf(keyword) == 0;
        }));
      },
      content: function (item) {
        return '@' + item;
      }
    }
  });

  $('.summernote').summernote({
    height: 150,   //set editable area's height
    codemirror: { // codemirror options
      theme: 'monokai'
    }
  });

</script>