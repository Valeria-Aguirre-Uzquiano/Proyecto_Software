<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>
	<!-- PLUGINS CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


	<!-- PLUGINS JS -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script src="https://kit.fontawesome.com/be9b253a7d.js" crossorigin="anonymous"></script>

	<style>
		body{
			background-color: gray; 
		}
	</style>
</head>

<body>

	<!--CONTENIDO	-->
<div class="modal-dialog text-center">
	<div class="container py-5">
		<div class="modal-content">
			<div class="col-12" style="padding-top: 15px">
				<img src="../../sist_inventario/View/img/logo.png">
			</div>	
			<form class="col-12" method="POST" >
				<div class="form-group">
					<div class="container py-3">
						<h2>Bienvenido</h2>
						<h4>Registrate por favor:</h4>
					</div>
					
					<input style="border:2px solid gray;" type="text" class="form-control" placeholder="Nombre de Usuario" id="name" name="nom">
				</div>
				<div class="form-group">
					<input style="border:2px solid gray;" type="password" class="form-control" placeholder="Contraseña" id="password" name="pwd">
				</div>
				<button type="submit" name="submit" class="btn btn-secondary">Iniciar Sesión</button>
				<div class="container py-2"></div>
				<button type="submit" class="btn btn-secondary" name="registrar">Aun no te registras? Crear cuenta</button>
				<div class="container py-2"></div>
			</form>	
			<?php 
			if (isset($_POST['registrar'])) {
				header("location:../sist_inventario/view/crear_cuenta.php");
			}else{
				$ingreso = new ControladorLogin();
				$ingreso ->ctrIngreso();
			}
			?>
		</div>
	</div>
</div>
</body>
</html>