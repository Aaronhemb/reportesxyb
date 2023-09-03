<?php include "head.php"; ?>
<?php include_once '../login/dbconnect.php';?>

<?php
if (@$_GET["i"] == 'ok') {
  // Información generada correctamente
  ?>
<center>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 80vh;">

    <?php
    $password = $_REQUEST['password'];
    ?>

    <h3>Tu nuevo password temporal es:
      <?php echo $password ?> <span id="copyPassword" class="icon" data-text="<?php echo $password ?>"><i
          class="fas fa-key"></i></span>
    </h3>

    <div class="Reportes" style="margin-top: 20px;">
      <a href="new_usuarios.php" class="btn btn-success">
        <span class="glyphicon glyphicon-export"></span> Regresar a Usuarios
      </a>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const copyPasswordIcon = document.getElementById("copyPassword");

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
  // Mostrar el formulario
  include("control/conexion.php"); //conexion con el servidor

  $id = $_REQUEST['id'];
  $query = "SELECT * FROM usuarios WHERE id ='$id' ";
  $resultado = $con->query($query);
  $row = $resultado->fetch_assoc();
  $con->close();
  ?>

  <div class="container mt-5">
    <form id="manage_ticket" class="needs-validation" action="proceso_usuarios/cambiar_password.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" method="post">
      <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
          <label for="email">Email</label>
          <input type="email" disabled required class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <div class="col-md-4 mb-3">
          <label for="password">Anterior Password</label>
          <input type="password" disabled required class="form-control" id="password" placeholder="Nuevo Password" name="password" value="<?php echo $row['password']; ?>">
        </div>
      </div>

      <div class="row justify-content-center mt-4">
        <div class="col-md-4">
          <button class="btn btn-primary btn-block" type="submit">Modificar Password</button>
        </div>
      </div>
    </form>
  </div>

<?php } ?>
