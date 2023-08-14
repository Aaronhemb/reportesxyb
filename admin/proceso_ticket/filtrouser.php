<?php include_once '../login/dbconnect.php';?>

<?php


  $query ="SELECT * FROM tickets WHERE nombreR = '".	$_SESSION['usr_name'] ."' ";
   $sql = $conexion->query($query);

 ?>

</form>

<div class="table-responsive" style="    width: 90%;
    margin-left: 117px;
    margin-bottom: 150px;
    " >
        <table id="tabla_ticket" class="table" style="    width: 95%; text-align: center;">
                <thead>
                        <tr>
                          <td id="arriba_abajo" style="text-align:center;">Ticket</td>
                          <td id="arriba_abajo" style="text-align:center;">Titulo</td>
                          <td id="arriba_abajo" style="text-align:center;">Tema</td>
                          <td id="arriba_abajo" style="text-align:center;">Reporta</td>
                          <td id="arriba_abajo" style="text-align:center;">Area</td>
                          <td id="arriba_abajo" style="text-align:center;">Status</td>
                          <td id="arriba_abajo" style="text-align:center;">Status</td>
                          <td id="arriba_abajo" style="text-align:center;">Fecha Entrega</td>
                          <td id="arriba_abajo" style="text-align:center;">Responder</td>
                        </tr>

                </thead>
                <tbody>


                      <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                            <?php include("color_tabla.php");  ?>
                                <td id="i_ticket"><?php echo $rowSql['id_ticket']; ?></td>
                                <td id="titulo"> <?php echo $rowSql ["titulo"]; ?> </td>
                                <td id="titulo"> <?php echo $rowSql ["tema"]; ?> </td>
                                <td id="nombre"><?php echo $rowSql ["nombreR"]; ?></td>
                                <td id="sede"><?php echo $rowSql ["departamento"]; ?></td>
                                <td id="status">
                                <?php
                                    if($rowSql["status"] == 0){
                                      echo "Activo";
                                    }elseif ($rowSql["status"] == 1) {
                                      echo "Pause";
                                    }elseif ($rowSql["status"] == 2) {
                                      echo "Revision";
                                    }elseif ($rowSql["status"] == 3) {
                                      echo "Cancelado";
                                    }elseif ($rowSql["status"] == 4) {
                                      echo "Actividad por iniciar";
                                      }elseif ($rowSql["status"] == 5) {
                                        echo "Finalizado";
                                      }
                                   ?>

                                 </td>
                                 <?php if ($rowSql['status'] == 0): ?>
                                 <td id="status"> <div id="status" data-toggle="popover" data-trigger="hover" data-content="Activo" ></div> </td>
                               <?php elseif ($rowSql['status'] == 1):?>
                                   <td id="status"> <div id="status2" data-toggle="popover" data-trigger="hover" data-content="Pause" ></div> </td>
                                 <?php elseif ($rowSql['status'] == 2):?>
                                   <td id="status"> <div id="status3" data-toggle="popover" data-trigger="hover" data-content="Revision" ></div> </td>
                                   <?php elseif ($rowSql['status'] == 3):?>
                                   <td id="status"> <div id="status4" data-toggle="popover" data-trigger="hover" data-content="Cancelado" ></div> </td>
                                 <?php elseif ($rowSql['status'] == 4):?>
                                   <td id="status"> <div id="status5" data-toggle="popover" data-trigger="hover" data-content="Actividad por iniciar" ></div> </td>
                                   <?php elseif ($rowSql['status'] == 5):?>
                                   <td id="status"> <div id="status6" data-toggle="popover" data-trigger="hover" data-content="Finalizado" ></div> </td>
                                 <?php endif; ?>
                                 <?php
                                   date_default_timezone_set('America/Mexico_City');
                                   $newDate = date("d-m-y h:i:s", strtotime($rowSql["fecha_mod"])); ?>
                                <td id="fecha"><?php echo  $newDate; ?>  </td>
                                <td>
                                  <?php if ($rowSql['status'] == 4): ?>
                                    <a class="disable" style="cursor: default; pointer-events: none;"  href="./comentarios.php?id=<?php echo $rowSql['id_ticket']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                   <?php else: ?>
                                        <a href="./comentarios.php?id=<?php echo $rowSql['id_ticket']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                  <?php endif; ?>

                    </tr><?php } ?>
                </tbody>
        </table>
</div>


</div>
</div>
</div>
</div>


    </div>
</div>
<?php 	$conexion->close(); ?>
