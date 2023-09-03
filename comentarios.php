<?php Include("head_newticket.php");
    include("./control/conexion.php");
 ?>




<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> El ticket se cerro correctamente , gracias!    </h3>
  <br><br>  <div class="Reportes">

  <?php $id = $_REQUEST['id']; ?>

  <style>


   h1 {
       text-align: center;
   }

   .iconos {
       text-align: center;
       font-size: 40px;
       margin-top: 50px;
   }

   a#feliz {
    color: #5be92e;
    text-decoration: none;
    margin-right: 20px;
    }
    a#regular {
    color: #484d47;
    text-decoration: none;
    margin-right: 20px;
    }
    a#enojado {
    color: #dd0000;
    text-decoration: none;
    margin-right: 20px;
    }
</style>
<h3> Ayudanos a mejorar nuestro servicio , que tal te parecio la atencion de nuestros ingenieros ?</h3>
<div class="iconos"> 
<a id="feliz" href="procesar_formulario.php?id=<?php echo $id; ?>&calificacion=Bueno">
    <i class="bi bi-emoji-smile-fill"></i>
</a>
<a id="regular" href="procesar_formulario.php?id=<?php echo $id; ?>&calificacion=Regular">
    <i class="bi bi-emoji-expressionless-fill"></i>
</a>
<a id="enojado" href="procesar_formulario.php?id=<?php echo $id; ?>&calificacion=Malo">
    <i class="bi bi-emoji-frown-fill"></i>
</a>
</div>
    </div><br><br><br>

</center>
<?php
} else{
?>


<?php

$id = $_REQUEST['id'];
  $query = "SELECT * FROM tickets   WHERE id_ticket ='$id'  ";
  $resultado = $con->query($query);
  $row = $resultado->fetch_assoc();

 ?>
 


 <?php include("./comentarios/modificar_comentarios.php") ?>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script>
   $(document).ready(function() {
       $('.summernote').summernote(


                    //  $('.summernote').eq(0).html('{{$texto[0]->hechos}}'),
                    //  $('.summernote').eq(1).html('{{$texto[0]->pruebas}}'),
                  //    $('.summernote').eq(2).html('{{$texto[0]->anexos}}'),
                      {
                          disableDragAndDrop: true,
                          height: 300,                 // set editor height
                          minHeight: null,             // set minimum height of editor
                          maxHeight: null,             // set maximum height of editor
                          lang: 'es-CO',
                          inheritPlaceholder: false,

                          toolbar: [
                              //[groupName, [list of button]]
                              ['style', ['bold', 'italic', 'underline', 'clear']],
                              ['font', ['strikethrough', 'superscript', 'subscript']],
                              ['fontsize', ['fontsize']],
                              ['color', ['color']],
                              ['para', ['ul', 'ol', 'paragraph']],
                              ['picture', ['picture']],
                              ['undo' , ['undo']],
                              ['redo' , ['redo']],
                          ],

                      }

                  );
              });
              $('.summernote').summernote({
                height: 150,   //set editable area's height
                codemirror: { // codemirror options
                  theme: 'monokai'
                }                
              });



 </script>

 <script type="text/javascript">
 var save = function() {
var markup = $('.click2edit').summernote('code');
$('.click2edit').summernote('destroy');
};
 </script>


<div class="conversacion ticket">
       <!-- Aquí irán los mensajes -->
       <div class="ticket-header">
            <h2 class="response-title"><i class="bi bi-ticket-perforated-fill"></i> TICKET No.<?php echo $row['id_ticket']; ?></h2>
       </div>
       <div class="mensaje">
       <?php
        date_default_timezone_set('America/Mazatlan');
        $newDate = date("d-m-y h:i:s", strtotime($row["fecha_crea"]));
        ?>
        <span class="nombre">
        Nombre:<?php echo $row['nombreR']; ?>
        </span>
        <span class="area">
        Area: <?php echo $row['departamento']; ?> 
        </span>
        <span class="perfil">
        Perfil: <?php echo $row['perfil']; ?>
        </span>
        <p class="contenido"></p>  
        
        <p><?php echo html_entity_decode($row["descripcion"]); ?></p>
        <div class="hora-container">
            <span class="hora">Fecha: <?php echo $newDate; ?></span>
        </div>
       </div>
   </div>








<?php  include("./comentarios/trae_comentario.php"); ?>
<?php if ($_SESSION['usr_roll'] == 1): ?>
<?php elseif($_SESSION['usr_roll'] == 4): ?>
    <?php else: ?>
<?php include("./comentarios/Nuevo_cambio_status.php"); ?>
<?php endif ?>

<script>
    // Función para mostrar/ocultar los reportes
    const toggleReportsIcon = document.getElementById("toggleReports");
    const reportContent = document.querySelector(".report-content");
    toggleReportsIcon.addEventListener("click", function() {
        if (reportContent.style.display === "none") {
            reportContent.style.display = "block";
            toggleReportsIcon.classList.remove("bi-arrow-down-square");
            toggleReportsIcon.classList.add("bi-arrow-up-square");
        } else {
            reportContent.style.display = "none";
            toggleReportsIcon.classList.remove("bi-arrow-up-square");
            toggleReportsIcon.classList.add("bi-arrow-down-square");
        }
    });
</script>

<?php } ?>