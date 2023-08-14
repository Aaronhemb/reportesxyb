<?php include_once '../login/dbconnect.php';?>

<!--Conexion a base de datos-->
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

if (!isset($_POST['id'])){$_POST['id'] = '';}
if (!isset($_POST['tema_problema'])){$_POST['tema_problema'] = '';}
if (!isset($_POST['status'])){$_POST['status'] = '';}
if (!isset($_POST['fecha_crea'])){$_POST['fecha_crea'] = '';}

?>


             <?php
        /*FILTRO de busqueda////////////////////////////////////////////*/

         $query ="SELECT * FROM ayuda  ";
         $sql = $conexion->query($query);
         $numeroSql = mysqli_num_rows($sql);



        ?>

</form>

<div class="table-responsive" style="    width: 90%;
    margin-left: 117px;
    margin-bottom: 150px;" >
        <table id="tabla_ticket" class="table" style="    width: 95%; text-align: center;">
                <thead>
                        <tr>
                          <td id="arriba_abajo" style="text-align:center;">ID</td>
                          <td id="arriba_abajo" style="text-align:center;">Tema de proyecto</td>
                          <td id="arriba_abajo" style="text-align:center;">Status</td>
                          <td id="arriba_abajo" style="text-align:center;">Fecha Creacion</td>
                          <td id="arriba_abajo" style="text-align:center;">Modificar</td>
                          <td id="arriba_abajo" style="text-align:center;">Eliminar</td>
                        </tr>

                </thead>
                <tbody>


                      <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                                <tr>
                                <td id="i_tema"><?php echo $rowSql['id']; ?></td>
                                <td id="tema_problema"><?php echo $rowSql ["tema_problema"]; ?>  </td>
                                <td id="status"><?php

                                if ($rowSql ["status"] == 0) {
                                  echo ("Inactivo");
                                }else {
                                  echo ("Activo");
                                } ?></td>
                                <?php
                                date_default_timezone_set('America/Mexico_City');
                                $newDate = date("y-m-d h:i", strtotime($rowSql["fecha_crea"])); ?>
                                <td id="fecha"><?php echo  $newDate; ?>  </td>
                                  <td> <a href="./modificar_tema_ayuda.php?id=<?php echo $rowSql['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td> <a href="./proceso_tema_ayuda/eliminar_tema_ayuda.php?id=<?php echo $rowSql['id']; ?>"><i class="bi bi-trash3"> </i></a></td>

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
