<?php

#ref. https://stackoverflow.com/a/16814230/248616
$now=new DateTime();

#add 1 week ref. https://stackoverflow.com/a/15859078/248616
$d=$now;       #caution, this will take reference of $now to $d, not a deep copy
$d=clone $now; #this is the right deep copy ref. https://stackoverflow.com/a/2579471/248616
echo $d->format('Y-m-d H:i:s').PHP_EOL;
$d->modify('+1 week');
echo $d->format('Y-m-d H:i:s').PHP_EOL;

#compare ref. https://stackoverflow.com/a/16814230/248616
echo PHP_EOL;
echo $now->format('Y-m-d H:i:s').PHP_EOL;
echo $d  ->format('Y-m-d H:i:s').PHP_EOL;
var_dump($now < $d);
var_dump($now > $d);
var_dump($now == $d);
