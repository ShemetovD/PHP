<?php

class Human{
	public $age;
	public $name;

	function __construct($age,$name){
		$this->name=$name;
		$this->age=$age;
	}
	function get_name(){
		return $this->name;
	}
}

class Son extends Human{
	public $hobbi;

	function __construct($age,$name,$hobbi){
		parent::__construct($age,$name);
		$this->hobbi=$hobbi;
	}

	function get_info(){
		return $this->name.'+'.$this->age.'+'.$this->hobbi;
	}
	function get_name(){
		return $this->name.' son class';
	}
}

class Grand extends Human{

	public $fishing;

	function __construct($age,$name,$fishing){
		parent::__construct($age,$name);
		$this->fishing=$fishing;
	}

	function get_info(){
		return $this->name.'+'.$this->age.'+'.$this->hobbi;
	}
	function get_name(){
		return $this->name.' son class';
	}
	function get_fishing_status(){
		return $this->fishing;
	}
}


class tank{
	protected $people = array('1','2','3');
	private $stv;

	function __construct(Stvol $stv){
		$this->stv=$stv;
	}

	function add_man(Human $man){
		$this->people[]=$man;
	}

	function sostav(){
		return count($this->people);
	}
	function fire_tank(){
		$this->stv->charge();
		$this->stv->fire();
	}

}

class Bullet extends tank{

}

class Engine extends tank{

}

class Stvol extends tank{

	function __construct(){

	}

	function charge(){
		echo 'charging <br>';
	}
	function fire(){
		echo 'fire <br>';
	}
}

$t = new Tank(new Stvol());
$t->add_man(new Human(1,5));
$t->add_man(new Human(1,5));
$t->add_man(new Human(1,5));

$t->fire_tank();
echo '<br>';

echo $t->sostav();
echo '<br>';
//$n = new Human(10,12);
$nn = new Son(3,3,'sport');
echo $nn->get_name();

$g = new Grand('G','grandfather','false');
echo "<br>";
echo $g->get_fishing_status();

?>