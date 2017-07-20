<?php

class Station{

	public $id;
	public $position = array();
	public $title;

	function __construct($id,$position,$title){
		
		$this->id=$id;
		$this->position=$position;
		$this->title=$title;

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

	function set_position($position){
		$this->position=$position;
	}
	function get_position(){
		return $this->position;
	}

	function show_info(){
		echo '<pre>';
		print_r($this->title);
		echo '</pre>';
	}

	

}

?>