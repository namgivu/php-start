<?php
/* challenge ref. https://www.hackerrank.com/challenges/electronics-shop */

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
$r = fgets($f); sscanf($r, '%d %d %d', $s, $n, $m);
$r = fgets($f); $KB = array_map('intval', explode(' ', $r));
$r = fgets($f);      $USB = array_map('intval', explode(' ', $r));
fclose($f);

$budget=$s;
$maxSpent=0;

arsort($KB);
arsort($USB);

$ik=0; //index for keyboard loop
$iu=0; //index for usb loop

//locate starting point where price is lower than budget
$ikStart=-1; $iuStart=-1;
while ($KB[$ik]>$budget && $ik<$n) { $ik++; }
while ($USB[$uk]>$budget && $uk<$m) { $iu++; }
$ikStart = $ik; $iuStart = $iu;

while (true) {
  if ($ik>=$n) {
    break;
  }

  //here, we are at $ik a candidate for keyboard
  $targetUsbMIN  = $maxSpent? $maxSpent-$KB[$ik] : 0; //candidate for usb must helpful to find higher value for $maxSpent
  $targetUsbMAX = $budget-$KB[$ik];

  //find usb with highest price
  for ($iu = $iuStart; $iu < $m; $iu++) {
    if ($USB[$iu]>$targetUsbMIN) {
      if ($USB[$iu]==$targetUsbMAX) { //we can spend all budget -> done!
        echo $budget; die;
      }
      else if ($USB[$iu]<$targetUsbMAX) { //found highest usb
        $maxSpent = $KB[$ik] + $USB[$iu];
        break; //no need to go to lower usb
      }
    }
  }

  $ik++;
}

echo $maxSpent;
