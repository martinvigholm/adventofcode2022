<?php
$input = file_get_contents('inputs/day6.txt');
$count = 0;
$number_of_letters = 14;

foreach (str_split($input) as $key => $char) {
    $used_char = [];

    for ($i=0; $i < $number_of_letters; $i++) { 
        $used_char[] = $input[$count + $i];
    }

    if (count($used_char) === count(array_unique($used_char))) {
        $answer = $count + $number_of_letters;
        break;
    }

    $count++;
}

echo $answer;