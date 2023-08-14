<?php
include("control/conexion.php"); //conexion con el servidor

?>
<?php
//Control de la session , cuando un usuario intente ingresar con el link a una de las paginas , debera logearse primero
	session_start();

	if(!isset($_SESSION['usr_id'])) {
		header("Location:../login/login.php");
	}

	include_once '../login/dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
						<!--Link para css-->
        <link rel="stylesheet" href="css/style_dashboard.css">
				<link rel="stylesheet" href="css/tickets.css">
					<link rel="stylesheet" href="css/new_ticket.css">
					<link rel="stylesheet" href="css/status_tabla.css">
					<link rel="stylesheet" href="css/bootstrap.min.css">

				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
					<!--Link para bootstrap-->
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
				<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
				<!--Link para iconos de la pagina-->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!--Link para crear los comnetarios -->


				<!--Link para table -->

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
 				<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>--->
	         <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	         <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	 				<script type="text/javascript">
	 				$(document).ready(function() {
	 				  $('#tabla_ticket').DataTable({
							  stateSave: true,

								columnDefs: [
											{
													targets: [0],
													orderData: [0, 1],
											},
											{
													targets: [1],
													orderData: [1, 0],
											},
											{
													targets: [4],
													orderData: [4, 0],
											},
									],

						});
	 				} );
	 				</script>

<style>





#graficas {
  max-width: 800px;
  margin: 20px auto;
}


/* Estilos generales */
body {
    font-family: Arial, sans-serif;
}

/* Estilos para las cards */
.card {
    width: 250px;
    margin: 10px;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    float: left;
}

/* Estilos para el contenedor de las cards */
.dashboard-cards {
    margin: 20px;
    overflow: hidden; /* Para que el float no afecte a elementos siguientes */
}

/* Estilos para el gráfico */
.graph {
    width: 100%;
    max-width: 800px;
    margin: 20px auto;
    text-align: center;
}



</style>
    <title>XYB</title>
  </head>
  <body>
		<nav class="navbar bg-light">


	  <div class="container-fluid">
			<div id="logo" class="">
				<a class="navbar-brand" href="#" style="margin-left: -357px!important;">
			 XYBooster  <i class="bi bi-bell-fill">
			 <?php if ($_SESSION['usr_roll'] ==2): ?>
			 <?php include("./notificaciones/pendiente/notif2.php"); ?>
			 <?php endif; ?>
			 <?php if ($_SESSION['usr_roll'] ==1): ?>
			 <?php include("./notificaciones/proceso/notif2.php"); ?>
			 <?php endif; ?>
			 </i>
			 </a>
			</div>

			<ul class="nav navbar-nav navbar-right">
	      <?php if (isset($_SESSION['usr_id'])) { ?>
	      <?php }  ?>
				<div class="dropdown" style="">
				<a href="javascript:void(0)" class="brand-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							<span class="brand-text font-weight-light"><?php echo ucwords($_SESSION['usr_name']) ?></span>
					</a>
					<div class="dropdown-menu" style="position:absolute;">
					<!---	<a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['usr_name'] ?>">Administrar cuenta</a>--->
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Administrar Usuario</a>
						<a class="dropdown-item" href="../login/logout.php">Salir</a>
					</div>
				</div>
	    </ul>
	  </div>
	</nav>
		<div id="mySidenav" class="sidebar" position>

			<a href="index.php" data-toggle="popover" data-trigger="hover" data-content="Dashobard"><i class="bi bi-speedometer"></i></a>
						<a href="./ticket.php" data-toggle="popover" data-trigger="hover" data-content="Tickets"><i class="fa fa-fw fa-ticket"></i>
							<?php if ($_SESSION['usr_roll'] ==2): ?>
							<?php include("./notificaciones/pendiente/notif.php"); ?>
							<?php endif; ?>
							<?php if ($_SESSION['usr_roll'] ==1): ?>
							<?php include("./notificaciones/proceso/notif.php"); ?>
							<?php endif; ?>


						</a>
				<?php if ($_SESSION['usr_roll'] ==2): ?> <!--Si la session es de Admin ingresa a ver las opciones , si es usuario entra a
					ver solo los tickets--->
					<a href="./new_departamento.php" data-toggle="popover" data-trigger="hover" data-content="Departamentos" ><i class="fa fa-fw fa-wrench"></i></a>
					<a href="./new_usuarios.php" data-toggle="popover" data-trigger="hover" data-content="Usuarios"><i class="fa fa-fw fa-users"></i></a>
					<a href="./new_perfil.php" data-toggle="popover" data-trigger="hover" data-content="Perfiles"><i class="fa fa-fw fa-user"></i></a>
					<a href="./new_tema_ayuda.php" data-toggle="popover" data-trigger="hover" data-content="Tema de proyecto"><i class="bi bi-briefcase-fill"></i></i></a>
					<a href="#mesa_ayuda" data-toggle="popover" data-trigger="hover" data-content="Conocimiento"><i class="bi bi-info-circle-fill"></i></i></a>
					<a href="#Descargas" data-toggle="popover" data-trigger="hover" data-content="extraer Info"><i class="bi bi-file-earmark-x"></i></a>
				<?php endif; ?>

		</div>
		<script> // scrip para los popover´s
		$(document).ready(function(){
		    $('[data-toggle="popover"]').popover();
		});
		</script>
