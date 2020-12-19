<?php 
include "../cabecera.php";
include "menuAdmi.php";
include "../../Controller/ctr.prendas.php";
$del= new ControladorPrendas();
$del->crtGetClass();
 ?>
 <html>
 <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Eliminar prenda</title>
</head>	
 <body style="background-color: lightgray">
	<div class="modal-dialog">	
		<div class="modal-content" style="background-color: gray" >
			<div class="modal-header">
				<h4 class="modal-title" style="color: white">Eliminar prenda</h4>
			</div>				
			<form style="margin: auto;" method="POST">
					<div class="modal-body" style="color: white">
						¿Esta seguro de querer eliminar esta prenda?
					</div>
					<div class="modal-footer" >
						<button type="submit" name="elprenda" class="btn btn-light" style="width: 100px">Si,eliminar</button>
						<button type="submit" name="cancelar" class="btn btn-light" data-dismiss="modal" style="width: 90px;margin-right: -60px">Cancelar</button>
					</div>		
			</form>	
			<?php 
			if (isset($_POST['elprenda'])) {
				$del->ctrEliminarPrenda($_GET['id']);
				if ($del) {
					$del->ctrInsertMovP($_GET['a'],$_GET['id']);
					?><script type="text/javascript">alert("Prenda eliminada");
					window.location.href='vistaGeneralAd.php?a=<?php echo $_GET['a'] ?>'</script><?php 
				}else{
					echo '<div class="alert-danger">Error al eliminar</div>';
				}
			}elseif (isset($_POST['cancelar'])) {
				?><script type="text/javascript">
				window.location.href='vistaGeneralAd.php?a=<?php echo $_GET['a'] ?>'</script><?php 
			}			
			?>
		</div>
	</div>
	</body>
 </html>