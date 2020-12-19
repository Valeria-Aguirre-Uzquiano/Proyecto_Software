<?php include "../cabecera.php";
include "menuVend.php";
include "../../Controller/ctr.prendas.php";
include "../../Controller/ctr.ventas.php";
include "../../Controller/ctr.vendedor.php";
include "../../Model/conexion.php";
$c=new ControladorVentas();
$c->setCont($_GET['c']);
$pren =new ControladorPrendas();
$pren->crtGetClass();
$result=$pren->ctrSelectPrenda($_GET['id']);
$ca=$_GET['t'];
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar prenda</title>
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
					<h4 class="modal-title" style="color: white; margin: auto">Modificar prenda</h4>
				</div>	
		<form method="POST">	
		<div class="modal-body" style="color: white">			
			<input style="border:2px solid black;" type="number" id="cod" name="codi" value="<?php echo $_GET['id']?>" readonly>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input style="width: 120px; border:2px solid black;" type="number" min="0" placeholder="Stock" id="stock" name="stocki" value="<?php echo $result[2]?>">
			<label >unid.</label>
			<br>
			<?php 		
			$host="localhost:3307";
			$usuario="root";
			$clave="";
			$bd="sistema-inventario";
			$conexion= mysqli_connect($host,$usuario,$clave,$bd);
			$query=mysqli_query($conexion,"SELECT * FROM categoría");
			echo "<input readonly list='cat' type='search' style='border:2px solid black;margin-left: -10px'
			 placeholder='Seleccione categoría' name='cati' value='".$result[1]."'>";
			echo "<datalist id='cat'>";
				while ($row=mysqli_fetch_array($query)) {
					echo "<option>$row[categoría]</option>";
				}
			echo "</datalist>";
			mysqli_close($conexion);
			 ?>
  			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  			<input  readonly style="width: 120px;border:2px solid black;" type="text" placeholder="Precio de venta" id="precio" name="pi" value="<?php echo $result[3]?>">
  			<label>Bs.</label>
			<br>
	  		<input readonly style="border:2px solid black;" class="des" type="text" placeholder="Descripción..." id="des" name="desi" value="<?php echo $result[4]?>">
  			</div>					
			<div class="modal-footer" >
	  			<button style="width: 85px" class="btn btn-light" type="submit" name="modP">Guardar</button>
	  			&nbsp;&nbsp;&nbsp;
	  			<button style="width: 90px" class="btn btn-light" type="submit" name="volverG">Cancelar</button>
  			</div>
  		</form>
	</div>
</div>	
		<?php  
		if (isset($_POST['modP'])) {
			$dif=($result[2]-$_POST['stocki']);
			$c->contador($dif);
			$cont=$c->getCont();
			
			$pren->construct($_POST['codi'],$_POST['stocki'],$_POST['cati'],$_POST['pi'],$_POST['desi']);
			$pren->ctrEditarPrenda();
			if ($pren) {
				$pren->ctrInsertMovP($_GET['v'],$_GET['id']);
				?><script type="text/javascript">alert("Cambio guardado");
				window.location.href='tienda.php?cpv=<?php echo $ca; ?>&c=<?php echo $cont; ?>&v=<?php echo $_GET['v']; ?>'</script><?php 
			}else{
				echo '<div class="alert-danger">Error al guardar</div>';
			}
		}elseif (isset($_POST['volverG'])) {
			$cont=$c->getCont();
			?><script type="text/javascript">
				window.location.href='tienda.php?cpv=<?php echo $ca; ?>&c=<?php echo $cont; ?>&v=<?php echo $_GET['v']; ?>'</script><?php 
		}
		?>
		</article>
	</section>
</body>
</html>
<?php  ?>