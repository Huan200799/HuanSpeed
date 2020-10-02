<?php
namespace App\Repositories\Interfaces;

interface CommentRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function GetCommentProduct();
    public function GetComment();
    public function createComment(array $data);
    public function CommentRating5($id);
    public function CommentRating4($id);
    public function CommentRating3($id);
    public function CommentRating2($id);
    public function CommentRating1($id);
    public function deleteComment($id);
}
