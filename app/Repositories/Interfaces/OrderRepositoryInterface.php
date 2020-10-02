<?php
namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function GetOrderProduct();
    public function UserOrderProduct();
    public function OrderProductId($id);
    public function showHistory($id);
    public function showHistoryTotal($id);
    public function updateOrderProduct($id, array $data);
    public function DeleteOrderProduct($id);
}
