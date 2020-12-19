<?php 
include "../cabecera.php";
include "menuVend.php";
include "../../Controller/ctr.ventas.php";
include "../../Controller/ctr.vendedor.php";
include "../../Model/conexion.php";
$ust=$userSession->getCurrentUser();
$ven = new ControladorVendedor($ust);
$control = new ControladorVentas();
 ?>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Inicio Tienda</title>
 </head>
 <style>				
		* {
			box-sizing: border-box;
		}
		body {
			font-family: Arial, Helvetica, sans-serif;
			background-color: lightgray;
		}
		/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
		@media (max-width: 600px) {
			nav, article {
				width: 100%;
				height: auto;
			}
		}
		i {
			font-size: 40px;
			padding: 10px;
		}
		ip {
			font-size: 25px;
			padding: 10px;
		}
		inv{
			font-size: 90px;
			padding: 10px;
		}
		iac{
			font-size: 30px;
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
		.bp{
			text-align: center;
		}
		
		.control{
			background-color: white;
			text-align: left;
			width: 450px;	
			border: 2px solid gray;	
			margin: auto;
			margin-left: 550px;	
			padding-left: 10px;
		}
	</style>
<body>
 		<article>
 			<h1>TIENDA</h1>
 			<button data-toggle="modal" data-target="#Ventas" class="btn btn-dark" style="text-align: center; width: 95px; margin-left: -890px" ><i style="font-size: 50px" class="fas fa-cash-register"></i></button>
 			<div class="control">
					<h4>Total de prendas vendidas:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 0; ?></h4>
					<h4>Cantidad de prendas procesadas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 0; ?></h4>
			</div>					
 		</article>
 <!-- Modal -->
<div class="modal fade" id="Ventas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="background-color: gray;width: 400px; margin: auto">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color: white">Registro de ventas</h5>
				<button type="button" style="width: 60px; margin-left: 20px; color: white" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST">
				<div class="modal-body" style="color: white; text-align: center;">
					Ingrese cantidad de prendas vendidas:
					<input style="border-color: white; width: 70px" type="number" min="1" name="cpv">
					<br><br>
					Ingrese fecha de venta:
					<input type="date" id="fechaV" name="fechaV">
				</div>
				<div class="modal-footer">
					<button type="submit" name="pv" class="btn btn-light" style="width: 170px">Procesar venta</button>
				</div>
			</form>
			<?php 
			if (isset($_POST['pv'])) {
				$ca=$_POST['cpv'];
				$f=$_POST['fechaV'];
				if (!empty($ca) && !empty($f)) {
					$control->construct($ca);
					$idv=$ven->ctrGetID();
					$control->ctrInsertVenta($idv,$_POST['fechaV']);
					?>
					<script>
					window.location.href='tienda.php?cpv=<?php echo $ca; ?>&c=&v=<?php echo $idv; ?>'</script>
					<?php 
				}
			}			
			 ?>
		</div>
	</div>
</div>
 </body>
 </html>