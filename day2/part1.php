<?php
$file = file_get_contents("input.txt");
var_dump($file);
$lines = explode("\n", $file);
print_r($lines);
$possible_games = [];
$impossible_games = [];
$cubes = [];
$max_cubes = ["red" => 12, "green" => 13, "blue" => 14];
print_r($max_cubes);

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
    // echo "$color=" . $matches[1][$key] . " - max: " . $max_cubes[$color] . "\n";
    if ($matches[1][$key] > $max_cubes[$color]) {
      $is_possible = false;
      break;
    }
  }
  if ($is_possible) {
    $possible_games[] = $game_id;
  } else {
    $impossible_games[] = $game_id;
  }
}
// print_r($possible_games);
echo implode(",", $possible_games) . "\n";
$sum = array_sum($possible_games);
echo $sum . "\n";
