<?php

spl_autoload_register();

class Main{

	public $list_Bus = array();
	public $list_Ways = array();
	public $list_Stations = array();

	function __construct(){
		echo "Main";
	}

	/* -------------- BUS-----------------*/
	function set_bus($a){
		$this->list_Bus[]=$a;
	}
	function add_bus(Bus $new_bus){
		$this->set_bus($new_bus);
	}
	function show_all_bus(){
		echo '<pre>';
		print_r($this->list_Bus);
		echo '</pre>';
	}

	/* -------------- WAYS -----------------*/
	function set_way($a){
		$this->list_Ways[]=$a;
	}
	function add_way(BusStation $new_way){
		$this->set_way($new_way);
	}
	function show_all_ways(){
		echo '<br> Show all ways';
		echo '<pre>';
		print_r($this->list_Ways);
		echo '</pre>';
	}

	/* -------------- Stations -----------------*/
	function set_station($b){
		$this->list_Stations[]=$b;
	}
	function add_station(Station $new_station){
		$this->set_station($new_station);
	}
	function show_all_stations(){
		echo '<pre>';
		print_r($this->list_Stations);
		echo '</pre>';
	}


	function get_ways_by_bus($number){
		foreach ($this->list_Bus as $key => $value) {
			if($number == $value->id){
				$value->show_all_bus_ways();
			}
		}
	}


	function get_stations_by_way($number){
		foreach ($this->list_Ways as $key => $value) {
			if($number == $value->id){
				$value->show_all_stations();
			}
		}
	}

	function get_time($id_station,/*$id_bus,*/$id_way){
		foreach ($this->list_Ways as $key => $way) {
			if($id_way == $way->id){
				foreach ($way as $key1 => $value1) {
					if($key1 == 'timeArray'){
						foreach ($value1 as $key2 => $value2) {
							if($id_station == $value2->id_station){
								echo "time =".$value2->time."<br>";
							}
						}
						
					}
				}

			}
		}
	}

	function get_bus($id_station){
		foreach ($this->list_Ways as $key => $way) {
			foreach ($way as $key1 => $value1) {
				if($key1 == 'id_station'){
					foreach ($value1 as $key2 => $value2) {
						if($id_station == $value2->id){
							echo 'Buses ='.$way->id_bus.'<br>';
						}
					}
				}
			}
		}
	}

	function get_position_near($x=0,$y=0){
		$temp = array();
		foreach ($this->list_Stations as $key => $value) {
			//print_r($value->position[0]);

			$tex = abs($value->position[0] - $x);
			$tey = abs($value->position[1] - $y);

			$temp[$key]=abs($tex + $tey);
		}
		
/*		print_r($temp);
		print_r(min($temp));*/

		$key = array_search(min($temp), $temp);
		echo 'you request x = '.$x.' y = '.$y."<br>";
		echo "Station near you = ".$key;
	}

}

$m1 = new Main();


$s1 = new Station(0,array(4,4),'station1');
$s2 = new Station(1,array(8,4),'station2');
$s3 = new Station(2,array(8,8),'station3');

$s4 = new Station(3,array(4,10),'station4');
$s5 = new Station(4,array(4,15),'station5');
$s6 = new Station(5,array(8,15),'station6');

$t1 = new Timebus(0,1,0,1805);
$t2 = new Timebus(1,1,1,1905);
$t3 = new Timebus(2,1,2,2005);
$t4 = new Timebus(3,1,2,2105);
$t5 = new Timebus(4,1,2,2205);

$w1 = new BusStation(1,15,array($s1,$s2,$s3,$s5,$s6),array(1,2,3),array($t1,$t2,$t3,$t4,$t5),1);
$w2 = new BusStation(2,17,array($s4,$s5,$s6,$s1,$s2),array(1,2,3),array(9,11,13),1);

$m1->add_way($w1);
$m1->add_way($w2);


$b1 = new Bus(15,15,array($w1,$w2),array(0,0),array(0,1));
$b2 = new Bus(17,16,array($w1,$w2),array(0,0),array(0,1));

$m1->add_bus($b1);
$m1->add_bus($b2);

//$m1->get_ways_by_bus(15);

//$m1->show_all_ways();

//$m1->get_time(1,1);
$m1->get_bus(3);

$m1->add_station($s1);
$m1->add_station($s2);
$m1->add_station($s3);

$m1->add_station($s4);
$m1->add_station($s5);
$m1->add_station($s6);

$m1->show_all_stations();

$m1->get_position_near(12,10);

//$m1->get_stations_by_way(2);


/*$b1 = new Bus(15,15,array($w1,$w2),array(0,0),array(0,1));

$b1->show_all_bus_ways();
*/
/*echo '<br>'.$b1->get_id_busStation();

$m1->add_bus($b1);

$w1 = new BusStation(15,15,15,array(0,0),array(0,1));

$m1->add_way($w1);
$m1->show_all_ways();*/

//print_r($w1);

//$m1->show_all_bus();

?>