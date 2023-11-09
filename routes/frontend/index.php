<?php

$request = $_SERVER['REQUEST_URI'];
require 'code/Controllers/HomeController.php';
require 'code/Controllers/ProductController.php';
require 'code/Controllers/RegisterController.php';
require 'code/Controllers/CheckoutController.php';
require 'routes/frontend/cart.php';

switch ($request) {
    case '/':
        \code\Controllers\HomeController::gI()->index(0);
        setFound(true);
        break;
    case '/login':
        routeCheckAuth();
        \code\Controllers\LoginController::gI()->index();
        setFound(true);
        break;
    case '/login/in':
        routeCheckAuth();
        \code\Controllers\LoginController::gI()->login();
        setFound(true);
        break;
    case '/register':
        routeCheckAuth();
        \code\Controllers\RegisterController::gI()->index();
        setFound(true);
        break;
    case '/register/in':
        routeCheckAuth();
        \code\Controllers\RegisterController::gI()->register();
        setFound(true);
        break;
    case '/checkout':
        routeCheckAuthOut();
        \code\Controllers\CheckoutController::gI()->index();
        setFound(true);
        break;
    case '/checkout/in':
        routeCheckAuthOut();
        \code\Controllers\CheckoutController::gI()->store();
        setFound(true);
        break;
}
if (preg_match('/\/product\/(\d+)\/(\d+)\/(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $id = $matches[1];
        $type_id = $matches[2];
        $color_id = $matches[3];
        \code\Controllers\ProductController::gI()->index($id,$type_id,$color_id);
    } else {
        redirectBack();
    }
    setFound(true);
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