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
	<link rel="stylesheet" href="./css/registro.css">
	<?php

	/**
	 * -------------------------------------
	 * ---------- NUEVO USUARIO ------------
	 * -------------------------------------
	 */

	if (isset($_POST['new-user-submit'])) {

		$resutado = false;

		$nombre = $_POST['name'];
		$password = $_POST['password'];
		$password_confirm = $_POST['confirm-password'];
		$email = $_POST['email'];


		// Validamos los campos
		if (validarNuevoUsuario($password, $password_confirm, $email, $mensaje)) {
			// Comprobamos que el usuario no exista en bbdd
			$objUsuario = buscarUsuarioEnBd($email, $conexion, $mensaje);
			if ($objUsuario == null) {
				if (insertarUsuario($nombre, $password, $email, $conexion, $mensaje)) {
					// Alta en bbdd correcta!
					$mensaje = lanzarExito("Usuario creado con &eacute;xito");
					header("refresh:3;url=index.php");
				}
			} else {
				$mensaje = lanzarError("El usuario ya se encuentra registrado en la base de datos ");
			}
		} else {
			$mensaje = lanzarError($mensaje);
		}
	}
	?>
</head>

<body class="my-login-page">
	<?php
	theHeader($conexion);
	echo $mensaje;
	?>


	<section class="h-100 ">
		<div class="container h-100 ">

			<div class="row justify-content-md-center h-100">

				<div class="card-wrapper  mt-4">
					<div class="brand">
						<img src="img/logos/7.svg" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title text-center">Registro</h4>
							<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="name">Nombre</label>
									<input id="name" type="text" class="form-control" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required autofocus>
									<div class="invalid-feedback">
										¿Como te llamas?
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
									<div class="invalid-feedback">
										Tu e-mail no es valido
									</div>
								</div>

								<div class="form-group">
									<label for="password">Contraseña</label>
									<input id="password" type="password" class="form-control" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" required data-eye>
									<div class="invalid-feedback">
										La contraseña es obligatoria
									</div>
								</div>
								<div class="form-group">
									<label for="password">Repite la contraseña</label>
									<input id="confirm-password" type="password" class="form-control" name="confirm-password" value="<?php if (isset($_POST['confirm-password'])) echo $_POST['confirm-password']; ?>" required data-eye>
									<div class="invalid-feedback">
										La contraseña es obligatoria
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">Estoy de acuerdo con <a id="openModalBtn" href="#" data-toggle="modal" data-target="#modal">Términos y Condiciones</a></label>
										<div class="invalid-feedback">
											Tienes que leer y aceptar nuestros Terminos y Condiciones
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" name="new-user-submit" id="new-user-submit" class="btn btn-primary btn-block">
										Registrame
									</button>
								</div>
								<div class="mt-4 text-center">
									¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a>
								</div>

							</form>
							<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalLabel">Términos y Condiciones</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>Aquí van los términos y condiciones de Plans For Today...</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet, risus sed cursus commodo, lorem odio bibendum purus, a dapibus quam justo sed lorem. Duis vel leo ligula. Mauris volutpat metus vitae dolor lobortis efficitur.</p>
											<p>...</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
											<a id="acceptBtn" href="#" class="btn btn-primary" data-dismiss="modal">Aceptar</a>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		document.getElementById("acceptBtn").addEventListener("click", function() {
			var agreeCheckbox = document.getElementById("agree");
			agreeCheckbox.checked = true;
		});
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="./js/my-login.js"></script>
	<?php
	theFooter();
	?>
</body>


</html>