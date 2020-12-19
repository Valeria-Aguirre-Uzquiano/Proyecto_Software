<?php 
/**
 * 
 */
class Sign_in extends Conexion{
	public function getSignin($ci,$usu,$correo,$pass,$rol){
		$id=333846027;
		$query="INSERT INTO empleado (CI, nombre, correo, password, rol, Empresa_NIT) VALUES ('$ci','$usu','$correo','$pass','$rol','$id')";
		$resultado=$this->conectar()->query($query);
		if ($resultado) {
			header("location:..");
		}
	}
}