<?php
$inputs = file_get_contents('inputs/day5.txt');
$splited_input = explode(PHP_EOL . PHP_EOL, $inputs);
$steps = explode(PHP_EOL, $splited_input[1]);
$boxes = explode(PHP_EOL, $splited_input[0]);

$sorted_boxes = [];
$step = 1;

// Parse the input
for ($a = 1; $a < substr(end($boxes), -2) + 1; $a++) {
    for ($i = 0; $i < array_key_last($boxes); $i++) {
        if ($boxes[$i][$step] !== ' ') {
            $sorted_boxes[$a][] = $boxes[$i][$step];
        }
    }
    $sorted_boxes[$a] = array_reverse($sorted_boxes[$a]);
    $step += 4;
}

// Move the boxes
foreach ($steps as $current_step) {

    preg_match_all('/\d+/', $current_step, $matches);
    $items_to_move = [];

    for ($i = 0; $i < $matches[0][0]; $i++) {
        $items_to_move[] = end($sorted_boxes[$matches[0][1]]);
        array_pop($sorted_boxes[$matches[0][1]]);
    }

    foreach (array_reverse($items_to_move) as $item) {
        $sorted_boxes[$matches[0][2]][] = $item;
    }
}

// Echo the answer
foreach ($sorted_boxes as $item) {
    echo end($item);
}
