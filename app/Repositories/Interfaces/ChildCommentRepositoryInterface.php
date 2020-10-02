<?php
namespace App\Repositories\Interfaces;

interface ChildCommentRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getChildComment();
    public function getCommentChild();
    public function createChildComment(array $data);
    public function deleteChildComment($id);

}
