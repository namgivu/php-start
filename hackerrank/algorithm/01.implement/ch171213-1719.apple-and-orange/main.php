<?php
/* challenge ref. https://www.hackerrank.com/challenges/apple-and-orange */

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
$r = fgets($f); sscanf($r, '%d %d', $s, $t);
$r = fgets($f); sscanf($r, '%d %d', $a, $b);
$r = fgets($f); sscanf($r, '%d %d', $m, $n);

$r = fgets($f); $A = array_map('intval',explode(' ', $r));
$countA = 0;
for ($i = 0; $i < $m; $i++) {
  $da = $a + $A[$i];
  if ($da>=$s && $da<=$t) {
    $countA++;
  }
}

$r = fgets($f); $B = array_map('intval',explode(' ', $r));
$countB = 0;
for ($i = 0; $i < $n; $i++) {
  $db = $b + $B[$i];
  if ($db>=$s && $db<=$t) {
    $countB++;
  }
}

fclose($f);

echo $countA.PHP_EOL;
echo $countB.PHP_EOL;
