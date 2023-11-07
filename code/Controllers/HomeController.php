<?php
declare(strict_types=1);
namespace code\Controllers;

class HomeController
{
    public function index()
    {
        return require "resources/views/admin/index.php";
    }
}