<?php 
/**
 * 
 */
class Conexion{
	private $host;
	private $usuario;
	private $clave;
	private $db;
	private $conexion;
	function __construct(){
		$this->host="localhost:3306";
		$this->usuario="root";
		$this->clave="root";
		$this->bd="sistemainventario";
	}
	public function conectar(){
		try {
			$this->conexion= new mysqli($this->host,$this->usuario,$this->clave,$this->bd);
			return $this->conexion;
		} catch (Exception $e) {
			echo "error en la conexion";
		}
	}

}
