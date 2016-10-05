<!--3.Поиск в многомерном массиве-->
<!--Имеем многомерный массив [[1],[2],[3,['id'=>[9]]]]-->
<!--Нужно вывести путь до элемента с id = 9 вот так [2] [1] [id] [0 => 9] и true/false показатель найденности элемента-->
<!--Нужно написать функцию которая это все умеет function searchArray($needle, $haystack), где-->
<!--$needle - что искать-->
<!--$haystack - где искать-->

<?php


$arr = [[1],[2],9,[9],[3,['id'=>[9]]]];

var_dump($arr);

function path(array $arr) {

    array_search(9, $arr);

}


$str = 'ffjfjj_jkfjfj_fjgjk_rtjjm_iiii';

function up($str) {

$del = str_replace('_', ' ', $str);
$del = ucwords($del);
  echo  $del = str_replace(' ', '', $del);
}

up($str);