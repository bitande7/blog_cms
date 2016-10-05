<?php

$cat = [
    ['id' => 1, 'parentid' => 0, 'name' => 'programming languages'],
    ['id' => 3, 'parentid' => 1, 'name' => 'php'],
    ['id' => 4, 'parentid' => 1, 'name' => 'javascript'],
    ['id' => 7, 'parentid' => 4, 'name' => 'jquery'],
    ['id' => 8, 'parentid' => 1, 'name' => 'jqueryUI'],
    ['id' => 10, 'parentid' => 8, 'name' => 'datePicker'],
    ['id' => 11, 'parentid' => 10, 'name' => 'time'],
    ['id' => 12, 'parentid' => 10, 'name' => 'date'],
    ['id' => 13, 'parentid' => 1, 'name' => 'ruby'],
];


function recursive($cat, $parent = 0) {

    $print = "";

    foreach($cat as $category){

        if($category["parentid"]==$parent){
            $print.='<li><a href="#"  id="'.$category['id'].'" >'.$category['name'].'</a>';

            foreach($cat as $sub_category){
                if($sub_category["parentid"]==$category['id']){
                    $print.="<ul>";
                    $print.= recursive($cat, $category['id']);
                    $print.="</ul>";
                    break;
                }
            }


        }

    }

    return  $print;

}

echo recursive($cat);


/*
 *
 * 3.Поиск в многомерном массиве
Имеем многомерный массив [[1],[2],[3,['id'=>[9]]]]
Нужно вывести путь до элемента с id = 9 вот так [2] [1] [id] [0 => 9] и true/false показатель найденности элемента
Нужно написать функцию которая это все умеет function searchArray($needle, $haystack), где
$needle - что искать
$haystack - где искать
 */