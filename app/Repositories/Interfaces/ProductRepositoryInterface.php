<?php
namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getStatisticProduct();
    public function getProduct();
    public function getProductProminent();
    public function getProductNotProminent();
    public function findCommentProduct($id);
    public function AVGCommentProduct($id);
    public function createProduct(array $data);
    public function findProduct($id);
    public function updateProduct($id, array $data);
    public function deleteProduct($id);
    public function product_detail($id);
}
