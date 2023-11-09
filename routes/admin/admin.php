<?php

$request = $_SERVER['REQUEST_URI'];
require 'code/Controllers/admin/HomeController.php';
require 'code/Controllers/LoginController.php';
require 'code/Controllers/admin/BrandController.php';
switch ($request) {
    case '/admin':
        routeCheckAuthAdminOut();
        routeCheckAuthAdmin();
        $home = new \code\Controllers\admin\HomeController();
        $home->index();
        setFound(true);
        break;
    case '/admin/login':
        routeCheckLoginAuthAdmin();
        \code\Controllers\LoginController::gI()->admin();
        setFound(true);
        break;
    case '/admin/login/in':
        routeCheckLoginAuthAdmin();
        \code\Controllers\LoginController::gI()->login();
        setFound(true);
        break;
    case '/logout':
        \code\Controllers\LoginController::gI()->logoutAdmin();
        setFound(true);
        break;
    case '/admin/brand':
        routeCheckAuthAdminOut();
        routeCheckAuthAdmin();
        code\Controllers\admin\BrandController::gI()->index();
        setFound(true);
        break;
}