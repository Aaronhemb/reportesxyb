<?php Include("head_newticket.php");
    include("./control/conexion.php");
 ?>

<?php if (@$_GET["i"]=='ok') { // Quiere decir que el fundamento se envio correctamente?>
<center>
<h3> La informacion se genero correctamente , gracias!
  <br><br>  <div class="Reportes">
       <a href="./comentarios.php?id=<?php echo $rowSql['id_ticket']; ?>" class="btn btn-success" style="
       margin-left: 8px;
           padding-left: 272px;
           padding-right: 255px;

       "><span class="glyphicon glyphicon-export"></span>Ir a mi ticket</a>
    </div><br><br><br>

    </h3>
</center>
<?php
} else{
?>


<?php
$servidor= "localhost";
$usuario= "root";
$password = "1234";
$nombreBD= "CONTROL2";
$conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($conexion->connect_error) {
    die("la conexión ha fallado: " . $conexion->connect_error);
}
$conexion->set_charset('utf8');
$id = $_REQUEST['id'];
  $query = "SELECT * FROM tickets   WHERE id_ticket ='$id'  ";
  $resultado = $conexion->query($query);
  $row = $resultado->fetch_assoc();

 ?>
 <?php include("./comentarios/modificar_comentarios.php") ?>

<div class="card" style="
  width: 85%;
  margin-left: 119px!important;
    /*  -webkit-box-shadow: -4px 4px 19px #000 !important;*/

  ">
  <div class="card-header" style="

    /*  background:linear-gradient(40deg,#ffd86f,#fc6262) !important;*/
    /*background: linear-gradient(40deg,#45cafc,#303f9f) !important;*/" >
      <input type="text"  readonly id="c_ticket"   value="No.<?php echo $row['id_ticket']; ?>">
      <input type="text" readonly id="c_nombre"   value="<?php echo $row['nombreR']; ?>">
      <input type="text" readonly id="c_nombre"   value="<?php echo $row['departamento']; ?>">
      <input type="text" readonly id="c_nombre"   value="<?php echo $row['perfil']; ?>">
    <!---Trae el horario de las -->
    <?php
            date_default_timezone_set('America/Mazatlan');
            $fechaActual = date('y-m-d H:i:s'); ?>
   <input type="text" hidden  readonly class="form-control" id="validationCustomUsername" placeholder="tipo de usuario" name="fecha_crea" value="<?php echo $fechaActual ?>" aria-describedby="inputGroupPrepend" required>

  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
        <div class="datos_reporte">
          <h2 id="title"><i class="bi bi-ticket-perforated-fill"></i> TICKET</h2>
          <h4 id="tema" style="margin-left: 672px!important; margin-top: -37px !important;">
            <i class="bi bi-cursor-fill"></i> <?php echo $row['tema']; ?> </h4>
          <h4 id="asunto"><i class="bi bi-clipboard2-minus-fill"></i><?php echo $row['titulo']; ?></h4>
        </div><br><br>
        <div class="texto_comentario">
        <?php echo html_entity_decode($row["descripcion"]);?>
        </div>
    </blockquote>
  </div>
</div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script>
   $(document).ready(function() {
       $('.summernote').summernote(


                    //  $('.summernote').eq(0).html('{{$texto[0]->hechos}}'),
                    //  $('.summernote').eq(1).html('{{$texto[0]->pruebas}}'),
                  //    $('.summernote').eq(2).html('{{$texto[0]->anexos}}'),
                      {
                          //disableDragAndDrop: true,
                          height: 300,                 // set editor height
                          minHeight: null,             // set minimum height of editor
                          maxHeight: null,             // set maximum height of editor
                          lang: 'es-CO',
                          inheritPlaceholder: true,
                          toolbar: [
                              //[groupName, [list of button]]
                              ['style', ['bold', 'italic', 'underline', 'clear']],
                              ['font', ['strikethrough', 'superscript', 'subscript']],
                              ['fontsize', ['fontsize']],
                              ['color', ['color']],
                              ['para', ['ul', 'ol', 'paragraph']],
                              ['picture', ['picture']],
                              ['undo' , ['undo']],
                              ['redo' , ['redo']]
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

 <?php 
 include("./comentarios/trae_comentario.php");
 include("./comentarios/Nuevo_cambio_status.php")
 
 ?>


 <?php } ?>
