<?php
declare(strict_types=1);
namespace code\Controllers;

class HomeController
{
    private static ?HomeController $homeController = null;
    private function __construct()
    {
    }

    public static function gI()
    {
        if (self::$homeController == null){
            self::$homeController = new HomeController();
        }
        return self::$homeController;
    }
    public function index()
    {
        return require 'resources/views/frontend/index.php';
    }
}