<?php
declare(strict_types=1);
namespace code\Controllers;

use code\Models\Product;

class CartController
{
    private static ?CartController $cartController = null;
    private function __construct()
    {
    }

    public static function gI()
    {
        if (self::$cartController == null){
            self::$cartController = new CartController();
        }
        return self::$cartController;
    }
    public function add(int $id,int $type_id,int $color_id,int $qty)
    {
        $data = [
            'id' => $id.$type_id.$color_id,
            'qty' => $qty,
        ];

        $productModel = new Product();
        $product = $productModel->getById($id,$type_id,$color_id);
        addToCart($product,$data);
        redirectBack();
    }
}