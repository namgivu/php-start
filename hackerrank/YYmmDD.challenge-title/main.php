<?php
$f = fopen("php://stdin", "r");
$s = fgets($f);

print("Hello, World.\n");
print($s);

fclose($f);
