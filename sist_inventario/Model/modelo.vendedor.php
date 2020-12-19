<?php 
/**
 * 
 */
class Vendedor extends Conexion{
	
	function getIDVen($vendedor){
		$sql="SELECT CI FROM empleado WHERE nombre='$vendedor'";
		$idv=$this->conectar()->query($sql);		
		return mysqli_fetch_row($idv);
	}
}