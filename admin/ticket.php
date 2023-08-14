<?php include("head.php");
include("control/conexion.php"); ?>

<div class="new_ticket" style=" margin-top: 59px;">
  <a href="./new_ticket.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true" style="
   
    position: absolute;
    top: 79px; /* Ajusta el valor según tu diseño */
    right: 77px; /* Ajusta el valor según tu diseño */
    background: #007bff;
  
  " >
    Nuevo Ticket</a>
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