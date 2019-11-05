<?php
// php date all formats ref. https://www.php.net/manual/en/function.date.php

$today = date("Y-m-d");
$number = date('N', strtotime($today));

echo $today;
echo "\n";
echo $number;

echo "\n";
echo date("");
echo "\n";
echo date("Y-m-D");
echo "\n";
echo "\n";
echo date("L");
echo "\n";
echo date("l");
echo "\n";
echo date("D");

