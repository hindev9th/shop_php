<?php
declare(strict_types=1);
namespace code\Models;
require_once 'code/Entities/Category.php';
use config\Config;
use PDO;

class Category
{
    public function index(int $page)
    {
        $show = 5;
        $start = $page * $show;
        $conn = Config::gI()->connect();

        $query = $conn->prepare("SELECT * FROM categories LIMIT {$start},{$show}");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_CLASS, \code\Entities\Category::class);

        return $results;
    }

    public function all()
    {
        $conn = Config::gI()->connect();
        $query = $conn->prepare("SELECT * FROM categories");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_CLASS, \code\Entities\Category::class);
        return $results;
    }
    public function store(string $name)
    {
        $conn = Config::gI()->connect();
        $query = $conn->prepare("INSERT INTO categories (name) VALUES ('$name')");
        return $query->execute();
    }

    public function edit(int $id)
    {
        $conn = Config::gI()->connect();
        $query = $conn->prepare("SELECT * FROM categories WHERE id = '$id' LIMIT 1");
        $query->execute();
        $category = $query->fetchAll(PDO::FETCH_CLASS, \code\Entities\Category::class);
        if ($category[0]){
            return $category[0];
        }
        return null;
    }

    public function update(int $id,string $name): bool
    {
        $conn = Config::gI()->connect();
        $query = $conn->prepare("UPDATE categories SET name = '$name' WHERE id = '$id'");
        $query->execute();
        return $query->rowCount() > 0;
    }

    public function destroy(int $id)
    {
        $conn = Config::gI()->connect();
        $query = $conn->prepare("DELETE FROM categories WHERE id = '$id'");
        return $query->execute();
    }

    public function count()
    {
        $conn = Config::gI()->connect();

        $count = $conn->query("SELECT COUNT(*) FROM categories");
        $count = $count->fetchColumn();
        return $count;
    }
}