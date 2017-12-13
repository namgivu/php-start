<?php
/* challenge ref. https://www.hackerrank.com/challenges/grading */

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
$r = fgets($f); $n = (int)$r;
$a = array();
for ($i = 0; $i < $n; $i++) {
  $r = fgets($f); $a []= (int)$r;
}
fclose($f);

foreach ($a as $score) {
  if ($score<38) {
    $rounded = $score;
  } else {
    $mod = $score % 5;
    $diffToNext5 = 5-$mod;
    if ($diffToNext5<3) {
      $score += $diffToNext5;
    }
    $rounded = $score;

  }
  echo $rounded.PHP_EOL;
}