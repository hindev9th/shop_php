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

    public function index()
    {
        return require_once 'resources/views/frontend/cart.php';
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

    public function update(int $id,int $type_id,int $color_id,int $qty)
    {
        $key = $id.$type_id.$color_id;
        updateQtyCart($key,$qty);
    }

    public function delete(int $id,int $type_id,int $color_id)
    {
        $key = $id.$type_id.$color_id;
        removeItemCart($key);
    }
}