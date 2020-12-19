<?php 
include "../cabecera.php";
include "menuAdmi.php";
include "../../Controller/ctr.prendas.php";
$mostrar=new ControladorPrendas();
$mostrar->crtGetClass();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Control Stock</title>
	<!-- PLUGINS CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<style>
		body{
			background-color: lightgray;
			font-family: Arial, Helvetica, sans-serif;
		}		
		* {
			box-sizing: border-box;
		}
		article {
			float: right;
			padding: 20px;
			width: 80%;
			background-color: lightgray;
			text-align: center;
		}
		
		/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
		@media (max-width: 600px) {
			nav, article {
				width: 100%;
				height: auto;
			}
		}
		iac{
			font-size: 30px;
		}
		.rec{
			background-color: white;
			margin: auto;
			width: 500px;
			height: 95px;
			border: 2px solid gray;
		}
		table{
			width: 100%;
		}
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
		th, td {
		  padding: 5px;
		  text-align: center;
		}
		#t01 tr:nth-child(even) {
		  background-color: #eee;
		}
		#t01 tr:nth-child(odd) {
		 background-color: #fff;
		}
		#t01 th {
		  background-color: black;
		  color: white;
		}
		.scrollable{
			height: 300px;			
			overflow-y: scroll;
		}
	</style>
</head>
<body>
	<article>
			<?php 			
			$con=$mostrar->ctrCountMin();
			 ?>
			<h1>Inventario de Prendas</h1>
			<div class="rec">				
				<h4>Prendas con stock por debajo del mínimo:</h4>
				<h1 style="color: tomato"><?php echo $con; ?></h1>							
			</div>
			<br><br>
			<div class="scrollable">
			<table id="t01" method="POST">
				<tr>
					<th>Código</th>
					<th>Descripción</th> 
					<th>Categoría</th>
					<th>Stock</th>
					<th>Precio</th>
					<th>Agregación</th>
					<th>Acciones</th>
				</tr>
				<?php 
				
				$fila=$mostrar->ctrSelectMin();?>
				<tr>
					<?php foreach ($fila as $row) {?>
					<td><?php echo $row[0]?></td>
					<td><?php echo $row[4]?></td>
					<td><?php echo $row[1]?></td>
					<td><?php echo $row[2]?></td>
					<td><?php echo $row[3]?></td>
					<td><?php echo $row[5]?></td>
					<td><?php echo "<a href='modificarPrenda.php?id=".$row[0]."&a=".$a."'><button style='text-align: center; width: 50px' class='btn btn-light'><iac class='fas fa-edit'></iac></button></a>
					<a href='eliminarPrenda.php?id=".$row[0]."&a=".$a."'><button style='text-align: center; width: 50px' class='btn btn-light' data-toggle='modal' data-target='#Confirmar'><iac class='fas fa-trash-alt'></iac></button>";
					?>
					</td>
				</tr>
				<?php   }	?>
			</table>
			</div>
	</article>
</body>
</html>
