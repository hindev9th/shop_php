<?php
declare(strict_types=1);
namespace code\Controllers\admin;

class HomeController
{
    public function index()
    {
        return require "resources/views/admin/index.php";
    }
}