<?php

mb_internal_encoding("UTF-8");

function convertFullName($string)
{
    $arrayOfFullName = explode(' ', mb_convert_case(trim($string), MB_CASE_TITLE));
    $result = $arrayOfFullName[0] . ' ';

    for ($i = 1; $i < count($arrayOfFullName); $i++) {
        $result .= mb_substr($arrayOfFullName[$i], 0, 1) . '.';
    }
    return $result; // Результат: Фамилия И.О.
}

echo convertFullName('Иванов Иван Иванович');