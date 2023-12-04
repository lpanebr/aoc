<?php
error_reporting(E_ALL & ~E_WARNING);

$file = file_get_contents("input.txt");
// var_dump($file);
$lines = explode("\n", $file);
// print_r($lines);
$cubes = [];

foreach ($lines as $id => $line) {
  $is_possible = true;
  $game_id = $id + 1;
  if ($line == "")
    continue;
  $clean_line = preg_replace(['/Game \d+: /', '/[,;]/'], ['', ''], $line);
  // echo "Game " . $game_id . ": $clean_line\n";
  preg_match_all('/(\d+) (blue|red|green)/', $clean_line, $matches);
  // print_r($matches[2]);
  foreach ($matches[2] as $key => $color) {
    if (null == $cubes[$game_id][$color]) {
      $cubes[$game_id][$color] = $matches[1][$key];
      continue;
    }
    if ($matches[1][$key] > $cubes[$game_id][$color])
      $cubes[$game_id][$color] = $matches[1][$key];
  }
}
print_r($cubes);
$sum = 0;
foreach ($cubes as $game_id => $cube) {
  $power = array_product(array_values($cube));
  echo "Game $game_id: " . $power . "\n";
  $sum += $power;
}
// echo implode(",", $possible_games) . "\n";
// $sum = array_sum($possible_games);
echo $sum . "\n";
