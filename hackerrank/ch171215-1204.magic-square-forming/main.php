<?php
/* HARD challenge ref. https://www.hackerrank.com/challenges/magic-square-forming */

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
$s = fgets($f); $r0 = array_map('intval',explode(' ',$s));
$s = fgets($f); $r1 = array_map('intval',explode(' ',$s));
$s = fgets($f); $r2 = array_map('intval',explode(' ',$s));
$a = [ $r0, $r1, $r2];
fclose($f);

$allMagicSquares = [
  [[8, 1, 6], [3, 5, 7], [4, 9, 2]],
  [[6, 1, 8], [7, 5, 3], [2, 9, 4]],
  [[4, 9, 2], [3, 5, 7], [8, 1, 6]],
  [[2, 9, 4], [7, 5, 3], [6, 1, 8]],
  [[8, 3, 4], [1, 5, 9], [6, 7, 2]],
  [[4, 3, 8], [9, 5, 1], [2, 7, 6]],
  [[6, 7, 2], [1, 5, 9], [8, 3, 4]],
  [[2, 7, 6], [9, 5, 1], [4, 3, 8]],
];

$min = PHP_INT_MAX;
foreach ($allMagicSquares as $magicSquare) {
  $diff=0;
  for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
      $diff += abs($a[$i][$j]-$magicSquare[$i][$j]);
    }
  }
  if ($diff<$min) {
    $min=$diff;
  }

}

echo $min;