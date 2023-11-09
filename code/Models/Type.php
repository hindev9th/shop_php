<?php
declare(strict_types=1);
namespace code\Models;
require_once 'code/Entities/Type.php';
use config\Config;

class Type
{
    public function getByProductId(int $id)
    {
        $conn = Config::gI()->connect();
        $sql = "SELECT * FROM product_types WHERE product_id = '$id'";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_CLASS,\code\Entities\Type::class);
        return $results;
    }
}