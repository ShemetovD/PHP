<?php

spl_autoload_register();

class Main{

	public $list_Bus = array();
	public $list_Ways = array();
	public $list_Stations = array();

	function __construct(){
		//echo "Main";
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
		
		print_r($temp);
		print_r(min($temp));

		$key = array_search(min($temp), $temp);
		echo 'you request x = '.$x.' y = '.$y."<br>";
		echo "Station near you = ".$key;
	}

}

$m1 = new Main();


/*Фолюш ( 4,4)
1000 мелочей( 1,7)
Октябрь ( 1,12)
Филармония (5,17)
Корона ( 10,17)
Брест ( 13,14)
Тринити( 16,12)
Кабяка ( 20,9)
Тропа здоровья( 8,19)
Форты(10,15)
Роддом(7,12)
Красное знамя(6,9)
Ленина ( 6,5)
Табачка (10,2)
Суворова (15,2)
Девятовка(20,17)
Олдсити(15,15)
Пушкина(10,10)
Центр-занятости(5,10)
Советская(2,15)*/

/*
 Автобус №1
маршрут Фолюш - Кабяка (Фолюш, 1000 мелочей, Октябрь, Филармония, Корона, Брест, Тринити, Кабяка )
маршрут Кабяка - Фолюш ( Кабяка, Тринити,Брест, Корона, Филармония, Октябрь, 1000 мелочей,Фолюш)

Автобус №5
маршрут Тропа здоровья - Суворова ( Тропа здоровья, Форты, Роддом, Красное знамя, Ленина, Табачка, Суворова)
обратный маршрут ( Суворова, Табачка, Ленина, Красное знамя, Роддом, Форты, Тропа здоровья

Автобус №6
маршрут Девятовка - Корона(Девятовка, Олдсити, Пушкина, Центр-занятости, Советская, Тропа здоровья, Корона)
 * */

$s1 = new Station(0,array(1,7),'1000 мелочей');
$s2 = new Station(1,array(1,12),'Октябрь');
$s3 = new Station(2,array(5,17),'Филармония');

$s4 = new Station(3,array(10,17),'Корона');
$s5 = new Station(4,array(13,14),'Брест');
$s6 = new Station(5,array(16,12),'Тринити');

$s7 = new Station(6,array(20,9),'Кабяка');
$s8 = new Station(7,array(8,19),'Тропа здоровья');
$s9 = new Station(8,array(10,15),'Форты');
$s10 = new Station(9,array(7,12),'Роддом');

$s11 = new Station(10,array(6,9),'Красное знамя');

$s12 = new Station(11,array(6,5),'Ленина');
$s13 = new Station(12,array(10,2),'Табачка');

$s14 = new Station(13,array(15,2),'Суворова');
$s15 = new Station(14,array(20,17),'Девятовка');

$s16 = new Station(15,array(15,15),'Олдсити');
$s17 = new Station(16,array(10,10),'Пушкина');
$s18 = new Station(17,array(5,10),'Центр-занятости');
$s19 = new Station(18,array(2,15),'Советская');

$s20 = new Station(19,array(4,4),'Фолюш');

$t1 = new Timebus(0,1,0,1805);
$t2 = new Timebus(1,1,1,1905);
$t3 = new Timebus(2,1,2,2005);
$t4 = new Timebus(3,1,2,2105);
$t5 = new Timebus(4,1,2,2205);

/*
 Автобус №1
маршрут Фолюш - Кабяка (Фолюш, 1000 мелочей, Октябрь, Филармония, Корона, Брест, Тринити, Кабяка )
маршрут Кабяка - Фолюш ( Кабяка, Тринити,Брест, Корона, Филармония, Октябрь, 1000 мелочей,Фолюш)

Автобус №5
маршрут Тропа здоровья - Суворова ( Тропа здоровья, Форты, Роддом, Красное знамя, Ленина, Табачка, Суворова)
обратный маршрут ( Суворова, Табачка, Ленина, Красное знамя, Роддом, Форты, Тропа здоровья

Автобус №6
маршрут Девятовка - Корона(Девятовка, Олдсити, Пушкина, Центр-занятости, Советская, Тропа здоровья, Корона)
 * */

$w1 = new BusStation(1,15,array($s20,$s1,$s2,$s3,$s4,$s5,$s5,$s7),array(1,2,3),array($t1,$t2,$t3),1);
$w2 = new BusStation(2,16,array($s8,$s9,$s10,$s11,$s12,$s13,$s14),array(1,2,3),array($t1,$t2,$t3),1);
$w3 = new BusStation(3,17,array($s15,$s16,$s17,$s18,$s19,$s8,$s4),array(1,2,3),array($t1,$t2,$t3),1);

$m1->add_way($w1);
$m1->add_way($w2);
$m1->add_way($w3);


$b1 = new Bus(15,15,array($w1),array(0,0),array(0,1));
$b2 = new Bus(16,16,array($w2),array(0,0),array(0,1));
$b3 = new Bus(17,17,array($w3),array(0,0),array(0,1));

$m1->add_bus($b1);
$m1->add_bus($b2);
$m1->add_bus($b3);

//$m1->get_ways_by_bus(15);

//$m1->show_all_ways();

//$m1->get_time(1,1);
//$m1->get_bus(3);

$m1->add_station($s1);
$m1->add_station($s2);
$m1->add_station($s3);

$m1->add_station($s4);
$m1->add_station($s5);
$m1->add_station($s6);

$m1->add_station($s7);
$m1->add_station($s8);
$m1->add_station($s9);

$m1->add_station($s10);
$m1->add_station($s11);
$m1->add_station($s12);

$m1->add_station($s13);
$m1->add_station($s14);

$m1->add_station($s15);
$m1->add_station($s16);
$m1->add_station($s17);

$m1->add_station($s18);
$m1->add_station($s19);
$m1->add_station($s20);

//$m1->show_all_stations();

$m1->get_position_near(2,10);

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