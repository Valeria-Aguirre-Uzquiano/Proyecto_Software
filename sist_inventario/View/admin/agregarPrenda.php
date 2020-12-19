<?php 
include "../cabecera.php";
include "menuAdmi.php";
include "../../Controller/ctr.prendas.php";

$ins= new ControladorPrendas();
$ins->crtGetClass();
 ?>
  <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar prenda</title>
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
			background-color: lightgray;
		}		
		* {
			box-sizing: border-box;
		}

		body {
			font-family: Arial, Helvetica, sans-serif;
		}
		article {
			float: right;
			padding: 20px;
			width: 80%;
			background-color: lightgray;
			text-align: center;
		}
		.container{
			margin: auto;
			margin-top: 10px;
			width: 500px;
			background-color: gray;
			padding: 5px;
			text-align: center;
		}
		.titulo{	
			margin: auto;
			margin-left: 20px;		
			color: white;
		}
		
		select{
			width: 200px;
		}
		form{
			margin: auto;
		}
		label{
			color: white;
		}
		.des{
			width: 410px;
		}

	</style>
</head>
<body>
	<article>
		<div class="modal-dialog">	
			<div class="modal-content" style="background-color: gray;">
				<div class="modal-header" >
					<h4 class="modal-title" style="color: white; margin: auto">Agregar prenda</h4>
				</div>
		<form method="POST">	
			<div class="modal-body" style="color: white">	
				<input style="border:2px solid black;" type="text" id="cod" name="cod" placeholder="Ingrese código" >
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input style="width: 120px; border:2px solid black;" type="number" min="0" placeholder="Stock" id="stock" name="stock">
				<label >unid.</label>
				<br>
				<?php 		
				$host="localhost:3306";
				$usuario="root";
				$clave="root";
				$bd="sistemainventario";
				$conexion= mysqli_connect($host,$usuario,$clave,$bd);
				$query=mysqli_query($conexion,"SELECT * FROM categoría");
				echo "<input list='cat' type='search'style='border:2px solid black;margin-left:-10px' placeholder='Seleccione categoría' name='cate'>";
				echo "<datalist id='cat'>";
					while ($row=mysqli_fetch_array($query)) {
						echo "<option>$row[categoría]</option>";
					}
				echo "</datalist>";
				mysqli_close($conexion);
				 ?>
	  			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  			<input style="width: 120px;border:2px solid black;" type="text" placeholder="Precio de venta" id="precio" name="precio">
	  			<label>Bs.</label>
  				<input style="border:2px solid black;" class="des" type="text" placeholder="Descripción..." id="des" name="des">
			</div>	
			<div class="modal-footer" >
	  			<button style="width: 85px" class="btn btn-light" type="submit" name="insP">Guardar</button>
	  			&nbsp;&nbsp;&nbsp;
	  			<button style="width: 90px" class="btn btn-light" type="submit" name="volverG">Cancelar</button>
  			</div>
  		</form>
		</div>
	</div>
		<?php  
		if (isset($_POST['insP'])) {
			$ctr=$ins->construct($_POST['cod'],$_POST['stock'],$_POST['cate'],$_POST['precio'],$_POST['des']);
			if ($ctr==true) {
				$ins->ctrInsertPrenda();
				if ($ins) {
					$ins->ctrInsertMovP($_GET['a'],$_POST['cod']);
					?><script type="text/javascript">alert("Registro guardado");
					window.location.href='vistaGeneralAd.php'</script><?php 
				}else{
					echo '<div class="alert-danger">Error al guardar</div>';
				}
			}else{
				echo '<div class="alert-danger">Por favor llena el formulario correctamente</div>';
			}
			
		}elseif (isset($_POST['volverG'])) {
			?><script type="text/javascript">
				window.location.href='vistaGeneralAd.php'</script><?php 
		}
		?>
	</article>
</body>
</html>


							
							
			