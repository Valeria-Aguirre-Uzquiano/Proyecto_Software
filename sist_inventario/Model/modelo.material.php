<?php  
/**
 * 
 */
class Material extends Conexion{

	function getClasificación($cla){
		$sql="SELECT idClasificación FROM clasificación WHERE clasificación='$cla'";
		$idc=$this->conectar()->query($sql);		
		return mysqli_fetch_row($idc);
	}
	
	function insertPrenda($iCla,$cant,$des){
		$query="INSERT INTO material (Clasificación_idClasificación, cantidad, descripcion) VALUES ('$iCla','$cant','$des')";
		$resultado=$this->conectar()->query($query);
		return $resultado;
	}

	function selectAll(){
		$query="SELECT m.idMaterial, c.clasificación, m.cantidad, m.descripcion, m.fecha_registro FROM material m, clasificación c WHERE m.Clasificación_idClasificación=c.idClasificación order by fecha_registro desc";
		$resultado=$this->conectar()->query($query);
		return mysqli_fetch_all($resultado);
	}

	function selectFil($cla){
		$query="SELECT m.idMaterial, c.clasificación, m.cantidad, m.descripcion, m.fecha_registro FROM material m, clasificación c WHERE m.Clasificación_idClasificación=c.idClasificación AND c.clasificación='$cla' order by fecha_registro desc";
		$resultado=$this->conectar()->query($query);
		return mysqli_fetch_all($resultado);
	}

	function selectMaterial($id){
		$query="SELECT m.idMaterial, c.clasificación, m.cantidad, m.descripcion FROM material m, clasificación c WHERE m.Clasificación_idClasificación=c.idClasificación AND m.idMaterial='$id'";
		$resultado=$this->conectar()->query($query);
		$fila=mysqli_fetch_assoc($resultado);
		return[$fila['idMaterial'],$fila['clasificación'],$fila['cantidad'],$fila['descripcion']];
	}

	function updateMaterial($cod,$iCla,$cant,$des){		
		$query="UPDATE material SET Clasificación_idClasificación='$iCla',cantidad='$cant',descripcion='$des' WHERE idMaterial='$cod'";
		$resultado=$this->conectar()->query($query);
		return $resultado;
	}

	function deleteMaterial($id){
		$query="DELETE FROM material WHERE idMaterial=$id";
		$resultado=$this->conectar()->query($query);
		return $resultado;
	}

	function InsertMovM($emp,$mat){
		$query="INSERT INTO movimiento_material (Empleado_CI, Material_idMaterial) VALUES ('$emp','$mat')";
		$resultado=$this->conectar()->query($query);
	}
}