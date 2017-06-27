<?php 

/*
* Задание 1. Шаг итераций = 7.
*
*/

$chetnue = array();
$ne_chetnue = array();
$simple_numbers = array();

for($i = -38; $i <= 102; $i+=7){
	if(($i % 2) == 0){
		$chetnue[]=$i;
	}

	if(($i % 2) != 0){
		$ne_chetnue[]=$i;
	}

	if((($i % 2) != 0) && (($i % 3) != 0) && (($i % 5) != 0) && (($i % 7) != 0)){
		$simple_numbers[]=$i;
	}

}


$sum_ne_chetnue = array_sum($ne_chetnue);
$sum_chetnue = array_sum($chetnue);

$all_chetnue=count($chetnue);
$sr_arifmet_ch = $sum_chetnue/$all_chetnue;


/*
* Вывод результатов
*/

//print_r($chetnue);
print_r('количество четных элементов = '.count($chetnue).' в интервале от (-38 до 102) с шагом 7');
echo '<br>';
//print_r($ne_chetnue);
print_r('количество нечетных элементов = '.count($ne_chetnue).' в интервале от (-38 до 102) с шагом 7');
echo '<br>';

print_r('сумма нечетных элементов = '.$sum_ne_chetnue.' в интервале от (-38 до 102) с шагом 7');
//echo $sum_ne_chetnue;
echo '<br>';

print_r('среднее значение элементов кратных 2 = '.$sr_arifmet_ch.' в интервале от (-38 до 102) с шагом 7');
//echo $sr_arifmet_ch;
echo '<br>';

print_r('количество простых чисел = '.count($simple_numbers).' в интервале от (-38 до 102) с шагом 7');
//echo count($simple_numbers);

?>