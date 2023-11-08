<?php
declare(strict_types=1);
namespace code\Controllers\admin;
use code\Models\Category;

class CategoryController
{
    private static ?CategoryController $categoryController = null;
    private function __construct()
    {
    }

    public static function gI()
    {
        if (self::$categoryController == null){
            self::$categoryController = new CategoryController();
        }
        return self::$categoryController;
    }

    public function index(int $page)
    {
        $category = new Category();
        $categories = $category->index($page);
        $counts = $category->count();
        $currentPage = $page;
        return require 'resources/views/admin/category/index.php';
    }

    public function create()
    {
        return require 'resources/views/admin/category/create.php';
    }

    public function store()
    {
        $name = $_POST['name'] ?? redirect('admin/category/create');
        $categoryModel = new Category();
        $category = $categoryModel->store($name);
        if (!$category){
            redirect('admin/category/create');
        }
        redirect('/admin/category');
    }

    public function edit(int $id)
    {
        $categoryModel = new Category();
        $category = $categoryModel->edit($id);
        if (!$category){
            redirect('/404');
        }
        return require 'resources/views/admin/category/edit.php';
    }

    public function update(int $id)
    {
        $name = $_POST['name'] ?? redirect("/admin/category/edit/$id");;
        $categoryModel = new Category();
        $category = $categoryModel->update($id,$name);
        if (!$category){
            redirect("/admin/category/edit/$id");
        }
        redirect('/admin/category');

    }

    public function destroy()
    {
        $id = $_POST['id'] ?? redirect('/admin/category');
        $categoryModel = new Category();
        $categoryModel->destroy((int)$id);
        redirect('/admin/category');
    }
}