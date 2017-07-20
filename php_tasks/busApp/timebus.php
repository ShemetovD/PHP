<?php

class Timebus{

	public $id;
	public $id_busstation;
	public $id_station;
	public $time;

	function __construct($id=0,$id_busstation=0,$id_station=0,$time=0){
		$this->id=$id;
		$this->id_busstation=$id_busstation;
		$this->id_station=$id_station;
		$this->time=$time;
	}

}

?>