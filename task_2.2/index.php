<?php
require_once 'classes/UrlParser.php';

$url = 'https://e-book74.ru/';
$parsingPage = new UrlParser();

echo '<pre>';
print_r($parsingPage->getAllLinks($url));
echo '</pre>';
