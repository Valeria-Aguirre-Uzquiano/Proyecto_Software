<?php 
include "../Controller/ctr.prendas.php";
include "conexion.php";
$mostrar=new ControladorPrendas();
$mostrar->crtGetClass2();
header("Content-Type: application/xls");
header("Content-Disposition: attachment;filename= InvPrendas.xls");
 ?>
 <meta charset="UTF-8">
 <table id="t01" method="POST">
				<tr>
					<th>Código</th>
					<th>Descripción</th> 
					<th>Categoría</th>
					<th>Stock</th>
					<th>Precio</th>
					<th>Agregación</th>
				</tr>
				<?php 
				if (isset($_POST['filtrar'])) {
			 		$fc=$_POST['cate'];
			 		
			 	}else{
			 		$fc="";
			 	}
			 	$mostrar->construct(null,null,$fc,null,null);
				$fila=$mostrar->ctrSelectAll();?>
				<tr>
					<?php foreach ($fila as $row) {?>
					<td><?php echo $row[0]?></td>
					<td><?php echo $row[4]?></td>
					<td><?php echo $row[1]?></td>
					<td><?php echo $row[2]?></td>
					<td><?php echo $row[3]?></td>
					<td><?php echo $row[5]?></td>
				</tr>
				<?php   }	?>
			</table>