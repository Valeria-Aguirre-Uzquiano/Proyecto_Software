<?php 
/**
 * 
 */
class ControladorBodeguero{
	private $nom_bode;
	function __construct($bodeg){
		$this->nom_bode=$bodeg;
	}
	function ctrGetID(){
		//echo $this->nom_bode;
		include '../../Model/modelo.bodeguero.php';
		$bod = new Bodeguero();
		$row=$bod->getIDBo($this->nom_bode);
		return $row[0];
	}
}