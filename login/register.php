<?php
session_start();

if (isset($_SESSION['usr_id'])) {
	header("Location: ../index.php");
}

include_once 'dbconnect.php';

//Establece el error de validación como flag
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$name = ($_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$roll = ($_POST['roll']);
	$telefono_cel = ($_POST['telefono_cel']);
	$telefono_of = ($_POST['telefono_of']);
	$ext = ($_POST['ext']);
	$departamento = ($_POST['departamento']);
	$perfil = ($_POST['perfil']);
	$terminosycond = mysqli_real_escape_string($con, $_POST['terminosycond']);
	date_default_timezone_set("America/Mexico_City");
	$mifecha = date('Y-m-d H:i:s');

	//Nombre sólo puede contener caracteres alfabéticos y espacio (esto varia sgun requerimiento)
	if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
		$error = true;
		$name_error = "El nombre debe contener solo caracteres del alfabeto y espacio.";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Ingresa un correo electrónico válido.";
	}
	if (strlen($password) < 6) {
		$error = true;
		$password_error = "La contraseña debe tener un mínimo de 6 caracteres.";
	}
	if ($password != $cpassword) {
		$error = true;
		$cpassword_error = "Las contraseñas no coinciden";
	}

	if (!$terminosycond) {
		//$error = true;
		//$terminosycond_error = "Debes aceptar Terminos y condiciones";
	}
	if (!$error) {
		if (mysqli_query($con, "INSERT INTO usuarios(name,email,password,roll,fecha_crea,telefono_cel,telefono_of,ext,departamento,perfil) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "','" . $roll . "', '" . $mifecha . "','" . $telefono_cel . "','" . $telefono_of . "','" . $ext . "','" . $departamento . "','" . $perfil . "')")) {
			//$successmsg = "¡Registrado exitosamente! <a href='login.php'>Click here to Login</a>";
			$successmsg = '
			  <div class="alert alert-success alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>EXITO.!</strong> ¡Registrado exitosamente!
			  </div>
			  ';
		} else {
			//$errormsg = "Error de registro. Vuelve a intentarlo más tarde.";
			$errormsg = '
			<div class="alert alert-danger alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Error de registro.!</strong> Verifica tus datos.
			</div>
			';
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Registro Usuario</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="stylesheet" href="css/style.css">
	<!--link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" /-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
		integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
		crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

</head>

<body>

	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- add header -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="../index.php"
					style="font-family: 'Lobster', cursive;"><!--<img src="image/logo-HA.png" alt="HA" width="110px"  >---></a>
			</div>
			<!-- menu items -->
			<div class="collapse navbar-collapse" id="navbar1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">Login</a></li>
					<li class="active"><a href="register.php">Registro</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 well">
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
					<fieldset>
						<legend>Registro</legend>

						<div class="form-group">
							<label for="name">Nombre Completo</label>
							<input type="text" name="name" placeholder="Nombres Completos" required
								value="<?php if ($error)
									echo $name; ?>" class="form-control" />
							<span class="text-danger">
								<?php if (isset($name_error))
									echo $name_error; ?>
							</span>
						</div>

						<div class="form-group">
							<label for="name">Email</label>
							<input type="email" name="email" placeholder="Correo Electrónico" required
								value="<?php if ($error)
									echo $email; ?>" class="form-control" />
							<span class="text-danger">
								<?php if (isset($email_error))
									echo $email_error; ?>
							</span>
						</div>

						<div class="form-group">
							<label for="name">Contraseña</label>
							<input type="password" name="password" placeholder="Contraseña" required
								class="form-control" />
							<span class="text-danger">
								<?php if (isset($password_error))
									echo $password_error; ?>
							</span>
						</div>

						<div class="form-group">
							<label for="name">Repita Contraseña</label>
							<input type="password" name="cpassword" placeholder="Confirmar Contraseña" required
								class="form-control" />
							<span class="text-danger">
								<?php if (isset($cpassword_error))
									echo $cpassword_error; ?>
							</span>
						</div>

						<div class="form-group">
							<label for="name">Usuario o Administrador </label>
							<select type="text" name="roll" placeholder="selecciona" required class="form-control"
								value="<?php echo $_POST["roll"]; ?>" />
							<option value="0">Selecciona una opcion</option>
							<option value="1">Usuario</option>
							<option value="2">Administrador</option>
							</select>
						</div>

						<div class="form-group">
							<label for="perfil">Perfil</label>

							<select type="text" name="perfil" placeholder="selecciona" required class="form-control" >
							<option value="">Selecciona una opcion</option>
							<?php
							$con = new mysqli('localhost', 'root','1234', 'control2');
							$v = mysqli_query($con, "SELECT DISTINCT perfil FROM perfil WHERE status = '0'");
							
							while ($row = mysqli_fetch_row($v)) {
								?>
								<option value="<?php echo $row['0']; ?>"><?php echo $row['0']; ?></option>
							
							<?php }?>
							</select>
						</div>		

						<div class="form-group">
							<label for="name">Telefono Celular</label>
							<input type="text" name="telefono_cel" placeholder="Telefono celular" required
								class="form-control" />
						</div>
						<div class="form-group">
							<label for="name">Telefono Oficina</label>
							<input type="text" name="telefono_of" placeholder="Telefono Oficina" required
								class="form-control" />
						</div>
						<div class="form-group">
							<label for="name">Extencion</label>
							<input type="text" name="ext" placeholder="Extencion" required class="form-control" />
						</div>




						<div class="checkbox">
							<label>
								<input type="checkbox" name="terminosycond" id="terminosycond" required=""> Acepto todos
								los
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
									data-target="#TernimosCondiciones">
									Terminos y condiciones
								</button>
								<br>
								<span class="text-danger">
									<?php if (isset($terminosycond_error))
										echo $terminosycond_error; ?>
								</span>
							</label>
						</div>

						<div class="form-group">
							<input type="submit" name="signup" value="Registrar" class="btn btn-primary" />
						</div>
					</fieldset>
				</form>
				<span class="text-success">
					<?php if (isset($successmsg)) {
						echo $successmsg;
					} ?>
				</span>
				<span class="text-danger">
					<?php if (isset($errormsg)) {
						echo $errormsg;
					} ?>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 text-center">
				Ya te registaste? <a href="login.php">Logeate Aqui</a>
			</div>
		</div>
	</div>

	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>


<!-- Modal -->
<div class="modal fade" id="TernimosCondiciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">
					<b>Terminos y Condiciones </b>
				</h4>
			</div>
			<div class="modal-body">
				Esta es una prueba de lo que podriamos poner para los terminos y condiciones de la paguina que hagamos
				<br>
				<br>
				<p>
					<b>Uso de la cuenta de usuario en xxxxxxxxxxxxxx </b>
				</p>
				<p>
				<ul>
					<li>El usuario de xxxxxxxxxxxxxx se compromete a proporcionar mediante su registro datos veraces,
						exactos y completos sobre su identidad. También se compromete a revisar periódicamente la
						información proporcionada y garantiza la validez y la vigencia de los datos asociados tanto a su
						cuenta de usuario como a los productos y servicios contratados. El incumplimiento de esta
						condición podrá motivar la cancelación de la cuenta y la denegación al usuario el acceso a los
						servicios de Registros.com de forma temporal o permanente.</li>
					<li>xxxxxxxxxxx se reserva el derecho de solicitar la verificación y / o actualización de la
						información proporcionada por el Cliente, quien deberá responder satisfactoriamente a la
						petición de xxxxxxxxxxxxxx en el plazo máximo de 5 días laborables. El Cliente entiende y acepta
						que el no cumplimiento de este requisito constituye una vulneración del presente Acuerdo y puede
						dar lugar a la cancelación de los productos y/o servicios cont...</li>
					<br>
					<a href="#" class="btn btn-default btn-xs">
						<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> Descargar PDF
					</a>
				</ul>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				<!--button type="button" class="btn btn-primary">Guardar Cambios</button-->
			</div>
		</div>
	</div>
</div>

<script>
	//Modal terminos y condiciones
	$('#TernimosCondiciones').on('shown.bs.modal', function () {
		$('#myInput').focus()
	})
</script>