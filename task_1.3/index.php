<?php

$array = [
    [
        'sort' => '20',
        'name' => 'Mike'
    ],
    [
        'sort' => '10',
        'name' => 'Adam'
    ],
    [
        'sort' => '40',
        'name' => 'Stive'
    ],
    [
        'sort' => '300',
        'name' => 'Jane'
    ],
];

/* String-Sorting */
/*
function compare($a, $b){
    return strcmp($a['sort'], $b['sort']);
}
usort($array, 'compare');
*/

/* Numeric-Sorting */
function cmp($a, $b)
{
    if ($a['sort'] == $b['sort']) {
        return 0;
    }
    return ($a['sort'] < $b['sort']) ? -1 : 1;
}

usort($array, 'cmp');

echo "<pre>";
print_r($array);
echo "</pre>";