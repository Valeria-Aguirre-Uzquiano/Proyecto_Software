<?php 
/**
 * 
 */

class Rol {
	private $Us;
	function __construct($usesion){
		$this->Us=$usesion;
	}
	public function ctrgetRol(){
		$conectar= new mysqli("localhost:3306","root","root","sistemainventario");
		$query="SELECT rol FROM empleado WHERE nombre= '$this->Us'";
		$result = $conectar->query($query);
		$r= mysqli_fetch_row($result);
		return $r[0];
	}
}