<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set("Asia/HO_CHI_MINH");

$request = $_SERVER['REQUEST_URI'];
$controller = __DIR__ . '/code/Controllers/';
require 'code/Helpers/index.php';
session_start();
switch ($request) {
    case '/admin':
        routeCheckAuthOut();
        require $controller . 'HomeController.php';
        $home = new \code\Controllers\HomeController();
        $home->index();
        break;
    case '/admin/login':
        routeCheckAuth();
        require $controller . 'LoginController.php';
        \code\Controllers\LoginController::gI()->index();
        break;
    case '/admin/login/in':
        routeCheckAuth();
        require $controller . 'LoginController.php';
        \code\Controllers\LoginController::gI()->login();
        break;
    case '/admin/logout':
        require $controller . 'LoginController.php';
        \code\Controllers\LoginController::gI()->logoutAdmin();
        break;
    case '/admin/brand':
        routeCheckAuthOut();
        require $controller . 'BrandController.php';
        $brand = new \code\Controllers\BrandController();
        $brand->index();
        break;
    default:
        http_response_code(404);
        require __DIR__.'/resources/views/Error/404.php';
        break;
}