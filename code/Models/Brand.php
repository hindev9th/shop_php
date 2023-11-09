<?php
declare(strict_types=1);
namespace code\Models;

require_once 'code/Entities/Brand.php';
use config\Config;
use PDO;
class Brand{
    public function __construct()
    {
    }

    public function all()
    {
        $conn = Config::gI()->connect();
        $query = $conn->prepare("SELECT * FROM brands");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS, \code\Entities\Brand::class);
        return $result;
    }

    public function getById(int $id)
    {
        $conn = Config::gI()->connect();
        $query = $conn->prepare("SELECT * FROM brands WHERE id = '$id'");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS, \code\Entities\Brand::class);
        return $result[0];
    }
}