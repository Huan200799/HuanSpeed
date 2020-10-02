<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Comment;
use App\Models\ChildComment;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Comment::class;
    }

    public function GetCommentProduct(){
        $comment = $this->model->with('comment_product')->orderby('id', 'desc')->paginate(config('constraint.app.paginates'));
        return $comment;
    }

    public function GetComment()
    {
        $comment = $this->model->with('comment_product')->get();
        return $comment;
    }

    public function CommentRating5($id)
    {
        $comment = $this->model->where('com_product',$id)->where('com_rating',5)->count();
        return $comment;
    }

    public function CommentRating4($id)
    {
        $comment = $this->model->where('com_product',$id)->where('com_rating',4)->count();
        return $comment;
    }

    public function CommentRating3($id)
    {
        $comment = $this->model->where('com_product',$id)->where('com_rating',3)->count();
        return $comment;
    }

    public function CommentRating2($id)
    {
        $comment = $this->model->where('com_product',$id)->where('com_rating',2)->count();
        return $comment;
    }

    public function CommentRating1($id)
    {
        $comment = $this->model->where('com_product',$id)->where('com_rating',1)->count();
        return $comment;
    }

    public function createComment(array $data)
    {
        $result = false;
        try {
            $comment = new Comment;
                $comment->com_rating = $data['rating'];
                $comment->com_email = $data['email'];
                $comment->com_name = $data['name'];
                $comment->com_content = $data['content'];
                $comment->com_product = $data['com_product'];
                $comment->save();
            $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function deleteComment($id)
    {
        $data = null;
        $result = $this->model->find($id);
        if ($result) {
            $data = $result->delete();

            return $data;
        }

        return $data;
    }

}
