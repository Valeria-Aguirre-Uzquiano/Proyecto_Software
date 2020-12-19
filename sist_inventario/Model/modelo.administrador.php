<?php 
/**
 * 
 */
class Administrador extends Conexion{
	
	function getIDAd($admin){
		$sql="SELECT CI FROM empleado WHERE nombre='$admin'";
		$ida=$this->conectar()->query($sql);		
		return mysqli_fetch_row($ida);
	}
}