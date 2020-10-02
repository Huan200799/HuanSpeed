<?php
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function GetUser();
    public function deleteUser($id);
    public function updateProfileUser($id, array $data);
    public function changepassword($id, array $data);
}
