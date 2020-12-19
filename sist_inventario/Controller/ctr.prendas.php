<?php 

/**
 * 
 */
class ControladorPrendas{
	private $cod="";
	private $stock="";
	private $cat="";
	private $precio="";
	private $des="";
	public function construct($cod,$stock,$cat,$precio,$des){
		if (empty($cod) || empty($stock) || empty($cat) || empty($precio) || empty($des)) {
			return false;
		}else{			
			$this->cod=$cod;
			$this->stock=$stock;
			$this->cat=$cat;
			$this->precio=$precio;
			$this->des=$des;
			return true;
		}	
	}
	public function ctrSetCat($cat){
		$this->cat=$cat;
	}
	public function crtGetClass(){
		include '../../Model/modelo.prendas.php';
	}
	public function crtGetClass2(){
		include '../Model/modelo.prendas.php';
	}
	public function ctrInsertPrenda(){
		$cate = new Prenda();
		$result = new Prenda();
		$row=$cate->getCategoria($this->cat);
		$result->insertPrenda($this->cod,$this->stock,$row[0],$this->precio,$this->des);
		return $result;
	}
	public function ctrSelectAll(){
		$reg = new Prenda();
		if (!empty($this->cat)) {
			return $this->filas=$reg->selectFil($this->cat);
		}else{
			return $this->filas=$reg->selectAll();
		}		
	}
	function ctrSelectPrenda($id){
		$reg = new Prenda();
		$fila=$reg->selectPrenda($id);
		return [$fila[0],$fila[1],$fila[2],$fila[3],$fila[4]];
	}
	public function ctrEditarPrenda(){
			$cate = new Prenda();
			$result = new Prenda();
			$row=$cate->getCategoria($this->cat);
			$result->updatePrenda($this->cod,$this->stock,$row[0],$this->precio,$this->des);
			return $result;
	}
	public function ctrEliminarPrenda($idp){
		$this->cod=$idp;
		$result = new Prenda();
		$result->deletePrenda($this->cod);
		return $result;
	}
	
	public function ctrSelectMin(){
		$reg = new Prenda();
		return $filas=$reg->selectMin();		
	}
	public function ctrCountMin(){
		$reg = new Prenda();
		return $cont=$reg->countMin();
	}
	public function ctrInsertMovP($emp,$pren){
		$mov= new Prenda();
		$mov->InsertMovP($emp,$pren);
	}
}