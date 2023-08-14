<div class="">


<?php
  $con = new mysqli('localhost','root','1234','control2');
  $query = $con->query("

SELECT nombreR, COUNT(id_ticket) AS total_tickets
FROM tickets
GROUP BY nombreR;

  ");

  foreach($query as $data)
  {
    $nombre[] = $data['nombreR'];
    $status[] = $data['total_tickets'];
    
  }

?>


<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>

<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($nombre) ?>;
  const data = {

    labels: labels,
    datasets: [
      {
        label: 'Numero de tickets',
        data: <?php echo json_encode($status) ?>,
        backgroundColor: [
          'rgba(211, 240, 236)',
          'rgba(0,255,0)',
          'rgba(0,0,255)',
          'rgba(255,255,0)',
          'rgba(0,255,255)',
          'rgba(255,0,255)',
          'rgba(192,192,192)',
          'rgba(128,128,128)'
          

        ],
      },
      {
        label: 'Total de tickets',
        data: <?php echo json_encode($status) ?>,
        backgroundColor: [
          'rgba(211, 240, 236)',
          'rgba(0,255,0)',
          'rgba(0,0,255)',
          'rgba(255,255,0)',
          'rgba(0,255,255)',
          'rgba(255,0,255)',
          'rgba(192,192,192)',
          'rgba(128,128,128)'
        ],
      }
    ]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {

      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</div>