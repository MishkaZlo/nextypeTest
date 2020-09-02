<?php

function getItemsFromDate($date)
{
    $filename = __DIR__ . "/data.json";
    $result = [];

    if (file_exists($filename)) {
        $allItems = json_decode(file_get_contents($filename), true);
    }

    foreach ($allItems as $task) {

        if (strtotime($task['created']) >= strtotime($date)) {
            $result[] = $task;
        }
    }

    return $result;
}

echo "<pre>";
print_r(getItemsFromDate("20.01.2020 16:00:01"));
echo "</pre>";