<?php 
/**
 * 
 */
class ControladorMaterial{
	private $cla="";
	private $cant="";
	private $des="";
	private $filas="";
	public function construct($cla,$cant,$des){
		if (empty($cla) || empty($cant) || empty($des)) {
			return false;
		}else{
			$this->cla=$cla;
			$this->cant=$cant;
			$this->des=$des;
			return true;
		}			
	}
	public function ctrSetCla($cla){
		$this->cla=$cla;
	}
	public function ctrGetClass(){
		include "../../Model/modelo.material.php";
	}
	public function ctrGetClass2(){
		include "../Model/modelo.material.php";
	}
	public function ctrInsertMaterial(){
		$mat = new Material();
		$row=$mat->getClasificación($this->cla);
		$mat->insertPrenda($row[0],$this->cant,$this->des);
		return $mat;
	}
	public function ctrSelectAll(){
		$reg = new Material();
		if (!empty($this->cla)) {
			return $this->filas=$reg->selectFil($this->cla);
		}else{
			return $this->filas=$reg->selectAll();
		}		
	}
	function ctrSelectMaterial($id){
		$reg = new Material();
		$fila=$reg->selectMaterial($id);
		return [$fila[0],$fila[1],$fila[2],$fila[3]];
	}
	public function ctrEditarMaterial($id){
		$cla = new Material();
		$result = new Material();
		$row=$cla->getClasificación($this->cla);
		$result->updateMaterial($id,$row[0],$this->cant,$this->des);
		return $result;
	}
	public function ctrEliminarMaterial($id){		
		$result = new Material();
		$result->deleteMaterial($id);
		return $result;
	}
	public function ctrInsertMovM($emp,$mat){
		$mov= new Material();
		$mov->InsertMovM($emp,$mat);
	}
}