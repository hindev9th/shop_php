<?php
require_once 'code/Controllers/CartController.php';
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/cart':
        \code\Controllers\CartController::gI()->index();
        setFound(true);
        break;
}
if (preg_match('/\/cart\/add\/(\d+)\/(\d+)\/(\d+)\/(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $id = $matches[1];
        $type_id = $matches[2];
        $color_id = $matches[3];
        $qty = $matches[4];
        \code\Controllers\CartController::gI()->add($id,$type_id,$color_id,$qty);
    } else {
        redirectBack();
    }
    setFound(true);
}
if (preg_match('/\/cart\/update\/(\d+)\/(\d+)\/(\d+)\/(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $id = $matches[1];
        $type_id = $matches[2];
        $color_id = $matches[3];
        $qty = $matches[4];
        \code\Controllers\CartController::gI()->update($id,$type_id,$color_id,$qty);
    } else {
        redirectBack();
    }
    setFound(true);
}

if (preg_match('/\/cart\/delete\/(\d+)\/(\d+)\/(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $id = $matches[1];
        $type_id = $matches[2];
        $color_id = $matches[3];
        \code\Controllers\CartController::gI()->delete($id,$type_id,$color_id);
    } else {
        redirectBack();
    }
    setFound(true);
}
