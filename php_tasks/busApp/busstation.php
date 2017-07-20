<?php

class BusStation{

	public $id;
	public $id_bus;
	public $id_station;
	public $number;  //очерёдность
	public $timeArray = array();
	public $direction;

	function __construct($id=0,$id_bus=0,$id_station=array(),$number=array(),$timeArray=array(),$direction=0){
		$this->id=$id;
		$this->id_bus=$id_bus;
		$this->id_station=$id_station;
		$this->number=$number;
		$this->timeArray=$timeArray;
		$this->direction=$direction;
	}

	function show_info(){
		echo '<pre>';
		print_r($this->id_bus);
		echo "<br>";
		print_r($this->id);
		echo '</pre>';
	}

	function get_t(){
		return $this->timeArray;
	}

	function show_all_stations(){
		echo '<br>All Stations by number way:';
		echo '<pre>';
		foreach ($this->id_station as $key => $value) {
			$value->show_info();
		}
		echo '<pre>';
	}

	


}

?>