<?php include("head.php");
include("control/conexion.php"); ?>

<div class="new-ticket-wrapper" style="position: relative; margin-top: 59px;">
  <a href="./new_ticket.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true" style="
    position: absolute;
    top: -20px;
    right: 102px;
    background: #007bff;
    padding: 8px 18px;
    font-size: 12px;
    line-height: 1.3333333;
    border-radius: 56px;
    z-index: 1;
    ">
    Nuevo Ticket
  </a>
</div>

<?php include("./proceso_ticket/filtro.php") ?>
<script>
  // Función para recargar la página cada 5 minutos (300,000 milisegundos)
  function refreshPage() {
    location.reload();
  }

  // Llama a la función refreshPage() cada 5 minutos
  setInterval(refreshPage, 60000); // 300000 milisegundos = 5 minutos
</script>