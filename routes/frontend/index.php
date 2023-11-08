<?php

$request = $_SERVER['REQUEST_URI'];
require 'code/Controllers/HomeController.php';
require 'routes/frontend/cart.php';

switch ($request) {
    case '/':
        \code\Controllers\HomeController::gI()->index(0);
        setFound(true);
        break;
}
if (preg_match('/\/\?page=(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $number = $matches[1];
        \code\Controllers\HomeController::gI()->index($number);
    } else {
        \code\Controllers\HomeController::gI()->index(0);
    }
    setFound(true);
}