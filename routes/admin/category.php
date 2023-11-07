<?php

use code\Controllers\admin\CategoryController;

require 'code/Controllers/admin/CategoryController.php';
$request = $_SERVER['REQUEST_URI'];

switch ($request){
    case '/admin/category':
        routeCheckAuthOut();
        routeCheckAuthAdmin();
        \code\Controllers\admin\CategoryController::gI()->index(0);
        setFound(true);
        break;
    case '/admin/category/create':
        routeCheckAuthOut();
        routeCheckAuthAdmin();
        \code\Controllers\admin\CategoryController::gI()->create();
        setFound(true);
        break;
    case '/admin/category/store':
        routeCheckAuthOut();
        routeCheckAuthAdmin();
        \code\Controllers\admin\CategoryController::gI()->store();
        setFound(true);
        break;
    case '/admin/category/destroy':
        routeCheckAuthOut();
        routeCheckAuthAdmin();
        \code\Controllers\admin\CategoryController::gI()->destroy();
        setFound(true);
        break;
}
if (preg_match('/\/admin\/category\?page=(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $number = $matches[1];
        \code\Controllers\admin\CategoryController::gI()->index($number);
    } else {
        \code\Controllers\admin\CategoryController::gI()->index(0);
    }
    setFound(true);
}
if (preg_match('/\/admin\/category\/edit\/(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $number = $matches[1];
        \code\Controllers\admin\CategoryController::gI()->edit($number);
    } else {
        \code\Controllers\admin\CategoryController::gI()->index();
    }
    setFound(true);
}
if (preg_match('/\/admin\/category\/update\/(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $number = $matches[1];
        \code\Controllers\admin\CategoryController::gI()->update($number);
    } else {
        \code\Controllers\admin\CategoryController::gI()->index();
    }
    setFound(true);
}