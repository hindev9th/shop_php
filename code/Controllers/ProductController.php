<?php

namespace code\Controllers;
require_once 'code/Models/Color.php';
require_once 'code/Models/Type.php';

use code\Models\Brand;
use code\Models\Category;
use code\Models\Color;
use code\Models\Product;
use code\Models\Type;

class ProductController
{
    private static ?ProductController $productController = null;
    private function __construct()
    {
    }

    public static function gI(): ?ProductController
    {
        if (self::$productController == null){
            self::$productController = new ProductController();
        }
        return self::$productController;
    }
    public function index(int $id,int $type_id,int $color_id)
    {
        $productModel = new Product();
        $colorModel = new Color();
        $typeModel = new Type();
        $brandModel = new Brand();
        $categoryModel = new Category();
        $product = $productModel->getById($id,$type_id,$color_id);
        $colors = $colorModel->getByProductId($id);
        $types = $typeModel->getByProductId($id);
        $brandProduct = $brandModel->getById($product->getBrandId());
        $categoryProduct = $categoryModel->edit($product->getCategoryId());

        return require_once 'resources/views/frontend/product.php';
    }
}