<?php 
include "../cabecera.php";
include "menuBode.php";
include "../../Controller/ctr.material.php";
$mostrar = new ControladorMaterial();
$mostrar->ctrGetClass();
 ?>
  <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Inventario de material</title>
 </head>
 <style>
				
		* {
			box-sizing: border-box;
		}

		body {
			font-family: Arial, Helvetica, sans-serif;
			background-color: lightgray;
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
		.desplegable:hover .links{
			display: block;
		}
		.bp{
			text-align: center;
		}
		.des{
			width: 410px;
		}
		table{
			width: 98%;
			margin-left: 20px;
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
 <body>
 	<section>
 		<article>
 			<h1>Inventario de Material</h1>
 			<form method="POST">
			<?php 		
			$host="localhost:3306";
			$usuario="root";
			$clave="root";
			$bd="sistemainventario";
			$conexion= mysqli_connect($host,$usuario,$clave,$bd);
			$query=mysqli_query($conexion,"SELECT * FROM clasificación");
			echo "<input list='cla' type='search' style='border:2px solid black;margin-left: -765px; margin-top: 5px'
			 placeholder='Filtrar clasificación' name='clas'>";
			echo "<datalist id='cla'>";
				while ($row=mysqli_fetch_array($query)) {
					echo "<option>$row[clasificación]</option>";
				}
			echo "</datalist>";
			mysqli_close($conexion);
			 ?>
			 <button name= "filtrar"style=" width: 60px; " >Filtrar</button>
			 </form>
			<br><br>
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
					<td><?php echo "<a href='mMaterialB.php?id=".$row[0]."&b=".$_GET['b']."'><button style='text-align: center; width: 50px' class='btn btn-light'><iac class='fas fa-edit'></iac></button></a>"
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