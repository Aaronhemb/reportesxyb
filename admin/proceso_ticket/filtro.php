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

if (!isset($_POST['id_ticket'])){$_POST['id_ticket'] = '';}
if (!isset($_POST['status'])){$_POST['status'] = '';}
if (!isset($_POST['nombreR'])){$_POST['nombreR'] = '';}
if (!isset($_POST['sede'])){$_POST['sede'] = '';}
if (!isset($_POST['departamento'])){$_POST['departamento'] = '';}

?>


             <?php
        /*FILTRO de busqueda////////////////////////////////////////////*/
        if ($_POST['nombreR'] == ''){ $_POST['nombreR'] = ' ';}
        $aKeyword = explode(" ", $_POST['nombreR']);


        if ($_POST["nombreR"] == '' AND $_POST['status'] == '' AND $_POST['id_ticket'] == '' AND $_POST['departamento'] == '' AND $_POST['sede'] == ''AND $_POST['buscapreciodesde'] == '' AND $_POST['buscapreciohasta'] == ''){
                $query ="SELECT * FROM tickets  ";
        }else{


                $query ="SELECT * FROM tickets ";

        if ($_POST["nombreR"] != '' ){
                $query .= "WHERE (nombreR LIKE LOWER('%".$aKeyword[0]."%') OR status LIKE LOWER('%".$aKeyword[0]."%')) ";

        for($i = 1; $i < count($aKeyword); $i++) {
           if(!empty($aKeyword[$i])) {
               $query .= " OR nombreR LIKE '%" . $aKeyword[$i] . "%' OR status LIKE '%" . $aKeyword[$i] . "%'";
           }
         }

        }
        if ($_POST["status"] != '' ){
               $query .= " AND status = '".$_POST['status']."' ";
        }
        if ($_POST["id_ticket"] != '' ){
               $query .= " AND id_ticket = '".$_POST['id_ticket']."' ";
        }
        if ($_POST["departamento"] != '' ){
               $query .= " AND departamento = '".$_POST['departamento']."' ";
        }
        if ($_POST["sede"] != '' ){
               $query .= " AND sede = '".$_POST['sede']."' ";
        }

}


         $sql = $conexion->query($query);

         $numeroSql = mysqli_num_rows($sql);



        ?>
<?php if ($_SESSION['usr_roll'] ==2): ?>
<?php include("filtroadmin.php"); ?>
<?php endif; ?>
<?php if ($_SESSION['usr_roll'] ==1): ?>
<?php include("filtrouser.php"); ?>
<?php endif; ?>


<br><br><br><br>
