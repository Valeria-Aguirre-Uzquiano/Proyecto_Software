<?php
include '../Controller/ctr.signin.php';
include '../Model/conexion.php';
$registro = new ControladorSignin();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sign in</title>
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
		.container{
			margin: auto;
			margin-top: 80px;
			background-color: white; 
			width: 500px;
			height: 500px;
			text-align: center;
		}
		.quest{
			width: 470px;
			height: 270px;
		}
		.celdas{
			margin: auto;
			margin-left: 20px;
			width: 250px;
			height: 150px;
			padding: 10px;
		}
		.opcion{
			margin: auto;
			margin-left: 230px;
			margin-top: -162px;
			width: 190px;
			height: 80px;
			padding: 10px;
		}
	</style>
</head>

<body>
	<!--CONTENIDO	-->
<div class="container">
	<img src="../img/logo.png" style="padding-top: 15px">
	<h2 >Crear nueva cuenta</h2>
	<h5>Por favor ingresa tus datos:</h5>
	<div class="quest">
		<form method="POST">
			<div class="celdas">
				<td><input style="border:2px solid gray;" type="text" class="form-control" placeholder="Nombre de Usuario" name="user"></td>
				<td><input style="border:2px solid gray;" type="id" class="form-control" placeholder="Carnet de Identidad" name="ci"></td>
				<td><input style="border:2px solid gray;" type="email" class="form-control" placeholder="Email" name="email"></td>
				<td><input style="border:2px solid gray;" type="password" class="form-control" placeholder="Contraseña" name="pwd"></td>		
				<div class="opcion">
					<th>Rol que desempeña:</th>
					<div class=" custom-control custom-radio custom-control">
						<input type="radio" class="custom-control-input" id="customRadio" name="opcion" value="Administrador">
						<label class="custom-control-label" for="customRadio">Administrador</label>
					</div>
					<div class="custom-control custom-radio custom-control" style="padding-right: 53px">
						<input type="radio" class="custom-control-input" id="customRadio2" name="opcion" value="Vendedor">
						<label class="custom-control-label" for="customRadio2">Ventas</label>
					</div>
					<div class="custom-control custom-radio custom-control" style="padding-right: 46px">
						<input type="radio" class="custom-control-input" id="customRadio3" name="opcion" value="Bodeguero">
						<label class="custom-control-label" for="customRadio3">Bodega</label>
					</div>
				</div>				
			</div>			
			<button type="submit" class="btn btn-secondary" style="margin-top: 25px; margin-left: center" name="crear">Crear cuenta</button>
			<br>
			<button type="submit" class="btn btn-secondary" style="margin-top: 10px; margin-left: center" name="login">Ya tienes una cuenta? Iniciar sesión</button>
			<?php 	
			if (isset($_POST['login'])) {
				header("location:..");
			}elseif (isset($_POST['crear'])) {	
				$registro-> formulario();			
				$registro->ctrRegistrarse();
			}
			?>
		</form>
	</div>
</div>
</body>
</html>
