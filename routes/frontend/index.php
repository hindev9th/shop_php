<?php

$request = $_SERVER['REQUEST_URI'];
require 'code/Controllers/HomeController.php';

switch ($request) {
    case '/':
        routeCheckAuthOut();
        routeCheckAuthAdmin();
        \code\Controllers\HomeController::gI()->index();
        setFound(true);
        break;
}