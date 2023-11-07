<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set("Asia/HO_CHI_MINH");

$controller = __DIR__ . '/code/Controllers/';
require 'code/Helpers/index.php';
session_start();
$isFound = false;
function setFound(bool $is)
{
    $GLOBALS['isFound'] = $is;
}

require 'routes/index.php';

if (!$isFound){
    http_response_code(404);
    require __DIR__.'/resources/views/Error/404.php';
}