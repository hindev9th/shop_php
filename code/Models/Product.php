<?php
declare(strict_types=1);
namespace code\Models;
use config\Config;
use PDO;

require 'code/Entities/Product.php';
class Product
{
    public function index(int $page)
    {
        $show = 24;
        $start = $page * $show;
        $conn = Config::gI()->connect();
        $sql = "SELECT products.*,product_types.id as type_id,product_types.name as type,product_types.price,product_types.price_discount,product_types.quantity,product_colors.id as color_id,product_colors.name as color_name,product_colors.code as color_code
                FROM products 
                LEFT JOIN product_types 
                ON products.id = product_types.product_id 
                LEFT JOIN product_colors 
                ON products.id = product_colors.product_id 
                GROUP BY products.id LIMIT {$start},{$show}";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_CLASS,"code\Entities\Product");
        return $results;
    }

    public function getById(int $id,int $type_id,int $color_id)
    {
        $conn = Config::gI()->connect();
        $sql = "SELECT products.*,product_types.id as type_id,product_types.name as type,product_types.price,product_types.price_discount,product_types.quantity,product_colors.id as color_id,product_colors.name as color_name,product_colors.code as color_code
                FROM products 
                LEFT JOIN product_types 
                ON products.id = product_types.product_id 
                LEFT JOIN product_colors 
                ON products.id = product_colors.product_id 
                WHERE products.id = '$id' and product_types.id = '$type_id' and product_colors.id = '$color_id'
                GROUP BY products.id ";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_CLASS,"code\Entities\Product");
        return $results[0];
    }
    public function count()
    {
        $conn = Config::gI()->connect();

        $count = $conn->query("SELECT COUNT(*) FROM products");
        $count = $count->fetchColumn();
        return $count;
    }
}