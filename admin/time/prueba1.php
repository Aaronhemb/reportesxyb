<?php 
    include("../control/conexion.php");
 ?>
<?php


$query ="SELECT * FROM tickets ";
 $sql = $con->query($query);

?>


</form>

<div class="table-responsive"  style="    width: 90%;
    margin-left: 117px;
margin-bottom: 150px;
    " >
        <table id="tabla_ticket" class="table  " style="    width: 95%; text-align: center;">
                <thead>
                        <tr>
                          <td id="arriba_abajo" style="text-align:center;">Ticket</td>
                          <td id="arriba_abajo" style="text-align:center;">Titulo</td>
                          <td id="arriba_abajo" style="text-align:center;">Tema</td>
                          <td id="arriba_abajo" style="text-align:center;">Reporta</td>
                          <td id="arriba_abajo" style="text-align:center;">Perfil</td>
                          <td id="arriba_abajo" style="text-align:center;">Area</td>
                          <td id="arriba_abajo" style="text-align:center;">Status</td>
                          <td id="arriba_abajo" style="text-align:center;">Status</td>
                          <td id="arriba_abajo" style="text-align:center;">Fecha Creacion</td>
                          <td id="arriba_abajo" style="text-align:center;">Fecha Compromiso</td>
                          <td id="arriba_abajo" style="text-align:center;">Fecha Actual</td>
                          <td id="arriba_abajo" style="text-align:center;">Status fecha</td>
                          <td id="arriba_abajo" style="text-align:center;">view</td>
                        </tr>

                </thead>
                <tbody>


                      <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                            <?php include("../proceso_ticket/color_tabla.php");  ?>
                                <td id="i_ticket"><?php echo $rowSql['id_ticket']; ?></td>
                                <td id="titulo">  <?php echo $rowSql ["titulo"]; ?></td>
                                <td id="titulo">  <?php echo $rowSql ["tema"]; ?></td>
                                <td id="nombre"><?php echo $rowSql ["nombreR"]; ?></td>
                                <td id="perfil"><?php echo $rowSql ["perfil"]; ?></td>
                                <td id="sede"><?php echo $rowSql ["departamento"]; ?></td>
                                <td id="status">
                                  <?php
                                    if($rowSql["status"] == 0){
                                      echo "Pendiente";
                                    }elseif ($rowSql["status"] == 1) {
                                      echo "Proceso";
                                    }elseif ($rowSql["status"] == 2) {
                                      echo "Esperando respuesta de usuario";
                                    }elseif ($rowSql["status"] == 3) {
                                      echo "Esperando respuesta de tercero";
                                    }elseif ($rowSql["status"] == 4) {
                                      echo "Cerrado";
                                      }
                                   ?>

                                 </td>
                                <?php
                                ?>
                                <?php if ($rowSql['status'] == 0): ?>
                                <td id="status"> <div id="status" data-toggle="popover" data-trigger="hover" data-content="Pendiente"  ></div> </td>
                              <?php elseif ($rowSql['status'] == 1):?>
                                  <td id="status"> <div id="status2" data-toggle="popover" data-trigger="hover" data-content="Proceso"  ></div> </td>
                                <?php elseif ($rowSql['status'] == 2):?>
                                  <td id="status"> <div id="status3" data-toggle="popover" data-trigger="hover" data-content="Esperando Usuario" ></div> </td>
                                  <?php elseif ($rowSql['status'] == 3):?>
                                  <td id="status"> <div id="status3" data-toggle="popover" data-trigger="hover" data-content="Esperando Tercero" ></div> </td>
                                <?php elseif ($rowSql['status'] == 4):?>
                                  <td id="status"> <div id="status4" data-toggle="popover" data-trigger="hover" data-content="Cerrado" ></div> </td>
                                <?php endif; ?>


                                <?php

                                date_default_timezone_set('America/Mexico_City');
                                $newDate = date("y-m-d h:i", strtotime($rowSql["fecha_crea"])); ?>
                                <td id="fecha"><?php echo  $newDate; ?>  </td>

                                <?php
                                date_default_timezone_set('America/Mazatlan');
                                $newDate2 = date("y-m-d h:i", strtotime($rowSql["fecha_mod"])); ?>
                                <td id="fecha2"><?php echo  $newDate2; ?>
                                </td>

                                <?php
                                date_default_timezone_set('America/Mazatlan');
                                $newDate3 = date("y-m-d h:i"); ?>
                                <td style="display: none;" id="fecha3"><?php echo  $newDate3; ?> </td>
                                
                             
                               <?php
                                  // Calcular la diferencia en segundos
                                  $newDate2_timestamp = strtotime($newDate2);
                                  $newDate3_timestamp = strtotime($newDate3);
                                  $diferencia = abs($newDate2_timestamp - $newDate3_timestamp);
                                  

                                  // Convertir la diferencia a minutos, horas, etc.
                                  $minutos = floor($diferencia / 60);
                                  $horas = floor($diferencia / 3600);
                                  $dias = floor($diferencia / 86400);

                                  // Convertir la diferencia a minutos, horas, etc.
                                  $minutos = floor($diferencia / 60);
                                  $horas = floor($diferencia / 3600);
                                  $dias = floor($diferencia / 86400);

                                // Comparar las fechas
                                if ($newDate2 > $newDate3) {
                                    echo '<td >
                                    <div id="fecha3" data-toggle="popover" data-trigger="hover" data-content="Revaso Tiempo"
                                        style="    margin-left: 16px !important;
                                    margin-top: 3px!important;
                                    width: 28px!important;
                                    height: 28px!important;
                                    background-color: #fb1b30!important;
                                    border-color: #155e22!important;
                                    border-radius: 737px;"
                                  
                                ></div>   
                                    
                                    </td>';
                                } else {
                                    echo '<td></td>';
                                }
                              ?>
                      
                      
                              <td>
                                <?php if ($rowSql['status'] == 4): ?>
                                  <a class="disable"  href="./comentarios.php?id=<?php echo $rowSql['id_ticket']; ?>"><i class="bi bi-pencil-square"></i></a></td>
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
<?php 	$con->close(); ?>

<!--
<?php

if ($newDate != $newDate2) {
    // Las fechas son diferentes, cambia el fondo de color a rojo
    echo '<style>td { background-color: red; }</style>';
}


?>


                               <td id="MOnitoreo_de_fechas">
                               <?php

                              if ($newDate2 <= $newDate3) {
                                  // Las fechas son diferentes, cambia el fondo de color a rojo
                                  echo '<style>td#MOnitoreo_de_fechas { background-color: red; }</style>';
                              }


                              ?>
                               </td>  

-->