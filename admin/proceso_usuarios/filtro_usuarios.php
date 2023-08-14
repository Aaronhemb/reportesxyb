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
if (!isset($_POST['email'])){$_POST['email'] = '';}
if (!isset($_POST['name'])){$_POST['name'] = '';}
if (!isset($_POST['password'])){$_POST['password'] = '';}
if (!isset($_POST['estado'])){$_POST['estado'] = '';}
if (!isset($_POST['roll'])){$_POST['roll'] = '';}
if (!isset($_POST['telefono_cel'])){$_POST['telefono_cel'] = '';}
if (!isset($_POST['telefono_of'])){$_POST['telefono_of'] = '';}
if (!isset($_POST['ext'])){$_POST['ext'] = '';}


?>


             <?php
        /*FILTRO de busqueda////////////////////////////////////////////*/

         $query ="SELECT * FROM usuarios  ";
         $sql = $conexion->query($query);
         $numeroSql = mysqli_num_rows($sql);



        ?>

</form>

<div class="table-responsive" style="    width: 90%;
    margin-left: 117px;
    margin-bottom: 150px;" >
        <table id="tabla_ticket" class="table" style="    width: 50%; text-align: center;">
                <thead>
                        <tr>
                          <td id="arriba_abajo" style="text-align:center;">ID</td>
                          <td id="arriba_abajo" style="text-align:center;">Email</td>
                          <td id="arriba_abajo" style="text-align:center;">Nombre</td>
                          <td id="arriba_abajo" style="text-align:center;">Estado</td>
                          <td id="arriba_abajo" style="text-align:center;">Roll</td>
                          <td id="arriba_abajo" style="text-align:center;">Fecha Creacion</td>
                          <td id="arriba_abajo" style="text-align:center;">Telefono Celular</td>
                          <td id="arriba_abajo" style="text-align:center;">Telefono Oficina</td>
                          <td id="arriba_abajo" style="text-align:center;">Extencion</td>
                          <td id="arriba_abajo" style="text-align:center;">Departamento</td>
                          <td id="arriba_abajo" style="text-align:center;">Perfil</td>
                          <td id="arriba_abajo" style="text-align:center;">Modificar</td>
                          <td id="arriba_abajo" style="text-align:center;">Eliminar</td>
                          <td id="arriba_abajo" style="text-align:center;">Cambio Pass  </td>
                        </tr>

                </thead>
                <tbody>


                      <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                                <tr>
                                <td id="i_depa"><?php echo $rowSql['id']; ?></td>
                                <td id="email"><?php echo $rowSql ["email"]; ?>  </td>
                                <td id="name"><?php echo $rowSql ["name"]; ?></td>
                                <td id="estado"><?php

                                if ($rowSql ["estado"] == 0) {
                                  echo ("Inactivo");
                                }else {
                                  echo ("Activo");
                                }

                                 ?></td>
                                <td id="roll"><?php
                                if ($rowSql ["roll"] == 1) {
                                  echo("Usuario");
                                }else {
                                  echo("Administrador");
                                }

                                 ?> </td>
                                <?php
                                date_default_timezone_set('America/Mexico_City');
                                $newDate = date("y-m-d h:i", strtotime($rowSql["fecha_crea"])); ?>
                                <td id="fecha"><?php echo  $newDate; ?>  </td>
                                <td id="telefono_cel"><?php echo $rowSql ["telefono_cel"]; ?> </td>
                                <td id="telefono_of"><?php echo $rowSql ["telefono_of"]; ?> </td>
                                <td id="ext"><?php echo $rowSql ["ext"]; ?> </td>
                                <td id="departamento"><?php echo $rowSql ["departamento"]; ?> </td>
                                <td id="perfil"><?php echo $rowSql ["perfil"]; ?> </td>
                                <td> <a href="./modificar_usuarios.php?id=<?php echo $rowSql['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td> <a href="./proceso_usuarios/eliminar_usuarios.php?id=<?php echo $rowSql['id']; ?>"><i class="bi bi-trash3"> </i></a></td>
                                <td> <a href="./modificar_password.php?id=<?php echo $rowSql['id']; ?>"><i class="bi bi-key"> </i></a></td>
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
