<?php 
class Venta extends Conexion{
	
	function InsertVenta($idv,$total,$date){
		$query="INSERT INTO vendedor (Empleado_CI, ventas_hechas, fecha_venta) VALUES ('$idv','$total','$date')";
		$resultado=$this->conectar()->query($query);
	}
}