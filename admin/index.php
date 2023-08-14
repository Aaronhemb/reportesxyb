
<?php include ("head.php"); ?>


		<div class="main">
		  <h2>DASHBOARD</h2>
		</div>
		<?php
		$con = new mysqli('localhost','root','1234','control2');
		$query = $con->query("
		SELECT COUNT(roll) FROM usuarios WHERE roll = 1");
		foreach($query as $data){
			$roll[] = $data['COUNT(roll)'];	}
		$query2 = $con->query("
		SELECT COUNT(roll) FROM usuarios WHERE roll = 2");
			foreach($query2 as $data2){
			$roll2[] = $data2['COUNT(roll)'];	}
			$query3 = $con->query("
			SELECT COUNT(sede) FROM departamento ");
				foreach($query3 as $data3){
				$sede = $data3['COUNT(sede)'];	}

				$query4 = $con->query("
				SELECT COUNT(id_ticket) FROM tickets ");
					foreach($query4 as $data4){
					$ticket = $data4['COUNT(id_ticket)'];	}
					$con->close();
			?>

			<br><br>

		<div class="dashboard-cards">
        <!-- Agrega tus cuadros de información aquí -->
        <!-- C_USER Card -->
        <div class="card">
            <!-- Contenido de la card -->
			<h5 class="card-title"> TOTAL DE USUARIOS</h5>
					<i id="t_user" class="fa fa-fw fa-user"></i> <p id="resultado"  style="margin-left: 83px!important;"  class="card-text"> <?php echo  $roll['0']; ?></p>
        </div>
        <!-- C_ADM Card -->
        <div class="card">
            <!-- Contenido de la card -->
				<h5 class="card-title"> TOTAL DE ADMINISTRADOR</h5>
				<i id="t_user" class="fa fa-fw fa-user"></i> <p id="resultado" style="margin-left: 83px!important;"  class="card-text"> <?php echo  $roll2['0']; ?></p>
        </div>

        <!-- C_DEPA Card -->
        <div class="card">
            <!-- Contenido de la card -->
			<h5 class="card-title"> TOTAL DE DEPARTAMENTOS</h5>
			<i id="t_user" class="fa fa-fw fa-user"></i> <p id="resultado" style="margin-left: 83px!important;"  class="card-text"> <?php echo  $sede; ?></p>
			
        </div>

        <!-- C_TICK Card -->
        <div class="card">
            <!-- Contenido de la card -->
			<h5 class="card-title"> TOTAL DE TICKETS</h5>
			<i id="t_user" class="fa fa-fw fa-ticket"></i> <p id="resultado"  style="margin-left: 83px!important;"  class="card-text"> <?php echo  $ticket; ?></p>
        </div>

        <div style="clear: both;"></div>



<div id="graph">

<?php include ("graficas/grafica2.php"); ?>

</div>








  </body>

  <script>
  // Función para recargar la página cada 5 minutos (300,000 milisegundos)
  function refreshPage() {
    location.reload();
  }

  // Llama a la función refreshPage() cada 5 minutos
  setInterval(refreshPage, 300000); // 300000 milisegundos = 5 minutos
</script>


</html>
