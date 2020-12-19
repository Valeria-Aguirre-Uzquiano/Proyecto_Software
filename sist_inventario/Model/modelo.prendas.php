<?php 
/**
 * 
 */
class Prenda extends Conexion{

	function getCategoria($cat){
		$sql="SELECT idCategoría FROM categoría WHERE categoría='$cat'";
		$idc=$this->conectar()->query($sql);		
		return mysqli_fetch_row($idc);
	}
	function insertPrenda($cod,$stock,$idC,$precio,$des){
		$query="INSERT INTO prenda (idPrenda, Categoría_idCategoría, stock, precio, descripcion) VALUES ('$cod','$idC','$stock','$precio','$des')";
		$resultado=$this->conectar()->query($query);
		return $resultado;
	}
	function selectAll(){
		$query="SELECT p.idPrenda, c.categoría, p.stock, p.precio, p.descripcion, p.fecha_registro FROM prenda p, categoría c WHERE p.Categoría_idCategoría=c.idCategoría order by fecha_registro desc";
		$resultado=$this->conectar()->query($query);
		return mysqli_fetch_all($resultado);
	}
	function selectFil($cat){
		$query="SELECT p.idPrenda, c.categoría, p.stock, p.precio, p.descripcion, p.fecha_registro FROM prenda p, categoría c WHERE p.Categoría_idCategoría=c.idCategoría AND c.categoría='$cat' order by fecha_registro desc";
		$resultado=$this->conectar()->query($query);
		return mysqli_fetch_all($resultado);
	}
	function selectPrenda($id){
		$query="SELECT p.idPrenda, c.categoría, p.stock, p.precio, p.descripcion, p.fecha_registro FROM prenda p, categoría c WHERE p.Categoría_idCategoría=c.idCategoría AND p.idPrenda='$id'";
		$resultado=$this->conectar()->query($query);
		$fila=mysqli_fetch_assoc($resultado);
		return[$fila['idPrenda'],$fila['categoría'],$fila['stock'],$fila['precio'],$fila['descripcion']];
	}
	function updatePrenda($cod,$stock,$idC,$precio,$des){
		$query="UPDATE prenda SET Categoría_idCategoría='$idC',stock='$stock',precio='$precio',descripcion='$des' WHERE idPrenda='$cod' ";
		$resultado=$this->conectar()->query($query);
		return $resultado;
	}
	function deletePrenda($cod){		
		$query="DELETE FROM prenda WHERE idPrenda=$cod";
		$resultado=$this->conectar()->query($query);
		return $resultado;
	}
	function selectMin(){
		$query="SELECT p.idPrenda, c.categoría, p.stock, p.precio, p.descripcion, p.fecha_registro FROM prenda p, categoría c WHERE p.Categoría_idCategoría=c.idCategoría AND p.stock<=5";
		$resultado=$this->conectar()->query($query);
		return mysqli_fetch_all($resultado);
	}
	function countMin(){
		$query="SELECT * FROM prenda p WHERE p.stock<=5";
		$resultado=$this->conectar()->query($query);
		$num=$resultado->num_rows;
		return $num;
	}
	function InsertMovP($emp,$prend){
		$query="INSERT INTO movimiento_prenda (Empleado_CI, Prenda_idPrenda) VALUES ('$emp','$prend')";
		$resultado=$this->conectar()->query($query);
	}
}