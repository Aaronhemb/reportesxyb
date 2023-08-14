<?php //notificaciones de tickets
$con = new mysqli('localhost','root','1234','control2');
$query = $con->query("
SELECT COUNT(status) FROM tickets WHERE status = 0 
");
foreach($query as $data)
{
$status[] = $data['COUNT(status)'];}

$con->close();
?>

<?php if  ($data['0'] = 0 ){
        echo "<div id='notif' class='notif trans' style='display:none'  >";
        echo "</div>";
    }elseif ($status['0'] != 0) {
      echo "<div id='notif' class='notif trans'  >";
      echo  $status['0'];
      echo "</div>";
    }
      ?>
