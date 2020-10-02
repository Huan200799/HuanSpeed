<?php
namespace App\Repositories\Interfaces;

interface CategoriesRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function CategoriesAll();
    public function FindCategories($id);
    public function createCategories(array $data);
    public function getCategories($id);
    public function updateCategories($id, array $data);
    public function deleteCategories($id);
}
