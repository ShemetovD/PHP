<?php

/*
* Задание 2.
*/


/*
* Вывод имени посимвольно на новую строку 
* @name string
*/

function split_name($name){
	$chars = preg_split('//', $name, -1, PREG_SPLIT_NO_EMPTY);
	foreach ($chars as $key => $value) {
		echo $value."<br>";
	}
}
split_name("Denis");


/*
* Функция которая принимает размерность массива и значание, которым надо заполнить массив
* @length_array int
* @element string
*/
function create_array($length_array,$element){
	$temp = array();

	for($i = 0; $i <= $length_array-1; $i++){
		$temp[]=$element;
	}
	echo '<br>----------<br>';
	print_r($temp);
	echo '<br>----------<br><br>';
}

create_array(5,"ker");


$food = array('apple','apple',array('orange', 'banana', 'apple'),array('carrot', 'collard', 'pea'),'kivi','cucumber',array('mentos', 'banana', 'apple'));

/*
* функция вывода массива, которая будет принимать переменную(массив) и выводить все его элементы на экран.
* @input_array array
* @bullet string мнемоника для HTML. 
*/

function get_and_show_array($input_array,$bullet){
	foreach ($input_array as $key => $value) {
		if(count($value) > 1){
			additional_edit($value,$bullet);
		}else{
			echo $value."<br>";
		}
	}
}

function additional_edit($some_array,$bullet){
	foreach ($some_array as $key => $value) {
		echo $bullet.' '.$value."<br>";
	}
}

get_and_show_array($food,'&rarr;');

?>