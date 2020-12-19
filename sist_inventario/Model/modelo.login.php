<?php 

/**
 * Login
 */
class Log_in extends Conexion{
	private $nombre;
	public function getLog_in($user,$pass){
		$query="SELECT * FROM empleado WHERE nombre= '$user' AND password='$pass'";
		$result = $this->conectar()->query($query);
		$numRows = $result->num_rows;
		if (0<$numRows && $numRows<2) {
			return true;
		 }else{
		 	return false;
		}
	}
	public function setUser($user){
		$query="SELECT * FROM empleado WHERE nombre= '$user'";
		$result = $this->conectar()->query($query);
		$row=mysql_fetch_row($result);
		$this->nombre=$row[0];
	}

	public function getUser(){
		return $this->nombre;
	}

}