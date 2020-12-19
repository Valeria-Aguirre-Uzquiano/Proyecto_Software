<?php 
include_once '../../Model/modelo.sesion.php';
include_once '../../Controller/ctr.roles.php';
$userSession = new Session();
$ust=$userSession->getCurrentUser();
$ctrRol = new Rol($ust);
$rol=$ctrRol->ctrgetRol();
if ($rol!='Vendedor') {
	header("location: ../index.php");
	$userSession->closeSession();
}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="viewport" content="width=device-width, initial-scale=1">
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
				
		* {
			box-sizing: border-box;
		}

		body {
			font-family: Arial, Helvetica, sans-serif;
		}
		/* Create two columns/boxes that floats next to each other */
		nav {
			float: left;
			width: 20%; 
			background: lightgray;
			border:2px solid #666;

		}

		/* Style the list inside the menu */
		nav ul {
			list-style-type: none;
			padding: 5px;
		}
		/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
		@media (max-width: 600px) {
			nav, article {
				width: 100%;
				height: auto;
			}
		}
		
		ip {
			font-size: 23px;
			padding: 10px;
		}
		inv{
			font-size: 90px;
			padding: 10px;
		}
		button{
			width: 267px;
			background-color: white;
		}
		.links a{
			text-align: center;
			text-decoration: none;
			background-color: white;
			color: black;
			border-bottom: 1px solid #666;
			display: block;
			padding:  5px;			
		}
		.links {
			background-color: #f9f9f9;
			display: none;
		}
		.links a:hover{
			background-color: #f1f1f1;
		}
		.desplegable:hover.links{
			display: block;
		}
		.desplegable:hover .links{
			display: block;
		}
	</style>
</head>
<body>	
	<section>
		<nav >
			<i  style="font-size: 30px" class="fas fa-user-circle "><?php echo  $ust; ?><br>Vendedor</i>
			<a href="inicioVend.php"><button type="submit"><ip class="fas fa-home"> Inicio</ip></button></a>
			<a href="../logout.php"><button ><ip class="fas fa-sign-out-alt"> Salir</i></button></a>	
		</nav>
	</section>	
</body>
</html>