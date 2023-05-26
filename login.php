<?php
require_once "funciones.php";
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php //if ($title) { echo $title . ' - ';} //
			?>Plans For Today</title>
	<link rel="icon" href="./img/logos/8.svg" sizes="any" type="image/svg+xml">
	<!-- CSS only -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/my-login.css">
	<?php

	if (isset($_POST['login-submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		if (!empty($email) && !empty($password)) {
			// Validaci&oacute;n de usuario contra la bbdd
			if (!validarLoginUsuario($email, $password, $conexion, $mensaje)) {
				$mensaje = lanzarError($mensaje);
			} else {
				$mensaje = lanzarExito("Usuario identificado correctamente");
				// Iniciamos la sesi&oacute;n
				session_start();
				// Metemos el login de usuario en la sesi&oacute;n
				$_SESSION['usuario'] = $email;
				// Registramos la fecha hora de conexion
				//print "<p>hora conexion " . getNow() . "</p>";
				$_SESSION['conexion'] = getNow();
				header("refresh:1;url=index.php");
			}
		} else {
			$mensaje = lanzarError("Debe rellenar los campos usuario y contraseña.");
		}
	}
	?>
</head>

<body class="my-login-page">
	<?php
	theHeader();
	echo $mensaje;
	?>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logos/7.svg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Iniciar Sesión</h4>
							<form method="POST" class="my-login-validation" action="<?php $_SERVER['PHP_SELF']; ?>">
								<div class="form-group">
									<label for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>" required autofocus>
									<div class="invalid-feedback">
										Email no es valido
									</div>
								</div>

								<div class="form-group">
									<label for="password">Contraseña
										<a href="forgot.php" class="float-right">
											¿Olvidaste la contraseña?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>" required data-eye>
									<div class="invalid-feedback">
										Es necesaria la contraseña para iniciar sesión
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Recuerdame</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" name="login-submit" class="btn btn-primary btn-block">
										Iniciar Sesión
									</button>
								</div>
								<div class="mt-4 text-center">
									¿No tienes cuenta? <a href="register.php"><strong> Registrate </strong></a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	theFooter();
	?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="./js/my-login.js"></script>
</body>


</html>