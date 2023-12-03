<?php
$file = file_get_contents("input.txt");
var_dump($file);
$lines = explode("\n", $file);
$sum = 0;
$digits = ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
$numbers = ["1", "2", "3", "4", "5", "6", "7", "8", "9"];
$pattern = '\d|' . implode('|', $digits);
var_dump($pattern);
foreach ($lines as $line) {
  if ($line == "")
    continue;
  preg_match('/^.*?(' . $pattern . ')/', $line, $matches);
  $first = $matches[1];
  $first = str_replace($digits, $numbers, $first);
  preg_match('/.*(' . $pattern . ').*$/', $line, $matches);
  $last = $matches[1];
  $last = str_replace($digits, $numbers, $last);
  $sum += $first . $last;
  // var_dump($first . $last);
}
echo $sum . "\n";
