<?php
$file = file_get_contents("test.txt");
var_dump($file);
$lines = explode("\n", $file);
$sum = 0;
foreach ($lines as $line) {
  if ($line == "")
    continue;
  preg_match('/^[^\d]*(\d)/', $line, $matches);
  $first = $matches[1];
  preg_match('/(\d)[^\d]*$/', $line, $matches);
  $last = $matches[1];
  $sum += $first . $last;
  // var_dump($first . $last);
}
echo $sum . "\n";
