<?php

$a=[];       echo getEmptyCheckedValue('isEmpty', $a), PHP_EOL;
$a=[null];   echo getEmptyCheckedValue('isEmpty', $a), PHP_EOL;
$a=[[null]]; echo getEmptyCheckedValue('isEmpty', $a), PHP_EOL;

$a=[[null]]; $c=implode($a); echo $c.PHP_EOL;
$a=[1, 2];   $c=implode($a); echo $c.PHP_EOL;


function getEmptyCheckedValue($label, $a) {
    if (empty($a)) {
        $b='1 empty';
    } else if (!array_filter($a)) {
        $b='1b empty';
    } else if ($a==[[null]]) {
        $b=2;
    } else {
        $b=0;
    }
    var_dump($a);
    return "$label | $b".PHP_EOL;
}