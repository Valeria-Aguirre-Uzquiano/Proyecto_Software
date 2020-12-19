<?php 
/**
 * 
 */
class ControladorVendedor{
	private $nom_ven;
	function __construct($vendedor){
		$this->nom_ven=$vendedor;
	}
	function ctrGetID(){
		include '../../Model/modelo.vendedor.php';
		$ven = new Vendedor();
		$row=$ven->getIDVen($this->nom_ven);
		return $row[0];
	}
}