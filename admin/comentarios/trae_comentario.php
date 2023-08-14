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
                $query = "SELECT * FROM comentarios   WHERE ticket_id = '$id'  ";
                $resultado = $conexion->query($query);
                $conexion->close();
               ?>

          <?php While($rowsl = $resultado->fetch_array()) {   ?>
            <div class="coments" style="margin-left: 150px!important;">
            <div class="card" style="
            width: 85%;
            margin-left: 100px!important;
            margin-top: 15px!important;
            margin-bottom: 15px!important;
              /*  -webkit-box-shadow: -4px 4px 19px #000 !important;*/">
              <div class="card-header" style="
              /*background:linear-gradient(40deg,#ffd86f,#fc6262) !important;*/
              /*background: linear-gradient(40deg,#45cafc,#303f9f) !important;*/" >
        <input type="text" readonly   id="c_ticket"   value="No.<?php echo $rowsl['ticket_id'];?>">
        <input type="text"  readonly id="c_nombre"   value="<?php echo $rowsl['user_id'] ?>">
        <input type="text" readonly id="c_nombre"   value="<?php echo $rowsl['user_type']; ?>">
        <input type="text" readonly id="c_nombre"   value="<?php echo $rowsl['id_perfil'];?>">

        <?php
         date_default_timezone_set('America/Mazatlan');
         $newDate = date("d-m-y h:i:s", strtotime($rowsl["fecha_crea"])); ?>
        <input type="text" readonly id="c_nombre"   value="<?php echo $newDate; ?>">


        <td> <a id="eliminar" style="
        font-size: 20px;
        margin-left: 88px;
        " href="./comentarios/eliminar_comentario.php?id=<?php echo $rowsl['id']. ',' .$rowsl['ticket_id']?>"><i class="bi bi-trash3"> </i></a></td>
        
      </div>
        <div class="card-body">
        <blockquote class="blockquote mb-0">
          <div class="datos_reporte2"
          <?php if ($rowsl['id_perfil']== 'Administrador') {
            echo " style='border-bottom: groove !important; border-color: #ef5d5d!important; '";
          }else {
            echo " style='border-bottom: groove !important; border-color: #18cde1  !important; '";
          } ?>   >

            <h2 id="title"><i class="bi bi-ticket-perforated-fill"></i>RESPUESTA</h2>
          </div><br><br>
            <div class="texto_comentario">
            <?php echo html_entity_decode($rowsl["comentario"]);?>
            </div>

        </blockquote>
        </div>
        </div>
      </div>    <?php } ?>
<?php /*ESTA ES UNA PRUEBA CON LA QUE SE INICIO LOS TICKET EN CASO DE QUE FALLE*/
/*     <tr>
            <td> <?php echo html_entity_decode($rowsl["comentario"]);?></td>
            <td><?php    echo $rowsl['ticket_id']; ?></td>
          </tr>  <?php } ?>*/
?>


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

                      toolbar: [
                          //[groupName, [list of button]]
                          ['style', ['bold', 'italic', 'underline', 'clear']],
                          ['font', ['strikethrough', 'superscript', 'subscript']],
                          ['fontsize', ['fontsize']],
                          ['color', ['color']],
                          ['para', ['ul', 'ol', 'paragraph']],
                          ['picture', ['picture']],
                          ['insert', ['link', 'picture', 'video']],
                          ['undo' , ['undo']],
                          ['redo' , ['redo']]
                      ],
                  }

              );

          });


</script>

<script type="text/javascript">
var save = function() {
var markup = $('.click2edit').summernote('code');
$('.click2edit').summernote('destroy');
};
</script>
