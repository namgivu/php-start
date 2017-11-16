<?php

$a=[];              $b=(array_filter($a))? implode(',',$a) : 'empty'; echo $b.PHP_EOL;
$a=[null];          $b=(array_filter($a))? implode(',',$a) : 'empty';  echo $b.PHP_EOL;
$a=[null,null];     $b=(array_filter($a))? implode(',',$a) : 'empty';  echo $b.PHP_EOL;
$a=[null,1,null];   $b=(array_filter($a))? implode(',',$a) : 'empty';  echo $b.PHP_EOL;
$a=[1];             $b=(array_filter($a))? implode(',',$a) : 'empty';  echo $b.PHP_EOL;
$a=[1,2];           $b=(array_filter($a))? implode(',',$a) : 'empty';  echo $b.PHP_EOL;