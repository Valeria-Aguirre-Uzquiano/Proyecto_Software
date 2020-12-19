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

	<title>Vista General</title>
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
			width: 400px;
			height: 80px;
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
	<section>
		<article>
			<?php 			
			$con=$mostrar->ctrCountMin();
			 ?>
			<h1>Inventario de Prendas</h1>
			<form action="stockMin.php">
				<button class="rec">
					<h5>Prendas con stock por debajo del mínimo:</h5>
				<h2 style="color: tomato"><?php echo $con; ?></h2>
				</button>				
			</form>
			<br>
				<a href="agregarPrenda.php?a=<?php echo $a ?>"><button style="text-align: center; width: 130px; margin-left: -900px" >Agregar prenda</button></a>
				<form method="POST">
				<?php 		
				$host="localhost:3306";
				$usuario="root";
				$clave="root";
				$bd="sistemainventario";
				$conexion= mysqli_connect($host,$usuario,$clave,$bd);
				$query=mysqli_query($conexion,"SELECT * FROM categoría");
				echo "<input list='cat' type='search' style='border:2px solid black;margin-left: -16px; margin-top: 5px' placeholder='Filtrar categoría' name='cate'>";
				echo "<datalist id='cat'>";
					while ($row=mysqli_fetch_array($query)) {
						echo "<option>$row[categoría]</option>";
					}
				echo "</datalist>";
				mysqli_close($conexion);
				 ?>
				 <button name= "filtrar"style=" width: 60px; " >Filtrar</button>
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 <a href="../../Model/excelPrenda.php" class="btn btn-dark" style=" width: 135px;height: 60px;border: 2px solid gray; text-align: left;"><i style="font-size: 25px;" class="far fa-file-excel"></i>Exportar</a>
				 </form>				 
			<br>
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
				if (isset($_POST['filtrar'])) {
			 		$fc=$_POST['cate'];
			 		
			 	}else{
			 		$fc="";
			 	}
			 	$mostrar->ctrSetCat($fc);
				$fila=$mostrar->ctrSelectAll();?>
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
	</section>
</body>
</html>
