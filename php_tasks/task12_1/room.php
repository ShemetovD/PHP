<?php

class Room{

	public $people_in_room;
	public $windows;
	public $doors;
	public $stateLight;

	function __construct($people_in_room=0,$windows=0,$doors=0,$stateLight='true'){
		
		$this->people_in_room=$people_in_room;
		$this->windows=$windows;
		$this->doors=$doors;
		$this->stateLight=$stateLight;

	}
	function add($people_in_room,$windows,$doors,$stateLight){
		$this->people_in_room=$people_in_room;
		$this->windows=$windows;
		$this->doors=$doors;
		$this->stateLight=$stateLight;
		return array($this->people_in_room,$this->windows,$this->doors,$this->stateLight);
	}
	function get_windows(){
		return $this->windows;
	}
	function set_windows($windows){
		$this->windows=$windows;
	}

	function get_doors(){
		return $this->doors;
	}
	function set_doors($doors){
		$this->doors=$doors;
	}

	function get_people(){
		return $this->people_in_room;
	}
	function set_people($people){
		$this->people_in_room=$people;
	}

	function stateLight(){
		return $this->stateLight;
	}

	function add_man($number){
		if($this->get_doors() == 0){
			echo "no peoples";
			$this->people_in_room = $number;
			echo $this->get_people();
		}
	}

	function remove_man(){
		if($this->get_people() > 0){			
			$this->people_in_room--;
			echo $this->get_people();
		}
	}

	function show_room_info($people_in_room,$windows,$doors,$stateLight){
		echo '<br>';
		echo "All number peoples in room = ".$people_in_room;
		if($people_in_room > 0){
			$stateLight = 'true';
		}else{
			$stateLight = 'false';
		}
		echo '<br>';
		echo "We have light = ".$stateLight."<br>";
		echo "We have windows = ".$windows."<br>";
		echo "We have doors = ".$doors."<br>";
		echo "<br/>";
	}

}

/*$temp = new Room(0,3,0,'true');
//$temp->add_man(7);
$temp->remove_man();
$temp->show_room_info();*/

?>