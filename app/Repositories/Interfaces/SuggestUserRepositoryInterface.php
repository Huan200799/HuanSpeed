<?php
namespace App\Repositories\Interfaces;

interface SuggestUserRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getAllSuggest();
    public function createSuggestProduct(array $data);
    public function deleteSuggestProduct($id);
    public function updateSuggestProduct($id, array $data);
}
