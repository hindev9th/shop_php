<?php
declare(strict_types=1);
namespace code\Models;

require 'code/Entities/Brand.php';
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
        $result = $query->fetchAll(PDO::FETCH_CLASS, "code\Entities\Brand");
        return $result;
    }
}