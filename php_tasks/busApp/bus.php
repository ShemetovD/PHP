<?php

class Bus{

	public $id;
	public $title;
	public $id_busStation =array();
	public $startStation = array();
	public $endStation = array();

	function __construct($id,$title,$id_busStation,$startStation,$endStation){
		$this->id=$id;
		$this->title=$title;
		$this->id_busStation=$id_busStation;
		$this->startStation=$startStation;
		$this->endStation=$endStation;
	}

	function set_id($id){
		$this->id=$id;
	}
	function get_id(){
		return $this->id;
	}

	function set_title($title){
		$this->title=$title;
	}
	function get_title(){
		return $this->title;
	}

	function set_id_busStation($id_busStation){
		$this->id_busStation=$id_busStation;
	}
	function get_id_busStation(){
		return $this->id_busStation;
	}

	function set_startStation($startStation){
		$this->startStation=$startStation;
	}
	function get_startStation(){
		return $this->startStation;
	}



	function show_all_bus_ways(){
		echo '<br>Show all bus ways by number';	
		echo '<pre>';
		foreach ($this->id_busStation as $key => $value) {
			$value->show_info();
		}
		echo '<pre>';
	}

}

?>
