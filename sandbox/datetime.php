<?php

#ref. https://stackoverflow.com/a/16814230/248616
$now=new DateTime();

#add 1 week ref. https://stackoverflow.com/a/15859078/248616
$d=$now;
echo $d->format('Y-m-d H:i:s').PHP_EOL;
$d->modify('+1 week');
echo $d->format('Y-m-d H:i:s').PHP_EOL;
