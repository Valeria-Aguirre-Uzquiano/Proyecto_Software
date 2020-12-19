<?php


Class ControladorLogin{
	/* Llamar a plantilla */
	public function ctrTraerLogin(){
		include "view/login.php";
	}
	public function ctrIngreso(){

		$SesionUser = new Session();
		$us= new Log_in();
		if (isset($_SESSION['user'])) {
			include_once 'ctr.roles.php';
			$ctrRol = new Rol($_SESSION['user']);
			$rol=$ctrRol->ctrgetRol();
			if ($rol== 'Administrador') {
				header("location:../sist_inventario/view/admin/inicioAdmi.php");
			}else{
				if ($rol== 'Vendedor') {
					header("location:../sist_inventario/view/vende/inicioVend.php");
				}elseif ($rol== 'Bodeguero') {					
					header("location:../sist_inventario/view/bodeg/inicioBode.php");
				}
			}
			
		}else if (isset($_POST['submit'])) {
			$usuario=$_POST['nom'];
			$pass=$_POST['pwd'];
			if (empty($usuario) || empty($pass)) {
				echo '<div class="alert-danger">Ingresa todos tus datos, por favor</div>';
			}else{
				$exist=$us->getLog_in($usuario,$pass);
				if ($exist) {
					include_once 'ctr.roles.php';
					$ctrRol = new Rol($usuario);
					$rol=$ctrRol->ctrgetRol();
					if ($rol== 'Administrador') {
						header("location:../sist_inventario/view/admin/inicioAdmi.php");
					}else{
						if ($rol== 'Vendedor') {
							header("location:../sist_inventario/view/vende/inicioVend.php");
						}elseif ($rol== 'Bodeguero') {
							$bo=new ControladorBodeguero($usuario);
							$b=$bo->ctrGetID();
							header("location:../sist_inventario/view/bodeg/inicioBode.php?b=$b");
						}
					}
					$SesionUser->setCurrentUser($usuario);
					$us->setUser($usuario);
				}else{
				echo '<div class="alert-danger">DATOS INCORRECTOS</div>';
				}
			}
		}
	}
}