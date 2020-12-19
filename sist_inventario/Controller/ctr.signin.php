<?php 
/**
 * 
 */
Class ControladorSignin{
	public $usuario="";
	public $ci="";
	public $correo="";
	public $pass="";
	public $rol="";
	function formulario(){
			if (isset($_POST['user'], $_POST['ci'],$_POST['email'], $_POST['pwd'], $_REQUEST['opcion'])) {
				$this->usuario=$_POST['user'];
				$this->ci=$_POST['ci'];
				$this->correo=$_POST['email'];
				$this->pass=$_POST['pwd'];
				$this->rol=$_POST['opcion'];
			}else{
				echo '<div class="alert-danger">Por favor llena el formulario correctamente</div>';
			}
	}
	public function ctrRegistrarse(){
		include "../Model/modelo.signin.php";
		$sign = new Sign_in();
		$sign->getSignin($this->ci,$this->usuario,$this->correo,$this->pass,$this->rol);	
	}
}