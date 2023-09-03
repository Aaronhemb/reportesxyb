<?php include("head.php") ?>


<?php if (@$_GET["i"] == 'ok') { ?>
  <center>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 80vh;">
      <h3>La información se generó correctamente!</h3>
      <?php
      $email = $_REQUEST['email'];
      $password = $_REQUEST['password'];
      ?>
      <h3>Tu usuario es:
        <?php echo $email ?> <span id="copyEmail" class="icon" data-text="<?php echo $email ?>"><i
            class="fas fa-envelope"></i></span>
      </h3>
      <h3>Tu password temporal es:
        <?php echo $password ?> <span id="copyPassword" class="icon" data-text="<?php echo $password ?>"><i
            class="fas fa-key"></i></span>
      </h3>

      <div class="Reportes" style="margin-top: 20px;">
        <a href="new_usuarios.php" class="btn btn-success">
          <span class="glyphicon glyphicon-export"></span> Crear más Usuarios
        </a>
      </div>
      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const copyEmailIcon = document.getElementById("copyEmail");
          const copyPasswordIcon = document.getElementById("copyPassword");

          copyEmailIcon.addEventListener("click", function () {
            copyToClipboard(this.getAttribute("data-text"));
            this.classList.add("copied");
          });

          copyPasswordIcon.addEventListener("click", function () {
            copyToClipboard(this.getAttribute("data-text"));
            this.classList.add("copied");
          });

          function copyToClipboard(text) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("copy");
            document.body.removeChild(textArea);
          }
        });
      </script>

      <style>
        .icon {
          cursor: pointer;
          transition: color 0.3s;
        }

        .copied {
          color: green !important;
        }
      </style>
    </div>
  </center>
  <?php
} else {
  ?>
  <form id="manage_ticket" class="needs-validation" action="./proceso_usuarios/proceso_guardar.php"
    enctype="multipart/form-data" method="post">
    <div class="form-row">
      <div class="col-md-3 mb-3">
        <label id="form_departamento" for="validationTooltip01">Email</label>
        <input type="email" class="form-control" id="validationTooltip01" placeholder="Email" name="email" value="">
      </div>
      <div class="col-md-3 mb-2">
        <label id="form_telefono" for="validationCustom02"> Nombre Completo </label>
        <input type="text" class="form-control" id="validationCustom02" placeholder="Nombre Completo" name="name"
          value="">
      </div>

      <div class="col-md-3 mb-2">
        <label id="form_direccion" for="validationCustom02"> Estado </label>
        <select type="text" class="form-control" id="validationCustom02" placeholder="Estado" name="estado" value="">
          <option value="">Seleccionar una opcion</option>
          <option value="0">Inactivo</option>
          <option value="1">Activo</option>
        </select>
      </div>
      <div class="col-md-3 mb-2">
        <label id="form_direccion" for="validationCustom02"> Roll </label>
        <select type="text" class="form-control" id="validationCustom02" placeholder="Roll" name="roll" value="">
          <option value="">Seleccionar una opcion</option>
          <option value="1">Usuario</option>
          <option value="2">Administrador</option>
          <option value="3">Ingeniero</option>
          <option value="4">Supervidor</option>
        </select>
      </div>

      <div class="col-md-3 mb-2">
        <label id="form_telefono" for="validationCustom02"> Telefono Celular </label>
        <input type="number" class="form-control" id="validationCustom02" placeholder="Telefono" name="telefono_cel"
          value="">
      </div>

      <div class="col-md-3 mb-2">
        <label id="form_telefono" for="validationCustom02"> Departamento </label>
        <select type="text" class="form-control" id="validationCustom03" placeholder="departamento" name="departamento"
          required>

          <option value="">Todos</option>
          <?php
          include("control/conexion.php"); //conexion con el servidor
          $query = "SELECT * FROM departamento ";
          $sql = $con->query($query);
          $con->close();
          ?>
          <?php while ($rowSql = $sql->fetch_assoc()) { ?>
            <option value="<?php echo $rowSql["sede"]; ?>"> <?php echo $rowSql["sede"]; ?></option>
          <?php } ?>

        </select>
      </div>
      <div class="col-md-3 mb-2">
        <label id="form_telefono" for="validationCustom02"> Perfil </label>
        <select type="text" class="form-control" id="validationCustom03" placeholder="Perfil" name="perfil" required>

          <option value="">Todos</option>
          <?php
          include("control/conexion.php"); //conexion con el servidor
          $query = "SELECT * FROM perfil ";
          $sql = $con->query($query);
          $con->close();
          ?>
          <?php while ($rowSql = $sql->fetch_assoc()) { ?>
            <option value="<?php echo $rowSql["perfil"]; ?>"> <?php echo $rowSql["perfil"]; ?></option>
          <?php } ?>

        </select>
      </div>

      <div class="col-md-3 mb-2">
        <label id="form_telefono" for="validationCustom02"> Empresa </label>
        <select type="text" class="form-control" id="validationCustom03" placeholder="Empresa" name="empresa" required>

          <option value="">Selecciona una empresa</option>
          <?php
          include("control/conexion.php"); //conexion con el servidor
          $query = "SELECT * FROM empresas ";
          $sql = $con->query($query);
          $con->close();
          ?>
          <?php while ($rowSql = $sql->fetch_assoc()) { ?>
            <option value="<?php echo $rowSql["nombre"]; ?>"> <?php echo $rowSql["nombre"]; ?></option>
          <?php } ?>

        </select>
      </div>

    </div> <!--Cierre-->
    <br><br><br>
    <button class="btn btn-primary" type="submit">Crear Usuario</button>
  </form>


  <br><br><br>
  <?php include("./proceso_usuarios/filtro_usuarios.php"); ?>
<?php } ?>