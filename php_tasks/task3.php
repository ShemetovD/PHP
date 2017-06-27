<?php

/*
* функция, которая принимает название месяца и выводит на экран количество дней в нем
* @month string
*/

function get_number_days($month){
	switch ($month) {
	    case 'january ':
	        echo "31 days";
	        break;
	    case 'february':
	        echo "28 days";
	        break;
	    case 'march':
	        echo "31 days";
	        break;
	    case 'april ':
	        echo "30 days";
	        break;
	    case 'may':
	        echo "31 days";
	        break;
	    case 'june':
	        echo "30 days";
	        break;
	    case 'july ':
	        echo "31 days";
	        break;
	    case 'august':
	        echo "31 days";
	        break;
	    case 'september':
	        echo "30 days";
	        break;
	    case 'october ':
	        echo "31 days";
	        break;
	    case 'november':
	        echo "30 days";
	        break;
	    case 'december':
	        echo "31 days";
	        break;
		}
}

get_number_days('february');
echo '<br><br><br>';


/*
* функция, котрая принимает текст, считает количтво гласных в нем в возвращает массив в формате глассные буквы - ключи и их количество в тексте. текст передаем на английском
* @input_string string
*/

function search_glasnue($input_string){
	$result = array();
	$temp = array();
	$glasnue = array('a', 'e', 'i', 'o', 'u', 'y');
	
	//разбиваем текст на символы
	$chars = preg_split('//', mb_strtolower($input_string), -1, PREG_SPLIT_NO_EMPTY);

	// считаем количество повторений символов в тексте
	$temp = array_count_values($chars);

	foreach ($temp  as $key => $value) {
		foreach ($glasnue as $key2 => $value2) {
			if($key == $value2){
				$result[$key] = $value;
			}
		}
	}
	return print_r($result);
}

search_glasnue("LoreTmemH");


/*
* функция, которая выводит позиции всех символов 'a' в переданном тестке в обратном порядке.
* @input_string string
*/

function search_position($input_string){
	$res_array = array();

	$chars = str_split($input_string);
	foreach ($chars as $key => $value) {
		if($value == 'a'){
			$res_array[] = $key;
		}
	}

	echo "<pre>";
	print_r($res_array);
	echo "</pre>";
}

search_position("!ap o a,t a");

?>