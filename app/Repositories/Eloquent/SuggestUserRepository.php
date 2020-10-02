<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Comment;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\SuggestUserRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Auth;
use App\Models\Suggest;
class SuggestUserRepository extends BaseRepository implements SuggestUserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Suggest::class;
    }

    public function getAllSuggest(){
        $suggest = $this->model->orderby('id', 'desc')->paginate(config('constraint.app.paginates'));
        return $suggest;
    }

    public function createSuggestProduct(array $data)
    {
        $result = false;
        try {
        if ($data['product_img']) {
            $file = $data['product_img'];
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('image', $fileName);
        }
        $product = $this->model->create([
            'product_name' => $data['product_name'],
            'product_img' => $fileName,
            'description' => $data['description'],
            'price' => $data['price'],
            'condition' => $data['condition'],
            'warranty' => $data['warranty'],
            'accessories' => $data['accessories'],
            'reason' => $data['reason'],
            'promotion' => $data['promotion'],
            'featured' => $data['featured'],
            'classify' => $data['classify'],
            'categories_id' => $data['categories_id'],
            'user_id' => Auth::id(),
        ]);
        $result = true;
        } catch (Exception $exception) {

            return $result;
        }
        return $result;
    }

    public function updateSuggestProduct($id, array $data)
    {
        $result = false;
        try {
        $suggest = $this->model->find($id);
        $suggest->accept = 'Accept';
        $suggest->save();
        $product = new Product;
        $product->product_name = $data['product_name'];
        $product->product_name_slug = Str::slug($data['product_name']);
        $product->product_img = $data['product_img'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->condition = $data['condition'];
        $product->warranty = $data['warranty'];
        $product->featured = $data['featured'];
        $product->accessories = $data['accessories'];
        $product->promotion = $data['promotion'];
        $product->status = $data['status'];
        $product->classify = $data['classify'];
        $product->categories_id = $data['categories_id'];
        $product->save();
        $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function deleteSuggestProduct($id)
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
