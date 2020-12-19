<?php 
include "../cabecera.php";
include "menuAdmi.php";
include "../../Controller/ctr.material.php";
$mat =new  ControladorMaterial();
$mat->ctrGetClass();
$result=$mat->ctrSelectMaterial($_GET['id']);
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar Material</title>
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
					<h4 class="modal-title" style="color: white; margin: auto">Modificar Material</h4>
				</div>	
			<form method="POST">
			<div class="modal-body" style="color: white">	
				<?php 		
				$host="localhost:3306";
				$usuario="root";
				$clave="root";
				$bd="sistemainventario";
				$conexion= mysqli_connect($host,$usuario,$clave,$bd);
				$query=mysqli_query($conexion,"SELECT * FROM clasificación");
				echo "<input list='cla' type='search' style='border:2px solid black;margin-left:-16px;width: 212px;'
				 placeholder='Seleccione clasificación' name='clai' value='".$result[1]."' readonly>";
				echo "<datalist id='cla'>";
					while ($row=mysqli_fetch_array($query)) {
						echo "<option>$row[clasificación]</option>";
					}
				echo "</datalist>";
				mysqli_close($conexion);
				 ?>				
	  			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  			<input style="width: 120px; border:2px solid black;" type="number" min="0" placeholder="Cantidad" id="cant" name="canti" value="<?php echo $result[2]?>">
				<br><br>
		  		<input style="border:2px solid black;" class="des" type="text" placeholder="Descripción..." id="des" name="desi" value="<?php echo $result[3]?>">
		  		</div>					
				<div class="modal-footer" >
		  			<button style="width: 85px" class="btn btn-light" type="submit" name="modM">Guardar</button>
		  			&nbsp;&nbsp;&nbsp;
		  			<button style="width: 90px" class="btn btn-light" type="submit" name="volverC">Cancelar</button>
		  		</div>
  		</form>
	</div>
</div>	
		<?php  
		if (isset($_POST['modM'])) {
			$mat->construct($_POST['clai'],$_POST['canti'],$_POST['desi']);
			$mat->ctrEditarMaterial($_GET['id']);
			if ($mat) {
				$mat->ctrInsertMovM($_GET['a'],$_GET['id']);
				?><script type="text/javascript">alert("Cambio guardado");
				window.location.href='InvMaterialAd.php?a=<?php echo $_GET['a']?>'</script><?php 
			}else{
				echo '<div class="alert-danger">Error al guardar</div>';
			}
		}elseif (isset($_POST['volverC'])) {
			?><script type="text/javascript">
				window.location.href='InvMaterialAd.php?a=<?php echo $_GET['a']?>'</script><?php 
		}
		?>
		</article>
	</section>
</body>
</html>