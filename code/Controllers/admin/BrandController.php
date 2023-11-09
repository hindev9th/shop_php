<?php
namespace code\Controllers\admin;
require_once 'code/Models/Brand.php';

use code\Models\Brand;

class BrandController
{
    private static ?BrandController $brandController = null;
    private function __construct()
    {
    }

    public static function gI()
    {
        if (self::$brandController == null){
            self::$brandController = new BrandController();
        }
        return self::$brandController;
    }

    public function index()
    {
        $brand = new Brand();
        $brands = $brand->all();
        return require_once "resources/views/admin/brands/index.php";
    }
}