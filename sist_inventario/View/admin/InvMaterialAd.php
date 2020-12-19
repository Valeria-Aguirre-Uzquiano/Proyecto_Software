<?php 
include "../cabecera.php";
include "menuAdmi.php";
include "../../Controller/ctr.material.php";
$mostrar = new ControladorMaterial();
$mostrar->ctrGetClass();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Consulta Material</title>
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
			height: 110px;
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
			<h1>Inventario de Material</h1>
			<a href="agregarMaterial.php?a=<?php echo $a ?>"><button style="text-align: center; width: 135px; margin-left: -900px" >Agregar Material</button></a>
			<form method="POST">
			<?php 		
			$host="localhost:3306";
			$usuario="root";
			$clave="root";
			$bd="sistemainventario";
			$conexion= mysqli_connect($host,$usuario,$clave,$bd);
			$query=mysqli_query($conexion,"SELECT * FROM clasificación");
			echo "<input list='cla' type='search' style='border:2px solid black;margin-left: -20px; margin-top: 5px'
			 placeholder='Filtrar clasificación' name='clas'>";
			echo "<datalist id='cla'>";
				while ($row=mysqli_fetch_array($query)) {
					echo "<option>$row[clasificación]</option>";
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
				 <a href="../../Model/excelMaterial.php" class="btn btn-dark" style=" width: 135px;height: 60px;border: 2px solid gray; text-align: left;"><i style="font-size: 25px;" class="far fa-file-excel"></i>Exportar</a>
			 </form>
			<br>
			<div class="scrollable">
			<table id="t01" method="POST">
				<tr>
					<th>Código</th>
					<th>Descripción</th> 
					<th>Clasificación</th>
					<th>Cantidad</th>
					<th>Agregación</th>
					<th>Acciones</th>
				</tr>
				<?php 
				if (isset($_POST['filtrar'])) {
			 		$fc=$_POST['clas'];
			 	}else{
			 		$fc="";
			 	}				
				$mostrar->ctrSetCla($fc);
				$fila=$mostrar->ctrSelectAll();?>
				<tr>
					<?php foreach ($fila as $row) {?>
					<td><?php echo $row[0]?></td>
					<td><?php echo $row[3]?></td>
					<td><?php echo $row[1]?></td>
					<td><?php echo $row[2]?></td>
					<td><?php echo $row[4]?></td>
					<td><?php echo "<a href='modificarMaterial.php?id=".$row[0]."&a=".$_GET['a']."'><button style='text-align: center; width: 50px' class='btn btn-light'><iac class='fas fa-edit'></iac></button></a>
					<a href='eliminarMaterial.php?id=".$row[0]."&a=".$_GET['a']."'><button style='text-align: center; width: 50px' class='btn btn-light'><iac class='fas fa-trash-alt'></iac></button>";
					?>
					</td>
				</tr>
				<?php   }	?>
			</table>
			</div>
		</article>
</body>
</html>