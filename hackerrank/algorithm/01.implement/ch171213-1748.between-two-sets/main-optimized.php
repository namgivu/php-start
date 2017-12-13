<?php
/* challenge ref. https://www.hackerrank.com/challenges/between-two-sets */

//region IO config
  $SCRIPT_HOME = realpath(dirname(__FILE__)); //get current script path ref. https://stackoverflow.com/a/4645101/248616
  $FILE_IN     = "$SCRIPT_HOME/io/in.txt";
  $FILE_OUT    = "$SCRIPT_HOME/io/out.txt";

  //region redirect stdout to file ref. https://stackoverflow.com/a/13260825/248616
  $ob_file = fopen($FILE_OUT,'w');
  $ob_file_callback = function($buffer) {
    global $ob_file;
    fwrite($ob_file, trim($buffer,"\n"));
  };
  ob_start($ob_file_callback);
  //endregion

  //region redirect stdin to file TODO ref. https://stackoverflow.com/q/47771547/248616
  $PHP_STDIN = $FILE_IN; //redirect00 simulate the redirect by stream value
  //endregion

//endregion IO config
?>

<?php
//redirect01 enable below line when submit to hackerrank
//$PHP_STDIN = 'php://stdin';
$f = fopen($PHP_STDIN, 'r');
$r = fgets($f); sscanf($r, '%d %d', $m, $n);
$r = fgets($f); $A = array_map('intval', explode(' ', $r));
$r = fgets($f); $B = array_map('intval', explode(' ', $r));
fclose($f);

$lcmA = -1;
foreach ($A as $i) {
  if ($lcmA<0) { $lcmA = $i; continue; }
  $lcmA = lcm($lcmA, $i);
}

$gcdB = -1;
foreach ($B as $i) {
  if ($gcdB<0) { $gcdB = $i; continue; }
  $gcdB = gcd($gcdB, $i);
}

$countTarget = $gcdB/$lcmA;
$count = countDivisor($countTarget);
echo $count.PHP_EOL;

//region utils
function gcd($a,$b) { //greatest common divisor ref. http://php.net/manual/en/ref.math.php#36321
  if(!$b) {
    return $a;
  } else {
    return gcd($b, $a%$b);
  }
}

function lcm($a, $b) { //least common multiple ref. http://php.net/manual/en/ref.math.php#13343
  return $a*($b/gcd($a,$b));
}

function countDivisor($a) {
  //TODO we may optimize more ref. https://anupamsaha.wordpress.com/2011/05/16/find-total-number-of-divisors-of-an-integer-in-php/
  $count = 0;
  for($i=1; $i <= $a; $i++) {
    if ($a % $i == 0) $count++;
  }
  return $count;
}
//endregion utils
