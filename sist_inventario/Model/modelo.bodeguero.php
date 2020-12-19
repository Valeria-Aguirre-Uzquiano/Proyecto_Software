<?php 
/**
 * 
 */
class Bodeguero extends Conexion{
	
	function getIDBo($bodeg){
		$sql="SELECT CI FROM empleado WHERE nombre='$bodeg'";
		$idb=$this->conectar()->query($sql);		
		return mysqli_fetch_row($idb);
	}
}