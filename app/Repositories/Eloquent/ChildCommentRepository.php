<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Comment;
use App\Models\ChildComment;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\ChildCommentRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
class ChildCommentRepository extends BaseRepository implements ChildCommentRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return ChildComment::class;
    }

    public function getChildComment(){
        $childcomment = $this->model->all();
        return $childcomment;
    }

    public function getCommentChild(){
        $childcomment = $this->model->with('comment')->orderby('id', 'desc')->paginate(config('constraint.app.paginates'));
        return $childcomment;
    }

    public function createChildComment(array $data)
    {
        $result = false;
        try {
            $childcomment = $this->model->create([
                'childcom_email' => $data['email'],
                'childcom_name' => $data['name'],
                'childcom_content' => $data['content'],
                'childcom_comment' => $data['com_id'],
            ]);
            $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function deleteChildComment($id)
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
