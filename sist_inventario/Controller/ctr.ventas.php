<?php 
/**
 * 
 */
class ControladorVentas{
	private $total=0;
	private $cont=0;
	function construct($ventas){
			$this->total=$ventas;
			
	}
	function getVen(){
		return $this->total;
	}
	function setCont($cont){
		$this->cont=$cont;		
	}
	function contador($sum){
		$this->cont+=$sum;
	}
	function getCont(){
		return $this->cont;
	}
	function ctrInsertVenta($idv,$date){
		include '../../Model/modelo.ventas.php';
		$venta=new Venta ();
		$venta->InsertVenta($idv,$this->total,$date);
	}
}

?>