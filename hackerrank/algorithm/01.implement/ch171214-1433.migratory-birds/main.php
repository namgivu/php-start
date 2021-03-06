<?php
/* challenge ref. https://www.hackerrank.com/challenges/migratory-birds */

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
$s = fgets($f); $n = (int)$s;
$s = fgets($f); $a = array_map('intval', explode(' ',$s));

$count = array();
$max = PHP_INT_MIN; $iMax = -1;
foreach ($a as $i) {
  if (array_key_exists($i, $count)) {
    $count[$i]++;
  } else {
    $count[$i] = 1;
  }
  if ($max<$count[$i]) {
    $max = $count[$i];
    $iMax = $i;
  }
  else if ($max==$count[$i]) { //keep the type with smaller id
    if ($iMax>$i) {
      $iMax=$i;
    }

  }

}
fclose($f);

echo $iMax;