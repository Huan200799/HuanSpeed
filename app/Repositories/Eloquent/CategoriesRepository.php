<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Categories;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use DB;
use Illuminate\Support\Str;
class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Categories::class;
    }

    public function CategoriesAll(){
        $categories = $this->model->all();
        return $categories;
    }

    public function FindCategories($id){
        // $categories = $this->model->with('products')->where('parent_id', null)->find($id);
        try {
        $categories = DB::table('product')
        ->join('categories','product.categories_id','=','categories.id')
        ->select('product.*','categories.id', 'categories.categories_name', 'categories.categories_name_slug')
        ->where('categories_id',$id)->where('categories.parent_id', null)->get();

        return $categories;
        } catch (Exception $exception) {

            return back()->withErrors( __('message.findid'));
        }
    }

    public function getCategories($id){
        try {
            $categories = $this->model->find($id);
            return $categories;
        } catch (Exception $exception) {

            return back()->withErrors( __('message.findid'));
        }
    }

    public function createCategories(array $data){
        $result = false;
        try {
        $categories = $this->model->create([
            'categories_name' => $data['categories_name'],
            'categories_name_slug' => Str::slug($data['categories_name']),
            'parent_id' => $data['parent_id'],
        ]);
        $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function updateCategories($id, array $data)
    {
        $result = 'Update failed';
        try {
            $category = $this->model->find($id);
            $category->categories_name = $data['categories_name'];
            $category->categories_name_slug = Str::slug($data['categories_name']);
            $category->parent_id = $data['parent_id'];
            $category->save();

            $result = 'Update successfully';
        } catch (Exception $exception) {
            return $result;
        }
        return $result;
    }

    public function deleteCategories($id)
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
