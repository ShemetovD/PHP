<?php
//include 'room.php';
spl_autoload_register();

class Flat{

	private $rooms = array();
	private $room;

	function __construct(Room $room){
		$this->room = $room;
		//$this->rooms[] = $rooms;
	}

	function set_a($a){
		$this->rooms[]=$a;
	}

	function add_room(Room $new_r){
		echo "<br>";
		$this->set_a($new_r);
	}

	function remove_room($index){
		unset($this->rooms[$index]);
	}
	
	function show(){

		foreach ($this->rooms as $key => $value) {
			$this->room->show_room_info($value->people_in_room,$value->windows,$value->doors,$value->stateLight);	
		}
		echo 'number of rooms = '.count($this->rooms);
		echo '<pre>';
		print_r($this->rooms) ;
		echo '</pre>';
	}

}

$room_work = new Room();
$test = new Flat($room_work, 2);


$test->add_room(new Room(0,3,7,'true'));
$test->add_room(new Room(1,8,7,'false'));

$test->remove_room(1);

$test->show();

?>