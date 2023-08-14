<?php
  date_default_timezone_set('America/Mexico_City');
  $newDate = date("y-m-d h:i:s", strtotime($row["fecha_crea"])); ?>

<?php
date_default_timezone_set('America/Mexico_City');
$fechaActual =  date('y-m-d h:i:s');
$fechaRegistro = $newDate;
$segundosFechaActual = strtotime($fechaActual);
$segundosFechaRegistro = strtotime($fechaRegistro);
$segundosTranscurridos = $segundosFechaActual - $segundosFechaRegistro;
$segundos = floor($segundosTranscurridos);
$minutos =   $segundosTranscurridos / 60;
$horas =   $minutos/60;
$dias = $horas / 24;
$diasTranscurridos = $segundosTranscurridos / 86400;
$diasRedondeados = ceil($dias);
echo "trascurrio ".$diasRedondeados." dias sin que respondan" ;
?>
