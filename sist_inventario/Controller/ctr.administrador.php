<?php 
/**
 * 
 */
class ControladorAdministrador{
	private $nom_admi;
	function __construct($admin){
		$this->nom_admi=$admin;
	}
	function ctrGetID(){
		include '../../Model/modelo.administrador.php';
		$adm = new Administrador();
		$row=$adm->getIDAd($this->nom_admi);
		return $row[0];
	}
}