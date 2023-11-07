<?php
namespace code\Controllers;
require 'code/Models/Brand.php';
use code\Models\Brand;

class BrandController
{
    public function __construct()
    {
    }
    public function index()
    {
        $brand = new Brand();
        $brands = $brand->all();
        return require "resources/views/admin/brands/index.php";
    }
}