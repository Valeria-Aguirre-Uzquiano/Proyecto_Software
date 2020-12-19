<?php 
include "../Controller/ctr.material.php";
include "conexion.php";
$mostrar = new ControladorMaterial();
$mostrar->ctrGetClass2();
header("Content-Type: application/xls");
header("Content-Disposition: attachment;filename= InvMaterial.xls");
 ?>
 <meta charset="UTF-8">
 <table>
				<tr>
					<th>Código</th>
					<th>Descripción</th> 
					<th>Clasificación</th>
					<th>Cantidad</th>
					<th>Agregación</th>
				</tr>
				<?php 
				if (isset($_POST['filtrar'])) {
			 		$fc=$_POST['clas'];
			 		//echo "$fc";
			 	}else{
			 		$fc="";
			 	}				
				$mostrar->construct($fc,null,null);
				$fila=$mostrar->ctrSelectAll();?>
				<tr>
					<?php foreach ($fila as $row) {?>
					<td><?php echo $row[0]?></td>
					<td><?php echo $row[3]?></td>
					<td><?php echo $row[1]?></td>
					<td><?php echo $row[2]?></td>
					<td><?php echo $row[4]?></td>
				</tr>
				<?php   }	?>
</table>