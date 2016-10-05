<?php


function array_flatten($array) {
    $result = [];
    array_walk_recursive($array, function($element) use (&$result) {
        $result[] = $element;
    });
    return $result;
}

print_r(array_flatten([1, [2], [3, [[[4]]]]]));