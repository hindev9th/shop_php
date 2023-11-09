<?php
declare(strict_types=1);
namespace code\Models;
require_once 'code/Entities/Color.php';
use config\Config;
use PDO;
class Color
{
    public function getByProductId(int $id)
    {

        $conn = Config::gI()->connect();
        $sql = "SELECT * FROM product_colors WHERE product_id = '$id'";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_CLASS,\code\Entities\Color::class);
        return $results;
    }
}