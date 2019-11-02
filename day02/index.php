<?php

$age=array(
    'Peter' => '35',
    'Ben'   => '37',
    'Joe'   => '43',
);

$s=$age;
var_dump($s);
exit();
echo $s;

echo "\n";
var_dump($s);



$s='122'; echo($s); echo "\n"; var_dump($s);


$handle = fopen("php://stdin", "r");
$i = 4;
$d = 4.0;
$s = "HackerRank ";

fscanf($handle, '%d', $i2); echo $i2;
fscanf($handle, '%f', $d2); echo $d2;
$s2 = fgets($handle); echo $s2;


fclose($handle);