<?php

$a=[]; echo getEmptyCheckedValue('plain', $a), PHP_EOL;
$a=[null]; echo getEmptyCheckedValue('plain', $a), PHP_EOL;
$a=[[null]]; echo getEmptyCheckedValue('plain', $a), PHP_EOL;


$a=[null]; $b=array_filter($a); echo getEmptyCheckedValue('array_filter', $b), PHP_EOL;
$a=[[null]]; $b=array_filter($a); echo getEmptyCheckedValue('array_filter', $b), PHP_EOL;


$a=[[null]]; $c=implode($a); echo getEmptyCheckedValue('implode', $c),      ' '.$c.' strlen='.strlen($c).PHP_EOL;
$a=[1, 2];   $c=implode($a); echo getEmptyCheckedValue('implode', $c),      ' '.$c.' strlen='.strlen($c).PHP_EOL;


function getEmptyCheckedValue($label, $a) {
    if (empty($a)) {
        $b='1 empty';
    } else if ($a==[[null]]) {
        $b=2;
    } else {
        $b=0;
    }
    return "$label | $b";
}