<?php
require_once 'classes/UrlParser.php';

$url = 'https://nextype.ru/';
$parsingPage = new UrlParser($url);

echo '<pre>';
print_r($parsingPage->getAllLinks());
echo '</pre>';
