


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
                          <td id="arriba_abajo" style="text-align:center;">Ultimo Status</td>
                          <td id="arriba_abajo" style="text-align:center;">Fecha Compromiso</td>
                          <td id="arriba_abajo" style="text-align:center;">Fecha Creacion</td>
                          <td style="display: none;" id="arriba_abajo" style="text-align:center;">Fecha Actual</td>
                          <td id="arriba_abajo" style="text-align:center;">Status fecha</td>
                          <td id="arriba_abajo" style="text-align:center;">Semana</td>
                          <td id="arriba_abajo" style="text-align:center;">view</td>
                        </tr>

                </thead>
                <tbody>


                      <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                            <?php include("color_tabla.php");  ?>
                                <td id="i_ticket"><?php echo $rowSql['id_ticket']; ?></td>
                                <td id="titulo">  <?php echo $rowSql ["titulo"]; ?></td>
                                <td id="titulo">  <?php echo $rowSql ["tema"]; ?></td>
                                <td id="nombre"><?php echo $rowSql ["nombreR"]; ?></td>
                                <td id="perfil"><?php echo $rowSql ["perfil"]; ?></td>
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
                                <?php
                                ?>
                                <?php if ($rowSql['status'] == 0): ?>
                                <td id="status"> <div id="status" data-toggle="popover" data-trigger="hover" data-content="Activo"  ></div> </td>
                              <?php elseif ($rowSql['status'] == 1):?>
                                  <td id="status"> <div id="status2" data-toggle="popover" data-trigger="hover" data-content="Pause"  ></div> </td>
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

                                date_default_timezone_set('America/Mazatlan');
                                $newDate = date("d-m-y h:i", strtotime($rowSql["fecha_crea"])); ?>
                                <td id="fecha"><?php echo  $newDate; ?>  </td>

                                <?php
                                date_default_timezone_set('America/Mazatlan');
                                $newDate2 = date("d-m-y h:i", strtotime($rowSql["fecha_mod"])); ?>
                                <td id="fecha2"><?php echo  $newDate2; ?>
                                </td>

                                <?php
                                date_default_timezone_set('America/Mazatlan');
                                $newDate3 = date("d-m-y h:i"); ?>
                                <td style="display: none;" id="fecha3"><?php echo  $newDate3; ?> </td>

                                <?php
                                date_default_timezone_set('America/Mazatlan');
                                $newDate4 = date("d-m-y h:i", strtotime($rowSql["fecha_fin"])); ?>
                                <td id="fecha4"><?php echo  $newDate4; ?>
                                </td>



                                    <?php
                                    // Agregar condición para verificar el estatus
                                    $estatus = $rowSql["status"];
                                    if ($estatus == 0) {
                                        // Calcular la diferencia en segundos
                                        $newDate2_timestamp = strtotime($newDate2);
                                        $newDate3_timestamp = strtotime($newDate3);
                                        $diferencia = abs($newDate2_timestamp - $newDate3_timestamp);

                                        // Convertir la diferencia a minutos, horas, etc.
                                        $minutos = floor($diferencia / 60);
                                        $horas = floor($diferencia / 3600);
                                        $dias = floor($diferencia / 86400);

                                        // Comparar las fechas
                                        if ($newDate2 < $newDate3) {
                                            echo '<td>
                                            <div id="fecha3" data-toggle="popover" data-trigger="hover" data-content="Revaso Tiempo"
                                                style="margin-left: 16px !important;
                                                        margin-top: 3px!important;
                                                        width: 28px!important;
                                                        height: 28px!important;
                                                        background-color: #fb1b30!important;
                                                        border-color: #155e22!important;
                                                        border-radius: 737px;">
                                            </div>
                                            </td>';
                                        } else {
                                            echo '<td></td>';
                                        }
                                    } else {
                                        // Estatus no es igual a cero, no se realiza la comprobación de fechas
                                        echo '<td></td>';
                                    }
                                    ?>
                                  <td id="fecha5">
                                  <?php
                                    $fecha_creacion = date("d-m-y h:i", strtotime($rowSql["fecha_fin"])); // Fecha de creación del ticket (puedes obtenerla de tu base de datos)

                                    // Obtener el número de la semana
                                    $semana = date('W', strtotime($fecha_creacion));

                                    echo "Creado en la semana: " . $semana;
                                    ?>
                                 
                                  </td>


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
<?php 	$conexion->close(); ?>
