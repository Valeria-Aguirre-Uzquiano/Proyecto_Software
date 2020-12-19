<?php 
include "../cabecera.php";
include "menuAdmi.php";
include "../../Controller/ctr.material.php";
$del= new ControladorMaterial();
$del->ctrGetClass();
 ?>
 <html>
 <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Eliminar material</title>
</head>	
 <body style="background-color: lightgray">
	<div class="modal-dialog">	
		<div class="modal-content" style="background-color: gray" >
			<div class="modal-header">
				<h4 class="modal-title" style="color: white">Eliminar material</h4>
			</div>				
			<form style="margin: auto;" method="POST">
					<div class="modal-body" style="color: white">
						¿Esta seguro de querer eliminar este material?
					</div>
					<div class="modal-footer" >
						<button type="submit" name="elmaterial" class="btn btn-light" style="width: 100px">Si,eliminar</button>
						<button type="submit" name="cancelar" class="btn btn-light" data-dismiss="modal" style="width: 90px;margin-right: -60px">Cancelar</button>
					</div>		
			</form>	
			<?php 
			if (isset($_POST['elmaterial'])) {
				$del->ctrEliminarMaterial($_GET['id']);
				if ($del) {
					$del->ctrInsertMovM($_GET['a'],$_GET['id']);
					?><script type="text/javascript">alert("Material eliminado");
					window.location.href='InvMaterialAd.php?a=<?php echo $_GET['a']?>'</script><?php 
				}else{
					echo '<div class="alert-danger">Error al eliminar</div>';
				}
			}elseif (isset($_POST['cancelar'])) {
				?><script type="text/javascript">
				window.location.href='InvMaterialAd.php?a=<?php echo $_GET['a']?>'</script><?php 
			}			
			?>	
	</body>
</html>